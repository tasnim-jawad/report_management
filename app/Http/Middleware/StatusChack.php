<?php

namespace App\Http\Middleware;

use App\Models\Organization\OrgUnitUser;
use App\Models\Report\ReportInfo;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StatusChack
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        dd($request->toArray());
        $unit_id = OrgUnitUser::where('user_id',auth()->id())->first()->unit_id;
        $carbon_month = Carbon::parse($request->month);

        $report_info = ReportInfo::where('org_type_id', $unit_id)
                            ->where('org_type','unit')
                            ->whereYear('month_year', $carbon_month->clone()->year)
                            ->whereMonth('month_year', $carbon_month->clone()->month)
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
        return $next($request);
    }
}
