<?php

namespace App\Http\Controllers\Report\Department;

use App\Http\Controllers\Controller;
use App\Models\Report\Department\Department1TalimulQuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Department1TalimulQuranController extends Controller
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

        $query = Department1TalimulQuran::where('status', $status)->orderBy($orderBy, $orderByType);
        // $query = User::latest()->get();

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', '%' . $key . '%')
                ->orWhere('teacher_rokon', '%' . $key . '%')
                ->orWhere('teacher_worker', '%' . $key . '%')

                ->orWhere('student_rokon', '%' . $key . '%')
                ->orWhere('student_worker', '%' . $key . '%')

                // ->orWhere('samostic_quran_learning_total_group', '%' . $key . '%')
                // ->orWhere('samostic_quran_learning_total_students', '%' . $key . '%')
                // ->orWhere('samostic_total_forkania_madrasah', '%' . $key . '%')
                // ->orWhere('samostic_total_forkania_madrasah_students', '%' . $key . '%')

                ->orWhere('how_much_learned_quran', '%' . $key . '%')
                ->orWhere('how_much_invited', '%' . $key . '%')
                ->orWhere('how_much_been_associated', '%' . $key . '%');

                // ->orWhere('total_muallim', '%' . $key . '%')
                // ->orWhere('total_muallim_increased', '%' . $key . '%');

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
        $data = Department1TalimulQuran::where('id', $id)
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
            'teacher_rokon' => ['required'],
            'teacher_worker' => ['required'],

            'student_rokon' => ['required'],
            'student_worker' => ['required'],

            // 'samostic_quran_learning_total_group' => ['required'],
            // 'samostic_quran_learning_total_students' => ['required'],
            // 'samostic_total_forkania_madrasah' => ['required'],
            // 'samostic_total_forkania_madrasah_students' => ['required'],

            'how_much_learned_quran' => ['required'],
            'how_much_invited' => ['required'],
            'how_much_been_associated' => ['required'],

            // 'total_muallim' => ['required'],
            // 'total_muallim_increased' => ['required'],

            'creator' => ['required'],
            'status' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new Department1TalimulQuran();
        $data->teacher_rokon = request()->teacher_rokon;
        $data->teacher_worker = request()->teacher_worker;

        $data->student_rokon = request()->student_rokon;
        $data->student_worker = request()->student_worker;

        // $data->samostic_quran_learning_total_group = request()->samostic_quran_learning_total_group;
        // $data->samostic_quran_learning_total_students = request()->samostic_quran_learning_total_students;
        // $data->samostic_total_forkania_madrasah = request()->samostic_total_forkania_madrasah;
        // $data->samostic_total_forkania_madrasah_students = request()->samostic_total_forkania_madrasah_students;

        $data->how_much_learned_quran = request()->how_much_learned_quran;
        $data->how_much_invited = request()->how_much_invited;
        $data->how_much_been_associated = request()->how_much_been_associated;

        // $data->total_muallim = request()->total_muallim;
        // $data->total_muallim_increased = request()->total_muallim_increased;

        $data->creator = request()->creator;
        $data->status = request()->status;
        $data->save();

        return response()->json($data, 200);
    }

    public function update()
    {
        $data = Department1TalimulQuran::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'teacher_rokon' => ['required'],
            'teacher_worker' => ['required'],

            'student_rokon' => ['required'],
            'student_worker' => ['required'],

            // 'samostic_quran_learning_total_group' => ['required'],
            // 'samostic_quran_learning_total_students' => ['required'],
            // 'samostic_total_forkania_madrasah' => ['required'],
            // 'samostic_total_forkania_madrasah_students' => ['required'],

            'how_much_learned_quran' => ['required'],
            'how_much_invited' => ['required'],
            'how_much_been_associated' => ['required'],

            // 'total_muallim' => ['required'],
            // 'total_muallim_increased' => ['required'],

            'creator' => ['required'],
            'status' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }


        $data->teacher_rokon = request()->teacher_rokon;
        $data->teacher_worker = request()->teacher_worker;

        $data->student_rokon = request()->student_rokon;
        $data->student_worker = request()->student_worker;

        // $data->samostic_quran_learning_total_group = request()->samostic_quran_learning_total_group;
        // $data->samostic_quran_learning_total_students = request()->samostic_quran_learning_total_students;
        // $data->samostic_total_forkania_madrasah = request()->samostic_total_forkania_madrasah;
        // $data->samostic_total_forkania_madrasah_students = request()->samostic_total_forkania_madrasah_students;

        $data->how_much_learned_quran = request()->how_much_learned_quran;
        $data->how_much_invited = request()->how_much_invited;
        $data->how_much_been_associated = request()->how_much_been_associated;

        // $data->total_muallim = request()->total_muallim;
        // $data->total_muallim_increased = request()->total_muallim_increased;

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
            'id' => ['required', 'exists:department1_talimul_qurans,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Department1TalimulQuran::find(request()->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:department1_talimul_qurans,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Department1TalimulQuran::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:department1_talimul_qurans,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Department1TalimulQuran::find(request()->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }
}
