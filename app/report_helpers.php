<?php

use App\Models\Organization\OrgType;
use App\Models\Organization\OrgUnit;
use App\Models\Organization\OrgUnitResponsible;
use App\Models\Organization\Responsibility;
use App\Models\Report\ReportInfo;
use App\Models\Report\ReportManagementControl;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

/* 
functions:
    1. check_and_get_unit_info
    2. is_unit_report_upload_permitted
    3. auth_user_unit_responsibilities_info
    4. unit_report_header_info
    5. common_get
    6. common_store
    7. bangla
    8. bangla_month
    9. report_info_create
    10. calculate_previous_present
    11. calculate_increase
    12. unit_active_report
    
*/
function check_and_get_unit_info($user_id)
{
    $check_info = false;
    // dd($user_id);
    $permission = is_unit_report_upload_permitted(request()->month);
    if ($permission) {
        $resposibilities = auth_user_unit_responsibilities_info($user_id);
        $check_info = unit_report_header_info($resposibilities, $permission, request()->month);
    }
    return $check_info;
}

function is_unit_report_upload_permitted($month)
{
    $month = Carbon::parse($month);
    $permission = ReportManagementControl::whereYear('month_year', $month->clone()->year)
        ->whereMonth('month_year', $month->clone()->month)
        ->where('is_active', 1)
        ->where('report_type', 'unit')
        ->first();
    return $permission;
}

function auth_user_unit_responsibilities_info($user_id)
{
    $org_unit_responsible = OrgUnitResponsible::where('user_id', $user_id)->first();
    $org_unit = OrgUnit::where('id', $org_unit_responsible->org_unit_id)->first();
    $org_type = OrgType::where('id', $org_unit->org_type_id)->first();
    $resposibilities = Responsibility::where('id', $org_unit_responsible->responsibility_id)->first();

    return (object) [
        "org_unit_responsible" => $org_unit_responsible,
        "org_unit" => $org_unit,
        "org_type" => $org_type,
        "resposibilities" => $resposibilities,
    ];
}

function unit_report_header_info($resposibilities, $permission, $month)
{
    // dd($resposibilities->org_unit_responsible->org_unit_id);
    $month = Carbon::parse($month);
    // dd($month->clone()->year,$month->clone()->month);
    $check_info = ReportInfo::whereYear('month_year', $month->clone()->year)
        ->whereMonth('month_year', $month->clone()->month)
        ->where('org_type', 'unit')
        ->where('org_type_id', $resposibilities->org_unit_responsible->org_unit_id)
        ->where('report_type', 'monthly')
        ->orderBy('id', 'DESC')
        ->first();
    // dd('check_info',$check_info,$permission,$permission->report_type );
    if (!$check_info && $permission) {
        // dd('inside');
        $check_info = ReportInfo::create([
            'org_type' => $permission->report_type,
            'org_type_id' => $resposibilities->org_unit_responsible->org_unit_id,
            'responsibility_id' => $resposibilities->org_unit_responsible->responsibility_id,
            'responsibility_name' => $resposibilities->resposibilities->title,
            'month_year' => $permission->month_year,
            'report_type' =>  'monthly',
            'creator' => auth()->user()->id,
            'status' => 1,
        ]);
    }

    return $check_info;
}



function common_get($model, $user_id=null)
{
    $responsibilities = auth_user_unit_responsibilities_info(auth()->user()->id ?? $user_id);
    $report_info = unit_report_header_info($responsibilities, null, request()->month);
    if ($report_info) {
        $data = $model::where('report_info_id', $report_info->id)->first();
        if ($data) {
            return $data;
        }
    }
    return [];
}

function common_store($bind, $class, $report_info)
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
            "message" => ["এ মাসের জন্য রিপোর্ট গ্রহণ বন্ধ আছে । যেকোনো প্রয়োজনে ঊর্ধ্বতন দায়িত্বশীল এর সাথে যোগাযোগ করুন"]
        ]

    ], 403);
}


function bangla($englishNumber) {
    $banglaDigits = array(
        '0' => '০',
        '1' => '১',
        '2' => '২',
        '3' => '৩',
        '4' => '৪',
        '5' => '৫',
        '6' => '৬',
        '7' => '৭',
        '8' => '৮',
        '9' => '৯'
    );

    return strtr($englishNumber, $banglaDigits);
}

function bangla_month($english_month) {
    $bangla_month = [
        'January' => 'জানুয়ারি',
        'February' => 'ফেব্রুয়ারি',
        'March' => 'মার্চ',
        'April' => 'এপ্রিল',
        'May' => 'মে',
        'June' => 'জুন',
        'July' => 'জুলাই',
        'August' => 'আগস্ট',
        'September' => 'সেপ্টেম্বর',
        'October' => 'অক্টোবর',
        'November' => 'নভেম্বর',
        'December' => 'ডিসেম্বর'
    ];

    return $bangla_month[$english_month] ?? $english_month;
}

function report_info_create($org_type,$org_type_id,$responsibility_id,$responsibility_name,$month_year,$report_type){
    // dd($month_year);
    $data = new ReportInfo();
    $data->org_type = $org_type;
    $data->org_type_id = $org_type_id;
    $data->responsibility_id = $responsibility_id ?? 1;
    $data->responsibility_name = $responsibility_name ?? 'president';
    $data->month_year = $month_year;
    $data->report_type = $report_type ?? 'monthly';
    $data->creator = auth()->user()->id;
    $data->save();

    return $data;
}

function calculate_previous_present($model, $total_approved_report_info_ids, $column_name_increase, $column_name_decrease)
{
    // Fetch data based on the provided model and report_info_ids
    $data = $model::whereIn('report_info_id', $total_approved_report_info_ids)->get();

    // Sum the specified increase and decrease columns
    $total_increase = $data->sum($column_name_increase);
    $total_decrease = $data->sum($column_name_decrease);

    // Calculate the total
    $total = $total_increase - $total_decrease;

    return $total;
}

function calculate_increase($model, $total_approved_report_info_ids,$column_name_increase)
{
    // Fetch data based on the provided model and report_info_ids
    $data = $model::whereIn('report_info_id', $total_approved_report_info_ids)->get();

    // Sum the specified increase columns
    $total_increase = $data->sum($column_name_increase);

    return $total_increase;
}

function unit_active_report()
{

    $user = Auth::user()->org_unit_user()->first();
    // dd($user->ward_id);
    $permission = ReportManagementControl::where('is_active', 1)
            ->where('upper_organization_id', $user->ward_id)
            ->where('report_type', 'unit')
            ->orderBy('updated_at', 'DESC')
            ->first();

    return $permission;
}




