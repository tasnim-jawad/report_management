<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReportManagementControlController extends Controller
{
    // public function unit_active_report(){
    //     $permission = active_report('unit');
    //     // dd($permission);
    //     if(!$permission){
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => 'No active report found for Any month',
    //         ], 408);
    //     }
    //     return response()->json([
    //         'status' => 'success',
    //         'data' => $permission,
    //     ], 200);
    // }
    public function active_report($org_type){
        // $validator = Validator::make(request()->all(), [
        //     'org_type' => ['required'],
        // ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'err_message' => 'validation error',
        //         'errors' => $validator->errors(),
        //     ], 422);
        // }

        $permission = active_report($org_type);
        // dd($permission);
        if(!$permission){
            return response()->json([
                'status' => 'error',
                'message' => 'No active report found for Any month',
            ], 408);
        }
        return response()->json([
            'status' => 'success',
            'data' => $permission,
        ], 200);
    }
}
