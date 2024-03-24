<?php

namespace App\Http\Controllers\Report\Dawat;

use App\Http\Controllers\Controller;
use App\Models\Report\Dawat\Dawat2PersonalAndTarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class Dawat2PersonalAndTargetController extends Controller
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

        $query = Dawat2PersonalAndTarget::where('status', $status)->orderBy($orderBy, $orderByType);
        // $query = User::latest()->get();

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', '%' . $key . '%')
                ->orWhere('total_rokon', '%' . $key . '%')
                ->orWhere('total_worker', '%' . $key . '%')
                ->orWhere('how_many_were_give_dawat', '%' . $key . '%')
                ->orWhere('how_many_have_been_invited', '%' . $key . '%')
                ->orWhere('how_many_associate_members_created', '%' . $key . '%');

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
        $data = Dawat2PersonalAndTarget::where('id', $id)
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
            'total_rokon' => ['required'],
            'total_worker' => ['required'],
            'how_many_were_give_dawat' => ['required'],
            'how_many_have_been_invited' => ['required'],
            'how_many_associate_members_created' => ['required'],
            'creator' => ['required'],
            'status' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new Dawat2PersonalAndTarget();
        $data->total_rokon = request()->total_rokon;
        $data->total_worker = request()->total_worker;
        $data->how_many_were_give_dawat = request()->how_many_were_give_dawat;
        $data->how_many_have_been_invited = request()->how_many_have_been_invited;
        $data->how_many_associate_members_created = request()->how_many_associate_members_created;
        $data->creator = request()->creator;
        $data->status = request()->status;
        $data->save();

        return response()->json($data, 200);
    }

    public function update()
    {
        $data = Dawat2PersonalAndTarget::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'total_rokon' => ['required'],
            'total_worker' => ['required'],
            'how_many_were_give_dawat' => ['required'],
            'how_many_have_been_invited' => ['required'],
            'how_many_associate_members_created' => ['required'],
            'creator' => ['required'],
            'status' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->total_rokon = request()->total_rokon;
        $data->total_worker = request()->total_worker;
        $data->how_many_were_give_dawat = request()->how_many_were_give_dawat;
        $data->how_many_have_been_invited = request()->how_many_have_been_invited;
        $data->how_many_associate_members_created = request()->how_many_associate_members_created;
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
            'id' => ['required', 'exists:dawat2_personal_and_targets,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Dawat2PersonalAndTarget::find(request()->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:dawat2_personal_and_targets,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Dawat2PersonalAndTarget::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:dawat2_personal_and_targets,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Dawat2PersonalAndTarget::find(request()->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }
}
