<?php

namespace App\Http\Controllers\Report\Songothon;

use App\Http\Controllers\Controller;
use App\Models\Report\Songothon\Songothon6BidayiStudentsConnect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Songothon6BidayiStudentsConnectController extends Controller
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

        $query = Songothon6BidayiStudentsConnect::where('status', $status)->orderBy($orderBy, $orderByType);
        // $query = User::latest()->get();

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', '%' . $key . '%')
                    ->orWhere('Joined_student_man_member', '%' . $key . '%')
                    ->orWhere('Joined_student_man_associate', '%' . $key . '%')
                    ->orWhere('Joined_student_man_worker', '%' . $key . '%')

                    ->orWhere('Joined_student_women_member', '%' . $key . '%')
                    ->orWhere('Joined_student_women_associate', '%' . $key . '%')
                    ->orWhere('Joined_student_women_worker', '%' . $key . '%');
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
        $data = Songothon6BidayiStudentsConnect::where('id', $id)
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
            'Joined_student_man_member' => ['required'],
            'Joined_student_man_associate' => ['required'],
            'Joined_student_man_worker' => ['required'],

            'Joined_student_women_member' => ['required'],
            'Joined_student_women_associate' => ['required'],
            'Joined_student_women_worker' => ['required'],

            'creator' => ['required'],
            'status' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new Songothon6BidayiStudentsConnect();
        $data->Joined_student_man_member = request()->Joined_student_man_member;
        $data->Joined_student_man_associate = request()->Joined_student_man_associate;
        $data->Joined_student_man_worker = request()->Joined_student_man_worker;

        $data->Joined_student_women_member = request()->Joined_student_women_member;
        $data->Joined_student_women_associate = request()->Joined_student_women_associate;
        $data->Joined_student_women_worker = request()->Joined_student_women_worker;

        $data->creator = request()->creator;
        $data->status = request()->status;
        $data->save();

        return response()->json($data, 200);
    }

    public function update()
    {
        $data = Songothon6BidayiStudentsConnect::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'Joined_student_man_member' => ['required'],
            'Joined_student_man_associate' => ['required'],
            'Joined_student_man_worker' => ['required'],

            'Joined_student_women_member' => ['required'],
            'Joined_student_women_associate' => ['required'],
            'Joined_student_women_worker' => ['required'],

            'creator' => ['required'],
            'status' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }


        $data->Joined_student_man_member = request()->Joined_student_man_member;
        $data->Joined_student_man_associate = request()->Joined_student_man_associate;
        $data->Joined_student_man_worker = request()->Joined_student_man_worker;

        $data->Joined_student_women_member = request()->Joined_student_women_member;
        $data->Joined_student_women_associate = request()->Joined_student_women_associate;
        $data->Joined_student_women_worker = request()->Joined_student_women_worker;

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
            'id' => ['required', 'exists:songothon6_bidayi_students_connects,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Songothon6BidayiStudentsConnect::find(request()->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:songothon6_bidayi_students_connects,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Songothon6BidayiStudentsConnect::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:songothon6_bidayi_students_connects,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Songothon6BidayiStudentsConnect::find(request()->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }
}
