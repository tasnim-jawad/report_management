<?php

namespace App\Http\Controllers\Report\Department;

use App\Http\Controllers\Controller;
use App\Models\Report\Department\Department6MosjidDawahInfomationCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Department6MosjidDawahInfomationCenterController extends Controller
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

            $query = Department6MosjidDawahInfomationCenter::where('status', $status)->orderBy($orderBy, $orderByType);
            // $query = User::latest()->get();

            if (request()->has('search_key')) {
                $key = request()->search_key;
                $query->where(function ($q) use ($key) {
                    return $q->where('id', '%' . $key . '%')
                    ->orWhere('total_mosjid', '%' . $key . '%')
                    ->orWhere('total_mosjid_increase', '%' . $key . '%')

                    ->orWhere('dawat_included_mosjid', '%' . $key . '%')
                    ->orWhere('dawat_included_mosjid_increase', '%' . $key . '%')

                    ->orWhere('mosjid_wise_dawah_center', '%' . $key . '%')
                    ->orWhere('mosjid_wise_dawah_center_increase', '%' . $key . '%')

                    ->orWhere('general_dawah_center', '%' . $key . '%')
                    ->orWhere('general_dawah_center_increase', '%' . $key . '%')

                    ->orWhere('mosjid_information_center', '%' . $key . '%')
                    ->orWhere('mosjid_information_center_increase', '%' . $key . '%')

                    ->orWhere('general_information_center', '%' . $key . '%')
                    ->orWhere('general_information_center_increase', '%' . $key . '%')

                    ->orWhere('trained_educated_dayee', '%' . $key . '%')
                    ->orWhere('trained_educated_dayee_increase', '%' . $key . '%');

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
            $data = Department6MosjidDawahInfomationCenter::where('id', $id)
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
                'total_mosjid' => ['required'],
                'total_mosjid_increase' => ['required'],
                'dawat_included_mosjid' => ['required'],
                'dawat_included_mosjid_increase' => ['required'],
                'mosjid_wise_dawah_center' => ['required'],
                'mosjid_wise_dawah_center_increase' => ['required'],
                'general_dawah_center' => ['required'],
                'general_dawah_center_increase' => ['required'],
                'mosjid_information_center' => ['required'],
                'mosjid_information_center_increase' => ['required'],
                'general_information_center' => ['required'],
                'general_information_center_increase' => ['required'],
                'trained_educated_dayee' => ['required'],
                'trained_educated_dayee_increase' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = new Department6MosjidDawahInfomationCenter();
            $data->total_mosjid = request()->total_mosjid;
            $data->total_mosjid_increase = request()->total_mosjid_increase;
            $data->dawat_included_mosjid = request()->dawat_included_mosjid;
            $data->dawat_included_mosjid_increase = request()->dawat_included_mosjid_increase;
            $data->mosjid_wise_dawah_center = request()->mosjid_wise_dawah_center;
            $data->mosjid_wise_dawah_center_increase = request()->mosjid_wise_dawah_center_increase;
            $data->general_dawah_center = request()->general_dawah_center;
            $data->general_dawah_center_increase = request()->general_dawah_center_increase;
            $data->mosjid_information_center = request()->mosjid_information_center;
            $data->mosjid_information_center_increase = request()->mosjid_information_center_increase;
            $data->general_information_center = request()->general_information_center;
            $data->general_information_center_increase = request()->general_information_center_increase;
            $data->trained_educated_dayee = request()->trained_educated_dayee;
            $data->trained_educated_dayee_increase = request()->trained_educated_dayee_increase;

            $data->creator = request()->creator;
            $data->status = request()->status;
            $data->save();

            return response()->json($data, 200);
        }

        public function update()
        {
            $data = Department6MosjidDawahInfomationCenter::find(request()->id);
            if (!$data) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
                ], 422);
            }

            $validator = Validator::make(request()->all(), [
                'total_mosjid' => ['required'],
                'total_mosjid_increase' => ['required'],
                'dawat_included_mosjid' => ['required'],
                'dawat_included_mosjid_increase' => ['required'],
                'mosjid_wise_dawah_center' => ['required'],
                'mosjid_wise_dawah_center_increase' => ['required'],
                'general_dawah_center' => ['required'],
                'general_dawah_center_increase' => ['required'],
                'mosjid_information_center' => ['required'],
                'mosjid_information_center_increase' => ['required'],
                'general_information_center' => ['required'],
                'general_information_center_increase' => ['required'],
                'trained_educated_dayee' => ['required'],
                'trained_educated_dayee_increase' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }


            $data->total_mosjid = request()->total_mosjid;
            $data->total_mosjid_increase = request()->total_mosjid_increase;
            $data->dawat_included_mosjid = request()->dawat_included_mosjid;
            $data->dawat_included_mosjid_increase = request()->dawat_included_mosjid_increase;
            $data->mosjid_wise_dawah_center = request()->mosjid_wise_dawah_center;
            $data->mosjid_wise_dawah_center_increase = request()->mosjid_wise_dawah_center_increase;
            $data->general_dawah_center = request()->general_dawah_center;
            $data->general_dawah_center_increase = request()->general_dawah_center_increase;
            $data->mosjid_information_center = request()->mosjid_information_center;
            $data->mosjid_information_center_increase = request()->mosjid_information_center_increase;
            $data->general_information_center = request()->general_information_center;
            $data->general_information_center_increase = request()->general_information_center_increase;
            $data->trained_educated_dayee = request()->trained_educated_dayee;
            $data->trained_educated_dayee_increase = request()->trained_educated_dayee_increase;

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
                'id' => ['required', 'exists:department6_mosjid_dawah_infomation_centers,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Department6MosjidDawahInfomationCenter::find(request()->id);
            $data->status = 0;
            $data->save();

            return response()->json([
                'result' => 'deactivated',
            ], 200);
        }

        public function destroy()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:department6_mosjid_dawah_infomation_centers,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Department6MosjidDawahInfomationCenter::find(request()->id);
            $data->delete();

            return response()->json([
                'result' => 'deleted',
            ], 200);
        }

        public function restore()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:department6_mosjid_dawah_infomation_centers,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Department6MosjidDawahInfomationCenter::find(request()->id);
            $data->status = 1;
            $data->save();

            return response()->json([
                'result' => 'activated',
            ], 200);
        }
}
