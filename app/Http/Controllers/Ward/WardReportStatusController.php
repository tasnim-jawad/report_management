<?php

namespace App\Http\Controllers\Ward;

use App\Http\Controllers\Controller;
use App\Models\Bm\Expense\BmExpense;
use App\Models\Bm\Income\BmPaid;
use App\Models\Organization\OrgUnit;
use App\Models\Report\ReportInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WardReportStatusController extends Controller
{
    public function report_status(){
        $ward_id = auth()->user()->org_ward_user["ward_id"];
        $units = OrgUnit::where('org_ward_id', $ward_id)->get();

        $month = request()->month;
        // dd($ward_id,$units->toArray(),$month);
        if($month){
            $carbon_month = Carbon::parse(request()->month);

            $unsubmitted_unit = [];
            $pending_unit = [];
            $rejected_unit = [];
            $approved_unit = [];
            foreach($units as $unit) {
                $report_info = ReportInfo::where('org_type_id', $unit->id)
                            ->where('org_type','unit')
                            ->whereYear('month_year', $carbon_month->clone()->year)
                            ->whereMonth('month_year', $carbon_month->clone()->month)
                            ->get()
                            ->first();

                $report_submit_status = $report_info->report_submit_status ?? 'unsubmitted';
                $report_approved_status = $report_info->report_approved_status ?? 'pending' ;


                if($report_submit_status == 'unsubmitted'){
                    $unsubmitted_unit[] = [
                        'unit_id' => $unit->id,
                        'unit_title' => $unit->title,
                        'report_status' => "unsubmitted",
                    ];

                }else if( $report_submit_status == 'submitted' &&  $report_approved_status == 'pending'){
                    $pending_unit[] = [
                        'unit_id' => $unit->id,
                        'unit_title' => $unit->title,
                        'report_status' => "pending",
                    ];

                }else if( $report_submit_status == 'submitted' &&  $report_approved_status == 'rejected'){
                    $rejected_unit[] = [
                        'unit_id' => $unit->id,
                        'unit_title' => $unit->title,
                        'report_status' => "rejected",
                    ];

                }else if( $report_submit_status == 'submitted' &&  $report_approved_status == 'approved'){
                    // dd($report_info);
                    $approved_unit[] = [
                        'unit_id' => $unit->id,
                        'unit_title' => $unit->title,
                        'report_status' => "approved",
                    ];
                }
            }
            // dd($approved_unit);
            return response()->json([
                'status' => 'success',
                "unsubmitted_unit" => $unsubmitted_unit,
                "pending_unit" => $pending_unit,
                "rejected_unit" => $rejected_unit,
                "approved_unit" => $approved_unit,
                "report_month" => $month,
            ], 200);

        }

    }
    public function change_status()
    {
        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
            'unit_id' => ['required'],
            'new_status' => ['required', 'in:approved,rejected'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $unit_id = request()->unit_id;
        $new_status = request()->new_status;
        $carbon_month = Carbon::parse(request()->month);

        $report_info = ReportInfo::where('org_type_id', $unit_id)
                    ->where('org_type','unit')
                    ->whereYear('month_year', $carbon_month->clone()->year)
                    ->whereMonth('month_year', $carbon_month->clone()->month)
                    ->first();

        if ($report_info) {
            $report_info->report_approved_status = $new_status;
            $report_info->save();
        }

        // Bulk update for BmPaid
        BmPaid::where('unit_id', $unit_id)
                ->whereYear('month', $carbon_month->year)
                ->whereMonth('month', $carbon_month->month)
                ->update(['report_approved_status' => $new_status]);

        // Bulk update for BmExpense
        BmExpense::where('unit_id', $unit_id)
                ->whereYear('date', $carbon_month->year)
                ->whereMonth('date', $carbon_month->month)
                ->update(['report_approved_status' => $new_status]);

        // Notification store
        $title = "রিপোর্টের অবস্থা পরিবর্তন";
        $description = "আপনার রিপোর্টের অবস্থা পরিবর্তন হয়েছে। নতুন অবস্থা: $new_status";
        notification_store('unit', $unit_id, $title, $description);

        return response()->json([
            'status' => 'success',
            "message" => "change status pending to $new_status",
        ], 200);

    }

    public function report_status_single_unit(){

        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
            'unit_id' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        

        $month = Carbon::parse(request()->month);
        $unit_id = request()->unit_id;
        $bangla_month = $month->clone()->locale('bn')->isoFormat('MMMM');
        // dd($ward_id,$units->toArray(),$month);
        $report_info = ReportInfo::where('org_type_id', $unit_id)
            ->where('org_type', 'unit')
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
                "message" => "{$bangla_month} মাসের রিপোর্ট ওয়ার্ড গ্রহন করেছে।"
            ], 200);
        }

    }

    
}
