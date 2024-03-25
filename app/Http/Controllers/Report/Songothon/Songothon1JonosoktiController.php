<?php

namespace App\Http\Controllers\Report\Songothon;

use App\Http\Controllers\Controller;
use App\Models\Report\Songothon\Songothon1Jonosokti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Songothon1JonosoktiController extends Controller
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

            $query = Songothon1Jonosokti::where('status', $status)->orderBy($orderBy, $orderByType);
            // $query = User::latest()->get();

            if (request()->has('search_key')) {
                $key = request()->search_key;
                $query->where(function ($q) use ($key) {
                    return $q->where('id', '%' . $key . '%')
                    ->orWhere('rokon_previous', '%' . $key . '%')
                    ->orWhere('rokon_present', '%' . $key . '%')
                    ->orWhere('rokon_briddhi', '%' . $key . '%')
                    ->orWhere('rokon_gatti', '%' . $key . '%')
                    ->orWhere('rokon_target', '%' . $key . '%')

                    ->orWhere('worker_previous', '%' . $key . '%')
                    ->orWhere('worker_present', '%' . $key . '%')
                    ->orWhere('worker_briddhi', '%' . $key . '%')
                    ->orWhere('worker_gatti', '%' . $key . '%')
                    ->orWhere('worker_target', '%' . $key . '%');


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
            $data = Songothon1Jonosokti::where('id', $id)
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
                'rokon_previous' => ['required'],
                'rokon_present' => ['required'],
                'rokon_briddhi' => ['required'],
                'rokon_gatti' => ['required'],
                'rokon_target' => ['required'],

                'worker_previous' => ['required'],
                'worker_present' => ['required'],
                'worker_briddhi' => ['required'],
                'worker_gatti' => ['required'],
                'worker_target' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = new Songothon1Jonosokti();
            $data->rokon_previous = request()->rokon_previous;
            $data->rokon_present = request()->rokon_present;
            $data->rokon_briddhi = request()->rokon_briddhi;
            $data->rokon_gatti = request()->rokon_gatti;
            $data->rokon_target = request()->rokon_target;

            $data->worker_previous = request()->worker_previous;
            $data->worker_present = request()->worker_present;
            $data->worker_briddhi = request()->worker_briddhi;
            $data->worker_gatti = request()->worker_gatti;
            $data->worker_target = request()->worker_target;

            $data->creator = request()->creator;
            $data->status = request()->status;
            $data->save();

            return response()->json($data, 200);
        }

        public function update()
        {
            $data = Songothon1Jonosokti::find(request()->id);
            if (!$data) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
                ], 422);
            }

            $validator = Validator::make(request()->all(), [
                'rokon_previous' => ['required'],
                'rokon_present' => ['required'],
                'rokon_briddhi' => ['required'],
                'rokon_gatti' => ['required'],
                'rokon_target' => ['required'],

                'worker_previous' => ['required'],
                'worker_present' => ['required'],
                'worker_briddhi' => ['required'],
                'worker_gatti' => ['required'],
                'worker_target' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }


            $data->rokon_previous = request()->rokon_previous;
            $data->rokon_present = request()->rokon_present;
            $data->rokon_briddhi = request()->rokon_briddhi;
            $data->rokon_gatti = request()->rokon_gatti;
            $data->rokon_target = request()->rokon_target;

            $data->worker_previous = request()->worker_previous;
            $data->worker_present = request()->worker_present;
            $data->worker_briddhi = request()->worker_briddhi;
            $data->worker_gatti = request()->worker_gatti;
            $data->worker_target = request()->worker_target;

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
                'id' => ['required', 'exists:songothon1_jonosoktis,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Songothon1Jonosokti::find(request()->id);
            $data->status = 0;
            $data->save();

            return response()->json([
                'result' => 'deactivated',
            ], 200);
        }

        public function destroy()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:songothon1_jonosoktis,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Songothon1Jonosokti::find(request()->id);
            $data->delete();

            return response()->json([
                'result' => 'deleted',
            ], 200);
        }

        public function restore()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:songothon1_jonosoktis,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Songothon1Jonosokti::find(request()->id);
            $data->status = 1;
            $data->save();

            return response()->json([
                'result' => 'activated',
            ], 200);
        }
}
