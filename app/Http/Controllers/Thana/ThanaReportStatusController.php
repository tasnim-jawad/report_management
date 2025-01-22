<?php

namespace App\Http\Controllers\Thana;

use App\Http\Controllers\Controller;
use App\Models\Organization\OrgThana;
use App\Models\Organization\OrgWard;
use App\Models\Report\ReportInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ThanaReportStatusController extends Controller
{
    public function report_status(){
        $thana_id = auth()->user()->org_thana_user["thana_id"];
        $thana = OrgThana::where('id',$thana_id)->first();
        $wards = OrgWard::where('org_thana_id', $thana_id)->where('org_gender',$thana->org_gender)->get();

        $month = request()->month;
        // dd($ward_id,$wards->toArray(),$month);
        if($month){
            $carbon_month = Carbon::parse(request()->month);

            $unsubmitted_ward = [];
            $pending_ward = [];
            $rejected_ward = [];
            $approved_ward = [];
            foreach($wards as $ward) {
                $report_info = ReportInfo::where('org_type_id', $ward->id)
                            ->where('org_type','ward')
                            ->whereYear('month_year', $carbon_month->clone()->year)
                            ->whereMonth('month_year', $carbon_month->clone()->month)
                            ->get()
                            ->first();

                $report_submit_status = $report_info->report_submit_status ?? 'unsubmitted';
                $report_approved_status = $report_info->report_approved_status ?? 'pending' ;


                if($report_submit_status == 'unsubmitted'){
                    $unsubmitted_ward[] = [
                        'ward_id' => $ward->id,
                        'ward_title' => $ward->title,
                        'report_status' => "unsubmitted",
                    ];

                }else if( $report_submit_status == 'submitted' &&  $report_approved_status == 'pending'){
                    $pending_ward[] = [
                        'ward_id' => $ward->id,
                        'ward_title' => $ward->title,
                        'report_status' => "pending",
                    ];

                }else if( $report_submit_status == 'submitted' &&  $report_approved_status == 'rejected'){
                    $rejected_ward[] = [
                        'ward_id' => $ward->id,
                        'ward_title' => $ward->title,
                        'report_status' => "rejected",
                    ];

                }else if( $report_submit_status == 'submitted' &&  $report_approved_status == 'approved'){
                    // dd($report_info);
                    $approved_ward[] = [
                        'ward_id' => $ward->id,
                        'ward_title' => $ward->title,
                        'report_status' => "approved",
                    ];
                }
            }
            // dd($approved_ward);
            return response()->json([
                'status' => 'success',
                "unsubmitted_ward" => $unsubmitted_ward,
                "pending_ward" => $pending_ward,
                "rejected_ward" => $rejected_ward,
                "approved_ward" => $approved_ward,
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
        
        // BmPaid::where('unit_id', $unit_id)
        //         ->whereYear('month', $carbon_month->year)
        //         ->whereMonth('month', $carbon_month->month)
        //         ->update(['report_approved_status' => $new_status]);

        // // Bulk update for BmExpense
        // BmExpense::where('unit_id', $unit_id)
        //         ->whereYear('date', $carbon_month->year)
        //         ->whereMonth('date', $carbon_month->month)
        //         ->update(['report_approved_status' => $new_status]);

        // return response()->json([
        //     'status' => 'success',
        //     "message" => "change status pending to $new_status",
        // ], 200);

    }
}
