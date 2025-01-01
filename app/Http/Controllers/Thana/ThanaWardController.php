<?php

namespace App\Http\Controllers\Thana;

use App\Http\Controllers\Controller;
use App\Models\Organization\OrgCity;
use App\Models\Organization\OrgThana;
use App\Models\Organization\OrgWard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ThanaWardController extends Controller
{
    public function all(){
        $thana_id = auth()->user()->org_thana_user["thana_id"];
        $wards = OrgWard::where('org_thana_id',$thana_id)->with('org_type')->with('org_area')->get();


        return response()->json([
            'status' => 'success',
            'data' => $wards,
        ], 200);
    }

    public function show($id)
    {

        $select = ["*"];
        if (request()->has('select_all') && request()->select_all) {
            $select = "*";
        }
        $data = OrgWard::where('id', $id)
            ->select($select)
            ->with('org_type')
            ->with('org_area')
            ->first();
        if ($data) {
            return response()->json($data, 200);
        } else {
            return response()->json([
                'err_message' => 'data not found',
                'errors' => [
                    'user' => [],
                ],
            ], 404);
        }
    }
    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'title' => ['required','unique:org_wards,title'],
            'description' => ['required'],
            'org_type_id' => ['required'],
            'org_area_id' => ['required'],
            'org_gender' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        $org_thana_user = auth()->user()->org_thana_user;
        $city = OrgCity::Where('id',$org_thana_user["city_id"])->first();
        $thana = OrgThana::where('id',$org_thana_user["thana_id"])->first();
        
        if(!$org_thana_user || (!$thana || !$city)){
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['org_type_id' => ['thana not found']],
            ], 422);
        }
        $thana_id = $thana->id;
        $city_id = $city->id;

        $data = new OrgWard();
        $data->title = request()->title;
        $data->description = request()->description;
        $data->org_city_id = $city_id;
        $data->org_thana_id = $thana_id ;
        $data->org_type_id = request()->org_type_id;
        $data->org_area_id = request()->org_area_id;
        $data->org_gender = request()->org_gender;
        $data->creator = auth()->user()->id;
        $data->save();

        return response()->json($data, 200);
    }

    public function update()
    {
        $data = OrgWard::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'title' => ['required', 'unique:org_wards,title,' . request()->id],
            'description' => ['required'],
            'org_type_id' => ['required'],
            'org_area_id' => ['required'],
            'org_gender' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        $data->title = request()->title;
        $data->description = request()->description;
        $data->org_type_id = request()->org_type_id;
        $data->org_area_id = request()->org_area_id;
        $data->org_gender = request()->org_gender;
        $data->creator = auth()->user()->id;
        $data->save();

        return response()->json($data, 200);
    }

    public function soft_delete()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:org_wards,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = OrgWard::find(request()->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:org_wards,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = OrgWard::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:org_wards,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = OrgWard::find(request()->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }
}
