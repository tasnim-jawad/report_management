<?php

namespace App\Http\Controllers\Report\Department;

use App\Http\Controllers\Controller;
use App\Models\Report\Department\Department3JuboSomajDawat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Department3JuboSomajDawatController extends Controller
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

        $query = Department3JuboSomajDawat::where('status', $status)->orderBy($orderBy, $orderByType);
        // $query = User::latest()->get();

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', '%' . $key . '%')
                ->orWhere('how_many_young_been_invited', '%' . $key . '%')
                ->orWhere('how_many_young_been_associated', '%' . $key . '%')

                ->orWhere('total_young_committee', '%' . $key . '%')
                ->orWhere('total_young_committee_increased', '%' . $key . '%')

                ->orWhere('total_new_club', '%' . $key . '%')
                ->orWhere('total_new_club_increased', '%' . $key . '%')

                ->orWhere('stablished_club_total_invited', '%' . $key . '%')
                ->orWhere('stablished_club_total_increased', '%' . $key . '%');

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
        $data = Department3JuboSomajDawat::where('id', $id)
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
            'how_many_young_been_invited' => ['required'],
            'how_many_young_been_associated' => ['required'],

            'total_young_committee' => ['required'],
            'total_young_committee_increased' => ['required'],

            'total_new_club' => ['required'],
            'total_new_club_increased' => ['required'],

            'stablished_club_total_invited' => ['required'],
            'stablished_club_total_increased' => ['required'],

            'creator' => ['required'],
            'status' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new Department3JuboSomajDawat();
        $data->how_many_young_been_invited = request()->how_many_young_been_invited;
        $data->how_many_young_been_associated = request()->how_many_young_been_associated;

        $data->total_young_committee = request()->total_young_committee;
        $data->total_young_committee_increased = request()->total_young_committee_increased;

        $data->total_new_club = request()->total_new_club;
        $data->total_new_club_increased = request()->total_new_club_increased;

        $data->stablished_club_total_invited = request()->stablished_club_total_invited;
        $data->stablished_club_total_increased = request()->stablished_club_total_increased;

        $data->creator = request()->creator;
        $data->status = request()->status;
        $data->save();

        return response()->json($data, 200);
    }

    public function update()
    {
        $data = Department3JuboSomajDawat::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'how_many_young_been_invited' => ['required'],
            'how_many_young_been_associated' => ['required'],

            'total_young_committee' => ['required'],
            'total_young_committee_increased' => ['required'],

            'total_new_club' => ['required'],
            'total_new_club_increased' => ['required'],

            'stablished_club_total_invited' => ['required'],
            'stablished_club_total_increased' => ['required'],

            'creator' => ['required'],
            'status' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }


        $data->how_many_young_been_invited = request()->how_many_young_been_invited;
        $data->how_many_young_been_associated = request()->how_many_young_been_associated;

        $data->total_young_committee = request()->total_young_committee;
        $data->total_young_committee_increased = request()->total_young_committee_increased;

        $data->total_new_club = request()->total_new_club;
        $data->total_new_club_increased = request()->total_new_club_increased;

        $data->stablished_club_total_invited = request()->stablished_club_total_invited;
        $data->stablished_club_total_increased = request()->stablished_club_total_increased;

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
            'id' => ['required', 'exists:department3_jubo_somaj_dawats,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Department3JuboSomajDawat::find(request()->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:department3_jubo_somaj_dawats,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Department3JuboSomajDawat::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:department3_jubo_somaj_dawats,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Department3JuboSomajDawat::find(request()->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }
}
