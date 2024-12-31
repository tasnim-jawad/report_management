<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportManagementControlController extends Controller
{
    public function unit_active_report(){
        $permission = unit_active_report();
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
