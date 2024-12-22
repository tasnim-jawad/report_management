<?php

namespace App\Http\Controllers\Thana;

use App\Http\Controllers\Controller;
use App\Models\Organization\OrgThanaUser;
use App\Models\Report\ReportInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ThanaController extends Controller
{
    public function report(){
        return view('thana.thana_report');
    }

    public function expense_category_wise()
    {
        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        $ward_info = (object) auth()->user()->org_ward_user;
        $month = Carbon::parse(request()->month);

        $query = ThanaBmExpense::query();
        $filter = $query->whereYear('date', $month->clone()->year)->whereMonth('date', $month->clone()->month)->where('ward_id', $ward_info->ward_id);
        $data = $filter->with('ward_bm_expense_category')->get();

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200);
    }

    public function income_category_wise()
    {
        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        $ward_info = (object) auth()->user()->org_ward_user;
        $month = Carbon::parse(request()->month);

        $query = WardBmIncome::query();
        $filter = $query->whereYear('month', $month->clone()->year)->whereMonth('month', $month->clone()->month)->where('ward_id', $ward_info->ward_id);
        $data = $filter->with('ward_bm_income_category')->get();
        // dd("income_category_wise", $data->toArray());
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200);
    }

    public function report_status()
    {
        $month = request()->month;
        if ($month) {
            $org_thana_user = OrgThanaUser::where('user_id', auth()->id())->first();
            $thana_id = $org_thana_user->thana_id;
            $month = Carbon::parse(request()->month);

            $report_info = ReportInfo::where('org_type_id', $thana_id)
                ->where('org_type', 'thana')
                ->whereYear('month_year', $month->clone()->year)
                ->whereMonth('month_year', $month->clone()->month)
                ->get()
                ->first();

            $report_submit_status = $report_info->report_submit_status ?? 'unsubmitted';
            $report_approved_status = $report_info->report_approved_status ?? 'pending';

            if ($report_submit_status == 'unsubmitted') {
                return response()->json([
                    'status' => 'success',
                    'report_status' => "unsubmitted",
                    "message" => "রিপোর্ট জমা দেওয়া হয়নি এখনো ।"
                ], 200);
            } else if ($report_submit_status == 'submitted' &&  $report_approved_status == 'pending') {
                return response()->json([
                    'status' => 'success',
                    'report_status' => "pending",
                    "message" => "রিপোর্ট জমা হয়েছে । থানার আপ্রুভের জন্য অপেক্ষমাণ।"
                ], 200);
            } else if ($report_submit_status == 'submitted' &&  $report_approved_status == 'rejected') {
                return response()->json([
                    'status' => 'success',
                    'report_status' => "rejected",
                    "message" => "রিপোর্ট রিজেক্ট করা হয়েছে । ভুলগুলি ঠিক করে আবার জমা দিন ।"
                ], 200);
            } else if ($report_submit_status == 'submitted' &&  $report_approved_status == 'approved') {
                return response()->json([
                    'status' => 'success',
                    'report_status' => "approved",
                    "message" => "এ মাসের রিপোর্ট থানা গ্রহন করেছে।"
                ], 200);
            }
        }
    }

    public function report_joma()
    {

        $month = Carbon::parse(request()->month);
        $org_ward_user = OrgWardUser::where('user_id', auth()->id())->first();

        if (!$org_ward_user) {
            return response()->json([
                'err_message' => 'Ward information not found for this user.',
            ], 404);
        }

        $ward_id = $org_ward_user->ward_id;

        $permission  = ReportManagementControl::where('report_type', 'ward')
            ->whereYear('month_year', $month->clone()->year)
            ->whereMonth('month_year', $month->clone()->month)
            ->where('is_active', 1)
            ->latest()
            ->first();
        if (!$permission) {
            return response()->json([
                'err_message' => 'Permission denied',
                'errors' => [['You do not have the necessary permissions']],
            ], 403);
        }

        // Fetch ReportInfo
        $report_info = ReportInfo::where('org_type_id', $ward_id)
            ->where('org_type', 'ward')
            ->whereYear('month_year', $month->year)
            ->whereMonth('month_year', $month->month)
            ->first();

        if (!$report_info) {
            return response()->json([
                'err_message' => 'Report information not found.',
            ], 404);
        }

        if ($report_info->report_submit_status == 'unsubmitted' && $report_info->report_approved_status == 'pending') {
            $report_info->report_submit_status = 'submitted';
            $report_info->report_approved_status = 'approved';
            $report_info->save();
            // Update related BmPaid records
            WardBmIncome::where('ward_id', $ward_id)
                    ->whereYear('month', $month->year)
                    ->whereMonth('month', $month->month)
                    ->update(['report_submit_status' => 'submitted','report_approved_status' => 'approved']);

            // Update related BmExpense records
            WardBmExpense::where('ward_id', $ward_id)
                ->whereYear('date', $month->year)
                ->whereMonth('date', $month->month)
                ->update(['report_submit_status' => 'submitted','report_approved_status' => 'approved']);

            return response()->json([
                'status' => 'success',
                'report_status' => "rejected",
                "message" => "রিপোর্ট জমা করা হয়েছে ।"
            ], 200);
        } else if ($report_info->report_submit_status == 'submitted' && $report_info->report_approved_status == 'rejected') {
            $report_info->report_approved_status = 'pending';
            $report_info->save();

            // Update related BmPaid records
            WardBmIncome::where('ward_id', $ward_id)
                    ->whereYear('month', $month->year)
                    ->whereMonth('month', $month->month)
                    ->update(['report_submit_status' => 'pending']);

            // Update related BmExpense records
            WardBmExpense::where('ward_id', $ward_id)
                ->whereYear('date', $month->year)
                ->whereMonth('date', $month->month)
                ->update(['report_submit_status' => 'pending']);

            return response()->json([
                'status' => 'success',
                'report_status' => "rejected",
                "message" => "রিপোর্ট পুনরায় জমা সম্পন্ন হয়েছে ।"
            ], 200);
        } else {
            return response()->json([
                'err_message' => 'No Content',
                'errors' => ['name' => ['Report has no data']],
            ], 204);
        }
    }

    public function ward_report_sum()
    {
        $validator = Validator::make(request()->all(), [
            'start_month' => ['required', 'date'],
            'end_month' => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $ward_id = auth()->user()->org_ward_user->ward_id;

        $start_month = request()->start_month;
        $end_month = request()->end_month;
        $org_type = 'ward';
        $org_type_id = $ward_id;
        // $report_approved_status = ['pending', 'approved', 'rejected'];   //enum('pending','approved','rejected')

        $datas = $this->report_summation($start_month, $end_month, $org_type, $org_type_id);
        // dd($datas);


        // -------------------------- bm previous report ------------------------------------
        $carbon_start_month = Carbon::parse($start_month);
        $query = WardBmIncome::query();
        $filter = $query->whereDate('month', '<=', $carbon_start_month->clone()->subMonth())
            ->where('ward_id', $ward_id)
            ->where('report_approved_status', 'approved');
        $total_previous_income = $filter->sum('amount');

        $query = WardBmExpense::query();
        $filter = $query->whereDate('date', '<=', $carbon_start_month->clone()->subMonth())
            ->where('ward_id', $ward_id)
            ->where('report_approved_status', 'approved');
        $total_previous_expense = $filter->sum('amount');
        $total_previous =  $total_previous_income - $total_previous_expense;
        $total_current_income =  $total_previous + $datas->income_report->total_amount;
        $in_total =  $total_current_income - $datas->expense_report->total_amount;
        // -------------------------- bm previous report ------------------------------------
        // dd($datas->start_month,$datas->end_month,);
        return view('ward.ward_report_sum')->with([
            'start_month' => $datas->start_month,
            'end_month' => $datas->end_month,
            'report_header' => $datas->report_header,

            'report_sum_data' => $datas->report_sum_data,
            'previous_present' => $datas->previous_present,
            'income_report' => $datas->income_report,
            'expense_report' => $datas->expense_report,

            'total_previous' => $total_previous,
            'total_current_income' => $total_current_income,
            'in_total' => $in_total,
        ]);
    }

    public function check_report_info()
    {
        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $month = request()->month;
        $org_type = 'ward';
        $org_type_id = auth()->user()->org_ward_user->ward_id;

        $check_info = new CheckInfo();
        $check_info_status = $check_info->execute($month, $org_type, $org_type_id);
        // dd($check_info_status);
        return response()->json([
            'status' => 'success',
            'data' => $check_info_status,
        ], 200);
    }
    public function check_report_info_in_range()
    {
        $validator = Validator::make(request()->all(), [
            'start_month' => ['required', 'date'],
            'end_month' => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $start_month = Carbon::parse(request()->start_month);
        $end_month = Carbon::parse(request()->end_month);

        $org_type = 'ward';
        $org_type_id = auth()->user()->org_ward_user->ward_id;
        $report_approved_status = ['approved'];

        $report_info_ids = ReportInfo::whereBetween('month_year', [$start_month->startOfMonth(), $end_month->endOfMonth()])
            ->where('org_type', $org_type)
            ->where('org_type_id', $org_type_id)
            ->whereIn('report_approved_status', $report_approved_status)
            ->pluck('id');
        // dd($report_info_ids->isNotEmpty() ? $report_info_ids : null);
        return response()->json([
            'status' => 'success',
            'data' => $report_info_ids->isNotEmpty() ? $report_info_ids : null,
        ], 200);
    }

    public function ward_report_monthly()
    {
        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $ward_id = auth()->user()->org_ward_user->ward_id;

        $start_month = request()->month;
        $end_month = request()->month;
        $org_type = 'ward';
        $org_type_id = $ward_id;
        $report_approved_status = ['pending', 'approved', 'rejected'];   //enum('pending','approved','rejected')

        $datas = $this->report_summation($start_month, $end_month, $org_type, $org_type_id, $report_approved_status);
        // dd($datas);


        // -------------------------- bm previous report ------------------------------------
        $carbon_start_month = Carbon::parse($start_month);
        $query = WardBmIncome::query();
        $filter = $query->whereDate('month', '<=', $carbon_start_month->clone()->subMonth())
            ->where('ward_id', $ward_id)
            ->where('report_approved_status', 'approved');
        $total_previous_income = $filter->sum('amount');

        $query = WardBmExpense::query();
        $filter = $query->whereDate('date', '<=', $carbon_start_month->clone()->subMonth())
            ->where('ward_id', $ward_id)
            ->where('report_approved_status', 'approved');
        $total_previous_expense = $filter->sum('amount');
        $total_previous =  $total_previous_income - $total_previous_expense;
        $total_current_income =  $total_previous + $datas->income_report->total_amount;
        $in_total =  $total_current_income - $datas->expense_report->total_amount;
        // -------------------------- bm previous report ------------------------------------

        return view('ward.ward_report_monthly')->with([
            'start_month' => $datas->start_month,
            'end_month' => $datas->end_month,
            'report_header' => $datas->report_header,

            'report_sum_data' => $datas->report_sum_data,
            'previous_present' => $datas->previous_present,
            'income_report' => $datas->income_report,
            'expense_report' => $datas->expense_report,

            'total_previous' => $total_previous,
            'total_current_income' => $total_current_income,
            'in_total' => $in_total,
        ]);
    }

    public function report_upload_monthly()
    {
        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $ward_id = auth()->user()->org_ward_user->ward_id;

        $start_month = request()->month;
        $end_month = request()->month;
        $org_type = 'ward';
        $org_type_id = $ward_id;
        $report_approved_status = ['pending', 'approved', 'rejected'];   //enum('pending','approved','rejected')
        $is_need_sum = false;
        $datas = $this->report_summation($start_month, $end_month, $org_type, $org_type_id, $report_approved_status, $is_need_sum);
        // dd($datas);

               // -------------------------- bm previous report ------------------------------------
               $carbon_start_month = Carbon::parse($start_month);
               $query = WardBmIncome::query();
               $filter = $query->whereDate('month', '<=', $carbon_start_month->clone()->subMonth())
                   ->where('ward_id', $ward_id)
                   ->where('report_approved_status', 'approved');
               $total_previous_income = $filter->sum('amount');

               $query = WardBmExpense::query();
               $filter = $query->whereDate('date', '<=', $carbon_start_month->clone()->subMonth())
                   ->where('ward_id', $ward_id)
                   ->where('report_approved_status', 'approved');
               $total_previous_expense = $filter->sum('amount');
               $total_previous =  $total_previous_income - $total_previous_expense;
               $total_current_income =  $total_previous + $datas->income_report->total_amount;
               $in_total =  $total_current_income - $datas->expense_report->total_amount;
               // -------------------------- bm previous report ------------------------------------

        return response()->json([
            'status' => 'success',
            'data' => $datas,

            'total_previous' => $total_previous,
            'total_current_income' => $total_current_income,
            'in_total' => $in_total,
        ], 200);
    }

    public function report_summation($start_month, $end_month, $org_type, $org_type_id, $report_approved_status = ['approved'], $is_need_sum = true, $report_info_ids = null)
    {
        if (!is_array($org_type_id)) {
            $report_header_instance = new ReportHeader();
            $report_header = $report_header_instance->execute($org_type, $org_type_id);
        } else {
            $report_header = null;
        }

        // ---------------------  reports all data to show  ---------------------------
        $dateWiseReportSum = new DateWiseReportSum();
        $report_sum_data = $dateWiseReportSum->execute($start_month, $end_month, $org_type, $org_type_id, $report_approved_status, $report_info_ids);
        // dd($report_sum_data );
        // ---------------------  reports all data to show  ---------------------------

        // ---------------------  previous and present calculation  ---------------------------
        $calculatePreviousPresent = new CalculatePreviousPresent();
        $previous_present = $calculatePreviousPresent->execute($start_month, $end_month, $org_type, $org_type_id);
        // dd($previous_present);
        // ---------------------  previous and present calculation  ---------------------------


        // -------------------------- bm income report ------------------------------------
        $bm_income_report = new BmReport();
        $transaction_type = 'income';
        $income_report = $bm_income_report->execute($start_month, $end_month, $org_type, $org_type_id, $transaction_type, $report_approved_status, $is_need_sum);
        // -------------------------- bm income report ------------------------------------

        // -------------------------- bm expense report ------------------------------------
        $bm_expense_report = new BmReport();
        $transaction_type = 'expense';
        $expense_report = $bm_expense_report->execute($start_month, $end_month, $org_type, $org_type_id, $transaction_type, $report_approved_status, $is_need_sum);
        // -------------------------- bm expense report ------------------------------------

        if (empty($report_sum_data)) {
            return [];
        } else {
            return (object) [
                'start_month' => $start_month,
                'end_month' => $end_month,
                'report_header' => $report_header,

                'report_sum_data' => $report_sum_data,
                'previous_present' => $previous_present,
                'income_report' => $income_report,
                'expense_report' => $expense_report,
            ];
        }
    }
}
