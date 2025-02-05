<?php

use App\Models\Organization\OrgThana;
use App\Models\Organization\OrgThanaResponsible;
use App\Models\Organization\OrgType;
// use App\Models\Organization\OrgUnit;
// use App\Models\Organization\OrgUnitResponsible;
// use App\Models\Organization\OrgWard;
// use App\Models\Organization\OrgWardResponsible;
use App\Models\Organization\Responsibility;
use App\Models\Report\ReportInfo;
use App\Models\Report\ReportManagementControl;
use App\Models\User;
use Carbon\Carbon;
/*
This file contains the following
functions:
    1. check_and_get_thana_info
    2. is_thana_report_upload_permitted 
    3. auth_user_thana_responsibilities_info
    4. thana_report_header_info
    5. thana_common_get
    6. thana_common_store
*/

function check_and_get_thana_info($user_id)
{
    $check_info = false;
    // dd($user_id);
    $permission = is_thana_report_upload_permitted(request()->month, $user_id);
    if ($permission) {
        $resposibilities = auth_user_thana_responsibilities_info($user_id);
        $check_info = thana_report_header_info($resposibilities, $permission, request()->month);
    }
    return $check_info;
}

function is_thana_report_upload_permitted($month, $user_id)
{
    $month = Carbon::parse($month);
    $thana_user = User::where('id', $user_id)->with('org_thana_user')->get()->first();
    $upper_organization_id = $thana_user->org_thana_user->city_id;

    $permission = ReportManagementControl::whereYear('month_year', $month->clone()->year)
        ->whereMonth('month_year', $month->clone()->month)
        ->where('is_active', 1)
        ->where('report_type', 'thana')
        ->where('upper_organization_id', $upper_organization_id)
        ->first();
    return $permission;
}

function auth_user_thana_responsibilities_info($user_id)
{
    $org_thana_responsible = OrgThanaResponsible::where('user_id', $user_id)->first();
    $org_thana = OrgThana::where('id', $org_thana_responsible->org_thana_id)->first();
    $org_type = OrgType::where('id', $org_thana->org_type_id)->first();
    $resposibilities = Responsibility::where('id', $org_thana_responsible->responsibility_id)->first();

    return (object) [
        "org_thana_responsible" => $org_thana_responsible,
        "org_thana" => $org_thana,
        "org_type" => $org_type,
        "resposibilities" => $resposibilities,
    ];
}

function thana_report_header_info($resposibilities, $permission, $month)
{
    $month = Carbon::parse($month);
    $check_info = ReportInfo::whereYear('month_year', $month->clone()->year)
        ->whereMonth('month_year', $month->clone()->month)
        ->where('org_type', 'thana')
        ->where('org_type_id', $resposibilities->org_thana_responsible->org_thana_id)
        ->where('report_type', 'monthly')
        ->orderBy('id', 'DESC')
        ->first();
    if (!$check_info && $permission) {
        $check_info = ReportInfo::create([
            'org_type' => 'thana',
            'org_type_id' => $resposibilities->org_thana_responsible->org_thana_id,
            'responsibility_id' => $resposibilities->org_thana_responsible->responsibility_id,
            'responsibility_name' => $resposibilities->resposibilities->title,
            'month_year' => $permission->month_year,
            'report_type' => 'monthly',
            'creator' => auth()->user()->id,
            'status' => 1,
        ]);
    }

    return $check_info;
}

function thana_common_get($model, $user_id = null)
{
    $responsibilities = auth_user_thana_responsibilities_info(auth()->user()->id ?? $user_id);
    $report_info = thana_report_header_info($responsibilities, null, request()->month);
    if ($report_info) {
        $data = $model::where('report_info_id', $report_info->id)->first();
        if ($data) {
            return $data;
        }
    }
    return [];
}

function thana_common_store($bind, $class, $report_info)
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

    if (!$report_info) {
        return response([
            "status" => "permission_denied",
            "message" => "এ মাসের জন্য রিপোর্ট গ্রহণ বন্ধ আছে । যেকোনো প্রয়োজনে ঊর্ধ্বতন দায়িত্বশীল এর সাথে যোগাযোগ করুন",
        ]);
    }
}

// function approved_unit_ids($ward_id, $month)
// {
//     $month = Carbon::parse($month);
//     $units = OrgUnit::where('org_ward_id',$ward_id)->get();

//     $unit_ids = [];
//     $approved_report_info_ids = [];
//     $approved_unit_ids = [];
//     $approved_units = [];
//     foreach ($units as $index => $unit) {
//         $unit_id = $unit->id;
//         $unit_ids[] = $unit_id;
//         $report_info = ReportInfo::where('org_type_id', $unit_id)
//                 ->where('org_type', 'unit')
//                 ->whereYear('month_year', $month->clone()->year)
//                 ->whereMonth('month_year', $month->clone()->month)
//                 ->where('report_approved_status','approved')
//                 ->where('status', 1)
//                 ->get()
//                 ->first();

//         if($report_info){
//             $approved_report_info_ids[] = $report_info->id;
//             $approved_unit_ids[] = $report_info->org_type_id;
//             $approved_units[] = [
//                 'unit_id' =>$unit->id,
//                 'unit_title' =>$unit->title,
//                 'report_info_id' =>$report_info->id,
//             ];
//         }
//     }
//     return [
//         'approved_report_info_ids' => $approved_report_info_ids,
//         'approved_units' => $approved_units,
//     ];
// }
