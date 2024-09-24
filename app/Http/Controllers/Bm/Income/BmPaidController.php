<?php

namespace App\Http\Controllers\Bm\Income;

use App\Http\Controllers\Controller;
use App\Models\Bm\Income\BmCategory;
use App\Models\Bm\Income\BmCategoryUser;
use App\Models\Bm\Income\BmPaid;
use App\Models\Report\ReportManagementControl;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BmPaidController extends Controller
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

            $query = BmPaid::where('status', $status)->orderBy($orderBy, $orderByType);
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
                    ->orWhere('bm_category_id', '%' . $key . '%');

                });
            }

            $data = $query->paginate($paginate);
            return response()->json($data);
        }

        public function single_unit(){
            $permission  = ReportManagementControl::where('report_type', 'unit')
                                                ->where('is_active', 1)
                                                ->latest()
                                                ->first();
            $monthYear = Carbon::parse($permission->month_year);
            $month = $monthYear->month;
            $year = $monthYear->year;

            $unit_id = auth()->user()->org_unit_user["unit_id"];
            $data = BmPaid::with('bm_category')
                            ->where('unit_id',$unit_id)
                            ->whereMonth('month',$month)
                            ->whereYear('month',$year)
                            ->get();
            // dd($data);
            $total_paid =$data->sum('amount');

            return response()->json([
                'status'=>'success',
                'data'=>$data,
                'total_paid'=>$total_paid,
            ],200);
        }

        public function bm_paid_report($user_id,$bm_category_id){

            $year = Carbon::now()->year;
            $filter = BmPaid::where('user_id',$user_id)->where('bm_category_id',$bm_category_id)
                            ->whereYear('month',$year );
            $tatal = $filter->sum('amount');
            $data = $filter->with('bm_category')->with('user')->get();
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

        public function bm_total($month){
            $org_unit_user = User::where('id', auth()->user()->id)->with('org_unit_user')->get()->first()->org_unit_user;
            $date = Carbon::parse($month);
            $query = BmPaid::query();
            $filter = $query->whereYear('month',$date->clone()->year)->whereMonth('month',$date->clone()->month)->where('unit_id',$org_unit_user->unit_id);
            $category = $filter->with('bm_category')->pluck('bm_category_id')->all();
            $category_all_id = array_values(array_unique($category));
            $total_income = $filter->sum('amount');

            $data=[];
            // dd($category_all_id);
            foreach($category_all_id as $index => $item){
                $testQuery = BmPaid::query();
                $totalAmount = $testQuery->whereYear('month',$date->clone()->year)
                                        ->whereMonth('month',$date->clone()->month)
                                        ->where('bm_category_id',$item)
                                        ->where('unit_id',$org_unit_user->unit_id)
                                        ->sum('amount');
                $bmCategory= BmCategory::find($item);
                $data[$index]['amount']= $totalAmount;
                $data[$index]['category'] = $bmCategory->title;
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
            $data = BmPaid::with('bm_category')->where('id', $id)
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
        public function store()
        {
            $validator = Validator::make(request()->all(), [
                'amount' => ['required'],
                'bm_category_id' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $unit_info = (object) auth()->user()->org_unit_user;
            // dd($unit_info->user_id);
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
            

            $data = new BmPaid();
            $data->user_id = $unit_info->user_id;
            $data->unit_id = $unit_info->unit_id;
            $data->ward_id = $unit_info->ward_id;
            $data->thana_id = $unit_info->thana_id;
            $data->city_id = $unit_info->city_id;
            $data->amount = request()->amount;
            $data->month = $permission->month_year;
            $data->bm_category_id = request()->bm_category_id;

            $data->creator =  $unit_info->user_id;
            $data->save();

            return response()->json($data, 200);
        }

        public function update()
        {
            $data = BmPaid::find(request()->id);
            if (!$data) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
                ], 422);
            }

            $validator = Validator::make(request()->all(), [
                'amount' => ['required'],
                'bm_category_id' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $unit_info = (object) auth()->user()->org_unit_user;

            $data->user_id = $unit_info->user_id;
            $data->unit_id = $unit_info->unit_id;
            $data->ward_id = $unit_info->ward_id;
            $data->thana_id = $unit_info->thana_id;
            $data->city_id = $unit_info->city_id;
            $data->amount = request()->amount;
            $data->bm_category_id = request()->bm_category_id;

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
                'id' => ['required', 'exists:bm_paids,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = BmPaid::find(request()->id);
            $data->status = 0;
            $data->save();

            return response()->json([
                'result' => 'deactivated',
            ], 200);
        }

        public function destroy()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:bm_paids,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = BmPaid::find(request()->id);
            $data->delete();

            return response()->json([
                'result' => 'deleted',
            ], 200);
        }

        public function restore()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:bm_paids,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = BmPaid::find(request()->id);
            $data->status = 1;
            $data->save();

            return response()->json([
                'result' => 'activated',
            ], 200);
        }
}
