<?php

namespace App\Http\Controllers\Report\Ward\Department;

use App\Http\Controllers\Controller;
use App\Models\Report\Ward\Department\WardDepartment1TalimulQuran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WardDepartment1TalimulQuranController extends Controller
{
    protected $report_info = false;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->init();
            return $next($request);
        });
    }

    public function init()
    {
        $this->report_info = check_and_get_ward_info(auth()->user()->id);
    }

    public function get_data()
    {
        return ward_common_get(WardDepartment1TalimulQuran::class);
    }

    public function store_single()
    {
        return ward_common_store($this, WardDepartment1TalimulQuran::class, $this->report_info);
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

        $query = WardDepartment1TalimulQuran::where('status', $status)->orderBy($orderBy, $orderByType);
        // $query = User::latest()->get();

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', '%' . $key . '%')
                ->orWhere('teacher_rokon', '%' . $key . '%')
                ->orWhere('teacher_worker', '%' . $key . '%')

                ->orWhere('student_rokon', '%' . $key . '%')
                ->orWhere('student_worker', '%' . $key . '%')

                ->orWhere('quran_learning_total_group', '%' . $key . '%')
                ->orWhere('quran_learning_total_students', '%' . $key . '%')

                ->orWhere('total_moktob', '%' . $key . '%')
                ->orWhere('total_moktob_students', '%' . $key . '%')

                ->orWhere('total_forkania_madrasah', '%' . $key . '%')
                ->orWhere('total_forkania_madrasah_students', '%' . $key . '%')

                ->orWhere('how_much_learned_sohih_tilawat', '%' . $key . '%')

                ->orWhere('how_much_invited_man', '%' . $key . '%')
                ->orWhere('how_much_invited_woman', '%' . $key . '%')

                ->orWhere('how_much_been_associated_man', '%' . $key . '%')
                ->orWhere('how_much_been_associated_woman', '%' . $key . '%')

                ->orWhere('total_muallim_man', '%' . $key . '%')
                ->orWhere('total_muallim_woman', '%' . $key . '%')

                ->orWhere('total_muallim_increased_man', '%' . $key . '%')
                ->orWhere('total_muallim_increased_woman', '%' . $key . '%');

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
        $data = WardDepartment1TalimulQuran::where('id', $id)
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

            'quran_learning_total_group' => ['required'],
            'quran_learning_total_students' => ['required'],

            'total_moktob' => ['required'],
            'total_moktob_students' => ['required'],

            'total_forkania_madrasah' => ['required'],
            'total_forkania_madrasah_students' => ['required'],

            'how_much_learned_sohih_tilawat' => ['required'],

            'how_much_invited_man' => ['required'],
            'how_much_invited_woman' => ['required'],

            'how_much_been_associated_man' => ['required'],
            'how_much_been_associated_woman' => ['required'],

            'total_muallim_man' => ['required'],
            'total_muallim_woman' => ['required'],

            'total_muallim_increased_man' => ['required'],
            'total_muallim_increased_woman' => ['required'],

            'creator' => ['required'],
            'status' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new WardDepartment1TalimulQuran();
        $data->teacher_rokon = request()->teacher_rokon;
        $data->teacher_worker = request()->teacher_worker;

        $data->student_rokon = request()->student_rokon;
        $data->student_worker = request()->student_worker;

        $data->quran_learning_total_group = request()->quran_learning_total_group;
        $data->quran_learning_total_students = request()->quran_learning_total_students;

        $data->total_moktob = request()->total_moktob;
        $data->total_moktob_students = request()->total_moktob_students;

        $data->total_forkania_madrasah = request()->total_forkania_madrasah;
        $data->total_forkania_madrasah_students = request()->total_forkania_madrasah_students;

        $data->how_much_learned_sohih_tilawat = request()->how_much_learned_sohih_tilawat;

        $data->how_much_invited_man = request()->how_much_invited_man;
        $data->how_much_invited_woman = request()->how_much_invited_woman;

        $data->how_much_been_associated_man = request()->how_much_been_associated_man;
        $data->how_much_been_associated_woman = request()->how_much_been_associated_woman;

        $data->total_muallim_man = request()->total_muallim_man;
        $data->total_muallim_woman = request()->total_muallim_woman;

        $data->total_muallim_increased_man = request()->total_muallim_increased_man;
        $data->total_muallim_increased_woman = request()->total_muallim_increased_woman;

        $data->creator = request()->creator;
        $data->status = request()->status;
        $data->save();

        return response()->json($data, 200);
    }

    public function update()
    {
        $data = WardDepartment1TalimulQuran::find(request()->id);
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

            'quran_learning_total_group' => ['required'],
            'quran_learning_total_students' => ['required'],

            'total_moktob' => ['required'],
            'total_moktob_students' => ['required'],

            'total_forkania_madrasah' => ['required'],
            'total_forkania_madrasah_students' => ['required'],

            'how_much_learned_sohih_tilawat' => ['required'],

            'how_much_invited_man' => ['required'],
            'how_much_invited_woman' => ['required'],

            'how_much_been_associated_man' => ['required'],
            'how_much_been_associated_woman' => ['required'],

            'total_muallim_man' => ['required'],
            'total_muallim_woman' => ['required'],

            'total_muallim_increased_man' => ['required'],
            'total_muallim_increased_woman' => ['required'],

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

        $data->quran_learning_total_group = request()->quran_learning_total_group;
        $data->quran_learning_total_students = request()->quran_learning_total_students;

        $data->total_moktob = request()->total_moktob;
        $data->total_moktob_students = request()->total_moktob_students;

        $data->total_forkania_madrasah = request()->total_forkania_madrasah;
        $data->total_forkania_madrasah_students = request()->total_forkania_madrasah_students;

        $data->how_much_learned_sohih_tilawat = request()->how_much_learned_sohih_tilawat;
        
        $data->how_much_invited_man = request()->how_much_invited_man;
        $data->how_much_invited_woman = request()->how_much_invited_woman;

        $data->how_much_been_associated_man = request()->how_much_been_associated_man;
        $data->how_much_been_associated_woman = request()->how_much_been_associated_woman;

        $data->total_muallim_man = request()->total_muallim_man;
        $data->total_muallim_woman = request()->total_muallim_woman;

        $data->total_muallim_increased_man = request()->total_muallim_increased_man;
        $data->total_muallim_increased_woman = request()->total_muallim_increased_woman;

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
            'id' => ['required', 'exists:ward_department1_talimul_qurans,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = WardDepartment1TalimulQuran::find(request()->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:ward_department1_talimul_qurans,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = WardDepartment1TalimulQuran::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:ward_department1_talimul_qurans,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = WardDepartment1TalimulQuran::find(request()->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }
}
