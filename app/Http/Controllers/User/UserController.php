<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
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

        $query = User::where('status', $status)->orderBy($orderBy, $orderByType);
        // $query = User::latest()->get();

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', '%' . $key . '%')
                    ->orWhere('role', '%' . $key . '%')
                    ->orWhere('full_name', '%' . $key . '%')
                    ->orWhere('gender', '%' . $key . '%')
                    ->orWhere('telegram_name', '%' . $key . '%')
                    ->orWhere('telegram_id', '%' . $key . '%');

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
        $data = User::where('id', $id)
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
            'role' => ['required'],
            'full_name' => ['required'],
            'gender' => ['required'],
            'telegram_name' => ['required'],
            'telegram_id' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'blood_group' => ['required'],
            'creator' => ['required'],
            'status' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new User();
        $data->role = request()->role;
        $data->full_name = request()->full_name;
        $data->gender = request()->gender;
        $data->telegram_name = request()->telegram_name;
        $data->telegram_id = request()->telegram_id;
        $data->email = request()->email;
        $data->password = Hash::make(request()->password);
        $data->blood_group = request()->blood_group;
        $data->creator = request()->creator;
        $data->status = request()->status;
        $data->save();

        if (request()->hasFile('image')) {
            //
        }

        return response()->json($data, 200);
    }

    public function update()
    {
        $data = User::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'role' => ['required'],
            'full_name' => ['required'],
            'gender' => ['required'],
            'telegram_name' => ['required'],
            'telegram_id' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'blood_group' => ['required'],
            'creator' => ['required'],
            'status' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->role = request()->role;
        $data->full_name = request()->full_name;
        $data->gender = request()->gender;
        $data->telegram_name = request()->telegram_name;
        $data->telegram_id = request()->telegram_id;
        $data->email = request()->email;
        $data->password = Hash::make(request()->password);
        $data->blood_group = request()->blood_group;
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
            'id' => ['required', 'exists:users,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = User::find(request()->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:users,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = User::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:users,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = User::find(request()->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }

}









