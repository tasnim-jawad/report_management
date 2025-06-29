<?php

namespace App\Http\Controllers\CommonAction;

use Illuminate\Http\Request;
use App\Models\Organization\OrgUnit;
use App\Models\Organization\OrgWard;
use App\Models\Organization\OrgThana;

class IdentifyGender  
{
    public static function execute(
        $org_type,
        $org_type_id
    ){
        if (!$org_type || !$org_type_id) {
            return response()->json(['error' => 'Organization type and ID are required'], 400);
        }

        switch ($org_type) {
            case 'unit':
                $unit_info = OrgUnit::find($org_type_id);
                if (!$unit_info) {
                    return response()->json(['error' => 'Unit not found'], 404);
                }

                $ward_info = OrgWard::find($unit_info->org_ward_id);
                $thana_info = $ward_info ? OrgThana::find($ward_info->org_thana_id) : null;
                $org_gender = $thana_info ? $thana_info->org_gender : null;
                break;

            case 'ward':
                $ward_info = OrgWard::find($org_type_id);
                if (!$ward_info) {
                    return response()->json(['error' => 'Ward not found'], 404);
                }

                $thana_info = OrgThana::find($ward_info->org_thana_id);
                $org_gender = $thana_info ? $thana_info->org_gender : null;
                break;

            case 'thana':
                $thana_info = OrgThana::find($org_type_id);
                if (!$thana_info) {
                    return response()->json(['error' => 'Thana not found'], 404);
                }
                
                $org_gender = $thana_info ? $thana_info->org_gender : null;
                break;

            default:
                return response()->json(['error' => 'Invalid organization type . only support unit, ward and thana but passed '.$org_type], 400);
        }
        
        $data = (object) [
            'gender' => $org_gender
        ];

        return $data;
    }
}
