<?php

namespace App\Http\Controllers\Program;

use App\Http\Controllers\Actions\AuthUser;
use App\Http\Controllers\Controller;
use App\Models\Program\Program;
use App\Models\Program\ProgramSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgramScheduleController extends Controller
{
    public function unit_wise_schedule(){
        $validator = Validator::make(request()->all(), [
            'org_type' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        $org_type = request()->org_type;
        $data = AuthUser::execute($org_type);

        $org_type_id_column = $org_type.'_id';
        $org_type_id = $data->$org_type_id_column;

        
        $unit_all_program = Program::where('org_type', $org_type)
            ->where($org_type_id_column, $org_type_id)
            ->where('status', 1)
            ->pluck('id')
            ->toArray();

        $unit_program_schedule = ProgramSchedule::whereIn('program_id', $unit_all_program)->get();

        return response()->json([
            'status' => 'success',
            'data' => $unit_program_schedule,
        ]);
    }

    public function is_schedule_check(){
        $validator = Validator::make(request()->all(), [
            'program_id' => ['required', 'exists:programs,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = ProgramSchedule::where('program_id', request()->program_id)->first();

        if ($data) {
            return response()->json([
                'status' => 'success',
                'data' => $data
            ]);
        }
    
        return response()->json([
            'status' => 'error',
            'message' => 'No schedule found for the given program ID'
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

        $query = ProgramSchedule::where('status', $status)->orderBy($orderBy, $orderByType);
        // $query = User::latest()->get();

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', '%' . $key . '%')
                    ->orWhere('user_id', '%' . $key . '%')
                    ->orWhere('responsibility_id', '%' . $key . '%')
                    ->orWhere('org_city_id', '%' . $key . '%');

            });
        }

        $datas = $query->paginate($paginate);
        return response()->json($datas);
    }

    public function show($id)
    {
        // dd($id);
        $with = ['program'];
        $select = ["*"];
        if (request()->has('select_all') && request()->select_all) {
            $select = "*";
        }
        $data = ProgramSchedule::where('program_id', $id)
            ->select($select)
            ->with($with)
            ->first();
        if ($data) {
            return response()->json([
                'status' => 'success',
                'data' => $data
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
            'program_id' => ['required','exists:programs,id'],
            'title' => ['required'],
            'is_completed' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = ProgramSchedule::where('program_id',request()->program_id)->first();
        if(!$data){
            $data = new ProgramSchedule();
        }
        $data->program_id = request()->program_id;
        $data->title = request()->title;
        $data->is_completed = request()->is_completed ?? 0;
        $data->creator = auth()->id();
        $data->status = request()->status ?? 1;
        $data->save();

        return response()->json($data, 200);

        
    }

    public function update()
    {
        $data = ProgramSchedule::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'program_id' => ['required','exists:programs,id'],
            'title' => ['required'],
            'is_completed' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->program_id = request()->program_id;
        $data->title = request()->title;
        $data->is_completed = request()->is_completed ?? 0;
        $data->creator = auth()->id();
        $data->status = request()->status ?? 1;
        $data->save();

        if (request()->hasFile('image')) {
            //
        }
        return response()->json($data, 200);
    }

    public function soft_delete()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:program_schedules,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = ProgramSchedule::find(request()->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:program_schedules,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = ProgramSchedule::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:program_schedules,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = ProgramSchedule::find(request()->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }
}
