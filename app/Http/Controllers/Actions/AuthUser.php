<?php

namespace App\Http\Controllers\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthUser  
{
    public static function execute($org_type){
        $org_type_user = 'org_'.$org_type.'_user';
        $user = Auth::user();
        $user_info = $user->$org_type_user;

        $city_id = $user_info->city_id ?? null;
        $thana_id = $user_info->thana_id ?? null;
        $ward_id = $user_info->ward_id ?? null;
        $unit_id = $user_info->unit_id ?? null;

        $data = (object) [
            'user_info' => $user_info,
            'unit_id' => $unit_id,
            'ward_id' => $ward_id,
            'thana_id' => $thana_id,
            'city_id' => $city_id,
        ];

        return $data;
    }
}
