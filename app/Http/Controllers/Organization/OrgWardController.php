<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\Organization\OrgThana;
use App\Models\Organization\OrgWard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class OrgWardController extends Controller
{
    public function thana_wise_ward(){
        $thana_info = (object) auth()->user()->org_thana_user;
        $thana = OrgThana::where('id',$thana_info->thana_id)->first();

        $wards = OrgWard::where('org_thana_id',$thana_info->thana_id)
                ->where('org_city_id',$thana_info->city_id)
                ->where('org_gender',$thana->org_gender)
                ->with(['org_city','org_thana','org_ward_responsible','org_area'])
                ->get();
        // dd($wards);
        // $wards = OrgWard::where('org_thana_id', $thana_id)->where('org_gender',$gender)->get();
        return response([
            'status' => 'success',
            'data' => $wards,
        ]);
    }

    public function all()
    {
        $paginate = (int) request()->paginate ?? 10;
        $orderBy = request()->orderBy ?? 'id';
        $orderByType = request()->orderByType ?? 'ASC';

        $status = 1;
        if (request()->has('status')) {
            $status = request()->status;
        }
        // dd($status);

        $query = OrgWard::where('status', $status)->orderBy($orderBy, $orderByType);
        // $query = User::latest()->get();

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', '%' . $key . '%')
                    ->orWhere('title', '%' . $key . '%')
                    ->orWhere('no', '%' . $key . '%')
                    ->orWhere('description', '%' . $key . '%')
                    ->orWhere('org_type_id', '%' . $key . '%')
                    ->orWhere('org_area_id', '%' . $key . '%')
                    ->orWhere('org_gender', '%' . $key . '%');

            });
        }

        $datas = $query->paginate($paginate);
        return response()->json($datas);
    }

    public function show($id)
    {

        $select = ["*"];
        if (request()->has('select_all') && request()->select_all) {
            $select = "*";
        }
        $data = OrgWard::where('id', $id)
            ->select($select)
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
            'title' => ['required'],
            'no' => ['required'],
            'description' => ['required'],
            'org_type_id' => ['required'],
            'org_area_id' => ['required'],
            'org_gender' => ['required'],
            'creator' => ['required'],
            'status' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new OrgWard();
        $data->title = request()->title;
        $data->no = request()->no;
        $data->description = request()->description;
        $data->org_type_id = request()->org_type_id;
        $data->org_area_id = request()->org_area_id;
        $data->org_gender = request()->org_gender;
        $data->creator = request()->creator;
        $data->status = request()->status;
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
            'title' => ['required'],
            'no' => ['required'],
            'description' => ['required'],
            'org_type_id' => ['required'],
            'org_area_id' => ['required'],
            'org_gender' => ['required'],
            'creator' => ['required'],
            'status' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->title = request()->title;
        $data->no = request()->no;
        $data->description = request()->description;
        $data->org_type_id = request()->org_type_id;
        $data->org_area_id = request()->org_area_id;
        $data->org_gender = request()->org_gender;
        $data->creator = request()->creator;
        $data->status = request()->status;
        $data->save();

        if (request()->hasFile('image')) {
            //
        }
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
