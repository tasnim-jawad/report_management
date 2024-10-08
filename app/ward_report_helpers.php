<?php

use App\Models\Organization\OrgType;
use App\Models\Organization\OrgUnit;
use App\Models\Organization\OrgUnitResponsible;
use App\Models\Organization\OrgWard;
use App\Models\Organization\OrgWardResponsible;
use App\Models\Organization\Responsibility;
use App\Models\Report\ReportInfo;
use App\Models\Report\ReportManagementControl;
use Carbon\Carbon;

function check_and_get_ward_info($user_id)
{
    $check_info = false;
    // dd($user_id);
    $permission = is_ward_report_upload_permitted(request()->month);
    if ($permission) {
        $resposibilities = auth_user_ward_responsibilities_info($user_id);
        $check_info = ward_report_header_info($resposibilities, $permission, request()->month);
    }
    return $check_info;
}

function is_ward_report_upload_permitted($month)
{
    $month = Carbon::parse($month);
    $permission = ReportManagementControl::whereYear('month_year', $month->clone()->year)
        ->whereMonth('month_year', $month->clone()->month)
        ->where('is_active', 1)
        ->where('report_type', 'ward')
        ->first();
    return $permission;
}

function auth_user_ward_responsibilities_info($user_id)
{
    $org_ward_responsible = OrgWardResponsible::where('user_id', $user_id)->first();
    $org_ward = OrgWard::where('id', $org_ward_responsible->org_ward_id)->first();
    $org_type = OrgType::where('id', $org_ward->org_type_id)->first();
    $resposibilities = Responsibility::where('id', $org_ward_responsible->responsibility_id)->first();

    return (object) [
        "org_ward_responsible" => $org_ward_responsible,
        "org_ward" => $org_ward,
        "org_type" => $org_type,
        "resposibilities" => $resposibilities,
    ];
}

function ward_report_header_info($resposibilities, $permission, $month)
{
    $month = Carbon::parse($month);
    $check_info = ReportInfo::whereYear('month_year', $month->clone()->year)
        ->whereMonth('month_year', $month->clone()->month)
        ->where('org_type', 'ward')
        ->where('org_type_id', $resposibilities->org_ward_responsible->org_ward_id)
        ->where('report_type', 'monthly')
        ->orderBy('id', 'DESC')
        ->first();
    if (!$check_info && $permission) {
        $check_info = ReportInfo::create([
            'org_type' => 'ward',
            'org_type_id' => $resposibilities->org_ward_responsible->org_ward_id,
            'responsibility_id' => $resposibilities->org_unit_responsible->responsibility_id,
            'responsibility_name' => $resposibilities->resposibilities->title,
            'month_year' => $permission->month_year,
            'report_type' =>  $permission->report_type,
            'creator' => auth()->user()->id,
            'status' => 1,
        ]);
    }

    return $check_info;
}

function ward_common_get($model, $user_id=null)
{
    $responsibilities = auth_user_ward_responsibilities_info(auth()->user()->id ?? $user_id);
    $report_info = ward_report_header_info($responsibilities, null, request()->month);
    if ($report_info) {
        $data = $model::where('report_info_id', $report_info->id)->first();
        if ($data) {
            return $data;
        }
    }
    return [];
}

function ward_common_store($bind, $class, $report_info)
{

    $bind->validate(request(), [
        'month' => ['required']
    ], [
        "month.required" => ["মাস সিলেক্ট করুন"]
    ]);
    if ($report_info) {
        $col_name = request()->name;
        $col_value = request()->value;

        $data = $class::where('report_info_id', $report_info->id)
            // ->where('creator', auth()->user()->id)
            ->first();

        if ($data) {
            $data->report_info_id = $report_info->id;
            $data->$col_name = $col_value;
            $data->creator = auth()->user()->id;
            $data->save();
        } else {
            $data = new $class();
            $data->report_info_id = $report_info->id;
            $data->$col_name = $col_value;
            $data->creator = auth()->user()->id;
            $data->save();
        }

        return response()->json([
            "data" => $data,
            "message" => "data uploaded",
        ], 201);
    }

    return response()->json([
        "message" => "permission denied.",
        "errors" => [
            "message" => ["report edit permission is closed."]
        ]

    ], 403);
}



