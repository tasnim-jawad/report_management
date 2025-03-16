<?php

namespace App\Http\Controllers\Bm\Ward\Income;

use App\Http\Controllers\Controller;
use App\Models\Bm\Ward\Income\WardBmIncome;
use App\Models\Bm\Ward\Income\WardBmIncomeCategory;
use App\Models\Report\ReportManagementControl;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WardBmIncomeController extends Controller
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

            $query = WardBmIncome::where('status', $status)->orderBy($orderBy, $orderByType);
            // $query = User::latest()->get();

            if (request()->has('search_key')) {
                $key = request()->search_key;
                $query->where(function ($q) use ($key) {
                    return $q->where('id', '%' . $key . '%')
                    ->orWhere('user_id', '%' . $key . '%')
                    ->orWhere('ward_id', '%' . $key . '%')
                    ->orWhere('thana_id', '%' . $key . '%')
                    ->orWhere('city_id', '%' . $key . '%')
                    ->orWhere('amount', '%' . $key . '%')
                    ->orWhere('date', '%' . $key . '%')
                    ->orWhere('ward_bm_income_category_id', '%' . $key . '%');

                });
            }

            $data = $query->paginate($paginate);
            return response()->json($data);
        }

        public function single_ward(){
            $passed_date = Carbon::parse(request()->all()['month']);
            $passed_month = $passed_date->month;
            $passed_year = $passed_date->year;
            // dd($passed_month ,$passed_year );
            $permission = ReportManagementControl::where('report_type', 'ward')
                                                ->where('is_active', 1)
                                                ->latest()
                                                ->first();
            $permitted_date = $permission && $permission->month_year ? Carbon::parse($permission->month_year) : null;
            $permitted_month = $permitted_date ? $permitted_date->month : null;
            $permitted_year = $permitted_date ? $permitted_date->year : null;

            if($passed_month == $permitted_month && $passed_year == $permitted_year){
                $is_permitted = true;
            }else{
                $is_permitted = false;
            }

            $ward_id = auth()->user()->org_ward_user["ward_id"];
            $data = WardBmIncome::with('ward_bm_income_category')
                            ->where('ward_id',$ward_id)
                            ->whereMonth('month',$passed_month)
                            ->whereYear('month',$passed_year)
                            ->get();
            // dd($data);
            $total_income =$data->sum('amount');

            return response()->json([
                'status'=>'success',
                'is_permitted' => $is_permitted,
                'data'=>$data,
                'total_income'=>$total_income,
            ],200);
        }

        public function bm_income_report($user_id,$ward_bm_income_category_id){

            $year = Carbon::now()->year;
            $filter = WardBmIncome::where('user_id',$user_id)->where('ward_bm_income_category_id',$ward_bm_income_category_id)
                            ->whereYear('month',$year );
            $tatal = $filter->sum('amount');
            $data = $filter->with('ward_bm_income_category')->with('user')->get();
            $month_count = $data->count();

            // dd($user_id,$bm_category_id,$year ,$filter ,$tatal ,$data,$month_count);
            if ($data) {
                return response([
                    'status'=> "success",
                    'data' => $data,
                    'total' => $tatal,
                    'month_count' => $month_count,
                ],200);
            } else {
                return response()->json([
                    'err_message' => 'data not found',
                    'errors' => [
                        'user' => [],
                    ],
                ], 200);
            }
        }

        public function bm_income_total($month){
            $org_ward_user = User::where('id', auth()->user()->id)->with('org_ward_user')->get()->first()->org_ward_user;
            $date = Carbon::parse($month);
            $query = WardBmIncome::query();
            $filter = $query->whereYear('month',$date->clone()->year)->whereMonth('month',$date->clone()->month)->where('ward_id',$org_ward_user->ward_id);
            $category = $filter->with('ward_bm_income_category')->pluck(' ')->all();
            $category_all_id = array_values(array_unique($category));
            $total_income = $filter->sum('amount');

            $data=[];
            // dd($category_all_id);
            foreach($category_all_id as $index => $item){
                $testQuery = WardBmIncome::query();
                $totalAmount = $testQuery->whereYear('month',$date->clone()->year)
                                        ->whereMonth('month',$date->clone()->month)
                                        ->where('bm_category_id',$item)
                                        ->where('unit_id',$org_ward_user->ward_id)
                                        ->sum('amount');
                $WardBmIncomeCategory= WardBmIncomeCategory::find($item);
                $data[$index]['amount']= $totalAmount;
                $data[$index]['category'] = $WardBmIncomeCategory->title;
            }
            // dd($total_income);

            if ($data) {
                return response([
                    'status'=> "success",
                    'data' => $data,
                    'total_income' => $total_income,
                ],200);
            } else {
                return response()->json([
                    'err_message' => 'data not found',
                    'errors' => [
                        'user' => [],
                    ],
                ], 200);
            }
        }

        public function show($id)
        {

            $select = ["*"];
            if (request()->has('select_all') && request()->select_all) {
                $select = "*";
            }
            $data = WardBmIncome::with('ward_bm_income_category')->where('id', $id)
                ->select($select)
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
            $permission  = ReportManagementControl::where('report_type', 'ward')
                                                ->where('is_active', 1)
                                                ->latest()
                                                ->first();

            $permitted_date = $permission && $permission->month_year ? Carbon::parse($permission->month_year) : null;
            $permitted_month = $permitted_date ? $permitted_date->month : null;
            $permitted_year = $permitted_date ? $permitted_date->year : null;

            // $permitted_date = Carbon::parse($permission->month_year);
            // $permitted_month = $permitted_date->month;
            // $permitted_year = $permitted_date->year;
            $ward_info = (object) auth()->user()->org_ward_user;

            $existing_data = WardBmIncome::where('ward_id',$ward_info->ward_id)
                                        ->where('ward_bm_income_category_id',request()->all()['ward_bm_income_category_id'])
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
            $validator = Validator::make(request()->all(), [
                'amount' => ['required'],
                'ward_bm_income_category_id' => ['required'],
                'month' => ['required', 'date'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $permission  = ReportManagementControl::where('report_type', 'ward')
                                                ->where('is_active', 1)
                                                ->latest()
                                                ->first();
            if(!$permission){
                return response()->json([
                    'err_message' => 'Permission denied',
                    'errors' => [['You do not have the necessary permissions']],
                ], 403);
            }

            $passed_date = Carbon::parse(request()->month);
            $passed_month = $passed_date->clone()->month;
            $passed_year = $passed_date->clone()->year;

            $permitted_date = Carbon::parse($permission->month_year);
            $permitted_month = $permitted_date->month;
            $permitted_year = $permitted_date->year;

            if($passed_month != $permitted_month || $passed_year !=  $permitted_year){
                return response()->json([
                    'err_message' => 'Permission denied',
                    'errors' => [['You do not have the necessary permissions']],
                ], 403);
            }

            $ward_info = (object) auth()->user()->org_ward_user;

            $already_have_data = WardBmIncome::where('ward_id',$ward_info->ward_id)
                                        ->where('ward_bm_income_category_id',request()->ward_bm_income_category_id)
                                        ->whereYear('month',$permitted_year)
                                        ->whereMonth('month',$permitted_month)
                                        ->exists();
            if($already_have_data){
                $data = WardBmIncome::where('user_id',$ward_info->user_id)
                                ->where('ward_id',$ward_info->ward_id)
                                ->where('thana_id',$ward_info->thana_id)
                                ->where('city_id',$ward_info->city_id)
                                ->whereYear('month',$permitted_year)
                                ->whereMonth('month',$permitted_month)
                                ->where('ward_bm_income_category_id',request()->ward_bm_income_category_id)
                                ->first();

                $data->amount = request()->amount;
                $data->creator =  $ward_info->user_id;
                $data->save();
                return response()->json($data, 200);

            }else{

                $data = new WardBmIncome();
                $data->user_id = $ward_info->user_id;
                $data->ward_id = $ward_info->ward_id;
                $data->thana_id = $ward_info->thana_id;
                $data->city_id = $ward_info->city_id;
                $data->amount = request()->amount;
                $data->month = $permission->month_year;
                $data->ward_bm_income_category_id = request()->ward_bm_income_category_id;

                $data->creator =  $ward_info->user_id;
                $data->save();

                return response()->json($data, 200);
            }
        }

        public function update()
        {
            $data = WardBmIncome::find(request()->id);
            if (!$data) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
                ], 422);
            }

            $validator = Validator::make(request()->all(), [
                'amount' => ['required'],
                'ward_bm_income_category_id' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $passed_date = Carbon::parse($data->month);
            $passed_month = $passed_date->month;
            $passed_year = $passed_date->year;
            $permission = ReportManagementControl::where('report_type', 'ward')
                                                ->where('is_active', 1)
                                                ->latest()
                                                ->first();
            $permitted_date = $permission && $permission->month_year ? Carbon::parse($permission->month_year) : null;
            $permitted_month = $permitted_date ? $permitted_date->month : null;
            $permitted_year = $permitted_date ? $permitted_date->year : null;

            if($passed_month == $permitted_month && $passed_year == $permitted_year){
                $ward_info = (object) auth()->user()->org_ward_user;

                $data->user_id = $ward_info->user_id;
                $data->ward_id = $ward_info->ward_id;
                $data->thana_id = $ward_info->thana_id;
                $data->city_id = $ward_info->city_id;
                $data->amount = request()->amount;
                $data->ward_bm_income_category_id = request()->ward_bm_income_category_id;

                $data->creator = auth()->id();
                $data->save();

                return response()->json($data, 200);

            }else{
                return response()->json([
                    'err_message' => 'Permission denied',
                    'errors' => [['You do not have the necessary permissions']],
                ], 403);
            }

        }

        public function soft_delete()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:ward_bm_incomes,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = WardBmIncome::find(request()->id);
            $data->status = 0;
            $data->save();

            return response()->json([
                'result' => 'deactivated',
            ], 200);
        }

        public function destroy()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:ward_bm_incomes,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = WardBmIncome::find(request()->id);
            $data->delete();

            return response()->json([
                'result' => 'deleted',
            ], 200);
        }

        public function restore()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:ward_bm_incomes,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = WardBmIncome::find(request()->id);
            $data->status = 1;
            $data->save();

            return response()->json([
                'result' => 'activated',
            ], 200);
        }
}
