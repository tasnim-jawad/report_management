<?php

namespace App\Http\Controllers\Thana;

use App\Http\Controllers\Actions\BmReport;
use App\Http\Controllers\Actions\CalculatePreviousPresent;
use App\Http\Controllers\Actions\CheckInfo;
use App\Http\Controllers\Actions\DateWiseReportSum;
use App\Http\Controllers\Actions\ReportHeader;
use App\Http\Controllers\Controller;
use App\Models\Bm\Thana\Expense\ThanaBmExpense;
use App\Models\Bm\Thana\Income\ThanaBmIncome;
use App\Models\Bm\Ward\Expense\WardBmExpense;
use App\Models\Bm\Ward\Income\WardBmIncome;
use App\Models\Organization\OrgThanaUser;
use App\Models\Report\ReportInfo;
use App\Models\Report\ReportManagementControl;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ThanaController extends Controller
{
    public function report()
    {
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
        $thana_info = (object) auth()->user()->org_thana_user;
        $month = Carbon::parse(request()->month);

        $query = ThanaBmExpense::query();
        $filter = $query->whereYear('date', $month->clone()->year)->whereMonth('date', $month->clone()->month)->where('thana_id', $thana_info->thana_id);
        $data = $filter->with('thana_bm_expense_category')->get();

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
        $thana_info = (object) auth()->user()->org_thana_user;

        $month = Carbon::parse(request()->month);

        $query = ThanaBmIncome::query();
        $filter = $query->whereYear('month', $month->clone()->year)->whereMonth('month', $month->clone()->month)->where('thana_id', $thana_info->thana_id);
        $data = $filter->with('thana_bm_income_category')->get();
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
            $bangla_month = $month->clone()->locale('bn')->isoFormat('MMMM');

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
                    "message" => "{$bangla_month} মাসের রিপোর্ট জমা দেওয়া হয়নি এখনো।"
                ], 200);
            } else if ($report_submit_status == 'submitted' &&  $report_approved_status == 'pending') {
                return response()->json([
                    'status' => 'success',
                    'report_status' => "pending",
                    "message" => "{$bangla_month} মাসের রিপোর্ট জমা হয়েছে । ওয়ার্ডের আপ্রুভের জন্য অপেক্ষমাণ।"
                ], 200);
            } else if ($report_submit_status == 'submitted' &&  $report_approved_status == 'rejected') {
                return response()->json([
                    'status' => 'success',
                    'report_status' => "rejected",
                    "message" => "{$bangla_month} মাসের রিপোর্ট রিজেক্ট করা হয়েছে । ভুলগুলি ঠিক করে আবার জমা দিন ।"
                ], 200);
            } else if ($report_submit_status == 'submitted' &&  $report_approved_status == 'approved') {
                return response()->json([
                    'status' => 'success',
                    'report_status' => "approved",
                    "message" => "{$bangla_month} মাসের রিপোর্ট মহানগরী গ্রহন করেছে।"
                ], 200);
            }
        }
    }

    public function report_joma()
    {

        $month = Carbon::parse(request()->month);
        $org_thana_user = OrgThanaUser::where('user_id', auth()->id())->first();

        if (!$org_thana_user) {
            return response()->json([
                'err_message' => 'Thana information not found for this user.',
            ], 404);
        }

        $thana_id = $org_thana_user->thana_id;

        $permission  = ReportManagementControl::where('report_type', 'thana')
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
        $report_info = ReportInfo::where('org_type_id', $thana_id)
            ->where('org_type', 'thana')
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
            ThanaBmIncome::where('thana_id', $thana_id)
                ->whereYear('month', $month->year)
                ->whereMonth('month', $month->month)
                ->update(['report_submit_status' => 'submitted', 'report_approved_status' => 'approved']);

            // Update related BmExpense records
            ThanaBmExpense::where('thana_id', $thana_id)
                ->whereYear('date', $month->year)
                ->whereMonth('date', $month->month)
                ->update(['report_submit_status' => 'submitted', 'report_approved_status' => 'approved']);

            return response()->json([
                'status' => 'success',
                'report_status' => "rejected",
                "message" => "রিপোর্ট জমা করা হয়েছে ।"
            ], 200);
        } else if ($report_info->report_submit_status == 'submitted' && $report_info->report_approved_status == 'rejected') {
            $report_info->report_approved_status = 'pending';
            $report_info->save();

            // Update related BmPaid records
            ThanaBmIncome::where('thana_id', $thana_id)
                ->whereYear('month', $month->year)
                ->whereMonth('month', $month->month)
                ->update(['report_approved_status' => 'pending']);

            // Update related BmExpense records
            ThanaBmExpense::where('thana_id', $thana_id)
                ->whereYear('date', $month->year)
                ->whereMonth('date', $month->month)
                ->update(['report_approved_status' => 'pending']);

            return response()->json([
                'status' => 'success',
                'report_status' => "rejected",
                "message" => "রিপোর্ট পুনরায় জমা সম্পন্ন হয়েছে ।"
            ], 200);

        // ----------------------------------------------
        // ----------------------------------------------
        // ----------------extra added ------------------
        } else if ($report_info->report_submit_status == 'submitted' && $report_info->report_approved_status == 'approved') {
            $report_info->report_submit_status = 'unsubmitted';
            $report_info->report_approved_status = 'pending';
            $report_info->save();

            // Update related BmPaid records
            ThanaBmIncome::where('thana_id', $thana_id)
                ->whereYear('month', $month->year)
                ->whereMonth('month', $month->month)
                ->update(['report_approved_status' => 'pending']);

            // Update related BmExpense records
            ThanaBmExpense::where('thana_id', $thana_id)
                ->whereYear('date', $month->year)
                ->whereMonth('date', $month->month)
                ->update(['report_approved_status' => 'pending']);

            return response()->json([
                'status' => 'success',
                'report_status' => "rejected",
                "message" => "রিপোর্ট পুনরায় জমা সম্পন্ন হয়েছে ।"
            ], 200);
        // ----------------extra added ------------------
        // ----------------------------------------------
        // ----------------------------------------------
        } else {
            return response()->json([
                'err_message' => 'No Content',
                'errors' => ['name' => ['Report has no data']],
            ], 204);
        }
    }

    public function thana_report_sum()
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

        $thana_id = auth()->user()->org_thana_user->thana_id;

        $start_month = request()->start_month;
        $end_month = request()->end_month;
        $org_type = 'thana';
        $org_type_id = $thana_id;
        $report_approved_status = ['approved'];   //enum('pending','approved','rejected')
        $is_need_sum = true;
        $datas = $this->report_summation($start_month, $end_month, $org_type, $org_type_id, $report_approved_status, $is_need_sum);


        // -------------------------- bm previous report ------------------------------------
        $carbon_start_month = Carbon::parse($start_month);
        $query = ThanaBmIncome::query();
        $filter = $query->whereDate('month', '<=', $carbon_start_month->clone()->subMonth())
            ->where('thana_id', $thana_id)
            ->where('report_approved_status', 'approved');
        $total_previous_income = $filter->sum('amount');

        $query = ThanaBmExpense::query();
        $filter = $query->whereDate('date', '<=', $carbon_start_month->clone()->subMonth())
            ->where('thana_id', $thana_id)
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

        // $thana_id = auth()->user()->org_thana_user->thana_id;

        // $start_month = request()->start_month;
        // $end_month = request()->end_month;
        // $org_type = 'thana';
        // $org_type_id = $thana_id;
        // // $report_approved_status = ['pending', 'approved', 'rejected'];   //enum('pending','approved','rejected')

        // $datas = $this->report_summation($start_month, $end_month, $org_type, $org_type_id);
        // // dd($datas);


        // // -------------------------- bm previous report ------------------------------------
        // $carbon_start_month = Carbon::parse($start_month);
        // $query = ThanaBmIncome::query();
        // $filter = $query->whereDate('month', '<=', $carbon_start_month->clone()->subMonth())
        //     ->where('thana_id', $thana_id)
        //     ->where('report_approved_status', 'approved');
        // $total_previous_income = $filter->sum('amount');

        // $query = ThanaBmExpense::query();
        // $filter = $query->whereDate('date', '<=', $carbon_start_month->clone()->subMonth())
        //     ->where('thana_id', $thana_id)
        //     ->where('report_approved_status', 'approved');
        // $total_previous_expense = $filter->sum('amount');
        // $total_previous =  $total_previous_income - $total_previous_expense;
        // $total_current_income =  $total_previous + $datas->income_report->total_amount;
        // $in_total =  $total_current_income - $datas->expense_report->total_amount;
        // // -------------------------- bm previous report ------------------------------------
        // // dd($datas->start_month,$datas->end_month,);
        // return view('ward.ward_report_sum')->with([
        //     'start_month' => $datas->start_month,
        //     'end_month' => $datas->end_month,
        //     'report_header' => $datas->report_header,

        //     'report_sum_data' => $datas->report_sum_data,
        //     'previous_present' => $datas->previous_present,
        //     'income_report' => $datas->income_report,
        //     'expense_report' => $datas->expense_report,

        //     'total_previous' => $total_previous,
        //     'total_current_income' => $total_current_income,
        //     'in_total' => $in_total,
        // ]);

        // return response()->json([
        //     'status' => 'success',
        //     'data' => $datas,

        //     'total_previous' => $total_previous,
        //     'total_current_income' => $total_current_income,
        //     'in_total' => $in_total,
        // ], 200);
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
        $org_type = 'thana';
        $org_type_id = auth()->user()->org_thana_user->thana_id;

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

        $org_type = 'thana';
        $org_type_id = auth()->user()->org_thana_user->thana_id;
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

    public function thana_report_monthly()
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


        $user_id = request()->user_id;
        $user = User::where('id', $user_id)->first();

        if (!$user || !$user->org_thana_user) {
            return response()->json([
                'err_message' => 'User or thana user not found',
            ], 404);
        }

        $thana_id = $user->org_thana_user->thana_id;

        $start_month = request()->month;
        $end_month = request()->month;
        $org_type = 'thana';
        $org_type_id = $thana_id;
        $report_approved_status = ['pending', 'approved', 'rejected'];   //enum('pending','approved','rejected')

        $datas = $this->report_summation($start_month, $end_month, $org_type, $org_type_id, $report_approved_status);
        // dd($datas);


        // -------------------------- bm previous report ------------------------------------
        $carbon_start_month = Carbon::parse($start_month);
        $query = ThanaBmIncome::query();
        $filter = $query->whereDate('month', '<=', $carbon_start_month->clone()->subMonth())
            ->where('thana_id', $thana_id)
            ->where('report_approved_status', 'approved');
        $total_previous_income = $filter->sum('amount') ?? 0;

        $query = ThanaBmExpense::query();
        $filter = $query->whereDate('date', '<=', $carbon_start_month->clone()->subMonth())
            ->where('thana_id', $thana_id)
            ->where('report_approved_status', 'approved');
        $total_previous_expense = $filter->sum('amount') ?? 0;
        $total_previous =  $total_previous_income - $total_previous_expense;
        $total_current_income =  $total_previous + ($datas->income_report->total_amount ?? 0);
        $in_total =  $total_current_income - ($datas->expense_report->total_amount ?? 0);
        // -------------------------- bm previous report ------------------------------------

        return view('thana.thana_report_monthly')->with([
            'start_month' => $datas->start_month ?? null,
            'end_month' => $datas->end_month ?? null,
            'report_header' => $datas->report_header ?? [],

            'report_sum_data' => $datas->report_sum_data ?? [],
            'previous_present' => $datas->previous_present ?? [],
            'income_report' => $datas->income_report ?? [],
            'expense_report' => $datas->expense_report ?? [],

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

        $thana_id = auth()->user()->org_thana_user->thana_id;

        $start_month = request()->month;
        $end_month = request()->month;
        $org_type = 'thana';
        $org_type_id = $thana_id;
        $report_approved_status = ['pending', 'approved', 'rejected'];   //enum('pending','approved','rejected')
        $is_need_sum = false;
        $datas = $this->report_summation($start_month, $end_month, $org_type, $org_type_id, $report_approved_status, $is_need_sum);


        // -------------------------- bm previous report ------------------------------------
        $carbon_start_month = Carbon::parse($start_month);
        $query = ThanaBmIncome::query();
        $filter = $query->whereDate('month', '<=', $carbon_start_month->clone()->subMonth())
            ->where('thana_id', $thana_id)
            ->where('report_approved_status', 'approved');
        $total_previous_income = $filter->sum('amount');

        $query = ThanaBmExpense::query();
        $filter = $query->whereDate('date', '<=', $carbon_start_month->clone()->subMonth())
            ->where('thana_id', $thana_id)
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
        // $tables = DB::select('SHOW TABLES');

        // Format the result into an array of table names
        // $table_names = array_map(function($table) {
        //     return current((array) $table);
        // }, $tables);

        // Display the table names
        // dd($table_names);
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
            return (object) [];
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
