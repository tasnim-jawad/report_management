<?php

namespace App\Http\Controllers\Program;

use App\Http\Controllers\Actions\AuthUser;
use App\Http\Controllers\Controller;
use App\Models\Program\ProgramDelegate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgramDelegateController extends Controller
{
    public function program_wise_delegate(){

        $validator = Validator::make(request()->all(), [
            'program_id' => ['required', 'exists:programs,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $with = ['user','program'];
        $program_id = request()->program_id;
        $delegates = ProgramDelegate::where('program_id', $program_id)
        ->with($with)
        ->where('status',1)
        ->get();

        return response()->json([
            'status' => 'success',
            'data' => $delegates,
            'number_of_delegate' => count($delegates)
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

        $query = ProgramDelegate::where('status', $status)->orderBy($orderBy, $orderByType);
        // $query = User::latest()->get();

        // if (request()->has('search_key')) {
        //     $key = request()->search_key;
        //     $query->where(function ($q) use ($key) {
        //         return $q->where('id', '%' . $key . '%')
        //             ->orWhere('user_id', '%' . $key . '%')
        //             ->orWhere('responsibility_id', '%' . $key . '%')
        //             ->orWhere('org_city_id', '%' . $key . '%');

        //     });
        // }

        $datas = $query->paginate($paginate);
        return response()->json($datas);
    }

    public function show($id)
    {
        $with = ['program','user'];
        $select = ["*"];
        if (request()->has('select_all') && request()->select_all) {
            $select = "*";
        }
        $data = ProgramDelegate::where('id', $id)
            ->select($select)
            ->with($with)
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
            'program_id' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        //delete all record if exist
        ProgramDelegate::where('program_id', request()->program_id)->delete();

        $org_type = 'unit';
        $auth_data = AuthUser::execute($org_type);
        if (request()->has('delegates') && is_array(request()->delegates)) {
            $existing_users = ProgramDelegate::where('program_id', request()->program_id)
                ->where('status',1)
                ->pluck('user_id')
                ->toArray();
            foreach (request()->delegates as $delegate) {
                if (in_array($delegate['user_id'], $existing_users)) {
                    continue; // Skip duplicate user_id
                }
                
                $data = new ProgramDelegate();
                $data->program_id = request()->program_id;
                $data->city_id = $auth_data->city_id; 
                $data->thana_id = $auth_data->thana_id; 
                $data->ward_id = $auth_data->ward_id; 
                $data->unit_id = $auth_data->unit_id; 

                $data->user_id = $delegate['user_id'];
                $data->time = $delegate['time'];
                $data->is_present = $delegate['is_present'] ?? 0;
                $data->creator = auth()->id();
                $data->status = $delegate['status'] ?? 1;
                $data->save();

                // Add newly inserted user_id to existing users array
                $existing_users[] = $delegate['user_id'];
            }
            return response()->json([
                'status' => 'success',
                'message' => 'Delegates added successfully']
            );
        }
    }

    public function update()
    {
        $data = ProgramDelegate::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'program_id' => ['required'],
            'user_id' => ['required'],
            'time' => ['required'],
            'is_present' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->user_id = request()->user_id;
        $data->program_id = request()->program_id;
        $data->time = request()->time;
        $data->is_present = request()->is_present ?? 1;
        $data->creator = auth()->id();
        $data->status = request()->status?? 1;
        $data->save();

        return response()->json($data, 200);
    }

    public function soft_delete()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:org_city_responsibles,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = ProgramDelegate::find(request()->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:org_city_responsibles,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = ProgramDelegate::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:org_city_responsibles,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = ProgramDelegate::find(request()->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }
}
