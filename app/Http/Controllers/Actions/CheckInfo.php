<?php

namespace App\Http\Controllers\Actions;

use Illuminate\Http\Request;
use App\Models\Report\ReportInfo;
use App\Models\Report\ReportManagementControl;
use Carbon\Carbon;

class CheckInfo
{
    public function execute($month, $org_type, $org_type_id)
    {
        $carbon_month = Carbon::parse($month);
        $check_info = ReportInfo::whereYear('month_year', $carbon_month->clone()->year)
            ->whereMonth('month_year', $carbon_month->clone()->month)
            ->where('org_type', $org_type)
            ->where('org_type_id', $org_type_id)
            ->where('report_type', 'monthly')
            ->orderBy('id', 'DESC')
            ->first();

        if (!$check_info) {
            $permission = ReportManagementControl::whereYear('month_year', $carbon_month->clone()->year)
                ->whereMonth('month_year', $carbon_month->clone()->month)
                ->where('is_active', 1)
                ->where('report_type', $org_type)
                ->first();
            if($permission){
                $check_info = ReportInfo::create([
                    'org_type' => $org_type,
                    'org_type_id' => $org_type_id,
                    'responsibility_id' => 1,
                    'responsibility_name' => 'president',
                    'month_year' => $carbon_month,
                    'report_type' =>  'monthly',
                    'creator' => auth()->user()->id,
                    'status' => 1,
                ]);
            }
        }

        return $check_info;
    }
}
