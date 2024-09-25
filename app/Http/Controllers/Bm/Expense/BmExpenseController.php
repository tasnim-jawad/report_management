<?php

namespace App\Http\Controllers\Bm\Expense;

use App\Http\Controllers\Controller;
use App\Models\Bm\Expense\BmExpense;
use App\Models\Bm\Expense\BmExpenseCategory;
use App\Models\Report\ReportManagementControl;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BmExpenseController extends Controller
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

            $query = BmExpense::where('status', $status)->orderBy($orderBy, $orderByType);
            // $query = User::latest()->get();

            if (request()->has('search_key')) {
                $key = request()->search_key;
                $query->where(function ($q) use ($key) {
                    return $q->where('id', '%' . $key . '%')
                    ->orWhere('user_id','LIKE', '%' . $key . '%')
                    ->orWhere('unit_id','LIKE',  '%' . $key . '%')
                    ->orWhere('ward_id','LIKE',  '%' . $key . '%')
                    ->orWhere('thana_id','LIKE',  '%' . $key . '%')
                    ->orWhere('city_id','LIKE',  '%' . $key . '%')
                    ->orWhere('amount','LIKE',  '%' . $key . '%')
                    ->orWhere('date','LIKE',  '%' . $key . '%')
                    ->orWhere('bm_expense_category_id', '%' . $key . '%');

                });
            }

            $datas = $query->paginate($paginate);
            return response([
                'data' => $datas,
                'status' => 'success'
            ]);
        }

        public function single_unit(){
            $passed_date = Carbon::parse(request()->all()['month']);
            $passed_month = $passed_date->month;
            $passed_year = $passed_date->year;

            $permission  = ReportManagementControl::where('report_type', 'unit')
                                                ->where('is_active', 1)
                                                ->latest()
                                                ->first();
            $permitted_date = Carbon::parse($permission->month_year);
            $permitted_month = $permitted_date->month;
            $permitted_year = $permitted_date->year;

            if($passed_month == $permitted_month && $passed_year == $permitted_year){
                $is_permitted = true;
            }else{
                $is_permitted = false;
            }

            $unit_id = auth()->user()->org_unit_user["unit_id"];
            $data = BmExpense::with('bm_expense_category')
                                ->where('unit_id',$unit_id)
                                ->whereMonth('date',$passed_month)
                                ->whereYear('date',$passed_year)
                                ->get();
            // dd($data);
            $total_expense =$data->sum('amount');

            return response()->json([
                'status'=>'success',
                'is_permitted' => $is_permitted,
                'data'=>$data,
                'total_expense'=>$total_expense,
            ],200);
        }

        public function bm_total_expense($month){
            $org_unit_user = User::where('id', auth()->user()->id)->with('org_unit_user')->get()->first()->org_unit_user;
            $date = Carbon::parse($month);
            $query = BmExpense::query();
            $filter = $query->whereYear('date',$date->clone()->year)->whereMonth('date',$date->clone()->month)->where('unit_id',$org_unit_user->unit_id);
            $total_expense = $filter->sum('amount');
            $category_id = $filter->with('bm_expense_category')->pluck('bm_expense_category_id')->all();
            $category_unique_id = array_values(array_unique($category_id));

            $data=[];
            foreach($category_unique_id as $index => $item){
                $testQuery = BmExpense::query();
                $totalAmount = $testQuery->whereYear('date',$date->clone()->year)
                                    ->whereMonth('date',$date->clone()->month)
                                    ->where('bm_expense_category_id',$item)
                                    ->where('unit_id',$org_unit_user->unit_id)
                                    ->sum('amount');
                $bmCategory= BmExpenseCategory::find($item);
                $data[$index]['amount']= $totalAmount;
                $data[$index]['category'] = $bmCategory->title;
            }

            if ($data) {
                return response([
                    'status'=> "success",
                    'data' => $data,
                    'total_expense' => $total_expense,
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
            $data = BmExpense::with('bm_expense_category')->where('id', $id)
                ->select($select)
                ->first();
            if ($data) {
                return response([
                    'data' => $data,
                    'status' => 'success'
                ]);
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
            // dd(request()->all()['category_id']);
            $permission  = ReportManagementControl::where('report_type', 'unit')
                                                ->where('is_active', 1)
                                                ->latest()
                                                ->first();
            $permitted_date = Carbon::parse($permission->month_year);
            $permitted_month = $permitted_date->month;
            $permitted_year = $permitted_date->year;
            $unit_info = (object) auth()->user()->org_unit_user;

            $existing_data = BmExpense::where('unit_id',$unit_info->unit_id)
                                        ->where('bm_expense_category_id',request()->all()['category_id'])
                                        ->whereYear('date',$permitted_year)
                                        ->whereMonth('date',$permitted_month)
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
                'bm_expense_category_id' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }


            $permission  = ReportManagementControl::where('report_type', 'unit')
                                                ->where('is_active', 1)
                                                ->latest()
                                                ->first();
            if(!$permission){
                return response()->json([
                    'err_message' => 'Permission denied',
                    'errors' => [['You do not have the necessary permissions']],
                ], 403);
            }

            $permitted_date = Carbon::parse($permission->month_year);
            $permitted_month = $permitted_date->month;
            $permitted_year = $permitted_date->year;
            $unit_info = (object) auth()->user()->org_unit_user;

            $already_have_data = BmExpense::where('unit_id',$unit_info->unit_id)
                                        ->where('bm_expense_category_id',request()->bm_expense_category_id)
                                        ->whereYear('date',$permitted_year)
                                        ->whereMonth('date',$permitted_month)
                                        ->exists();

            if($already_have_data){
                $data = BmExpense::where('unit_id',$unit_info->unit_id)
                                ->where('user_id',$unit_info->user_id)
                                ->where('ward_id',$unit_info->ward_id)
                                ->where('thana_id',$unit_info->thana_id)
                                ->where('city_id',$unit_info->city_id)
                                ->whereYear('date',$permitted_year)
                                ->whereMonth('date',$permitted_month)
                                ->where('bm_expense_category_id',request()->bm_expense_category_id)
                                ->first();
                $data->amount = request()->amount;
                $data->creator =  $unit_info->user_id;
                $data->save();

                return response()->json($data, 200);
            }else{
                $data = new BmExpense();
                $data->user_id = $unit_info->user_id;
                $data->unit_id = $unit_info->unit_id;
                $data->ward_id = $unit_info->ward_id;
                $data->thana_id = $unit_info->thana_id;
                $data->city_id = $unit_info->city_id;
                $data->amount = request()->amount;
                $data->date = $permission->month_year;
                $data->bm_expense_category_id = request()->bm_expense_category_id;

                $data->creator = auth()->id();
                $data->save();

                return response()->json($data, 200);
            }



        }

        public function update()
        {
            $data = BmExpense::find(request()->id);
            if (!$data) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
                ], 422);
            }

            $validator = Validator::make(request()->all(), [
                'amount' => ['required'],
                'bm_expense_category_id' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }


            $data->amount = request()->amount;
            $data->bm_expense_category_id = request()->bm_expense_category_id;

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
                'id' => ['required', 'exists:bm_expenses,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = BmExpense::find(request()->id);
            $data->status = 0;
            $data->save();

            return response()->json([
                'result' => 'deactivated',
            ], 200);
        }

        public function destroy()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:bm_expenses,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = BmExpense::find(request()->id);
            $data->delete();

            return response()->json([
                'result' => 'deleted',
            ], 200);
        }

        public function restore()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:bm_expenses,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = BmExpense::find(request()->id);
            $data->status = 1;
            $data->save();

            return response()->json([
                'result' => 'activated',
            ], 200);
        }
}
