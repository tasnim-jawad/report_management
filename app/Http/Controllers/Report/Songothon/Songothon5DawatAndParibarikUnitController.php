<?php

namespace App\Http\Controllers\Report\Songothon;

use App\Http\Controllers\Controller;
use App\Models\Report\Songothon\Songothon5DawatAndParibarikUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Songothon5DawatAndParibarikUnitController extends Controller
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

            $query = Songothon5DawatAndParibarikUnit::where('status', $status)->orderBy($orderBy, $orderByType);
            // $query = User::latest()->get();

            if (request()->has('search_key')) {
                $key = request()->search_key;
                $query->where(function ($q) use ($key) {
                    return $q->where('id', '%' . $key . '%')
                    ->orWhere('paribarik_unit_total', '%' . $key . '%')
                    ->orWhere('paribarik_unit_uposthiti', '%' . $key . '%')
                    ->orWhere('paribarik_unit_target', '%' . $key . '%');

                    // ->orWhere('dawati_unit_previous', '%' . $key . '%')
                    // ->orWhere('dawati_unit_present', '%' . $key . '%')
                    // ->orWhere('dawati_unit_increase', '%' . $key . '%')
                    // ->orWhere('dawati_unit_gatti', '%' . $key . '%')
                    // ->orWhere('dawati_unit_target', '%' . $key . '%')

                    // ->orWhere('paribarik_unit_previous', '%' . $key . '%')
                    // ->orWhere('paribarik_unit_present', '%' . $key . '%')
                    // ->orWhere('paribarik_unit_increase', '%' . $key . '%')
                    // ->orWhere('paribarik_unit_gatti', '%' . $key . '%')
                    // ->orWhere('paribarik_unit_target', '%' . $key . '%');

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
            $data = Songothon5DawatAndParibarikUnit::where('id', $id)
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
                'paribarik_unit_total' => ['required'],
                'paribarik_unit_uposthiti' => ['required'],
                'paribarik_unit_target' => ['required'],

                // 'dawati_unit_previous' => ['required'],
                // 'dawati_unit_present' => ['required'],
                // 'dawati_unit_increase' => ['required'],
                // 'dawati_unit_gatti' => ['required'],
                // 'dawati_unit_target' => ['required'],

                // 'paribarik_unit_previous' => ['required'],
                // 'paribarik_unit_present' => ['required'],
                // 'paribarik_unit_increase' => ['required'],
                // 'paribarik_unit_gatti' => ['required'],
                // 'paribarik_unit_target' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = new Songothon5DawatAndParibarikUnit();
            $data->paribarik_unit_total = request()->paribarik_unit_total;
            $data->paribarik_unit_uposthiti = request()->paribarik_unit_uposthiti;
            $data->paribarik_unit_target = request()->paribarik_unit_target;

            // $data->dawati_unit_previous = request()->dawati_unit_previous;
            // $data->dawati_unit_present = request()->dawati_unit_present;
            // $data->dawati_unit_increase = request()->dawati_unit_increase;
            // $data->dawati_unit_gatti = request()->dawati_unit_gatti;
            // $data->dawati_unit_target = request()->dawati_unit_target;

            // $data->paribarik_unit_previous = request()->paribarik_unit_previous;
            // $data->paribarik_unit_present = request()->paribarik_unit_present;
            // $data->paribarik_unit_increase = request()->paribarik_unit_increase;
            // $data->paribarik_unit_gatti = request()->paribarik_unit_gatti;
            // $data->paribarik_unit_target = request()->paribarik_unit_target;

            $data->creator = request()->creator;
            $data->status = request()->status;
            $data->save();

            return response()->json($data, 200);
        }

        public function update()
        {
            $data = Songothon5DawatAndParibarikUnit::find(request()->id);
            if (!$data) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
                ], 422);
            }

            $validator = Validator::make(request()->all(), [
                'paribarik_unit_total' => ['required'],
                'paribarik_unit_uposthiti' => ['required'],
                'paribarik_unit_target' => ['required'],

                // 'dawati_unit_previous' => ['required'],
                // 'dawati_unit_present' => ['required'],
                // 'dawati_unit_increase' => ['required'],
                // 'dawati_unit_gatti' => ['required'],
                // 'dawati_unit_target' => ['required'],

                // 'paribarik_unit_previous' => ['required'],
                // 'paribarik_unit_present' => ['required'],
                // 'paribarik_unit_increase' => ['required'],
                // 'paribarik_unit_gatti' => ['required'],
                // 'paribarik_unit_target' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }


            $data->paribarik_unit_total = request()->paribarik_unit_total;
            $data->paribarik_unit_uposthiti = request()->paribarik_unit_uposthiti;
            $data->paribarik_unit_target = request()->paribarik_unit_target;

            // $data->dawati_unit_previous = request()->dawati_unit_previous;
            // $data->dawati_unit_present = request()->dawati_unit_present;
            // $data->dawati_unit_increase = request()->dawati_unit_increase;
            // $data->dawati_unit_gatti = request()->dawati_unit_gatti;
            // $data->dawati_unit_target = request()->dawati_unit_target;

            // $data->paribarik_unit_previous = request()->paribarik_unit_previous;
            // $data->paribarik_unit_present = request()->paribarik_unit_present;
            // $data->paribarik_unit_increase = request()->paribarik_unit_increase;
            // $data->paribarik_unit_gatti = request()->paribarik_unit_gatti;
            // $data->paribarik_unit_target = request()->paribarik_unit_target;

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
                'id' => ['required', 'exists:songothon5_dawat_and_paribarik_units,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Songothon5DawatAndParibarikUnit::find(request()->id);
            $data->status = 0;
            $data->save();

            return response()->json([
                'result' => 'deactivated',
            ], 200);
        }

        public function destroy()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:songothon5_dawat_and_paribarik_units,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Songothon5DawatAndParibarikUnit::find(request()->id);
            $data->delete();

            return response()->json([
                'result' => 'deleted',
            ], 200);
        }

        public function restore()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:songothon5_dawat_and_paribarik_units,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Songothon5DawatAndParibarikUnit::find(request()->id);
            $data->status = 1;
            $data->save();

            return response()->json([
                'result' => 'activated',
            ], 200);
        }
}
