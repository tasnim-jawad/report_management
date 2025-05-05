<?php

use App\Http\Controllers\Actions\NotificationStore;
use App\Models\Organization\OrgThana;
use App\Models\Organization\OrgType;
use App\Models\Organization\OrgUnit;
use App\Models\Organization\OrgUnitResponsible;
use App\Models\Organization\OrgWard;
use App\Models\Organization\OrgWardResponsible;
use App\Models\Organization\Responsibility;
use App\Models\Report\ReportInfo;
use App\Models\Report\ReportManagementControl;
use App\Models\User;
use Carbon\Carbon;

function check_and_get_ward_info($user_id)
{
    $check_info = false;
    // dd($user_id,request()->month);
    $permission = is_ward_report_upload_permitted(request()->month, $user_id);
    // dd($permission);
    if ($permission) {
        $resposibilities = auth_user_ward_responsibilities_info($user_id);
        $check_info = ward_report_header_info($resposibilities, $permission, request()->month);
    }
    return $check_info;
}

function is_ward_report_upload_permitted($month, $user_id)
{
    $month = Carbon::parse($month);
    $ward_user = User::where('id', $user_id)->with('org_ward_user')->get()->first();
    // dd($ward_user->toArray(),$ward_user->org_ward_user->thana_id);
    $upper_organization_id = $ward_user->org_ward_user->thana_id;
    // dd($month->clone()->year,$month->clone()->month);
    // dd($upper_organization_id);
    $permission = ReportManagementControl::whereYear('month_year', $month->clone()->year)
        ->whereMonth('month_year', $month->clone()->month)
        ->where('is_active', 1)
        ->where('report_type', 'ward')
        ->where('upper_organization_id', $upper_organization_id)
        ->first();
    // dd($permission );
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
            'responsibility_id' => $resposibilities->org_ward_responsible->responsibility_id,
            'responsibility_name' => $resposibilities->resposibilities->title,
            'month_year' => $permission->month_year,
            'report_type' => 'monthly',
            'creator' => auth()->user()->id,
            'status' => 1,
        ]);
    }

    return $check_info;
}

function ward_common_get($model, $user_id = null)
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
    // dd(request()->all());
    $rules = [
        'month' => ['required'],
        // 'value' => ['numeric', 'nullable'],
    ];

    $messages = [
        "month.required" => ["মাস সিলেক্ট করুন"],
        // 'value.numeric' => 'Only English numbers can be input.',
    ];

    // If request()->name is "montobbo", allow 'value' to be a string
    // if (request()->name === 'montobbo') {
    //     $rules['value'] = ['string', 'nullable'];
    // }

    $bind->validate(request(), $rules, $messages);
    // dd($report_info);
    if ($report_info) {
        $col_name = request()->name;
        $col_value = convertBanglaToEnglish(request()->value);
        if($col_name === 'montobbo'){
            $col_value = request()->value;
        }

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
        ], 403);
    }
}

function calculate_average($total, $uposthiti)
{
    // dd($total, $uposthiti);
    if ($total && $uposthiti && $total != 0) {

        return round($uposthiti / $total);
    }

    return " "; // Or any default value you'd like to return
}
function implementation_rate($target, $achieved)
{
    if ($target && $achieved && $target != 0) {
        return round(($achieved / $target) * 100) . '%';
    }

    return " "; // Or any default value you'd like to return
}

function approved_unit_ids($ward_id, $month)
{
    $month = Carbon::parse($month);
    $units = OrgUnit::where('org_ward_id', $ward_id)->get();

    $unit_ids = [];
    $approved_report_info_ids = [];
    $approved_unit_ids = [];
    $approved_units = [];
    foreach ($units as $index => $unit) {
        $unit_id = $unit->id;
        $unit_ids[] = $unit_id;
        $report_info = ReportInfo::where('org_type_id', $unit_id)
            ->where('org_type', 'unit')
            ->whereYear('month_year', $month->clone()->year)
            ->whereMonth('month_year', $month->clone()->month)
            ->where('report_approved_status', 'approved')
            ->where('status', 1)
            ->get()
            ->first();

        if ($report_info) {
            $approved_report_info_ids[] = $report_info->id;
            $approved_unit_ids[] = $report_info->org_type_id;
            $approved_units[] = [
                'unit_id' => $unit->id,
                'unit_title' => $unit->title,
                'report_info_id' => $report_info->id,
            ];
        }
    }
    return [
        'approved_report_info_ids' => $approved_report_info_ids,
        'approved_units' => $approved_units,
    ];
}


function calculate_songothon3_previous_present($model, $total_approved_report_info_ids, $department_name,)
{
    // Fetch data based on the provided model and report_info_ids
    $data = $model::whereIn('report_info_id', $total_approved_report_info_ids)->get();

    // rokon
    $rokon_increase = $data->sum($department_name . '_rokon_increase');
    $rokon_gatti = $data->sum($department_name . '_rokon_gatti');
    // kormi
    $kormi_increase = $data->sum($department_name . '_kormi_increase');
    $kormi_gatti = $data->sum($department_name . '_kormi_gatti');
    // associate_member
    $associate_member_increase = $data->sum($department_name . '_associate_member_increase');
    $associate_member_gatti = $data->sum($department_name . '_associate_member_gatti');

    // Calculate the total
    $total_rokon = $rokon_increase - $rokon_gatti;
    $total_kormi = $kormi_increase - $kormi_gatti;
    $total_associate_member = $associate_member_increase - $associate_member_gatti;

    return (object)[
        'total_rokon' => $total_rokon,
        'total_kormi' => $total_kormi,
        'total_associate_member' => $total_associate_member,
    ];
}

function notification_store($org_type, $org_type_id, $title, $description)
{
    // dd($org_type);
    if ($org_type == 'city') {
        $city_id = $org_type_id;
    } elseif ($org_type == 'thana') {
        $thana = OrgThana::find($org_type_id);
        $city_id = $thana->org_city_id;
        $thana_id = $thana->id;
        $ward_id = null;
        $unit_id = null;
    } elseif ($org_type == 'ward') {
        $ward = OrgWard::find($org_type_id);
        $city_id = $ward->org_city_id;
        $thana_id = $ward->org_thana_id;
        $ward_id = $ward->id;
        $unit_id = null;
    } elseif ($org_type == 'unit') {
        $unit = OrgUnit::find($org_type_id);
        $city_id = $unit->org_city_id;
        $thana_id = $unit->org_thana_id;
        $ward_id = $unit->org_ward_id;
        $unit_id = $unit->id;
    }
    $notification = new NotificationStore();
    $notification->execute(
        $title,
        $description,
        $org_type,
        $unit_id,
        $ward_id,
        $thana_id,
        $city_id,
    );
}

function active_report($org_type)
{
    $org_type_user = 'org_' . $org_type . '_user';
    $user_info = Auth::user()->$org_type_user()->first();

    $upper_organization_mapping = [
        'unit' => 'ward_id',
        'ward' => 'thana_id',
        'thana' => 'city_id',
    ];

    $upper_organization_title = $upper_organization_mapping[$org_type] ?? null;
    if ($upper_organization_title) {
        $upper_organization_id = $user_info->$upper_organization_title ?? null;
    }
    // dd($upper_organization_id);
    $permission = ReportManagementControl::where('is_active', 1)
        ->where('upper_organization_id', $upper_organization_id)
        ->where('report_type', $org_type)
        ->orderBy('updated_at', 'DESC')
        ->first();
    // dd($permission);
    return $permission;
}
