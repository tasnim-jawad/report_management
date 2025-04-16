<?php

namespace App\Http\Controllers\Shudhi;

use App\Http\Controllers\Controller;
use App\Models\Shudhi\Shudhi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ThanaShudhiController extends Controller
{

    public function show_thana_shudhi()
    {
        // $paginate = (int) request()->paginate ?? 10;
        $orderBy = request()->orderBy ?? 'id';
        $orderByType = request()->orderByType ?? 'ASC';
        $org_type = request()->org_type ?? 'thana';

        $status = 1;

        if (request()->has('status')) {
            $status = request()->status;
        }
        // dd($status);
        $user = auth()->user()->org_thana_user;
        $thana_id = $user->thana_id;

        $query = Shudhi::where('status', $status)
            ->orderBy($orderBy, $orderByType)
            ->where('org_type',$org_type)
            ->where('thana_id', $thana_id);
        // $query = User::latest()->get();

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('name', '%' . $key . '%')
                    ->orWhere('mobile', '%' . $key . '%')
                    ->orWhere('target', '%' . $key . '%');
            });
        }

        $datas = $query->get();
        
        return response()->json($datas);
    }
    public function all_thana_shudhi()
    {
        // dd(request()->all());
        $paginate = (int) request()->paginate ?? 10;
        $orderBy = request()->orderBy ?? 'id';
        $orderByType = request()->orderByType ?? 'ASC';
        $org_type = request()->org_type ?? 'thana';

        $status = 1;

        if (request()->has('status')) {
            $status = request()->status;
        }
        // dd($status);
        $user = auth()->user()->org_thana_user;
        $thana_id = $user->thana_id;

        $query = Shudhi::where('status', $status)
            ->orderBy($orderBy, $orderByType)
            ->where('org_type',$org_type)
            ->where('thana_id', $thana_id);
        // $query = User::latest()->get();

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('name', '%' . $key . '%')
                    ->orWhere('mobile', '%' . $key . '%')
                    ->orWhere('target', '%' . $key . '%');
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
        $data = Shudhi::where('id', $id)
            ->select($select)
            ->first();
        if ($data) {
            return response()->json([
                'status' => 'success',
                'data' => $data,
            ], 200);
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
            'name' => ['required'],
            'mobile' => ['nullable'],
            'target' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $user_info = auth()->user()->org_thana_user;
        $unit_id = null;
        $ward_id = null;
        $thana_id = $user_info->thana_id;
        $city_id = $user_info->city_id;
        $org_type = request()->org_type ?? 'thana';


        $data = new Shudhi();
        $data->name = request()->name;
        $data->mobile = request()->mobile;
        $data->target = request()->target;
        $data->org_type = $org_type;
        $data->city_id = $city_id ?? null;
        $data->thana_id = $thana_id ?? null;
        $data->ward_id = $ward_id ?? null;
        $data->unit_id = $unit_id ?? null;
        $data->creator = auth()->id();
        $data->status = 1;
        $data->save();

        return response()->json($data, 200);
    }

    public function update()
    {

        // dd(request()->all());
        $data = Shudhi::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'name' => ['required'],
            'mobile' => ['nullable'],
            'target' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        $user_info = auth()->user()->org_thana_user;
        $unit_id = null;
        $ward_id = null;
        $thana_id = $user_info->thana_id;
        $city_id = $user_info->city_id;
        $org_type = request()->org_type ?? 'thana';
        
        
        $data->name = request()->name;
        $data->mobile = request()->mobile;
        $data->target = request()->target;
        $data->org_type = $org_type;
        $data->city_id = $city_id ?? null;
        $data->thana_id = $thana_id ?? null;
        $data->ward_id = $ward_id ?? null;
        $data->unit_id = $unit_id ?? null;
        $data->creator = auth()->id();
        $data->status = 1;
        $data->save();

        return response()->json($data, 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:shudhis,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Shudhi::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

}
