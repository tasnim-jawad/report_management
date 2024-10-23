<?php

namespace App\Http\Controllers\Ward;

use App\Http\Controllers\Controller;
use App\Models\Organization\OrgUnit;
use App\Models\Organization\OrgUnitUser;
use App\Models\Report\ReportInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WardReportStatusController extends Controller
{
    public function report_status(){
        $ward_id = auth()->user()->org_ward_user["ward_id"];
        $units = OrgUnit::where('org_ward_id', $ward_id)->get();

        $month = request()->month;
        // dd($ward_id,$units->toArray(),$month);
        if($month){
            $month = Carbon::parse(request()->month);

            $unsubmitted_unit = [];
            $pending_unit = [];
            $rejected_unit = [];
            $approved_unit = [];
            foreach($units as $unit) {
                $report_info = ReportInfo::where('org_type_id', $unit->id)
                            ->where('org_type','unit')
                            ->whereYear('month_year', $month->clone()->year)
                            ->whereMonth('month_year', $month->clone()->month)
                            ->get()
                            ->first();

                $report_submit_status = $report_info->report_submit_status;
                $report_approved_status = $report_info->report_approved_status;

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
                    $approved_unit[] = [
                        'unit_id' => $unit->id,
                        'unit_title' => $unit->title,
                        'report_status' => "approved",
                    ];
                }
            }

            return response()->json([
                'status' => 'success',
                "unsubmitted_unit" => $unsubmitted_unit,
                "pending_unit" => $pending_unit,
                "rejected_unit" => $rejected_unit,
                "approved_unit" => $approved_unit,
            ], 200);

        }

    }
}
