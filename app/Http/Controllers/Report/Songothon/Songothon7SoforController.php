<?php

namespace App\Http\Controllers\Report\Songothon;

use App\Http\Controllers\Controller;
use App\Models\Report\Songothon\Songothon7Sofor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Songothon7SoforController extends Controller
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

            $query = Songothon7Sofor::where('status', $status)->orderBy($orderBy, $orderByType);
            // $query = User::latest()->get();

            if (request()->has('search_key')) {
                $key = request()->search_key;
                $query->where(function ($q) use ($key) {
                    return $q->where('id', '%' . $key . '%')
                    ->orWhere('upper_leader_sofor', '%' . $key . '%');
                    // ->orWhere('ward_sovapotir_sofor', '%' . $key . '%')
                    // ->orWhere('word_sura_sodosso_sofor', '%' . $key . '%')
                    // ->orWhere('zilla_mohanogor_leader_sofor', '%' . $key . '%')
                    // ->orWhere('upozilla_thana_amir_leader_sofor', '%' . $key . '%')
                    // ->orWhere('upozilla_thana_kormoporisod_team_sodosso_sofor', '%' . $key . '%')
                    // ->orWhere('zilla_mohanogor_woman_deparment_leader_sofor', '%' . $key . '%')
                    // ->orWhere('upozilla_thana_woman_deparment_secretariate_sofor', '%' . $key . '%')
                    // ->orWhere('upozilla_thana_woman_deparment_team_member_sofor', '%' . $key . '%');

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
            $data = Songothon7Sofor::where('id', $id)
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
                'upper_leader_sofor' => ['required'],
                // 'ward_sovapotir_sofor' => ['required'],
                // 'word_sura_sodosso_sofor' => ['required'],
                // 'zilla_mohanogor_leader_sofor' => ['required'],
                // 'upozilla_thana_amir_leader_sofor' => ['required'],
                // 'upozilla_thana_kormoporisod_team_sodosso_sofor' => ['required'],
                // 'zilla_mohanogor_woman_deparment_leader_sofor' => ['required'],
                // 'upozilla_thana_woman_deparment_secretariate_sofor' => ['required'],
                // 'upozilla_thana_woman_deparment_team_member_sofor' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = new Songothon7Sofor();
            $data->upper_leader_sofor = request()->upper_leader_sofor;
            // $data->ward_sovapotir_sofor = request()->ward_sovapotir_sofor;
            // $data->word_sura_sodosso_sofor = request()->word_sura_sodosso_sofor;

            // $data->zilla_mohanogor_leader_sofor = request()->zilla_mohanogor_leader_sofor;
            // $data->upozilla_thana_amir_leader_sofor = request()->upozilla_thana_amir_leader_sofor;
            // $data->upozilla_thana_kormoporisod_team_sodosso_sofor = request()->upozilla_thana_kormoporisod_team_sodosso_sofor;

            // $data->zilla_mohanogor_woman_deparment_leader_sofor = request()->zilla_mohanogor_woman_deparment_leader_sofor;
            // $data->upozilla_thana_woman_deparment_secretariate_sofor = request()->upozilla_thana_woman_deparment_secretariate_sofor;
            // $data->upozilla_thana_woman_deparment_team_member_sofor = request()->upozilla_thana_woman_deparment_team_member_sofor;

            $data->creator = request()->creator;
            $data->status = request()->status;
            $data->save();

            return response()->json($data, 200);
        }

        public function update()
        {
            $data = Songothon7Sofor::find(request()->id);
            if (!$data) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
                ], 422);
            }

            $validator = Validator::make(request()->all(), [
                'upper_leader_sofor' => ['required'],
                // 'ward_sovapotir_sofor' => ['required'],
                // 'word_sura_sodosso_sofor' => ['required'],
                // 'zilla_mohanogor_leader_sofor' => ['required'],
                // 'upozilla_thana_amir_leader_sofor' => ['required'],
                // 'upozilla_thana_kormoporisod_team_sodosso_sofor' => ['required'],
                // 'zilla_mohanogor_woman_deparment_leader_sofor' => ['required'],
                // 'upozilla_thana_woman_deparment_secretariate_sofor' => ['required'],
                // 'upozilla_thana_woman_deparment_team_member_sofor' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }


            $data->upper_leader_sofor = request()->upper_leader_sofor;
            // $data->ward_sovapotir_sofor = request()->ward_sovapotir_sofor;
            // $data->word_sura_sodosso_sofor = request()->word_sura_sodosso_sofor;
            // $data->zilla_mohanogor_leader_sofor = request()->zilla_mohanogor_leader_sofor;
            // $data->upozilla_thana_amir_leader_sofor = request()->upozilla_thana_amir_leader_sofor;
            // $data->upozilla_thana_kormoporisod_team_sodosso_sofor = request()->upozilla_thana_kormoporisod_team_sodosso_sofor;
            // $data->zilla_mohanogor_woman_deparment_leader_sofor = request()->zilla_mohanogor_woman_deparment_leader_sofor;
            // $data->upozilla_thana_woman_deparment_secretariate_sofor = request()->upozilla_thana_woman_deparment_secretariate_sofor;
            // $data->upozilla_thana_woman_deparment_team_member_sofor = request()->upozilla_thana_woman_deparment_team_member_sofor;

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
                'id' => ['required', 'exists:songothon7_sofors,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Songothon7Sofor::find(request()->id);
            $data->status = 0;
            $data->save();

            return response()->json([
                'result' => 'deactivated',
            ], 200);
        }

        public function destroy()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:songothon7_sofors,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Songothon7Sofor::find(request()->id);
            $data->delete();

            return response()->json([
                'result' => 'deleted',
            ], 200);
        }

        public function restore()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:songothon7_sofors,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Songothon7Sofor::find(request()->id);
            $data->status = 1;
            $data->save();

            return response()->json([
                'result' => 'activated',
            ], 200);
        }
}
