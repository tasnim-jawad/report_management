<?php

namespace App\Http\Controllers\Parent;

use App\Http\Controllers\Actions\BmReport;
use App\Http\Controllers\Actions\CalculatePreviousPresent;
use App\Http\Controllers\Actions\DateWiseReportSum;
use App\Http\Controllers\Actions\ReportHeader;
use App\Http\Controllers\Controller;
use App\Models\Bm\Thana\Expense\ThanaBmExpense;
use App\Models\Bm\Thana\Income\ThanaBmIncome;
use App\Models\Organization\OrgThana;
use App\Models\Parent\ParentThana;
use App\Models\Report\ReportInfo;
use App\Models\Report\ReportManagementControl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParentThanaController extends Controller
{
    public function report_status(){
        $validator = Validator::make(request()->all(), [
            'month' => 'required|date_format:Y-m',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 422);
        }

        $man_thana_id = auth()->user()->org_thana_user["thana_id"];
        $parent_info = ParentThana::where('man_thana_id',$man_thana_id)->first();

    
        if(!$parent_info){
            return response()->json([
                'status' => 'error',
                'message' => 'Parent info for this Thana not found',
            ], 404);
        }else{
            $woman_thana_id = $parent_info->woman_thana_id;
            // dd($woman_thana_id);
        }
        $thana_ids = array_filter([$man_thana_id, $woman_thana_id]);
        // dd($thana_ids);
        $thanas = OrgThana::whereIn('id', $thana_ids)->get();
        // dd($thanas->toArray());
        // $wards = OrgWard::where('org_thana_id', $thana_id)->where('org_gender',$thana->org_gender)->get();

        $month = request()->month;
        // dd($ward_id,$wards->toArray(),$month);
        if($month){
            $carbon_month = Carbon::parse(request()->month);

            $unsubmitted_thana = [];
            $pending_thana = [];
            $rejected_thana = [];
            $approved_thana = [];
            foreach($thanas as $thana) {
                $report_info = ReportInfo::where('org_type_id', $thana->id)
                            ->where('org_type','thana')
                            ->whereYear('month_year', $carbon_month->clone()->year)
                            ->whereMonth('month_year', $carbon_month->clone()->month)
                            ->get()
                            ->first();

                $report_submit_status = $report_info->report_submit_status ?? 'unsubmitted';
                $report_approved_status = $report_info->report_approved_status ?? 'pending' ;


                if($report_submit_status == 'unsubmitted'){
                    $unsubmitted_thana[] = [
                        'thana_id' => $thana->id,
                        'thana_title' => $thana->title,
                        'org_gender' => $thana->org_gender,
                        'report_status' => "unsubmitted",
                    ];

                }else if( $report_submit_status == 'submitted' &&  $report_approved_status == 'pending'){
                    $pending_thana[] = [
                        'thana_id' => $thana->id,
                        'thana_title' => $thana->title,
                        'org_gender' => $thana->org_gender,
                        'report_status' => "pending",
                    ];

                }else if( $report_submit_status == 'submitted' &&  $report_approved_status == 'rejected'){
                    $rejected_thana[] = [
                        'thana_id' => $thana->id,
                        'thana_title' => $thana->title,
                        'org_gender' => $thana->org_gender,
                        'report_status' => "rejected",
                    ];

                }else if( $report_submit_status == 'submitted' &&  $report_approved_status == 'approved'){
                    // dd($report_info);
                    $approved_thana[] = [
                        'thana_id' => $thana->id,
                        'thana_title' => $thana->title,
                        'org_gender' => $thana->org_gender,
                        'report_status' => "approved",
                    ];
                }
            }
            // dd($approved_thana,$unsubmitted_thana,$pending_thana,$rejected_thana);
            return response()->json([
                'status' => 'success',
                "unsubmitted_thana" => $unsubmitted_thana,
                "pending_thana" => $pending_thana,
                "rejected_thana" => $rejected_thana,
                "approved_thana" => $approved_thana,
                "report_month" => $month,
            ], 200);

        }



    }

    public function change_status()
    {
        $validator = Validator::make(request()->all(), [
            'month' => 'required',
            'new_status' => 'required|in:rejected,approved',
            'thana_id' => 'required|exists:org_thanas,id',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 422);
        }


        $month = Carbon::parse(request()->month);
        $thana_id = request()->thana_id;
        $new_status = request()->new_status;

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

        if ($new_status == 'approved') {
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
                'report_status' => "approved",
                "message" => "রিপোর্ট জমা করা হয়েছে ।"
            ], 200);
        } else if ($new_status == 'rejected') {
            $report_info->report_approved_status = 'rejected';
            $report_info->save();

            // Update related BmPaid records
            ThanaBmIncome::where('thana_id', $thana_id)
                ->whereYear('month', $month->year)
                ->whereMonth('month', $month->month)
                ->update(['report_approved_status' => 'rejected']);

            // Update related BmExpense records
            ThanaBmExpense::where('thana_id', $thana_id)
                ->whereYear('date', $month->year)
                ->whereMonth('date', $month->month)
                ->update(['report_approved_status' => 'rejected']);

            return response()->json([
                'status' => 'success',
                'report_status' => "rejected",
                "message" => "রিপোর্ট রিজেক্ট করা হয়েছে ।"
            ], 200);
        } 
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

        $man_thana_id = auth()->user()->org_thana_user->thana_id;
        $parent_info =ParentThana::where('man_thana_id',$man_thana_id)->first();
        $woman_thana_id = $parent_info->woman_thana_id;

        $org_type = 'thana';
        $org_type_ids = [$man_thana_id, $woman_thana_id];
        $report_approved_status = ['approved'];

        $report_info_ids = ReportInfo::whereBetween('month_year', [$start_month->startOfMonth(), $end_month->endOfMonth()])
            ->where('org_type', $org_type)
            ->whereIn('org_type_id', $org_type_ids)
            ->whereIn('report_approved_status', $report_approved_status)
            ->pluck('id');
        // dd($report_info_ids->isNotEmpty() ? $report_info_ids : null);
        return response()->json([
            'status' => 'success',
            'data' => $report_info_ids->isNotEmpty() ? $report_info_ids : null,
        ], 200);
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

        $man_thana_id = auth()->user()->org_thana_user->thana_id;
        $parent_info =ParentThana::where('man_thana_id',$man_thana_id)->first();
        $woman_thana_id = $parent_info->woman_thana_id;

        $start_month = request()->start_month;
        $end_month = request()->end_month;
        $org_type = 'thana';
        $org_type_ids = [$man_thana_id, $woman_thana_id];
        $report_approved_status = ['approved'];   //enum('pending','approved','rejected')
        $is_need_sum = true;
        $datas = $this->report_summation($start_month, $end_month, $org_type, $org_type_ids, $report_approved_status, $is_need_sum);


        // -------------------------- bm previous report ------------------------------------
        $carbon_start_month = Carbon::parse($start_month);
        $query = ThanaBmIncome::query();
        $filter = $query->whereDate('month', '<=', $carbon_start_month->clone()->subMonth())
            ->whereIn('thana_id', $org_type_ids)
            ->where('report_approved_status', 'approved');
        $total_previous_income = $filter->sum('amount');

        $query = ThanaBmExpense::query();
        $filter = $query->whereDate('date', '<=', $carbon_start_month->clone()->subMonth())
            ->whereIn('thana_id', $org_type_ids)
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


    public function report_summation($start_month, $end_month, $org_type, $org_type_ids, $report_approved_status = ['approved'], $is_need_sum = true, $report_info_ids = null)
    {
        if (is_array($org_type_ids)) {
            $org_type_id = $org_type_ids[0] ?? null; // get the first element or null if empty
        }
        if ($org_type_id) {
            $report_header_instance = new ReportHeader();
            $report_header = $report_header_instance->execute($org_type, $org_type_id);
        } else {
            $report_header = null;
        }
       
        // ---------------------  reports all data to show  ---------------------------
        $dateWiseReportSum = new DateWiseReportSum();
        $report_sum_data = $dateWiseReportSum->execute($start_month, $end_month, $org_type, $org_type_ids, $report_approved_status, $report_info_ids);
        // dd($report_sum_data );
        // ---------------------  reports all data to show  ---------------------------

        // ---------------------  previous and present calculation  ---------------------------
        $calculatePreviousPresent = new CalculatePreviousPresent();
        $previous_present = $calculatePreviousPresent->execute($start_month, $end_month, $org_type, $org_type_ids);
        // dd($previous_present);
        // ---------------------  previous and present calculation  ---------------------------


        // -------------------------- bm income report ------------------------------------
        $bm_income_report = new BmReport();
        $transaction_type = 'income';
        $income_report = $bm_income_report->execute($start_month, $end_month, $org_type, $org_type_ids, $transaction_type, $report_approved_status, $is_need_sum);
        // -------------------------- bm income report ------------------------------------

        // -------------------------- bm expense report ------------------------------------
        $bm_expense_report = new BmReport();
        $transaction_type = 'expense';
        $expense_report = $bm_expense_report->execute($start_month, $end_month, $org_type, $org_type_ids, $transaction_type, $report_approved_status, $is_need_sum);
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
