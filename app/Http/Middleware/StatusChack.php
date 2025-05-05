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
        $unit_id = OrgUnitUser::where('user_id',auth()->id())->first()->unit_id;
        $carbon_month = Carbon::parse($request->month);

        $report_info = ReportInfo::where('org_type_id', $unit_id)
                            ->where('org_type','unit')
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
                'errors' => [['এই মাসের রিপোর্ট গ্রহণ বন্ধ রয়েছে। অনুগ্রহ করে ঊর্ধ্বতন দায়িত্বশীলের সঙ্গে যোগাযোগ করুন।']],
            ], 403);

        }else if( $report_submit_status == 'submitted' &&  $report_approved_status == 'rejected'){

            return $next($request);

        }else if( $report_submit_status == 'submitted' &&  $report_approved_status == 'approved'){

            return response()->json([
                'err_message' => 'Permission denied',
                // 'errors' => [['You do not have the necessary permissions']],
                'errors' => [['এই মাসের রিপোর্ট গ্রহণ বন্ধ রয়েছে। অনুগ্রহ করে ঊর্ধ্বতন দায়িত্বশীলের সঙ্গে যোগাযোগ করুন।']],
            ], 403);
        }
    }
}
