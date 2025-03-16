<?php

namespace App\Http\Controllers\Report\Department;

use App\Http\Controllers\Controller;
use App\Models\Report\Department\Department2MohollaVittikDawat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Department2MohollaVittikDawatController extends Controller
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

        $query = Department2MohollaVittikDawat::where('status', $status)->orderBy($orderBy, $orderByType);
        // $query = User::latest()->get();

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', '%' . $key . '%')
                ->orWhere('govment_calculated_village_amount', '%' . $key . '%')
                ->orWhere('govment_calculated_moholla_amount', '%' . $key . '%')

                ->orWhere('total_village', '%' . $key . '%')
                ->orWhere('total_village_increased', '%' . $key . '%')

                ->orWhere('total_moholla', '%' . $key . '%')
                ->orWhere('total_moholla_increased', '%' . $key . '%')

                ->orWhere('special_dawat_included_village', '%' . $key . '%')
                ->orWhere('special_dawat_included_village_increased', '%' . $key . '%')

                ->orWhere('special_dawat_included', '%' . $key . '%')
                ->orWhere('special_dawat_included_moholla_increased', '%' . $key . '%')

                ->orWhere('how_many_been_invited', '%' . $key . '%')
                ->orWhere('how_many_associated_created', '%' . $key . '%');

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
        $data = Department2MohollaVittikDawat::where('id', $id)
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
            'govment_calculated_village_amount' => ['required'],
            'govment_calculated_moholla_amount' => ['required'],

            'total_village' => ['required'],
            'total_village_increased' => ['required'],

            'total_moholla' => ['required'],
            'total_moholla_increased' => ['required'],

            'special_dawat_included_village' => ['required'],
            'special_dawat_included_village_increased' => ['required'],

            'special_dawat_included' => ['required'],
            'special_dawat_included_moholla_increased' => ['required'],

            'how_many_been_invited' => ['required'],
            'how_many_associated_created' => ['required'],

            'creator' => ['required'],
            'status' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new Department2MohollaVittikDawat();
        $data->govment_calculated_village_amount = request()->govment_calculated_village_amount;
        $data->govment_calculated_moholla_amount = request()->govment_calculated_moholla_amount;

        $data->total_village = request()->total_village;
        $data->total_village_increased = request()->total_village_increased;

        $data->total_moholla = request()->total_moholla;
        $data->total_moholla_increased = request()->total_moholla_increased;

        $data->special_dawat_included_village = request()->special_dawat_included_village;
        $data->special_dawat_included_village_increased = request()->special_dawat_included_village_increased;

        $data->special_dawat_included = request()->special_dawat_included;
        $data->special_dawat_included_moholla_increased = request()->special_dawat_included_moholla_increased;

        $data->how_many_been_invited = request()->how_many_been_invited;
        $data->how_many_associated_created = request()->how_many_associated_created;

        $data->creator = request()->creator;
        $data->status = request()->status;
        $data->save();

        return response()->json($data, 200);
    }

    public function update()
    {
        $data = Department2MohollaVittikDawat::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'govment_calculated_village_amount' => ['required'],
            'govment_calculated_moholla_amount' => ['required'],

            'total_village' => ['required'],
            'total_village_increased' => ['required'],

            'total_moholla' => ['required'],
            'total_moholla_increased' => ['required'],

            'special_dawat_included_village' => ['required'],
            'special_dawat_included_village_increased' => ['required'],

            'special_dawat_included' => ['required'],
            'special_dawat_included_moholla_increased' => ['required'],

            'how_many_been_invited' => ['required'],
            'how_many_associated_created' => ['required'],

            'creator' => ['required'],
            'status' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }


        $data->govment_calculated_village_amount = request()->govment_calculated_village_amount;
        $data->govment_calculated_moholla_amount = request()->govment_calculated_moholla_amount;

        $data->total_village = request()->total_village;
        $data->total_village_increased = request()->total_village_increased;

        $data->total_moholla = request()->total_moholla;
        $data->total_moholla_increased = request()->total_moholla_increased;

        $data->special_dawat_included_village = request()->special_dawat_included_village;
        $data->special_dawat_included_village_increased = request()->special_dawat_included_village_increased;

        $data->special_dawat_included = request()->special_dawat_included;
        $data->special_dawat_included_moholla_increased = request()->special_dawat_included_moholla_increased;

        $data->how_many_been_invited = request()->how_many_been_invited;
        $data->how_many_associated_created = request()->how_many_associated_created;

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
            'id' => ['required', 'exists:department2_moholla_vittik_dawats,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Department2MohollaVittikDawat::find(request()->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:department2_moholla_vittik_dawats,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Department2MohollaVittikDawat::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:department2_moholla_vittik_dawats,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Department2MohollaVittikDawat::find(request()->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }
}
