<?php

namespace App\Http\Controllers\Program;

use App\Http\Controllers\Actions\AuthUser;
use App\Http\Controllers\Controller;
use App\Models\Program\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgramController extends Controller
{
    public function all_program(){

        $paginate = (int) request()->paginate ?? 10;
        $orderBy = request()->orderBy ?? 'id';
        $orderByType = request()->orderByType ?? 'DESC';

        $org_type = request()->org_type;
        $data = AuthUser::execute($org_type);

        $org_type_id_column = $org_type.'_id';
        $org_type_id = $data->$org_type_id_column;

        $status = 1;
        if (request()->has('status')) {
            $status = request()->status;
        }
        // dd($status);

        $query = Program::where('status', $status)
            ->orderBy($orderBy, $orderByType)
            ->where('org_type',$org_type)
            ->where($org_type_id_column, $org_type_id);

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('title', '%' . $key . '%')
                    ->orWhere('title', '%' . $key . '%')
                    ->orWhere('date', '%' . $key . '%')
                    ->orWhere('location', '%' . $key . '%');

            });
        }

        $datas = $query->paginate($paginate);
        return response()->json([
            'status' => 'success',
            'data' => $datas
        ]);
    }
    public function all()
    {
        $paginate = (int) request()->paginate ?? 10;
        $orderBy = request()->orderBy ?? 'id';
        $orderByType = request()->orderByType ?? 'DESC';

        $status = 1;
        if (request()->has('status')) {
            $status = request()->status;
        }
        // dd($status);

        $query = Program::where('status', $status)->orderBy($orderBy, $orderByType);
        // $query = User::latest()->get();

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('title', '%' . $key . '%')
                    ->orWhere('title', '%' . $key . '%')
                    ->orWhere('date', '%' . $key . '%')
                    ->orWhere('location', '%' . $key . '%');

            });
        }

        $datas = $query->paginate($paginate);
        return response()->json($datas);
    }

    public function show($id)
    {
        $with = [];

        $select = ["*"];
        if (request()->has('select_all') && request()->select_all) {
            $select = "*";
        }

        $data = Program::where('id', $id)
            ->select($select)
            ->with($with)
            ->first();
        if ($data) {
            return response()->json([
                'status' => 'success',
                'data' => $data,
            ]);
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
            'org_type' => ['required'],
            'title' => ['required'],
            'date' => ['required'],
            'location' => ['required'],
            'time' => ['required'],
            'guest' => ['nullable'],
            'description' => ['nullable'],
        ]);

        $org_type = request()->org_type;
        $auth_data = AuthUser::execute($org_type);
        // dd($data );
        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new Program();
        $data->org_type = request()->org_type;
        $data->unit_id = $auth_data->unit_id ?? null;
        $data->ward_id = $auth_data->ward_id ?? null;
        $data->thana_id = $auth_data->thana_id ?? null;
        $data->city_id = $auth_data->city_id ?? null;

        $data->title = request()->title;
        $data->date = request()->date;
        $data->location = request()->location;
        $data->time = request()->time;
        $data->guest = request()->guest ?? null;
        $data->description = request()->description ?? null;

        $data->creator = auth()->id();
        $data->status = request()->status ?? 1;
        $data->save();

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200);
    }

    public function update()
    {
        $data = Program::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'title' => ['required'],
            'date' => ['required'],
            'location' => ['required'],
            'time' => ['required'],
            'guest' => ['nullable'],
            'description' => ['nullable'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->title = request()->title;
        $data->date = request()->date;
        $data->location = request()->location;
        $data->time = request()->time;
        $data->guest = request()->guest ?? null;
        $data->description = request()->description ?? null;

        $data->creator = auth()->id();
        $data->status = request()->status ?? 1;
        $data->save();

        return response()->json($data, 200);
    }

    public function soft_delete()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:programs,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Program::find(request()->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:programs,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Program::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:programs,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Program::find(request()->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }
}
