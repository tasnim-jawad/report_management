<?php

namespace App\Http\Controllers\Report\Proshikkhon;

use App\Http\Controllers\Controller;
use App\Models\Report\Proshikkhon\Proshikkhon1Tarbiat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Proshikkhon1TarbiatController extends Controller
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

            $query = Proshikkhon1Tarbiat::where('status', $status)->orderBy($orderBy, $orderByType);
            // $query = User::latest()->get();

            if (request()->has('search_key')) {
                $key = request()->search_key;
                $query->where(function ($q) use ($key) {
                    return $q->where('id', '%' . $key . '%')
                    ->orWhere('tarbiati_boithok_total', '%' . $key . '%')
                    ->orWhere('tarbiati_boithok_target', '%' . $key . '%')
                    ->orWhere('tarbiati_boithok_uposthiti', '%' . $key . '%');

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
            $data = Proshikkhon1Tarbiat::where('id', $id)
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
                'tarbiati_boithok_total' => ['required'],
                'tarbiati_boithok_target' => ['required'],
                'tarbiati_boithok_uposthiti' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = new Proshikkhon1Tarbiat();
            $data->tarbiati_boithok_total = request()->tarbiati_boithok_total;
            $data->tarbiati_boithok_target = request()->tarbiati_boithok_target;
            $data->tarbiati_boithok_uposthiti = request()->tarbiati_boithok_uposthiti;

            $data->creator = request()->creator;
            $data->status = request()->status;
            $data->save();

            return response()->json($data, 200);
        }

        public function update()
        {
            $data = Proshikkhon1Tarbiat::find(request()->id);
            if (!$data) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
                ], 422);
            }

            $validator = Validator::make(request()->all(), [
                'tarbiati_boithok_total' => ['required'],
                'tarbiati_boithok_target' => ['required'],
                'tarbiati_boithok_uposthiti' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }


            $data->tarbiati_boithok_total = request()->tarbiati_boithok_total;
            $data->tarbiati_boithok_target = request()->tarbiati_boithok_target;
            $data->tarbiati_boithok_uposthiti = request()->tarbiati_boithok_uposthiti;

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
                'id' => ['required', 'exists:proshikkhon1_tarbiats,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Proshikkhon1Tarbiat::find(request()->id);
            $data->status = 0;
            $data->save();

            return response()->json([
                'result' => 'deactivated',
            ], 200);
        }

        public function destroy()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:proshikkhon1_tarbiats,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Proshikkhon1Tarbiat::find(request()->id);
            $data->delete();

            return response()->json([
                'result' => 'deleted',
            ], 200);
        }

        public function restore()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:proshikkhon1_tarbiats,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Proshikkhon1Tarbiat::find(request()->id);
            $data->status = 1;
            $data->save();

            return response()->json([
                'result' => 'activated',
            ], 200);
        }
}
