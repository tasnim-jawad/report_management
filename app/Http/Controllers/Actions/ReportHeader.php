<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use App\Models\Organization\OrgThana;
use App\Models\Organization\OrgType;
use App\Models\Organization\OrgUnit;
use App\Models\Organization\OrgWard;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportHeader
{
    public function execute($org_type, $org_type_id)
    {
        $unit_info = $ward_info = $thana_info = $president = null;

        // Fetch details based on organization type
        switch ($org_type) {
            case 'unit':
                $unit_info = OrgUnit::find($org_type_id);
                if (!$unit_info) {
                    return response()->json(['error' => 'Unit not found'], 404);
                }

                $ward_info = OrgWard::find($unit_info->org_ward_id);
                $thana_info = $ward_info ? OrgThana::find($ward_info->org_thana_id) : null;
                $org_type_title = OrgType::where('id', $unit_info->org_type_id)->first()->title;
                break;

            case 'ward':
                $ward_info = OrgWard::find($org_type_id);
                if (!$ward_info) {
                    return response()->json(['error' => 'Ward not found'], 404);
                }

                $thana_info = OrgThana::find($ward_info->org_thana_id);
                $org_type_title = OrgType::where('id', $ward_info->org_type_id)->first()->title;
                break;

            case 'thana':
                $thana_info = OrgThana::find($org_type_id);
                if (!$thana_info) {
                    return response()->json(['error' => 'Thana not found'], 404);
                }
                $org_type_title = OrgType::where('id', $thana_info->org_type_id)->first()->title;
                break;

            default:
                return response()->json(['error' => 'Invalid organization type'], 400);
        }

        // Fetch president of the organization
        $responsibility_table = "org_{$org_type}_responsibles";
        $responsibility_column = "org_{$org_type}_id";

        $president_id = DB::table($responsibility_table)
            ->where($responsibility_column, $org_type_id)
            ->where('responsibility_id', 1)
            ->value('user_id');

        $president = $president_id ? User::find($president_id)?->full_name : null;

        // dd([
        //     'unit_info' => $unit_info,
        //     'ward_info' => $ward_info,
        //     'thana_info' => $thana_info,
        //     'president' => $president,
        // ]);
        // Return collected data
        return (object) [
            'unit_info' => $unit_info,
            'ward_info' => $ward_info,
            'thana_info' => $thana_info,
            'thana_info' => $thana_info,
            'org_type' => $org_type_title,
        ];
    }




}
