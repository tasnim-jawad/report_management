<?php

namespace App\Http\Controllers\Ward;

use App\Http\Controllers\Controller;
use App\Models\Organization\OrgCity;
use App\Models\Organization\OrgThana;
use App\Models\Organization\OrgUnit;
use App\Models\Organization\OrgWard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WardUnitController extends Controller
{
    public function all(){
        $ward_id = auth()->user()->org_ward_user["ward_id"];
        $units = OrgUnit::where('org_ward_id',$ward_id)->with('org_type')->with('org_area')->get();


        return response()->json([
            'status' => 'success',
            'data' => $units,
        ], 200);
    }

    public function show($id)
    {

        $select = ["*"];
        if (request()->has('select_all') && request()->select_all) {
            $select = "*";
        }
        $data = OrgUnit::where('id', $id)
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
            'title' => ['required','unique:org_units,title'],
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
        $org_ward_user = Auth::user()->org_ward_user()->first();
        $city = OrgCity::Where('id',$org_ward_user["city_id"])->first();
        $thana = OrgThana::where('id',$org_ward_user["thana_id"])->first();
        $ward = OrgWard::where('id',$org_ward_user["ward_id"])->first();
        if(!$org_ward_user || (!$thana || !$ward || !$city)){
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['org_type_id' => ['ward not found']],
            ], 422);
        }

        $city_id = $city->id;
        $thana_id = $thana->id;
        $ward_id = $ward->id;

        $data = new OrgUnit();
        $data->title = request()->title;
        $data->description = request()->description;
        $data->org_city_id = $city_id;
        $data->org_thana_id = $thana_id ;
        $data->org_ward_id = $ward_id;
        $data->org_type_id = request()->org_type_id;
        $data->org_area_id = request()->org_area_id;
        $data->org_gender = request()->org_gender;
        $data->creator = auth()->user()->id;
        $data->save();

        return response()->json($data, 200);
    }

    public function update()
    {
        $data = OrgUnit::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'title' => ['required', 'unique:org_units,title,' . request()->id],
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
            'id' => ['required', 'exists:org_units,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = OrgUnit::find(request()->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:org_units,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = OrgUnit::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:org_units,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = OrgUnit::find(request()->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }
}
