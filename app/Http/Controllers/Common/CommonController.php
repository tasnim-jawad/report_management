<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\CommonAction\IdentifyGender;

class CommonController extends Controller
{
    public function gender_by_org_type_and_id(){
        $org_type = request()->get('org_type');
        $org_type_id = request()->get('org_type_id');
        if (!$org_type || !$org_type_id) {
            return response()->json(['error' => 'Organization type and ID are required'], 400);
        }
        $data = IdentifyGender::execute($org_type, $org_type_id);
        // dd($data->gender);

        if (isset($data->error)) {
            return response()->json(['error' => $data->error], 400);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Gender is found successfully',
            'data' => $data,
            'gender' => $data->gender
        ]);
    }
}   


