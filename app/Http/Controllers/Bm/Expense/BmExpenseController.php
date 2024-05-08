<?php

namespace App\Http\Controllers\Bm\Expense;

use App\Http\Controllers\Controller;
use App\Models\Bm\Expense\BmExpense;
use App\Models\Bm\Expense\BmExpenseCategory;
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
                    ->orWhere('user_id', '%' . $key . '%')
                    ->orWhere('unit_id', '%' . $key . '%')
                    ->orWhere('ward_id', '%' . $key . '%')
                    ->orWhere('thana_id', '%' . $key . '%')
                    ->orWhere('city_id', '%' . $key . '%')
                    ->orWhere('amount', '%' . $key . '%')
                    ->orWhere('date', '%' . $key . '%')
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
            $unit_id = auth()->user()->org_unit_user["unit_id"];
            // dd($month);
            $data = BmExpense::with('bm_expense_category')->where('unit_id',$unit_id)->get()->all();
            // dd($data);
            return response([
                'data' => $data,
                'status' => 'success'
            ]);
        }

        public function bm_total_expense($month){
            $org_unit_user = User::where('id', auth()->user()->id)->with('org_unit_user')->get()->first()->org_unit_user;
            // dd($org_unit_user->unit_id);
            $date = Carbon::parse($month);
            $query = BmExpense::query();
            $filter = $query->whereYear('date',$date->clone()->year)->whereMonth('date',$date->clone()->month)->where('unit_id',$org_unit_user->unit_id);
            $total_expense = $filter->sum('amount');
            $category_id = $filter->with('bm_expense_category')->pluck('bm_expense_category_id')->all();
            // dd($total_expense,$category_id);
            $category_unique_id = array_values(array_unique($category_id));
            // dd($category_unique_id);

            $data=[];
            // dd($category_all_id);
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
            // dd($category_unique_id,$data,$total_expense);
            // dd($total_income);

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

            $unit_info = (object) auth()->user()->org_unit_user;

            $data = new BmExpense();
            $data->user_id = $unit_info->user_id;
            $data->unit_id = $unit_info->unit_id;
            $data->ward_id = $unit_info->ward_id;
            $data->thana_id = $unit_info->thana_id;
            $data->city_id = $unit_info->city_id;
            $data->amount = request()->amount;
            $data->date = Carbon::now();
            $data->bm_expense_category_id = request()->bm_expense_category_id;

            $data->creator = auth()->id();
            $data->save();

            return response()->json($data, 200);
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
