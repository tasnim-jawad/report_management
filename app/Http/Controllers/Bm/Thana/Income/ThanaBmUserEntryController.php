<?php

namespace App\Http\Controllers\Bm\Thana\Income;

use App\Http\Controllers\Controller;
use App\Models\Bm\Thana\Income\ThanaBmUserEntry;
use App\Models\Report\ReportManagementControl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ThanaBmUserEntryController extends Controller
{
    public function all()
    {
        $paginate = (int) request()->paginate ?? 10;
        $orderBy = request()->orderBy ?? 'id';
        $orderByType = request()->orderByType ?? 'ASC';
        $with = ['thana_bm_income_category','user'];

        $status = 1;
        if (request()->has('status')) {
            $status = request()->status;
        }
        // dd($status);

        $query = ThanaBmUserEntry::where('status', $status)->orderBy($orderBy, $orderByType);
        // $query = User::latest()->get();

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', '%' . $key . '%')
                ->orWhere('user_id', '%' . $key . '%')
                ->orWhere('thana_id', '%' . $key . '%')
                ->orWhere('city_id', '%' . $key . '%')
                ->orWhere('amount', '%' . $key . '%')
                ->orWhere('date', '%' . $key . '%')
                ->orWhere('thana_bm_income_category_id', '%' . $key . '%');

            });
        }

        $data = $query->with($with)->paginate($paginate);
        return response()->json([
            'status' => "success",
            'data' => $data,
        ]);
    }

    public function show($id)
    {

        $select = ["*"];
        $with = ['user'];
        if (request()->has('select_all') && request()->select_all) {
            $select = "*";
        }
        $data = ThanaBmUserEntry::with('thana_bm_income_category')->where('id', $id)
            ->select($select)
            ->with($with )
            ->first();
        if ($data) {
            return response([
                'status'=> "success",
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

    public function existing_data(){
        $permission  = ReportManagementControl::where('report_type', 'thana')
                                            ->where('is_active', 1)
                                            ->latest()
                                            ->first();
        $permitted_date = Carbon::parse($permission->month_year);
        $permitted_month = $permitted_date->month;
        $permitted_year = $permitted_date->year;
        $thana_info = (object) auth()->user()->org_thana_user;

        $existing_data = ThanaBmUserEntry::where('thana_id',$thana_info->thana_id)
                                    ->where('thana_bm_income_category_id',request()->all()['category_id'])
                                    ->whereYear('month',$permitted_year)
                                    ->whereMonth('month',$permitted_month)
                                    ->first();
        // dd($existing_data->amount);
        if($existing_data){
            return response()->json([
                'status'=>'success',
                'amount' => $existing_data->amount,
            ],200);
        }else{
            return response()->json([
                'status'=>'success',
                'amount' => '',
            ],200);
        }

    }
    public function store()
    {
        // dd(request()->all());
        $validator = Validator::make(request()->all(), [
            'user_id' => ['required'],
            'thana_bm_income_category_id' => ['required'],
            'month' => ['required', 'date'],
            'amount' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $passed_date = Carbon::parse(request()->month);
        $passed_month = $passed_date->clone()->month;
        $passed_year = $passed_date->clone()->year;


        $thana_info = (object) auth()->user()->org_thana_user;

        
            $data = new ThanaBmUserEntry();
            $data->user_id = request()->user_id;
            $data->thana_id = $thana_info->thana_id;
            $data->city_id = $thana_info->city_id;
            $data->amount = request()->amount;
            $data->month = $passed_date;
            $data->thana_bm_income_category_id = request()->thana_bm_income_category_id;

            $data->creator =  $thana_info->user_id;
            $data->save();

            return response()->json($data, 200);
       
    }

    public function update()
    {
        $data = ThanaBmUserEntry::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'user_id' => ['required'],
            'thana_bm_income_category_id' => ['required'],
            'month' => ['required'],
            'amount' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $unit_info = (object) auth()->user()->org_unit_user;

        $data->user_id = request()->user_id;
        // $data->unit_id = $unit_info->unit_id;
        // $data->ward_id = $unit_info->ward_id;
        // $data->thana_id = $unit_info->thana_id;
        // $data->city_id = $unit_info->city_id;
        $data->thana_bm_income_category_id = request()->thana_bm_income_category_id;
        $data->month = request()->month;
        $data->amount = request()->amount;

        $data->creator = auth()->id();
        $data->save();

        return response()->json($data, 200);
    }

    public function soft_delete()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:thana_bm_user_entries,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = ThanaBmUserEntry::find(request()->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        // dd(request()->all());
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:thana_bm_user_entries,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = ThanaBmUserEntry::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:thana_bm_user_entries,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = ThanaBmUserEntry::find(request()->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }
}
