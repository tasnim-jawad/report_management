<?php

namespace App\Http\Controllers\Actions;

use App\Models\Report\ReportManagementControl;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PermissionCheck
{
    public function execute($month, $org_type){
        $carbon_month = Carbon::parse($month);
        $permission = ReportManagementControl::whereYear('month_year', $carbon_month->clone()->year)
                ->whereMonth('month_year', $carbon_month->clone()->month)
                ->where('is_active', 1)
                ->where('report_type', $org_type)
                ->latest()
                ->first();

        return $permission;
    }
}
