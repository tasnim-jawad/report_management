<?php

namespace App\Http\Middleware;

use App\Models\Organization\OrgWardUser;
use App\Models\Report\ReportInfo;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WardStatusChack
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ward_id = OrgWardUser::where('user_id',auth()->id())->first()->ward_id;
        $carbon_month = Carbon::parse($request->month);

        $report_info = ReportInfo::where('org_type_id', $ward_id)
                            ->where('org_type','ward')
                            ->whereYear('month_year', $carbon_month->clone()->year)
                            ->whereMonth('month_year', $carbon_month->clone()->month)
                            ->where('report_type', 'monthly')
                            ->orderBy('id', 'DESC')
                            ->where('status', 1)
                            ->first();
        if(!$report_info){
            return $next($request);
        }

        $report_submit_status = $report_info->report_submit_status;
        $report_approved_status = $report_info->report_approved_status;

        if($report_submit_status == 'unsubmitted'){

            return $next($request);

        }else if( $report_submit_status == 'submitted' &&  $report_approved_status == 'pending'){

            return response()->json([
                'err_message' => 'Permission denied',
                // 'errors' => [['You do not have the necessary permissions']],
                'errors' => [['মুরব্বী মুরব্বী উমহু হু হু হু']],
            ], 403);

        }else if( $report_submit_status == 'submitted' &&  $report_approved_status == 'rejected'){

            return $next($request);

        }else if( $report_submit_status == 'submitted' &&  $report_approved_status == 'approved'){

            return response()->json([
                'err_message' => 'Permission denied',
                // 'errors' => [['You do not have the necessary permissions']],
                'errors' => [['মুরব্বী মুরব্বী উমহু হু হু হু']],
            ], 403);
        }
    }
}
