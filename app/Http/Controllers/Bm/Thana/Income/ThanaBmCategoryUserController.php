<?php

namespace App\Http\Controllers\Bm\Thana\Income;

use App\Http\Controllers\Controller;
use App\Models\Bm\Thana\Income\ThanaBmCategoryUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ThanaBmCategoryUserController extends Controller
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

            $query = ThanaBmCategoryUser::where('status', $status)->orderBy($orderBy, $orderByType);
            // $query = User::latest()->get();

            if (request()->has('search_key')) {
                $key = request()->search_key;
                $query->where(function ($q) use ($key) {
                    return $q->where('id', '%' . $key . '%')
                    ->orWhere('user_id', '%' . $key . '%')
                    ->orWhere('thana_id', '%' . $key . '%')
                    ->orWhere('city_id', '%' . $key . '%')
                    ->orWhere('amount', '%' . $key . '%')
                    ->orWhere('thana_bm_income_category_id', '%' . $key . '%');

                });
            }

            $datas = $query->paginate($paginate);
            return response()->json($datas);
        }

        public function single_thana(){
            $thana_id = auth()->user()->org_thana_user["thana_id"];
            // dd($month);
            $data = ThanaBmCategoryUser::with('thana_bm_income_category')->with('user')->where('thana_id',$thana_id)->get()->all();
            return response()->json($data);
        }


        public function show_target($user_id,$thana_bm_income_category_id){

            $select = ["*"];
            if (request()->has('select_all') && request()->select_all) {
                $select = "*";
            }
            $data = ThanaBmCategoryUser::where('user_id', $user_id)->where('thana_bm_income_category_id',$thana_bm_income_category_id)
                ->select($select)
                ->first();

            // dd($data);
            if ($data) {
                return response([
                    'status' => "success",
                    'data' => $data,
                ],200);
            } else {
                // return "data not found";
                return response()->json([
                    'err_message' => 'data not found',
                    'errors' => [
                        'user' => [],
                    ],
                ],200);
            }
        }


        public function show($id)
        {

            $select = ["*"];
            if (request()->has('select_all') && request()->select_all) {
                $select = "*";
            }
            $data = ThanaBmCategoryUser::with('thana_bm_income_category')->where('id', $id)
                ->select($select)
                ->first();
            if ($data) {
                return response([
                    'status' => "success",
                    'data' => $data,
                ],200);
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
                'amount' => ['required'],
                'thana_bm_income_category_id' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $thana_info = (object) auth()->user()->org_thana_user;
            // dd($thana_info);
            $check = ThanaBmCategoryUser::where('user_id',request()->user_id)->where('thana_bm_income_category_id',request()->thana_bm_income_category_id)->get()->first();
            if(!$check){
                $data = new ThanaBmCategoryUser();
                $data->user_id = request()->user_id;
                $data->thana_id = $thana_info->thana_id;
                $data->city_id = $thana_info->city_id;
                $data->amount = request()->amount;
                $data->thana_bm_income_category_id = request()->thana_bm_income_category_id;
                $data->is_active = request()->is_active;

                $data->creator = auth()->id();
                $data->save();

                return response([
                    'status' => 'success',
                    'data' => $data,

                ],200);
            }else {
                return response()->json([
                    'err_message' => 'data not found',
                    'errors' => [
                        'user' => [],
                    ],
                ], 200);
            }

        }

        public function update()
        {
            $data = ThanaBmCategoryUser::find(request()->id);
            if (!$data) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
                ], 422);
            }

            $validator = Validator::make(request()->all(), [
                'amount' => ['required'],
                'thana_bm_income_category_id' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $thana_info = (object) auth()->user()->org_thana_user;

            $data->user_id = $thana_info->user_id;
            $data->thana_id = $thana_info->thana_id;
            $data->city_id = $thana_info->city_id;
            $data->amount = request()->amount;
            $data->thana_bm_income_category_id = request()->thana_bm_income_category_id;

            $data->creator = auth()->id();
            $data->save();

            if (request()->hasFile('image')) {
                //
            }
            return response()->json($data, 200);
        }

        public function soft_delete()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:thana_bm_category_users,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = ThanaBmCategoryUser::find(request()->id);
            $data->status = 0;
            $data->save();

            return response()->json([
                'result' => 'deactivated',
            ], 200);
        }

        public function destroy()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:thana_bm_category_users,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = ThanaBmCategoryUser::find(request()->id);
            $data->delete();

            return response()->json([
                'result' => 'deleted',
            ], 200);
        }

        public function restore()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:thana_bm_category_users,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = ThanaBmCategoryUser::find(request()->id);
            $data->status = 1;
            $data->save();

            return response()->json([
                'result' => 'activated',
            ], 200);
        }
}