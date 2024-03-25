<?php

namespace App\Http\Controllers\Report\Songothon;

use App\Http\Controllers\Controller;
use App\Models\Report\Songothon\Songothon2AssociateMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Songothon2AssociateMemberController extends Controller
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

            $query = Songothon2AssociateMember::where('status', $status)->orderBy($orderBy, $orderByType);
            // $query = User::latest()->get();

            if (request()->has('search_key')) {
                $key = request()->search_key;
                $query->where(function ($q) use ($key) {
                    return $q->where('id', '%' . $key . '%')
                    ->orWhere('men_previous', '%' . $key . '%')
                    ->orWhere('men_present', '%' . $key . '%')
                    ->orWhere('men_briddhi', '%' . $key . '%')
                    ->orWhere('men_target', '%' . $key . '%')

                    ->orWhere('women_previous', '%' . $key . '%')
                    ->orWhere('women_present', '%' . $key . '%')
                    ->orWhere('women_briddhi', '%' . $key . '%')
                    ->orWhere('women_target', '%' . $key . '%')

                    ->orWhere('vinno_dormalombi_previous', '%' . $key . '%')
                    ->orWhere('vinno_dormalombi_present', '%' . $key . '%')
                    ->orWhere('vinno_dormalombi_briddhi', '%' . $key . '%')
                    ->orWhere('vinno_domalombi_target', '%' . $key . '%');


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
            $data = Songothon2AssociateMember::where('id', $id)
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
                'men_previous' => ['required'],
                'men_present' => ['required'],
                'men_briddhi' => ['required'],
                'men_target' => ['required'],

                'women_previous' => ['required'],
                'women_present' => ['required'],
                'women_briddhi' => ['required'],
                'women_target' => ['required'],

                'vinno_dormalombi_previous' => ['required'],
                'vinno_dormalombi_present' => ['required'],
                'vinno_dormalombi_briddhi' => ['required'],
                'vinno_domalombi_target' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = new Songothon2AssociateMember();
            $data->men_previous = request()->men_previous;
            $data->men_present = request()->men_present;
            $data->men_briddhi = request()->men_briddhi;
            $data->men_target = request()->men_target;
            $data->women_previous = request()->women_previous;
            $data->women_present = request()->women_present;
            $data->women_briddhi = request()->women_briddhi;
            $data->women_target = request()->women_target;
            $data->vinno_dormalombi_previous = request()->vinno_dormalombi_previous;
            $data->vinno_dormalombi_present = request()->vinno_dormalombi_present;
            $data->vinno_dormalombi_briddhi = request()->vinno_dormalombi_briddhi;
            $data->vinno_domalombi_target = request()->vinno_domalombi_target;

            $data->creator = request()->creator;
            $data->status = request()->status;
            $data->save();

            return response()->json($data, 200);
        }

        public function update()
        {
            $data = Songothon2AssociateMember::find(request()->id);
            if (!$data) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
                ], 422);
            }

            $validator = Validator::make(request()->all(), [
                'men_previous' => ['required'],
                'men_present' => ['required'],
                'men_briddhi' => ['required'],
                'men_target' => ['required'],

                'women_previous' => ['required'],
                'women_present' => ['required'],
                'women_briddhi' => ['required'],
                'women_target' => ['required'],

                'vinno_dormalombi_previous' => ['required'],
                'vinno_dormalombi_present' => ['required'],
                'vinno_dormalombi_briddhi' => ['required'],
                'vinno_domalombi_target' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }


            $data->men_previous = request()->men_previous;
            $data->men_present = request()->men_present;
            $data->men_briddhi = request()->men_briddhi;
            $data->men_target = request()->men_target;
            $data->women_previous = request()->women_previous;
            $data->women_present = request()->women_present;
            $data->women_briddhi = request()->women_briddhi;
            $data->women_target = request()->women_target;
            $data->vinno_dormalombi_previous = request()->vinno_dormalombi_previous;
            $data->vinno_dormalombi_present = request()->vinno_dormalombi_present;
            $data->vinno_dormalombi_briddhi = request()->vinno_dormalombi_briddhi;
            $data->vinno_domalombi_target = request()->vinno_domalombi_target;

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
                'id' => ['required', 'exists:songothon2_associate_members,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Songothon2AssociateMember::find(request()->id);
            $data->status = 0;
            $data->save();

            return response()->json([
                'result' => 'deactivated',
            ], 200);
        }

        public function destroy()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:songothon2_associate_members,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Songothon2AssociateMember::find(request()->id);
            $data->delete();

            return response()->json([
                'result' => 'deleted',
            ], 200);
        }

        public function restore()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:songothon2_associate_members,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Songothon2AssociateMember::find(request()->id);
            $data->status = 1;
            $data->save();

            return response()->json([
                'result' => 'activated',
            ], 200);
        }
}
