<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Actions\ResetAllData;
use App\Models\Organization\OrgThanaUser;
use App\Models\Organization\OrgUnitUser;
use App\Models\Organization\OrgWardUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResetData extends Controller
{
    public function unit_data_reset(){

        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
            'user_id' => ['required', 'exists:org_unit_users,user_id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $month = Carbon::parse(request()->month);
        $unit_id = OrgUnitUser::where('user_id', request()->user_id)->value('unit_id');
        
        if (!$unit_id) {
            return response()->json([
                'err_message' => 'Unit not found for user',
            ], 404);
        }
        
        $org_type = 'unit';
        $org_type_id = $unit_id ;
        
        $ResetAllData = new ResetAllData();
        $reset_report = $ResetAllData->execute($month, $org_type, $org_type_id, $report_info_id = null);

        return response()->json([
            'message' => 'Unit data reset successfully.',
        ]);
    }
    public function thana_data_reset(){
        // dd(request()->all());
        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
            'user_id' => ['required', 'exists:org_thana_users,user_id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $month = Carbon::parse(request()->month);
        // dd($month->clone()->year);
        $thana_id = OrgThanaUser::where('user_id', request()->user_id)->value('thana_id');
        
        if (!$thana_id) {
            return response()->json([
                'err_message' => 'thana not found for user',
            ], 404);
        }
        
        $org_type = 'thana';
        $org_type_id = $thana_id ;
        // dd($month->month(), $org_type, $org_type_id);
        $ResetAllData = new ResetAllData();
        $reset_report = $ResetAllData->execute($month, $org_type, $org_type_id, $report_info_id = null);

        return response()->json([
            'message' => 'thana data reset successfully.',
        ]);
    }
    public function ward_data_reset(){

        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
            'user_id' => ['required', 'exists:org_ward_users,user_id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $month = Carbon::parse(request()->month);
        $ward_id = OrgWardUser::where('user_id', request()->user_id)->value('ward_id');
        
        if (!$ward_id) {
            return response()->json([
                'err_message' => 'ward not found for user',
            ], 404);
        }
        
        $org_type = 'ward';
        $org_type_id = $ward_id ;
        
        $ResetAllData = new ResetAllData();
        $reset_report = $ResetAllData->execute($month, $org_type, $org_type_id, $report_info_id = null);

        return response()->json([
            'message' => 'ward data reset successfully.',
        ]);
    }
}
