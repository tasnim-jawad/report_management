<?php

namespace App\Http\Controllers\Bm\Income;

use App\Http\Controllers\Controller;
use App\Models\Bm\Income\BmUserEntry;
use App\Models\Report\ReportManagementControl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BmUserEntryController extends Controller
{
    public function all()
    {
        $paginate = (int) request()->paginate ?? 10;
        $orderBy = request()->orderBy ?? 'id';
        $orderByType = request()->orderByType ?? 'ASC';
        $with = ['bm_category','user'];

        $status = 1;
        if (request()->has('status')) {
            $status = request()->status;
        }
        // dd($status);

        $query = BmUserEntry::where('status', $status)->orderBy($orderBy, $orderByType);
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

        $data = $query->with($with)->paginate($paginate);
        return response()->json([
            'status' => "success",
            'data' => $data,
        ]);
    }

    // public function single_unit(){
    //     $passed_date = Carbon::parse(request()->all()['month']);
    //     $passed_month = $passed_date->month;
    //     $passed_year = $passed_date->year;
    //     // dd($passed_month ,$passed_year );
    //     $permission = ReportManagementControl::where('report_type', 'unit')
    //                                         ->where('is_active', 1)
    //                                         ->latest()
    //                                         ->first();

    //     $permitted_date = $permission && $permission->month_year ? Carbon::parse($permission->month_year) : null;
    //     $permitted_month = $permitted_date ? $permitted_date->month : null;
    //     $permitted_year = $permitted_date ? $permitted_date->year : null;

    //     if($passed_month == $permitted_month && $passed_year == $permitted_year){
    //         $is_permitted = true;
    //     }else{
    //         $is_permitted = false;
    //     }

    //     $unit_id = auth()->user()->org_unit_user["unit_id"];
    //     $data = BmUserEntry::with('bm_category')
    //                     ->where('unit_id',$unit_id)
    //                     ->whereMonth('month',$passed_month)
    //                     ->whereYear('month',$passed_year)
    //                     ->get();
    //     // dd($data);
    //     $total_paid =$data->sum('amount');

    //     return response()->json([
    //         'status'=>'success',
    //         'is_permitted' => $is_permitted,
    //         'data'=>$data,
    //         'total_paid'=>$total_paid,
    //     ],200);
    // }

    // public function bm_paid_report($user_id,$bm_category_id){

    //     $year = Carbon::now()->year;
    //     $filter = BmUserEntry::where('user_id',$user_id)->where('bm_category_id',$bm_category_id)
    //                     ->whereYear('month',$year );
    //     $tatal = $filter->sum('amount');
    //     $data = $filter->with('bm_category')->with('user')->get();
    //     $month_count = $data->count();

    //     // dd($user_id,$bm_category_id,$year ,$filter ,$tatal ,$data,$month_count);
    //     if ($data) {
    //         return response([
    //             'status'=> "success",
    //             'data' => $data,
    //             'total' => $tatal,
    //             'month_count' => $month_count,
    //         ],200);
    //     } else {
    //         return response()->json([
    //             'err_message' => 'data not found',
    //             'errors' => [
    //                 'user' => [],
    //             ],
    //         ], 200);
    //     }
    // }

    // public function bm_total($month){
    //     $org_unit_user = User::where('id', auth()->user()->id)->with('org_unit_user')->get()->first()->org_unit_user;
    //     $date = Carbon::parse($month);
    //     $query = BmUserEntry::query();
    //     $filter = $query->whereYear('month',$date->clone()->year)->whereMonth('month',$date->clone()->month)->where('unit_id',$org_unit_user->unit_id);
    //     $category = $filter->with('bm_category')->pluck('bm_category_id')->all();
    //     $category_all_id = array_values(array_unique($category));
    //     $total_income = $filter->sum('amount');

    //     $data=[];
    //     // dd($category_all_id);
    //     foreach($category_all_id as $index => $item){
    //         $testQuery = BmUserEntry::query();
    //         $totalAmount = $testQuery->whereYear('month',$date->clone()->year)
    //                                 ->whereMonth('month',$date->clone()->month)
    //                                 ->where('bm_category_id',$item)
    //                                 ->where('unit_id',$org_unit_user->unit_id)
    //                                 ->sum('amount');
    //         $bmCategory= BmCategory::find($item);
    //         $data[$index]['amount']= $totalAmount;
    //         $data[$index]['category'] = $bmCategory->title;
    //     }
    //     // dd($total_income);

    //     if ($data) {
    //         return response([
    //             'status'=> "success",
    //             'data' => $data,
    //             'total_income' => $total_income,
    //         ],200);
    //     } else {
    //         return response()->json([
    //             'err_message' => 'data not found',
    //             'errors' => [
    //                 'user' => [],
    //             ],
    //         ], 200);
    //     }
    // }

    public function show($id)
    {

        $select = ["*"];
        $with = ['user'];
        if (request()->has('select_all') && request()->select_all) {
            $select = "*";
        }
        $data = BmUserEntry::with('bm_category')->where('id', $id)
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
        $permission  = ReportManagementControl::where('report_type', 'unit')
                                            ->where('is_active', 1)
                                            ->latest()
                                            ->first();
        $permitted_date = Carbon::parse($permission->month_year);
        $permitted_month = $permitted_date->month;
        $permitted_year = $permitted_date->year;
        $unit_info = (object) auth()->user()->org_unit_user;

        $existing_data = BmUserEntry::where('unit_id',$unit_info->unit_id)
                                    ->where('bm_category_id',request()->all()['category_id'])
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
            'user_id' => ['required'],
            'bm_category_id' => ['required'],
            'month' => ['required', 'date'],
            'amount' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        // $permission  = ReportManagementControl::where('report_type', 'unit')
        //                                     ->where('is_active', 1)
        //                                     ->latest()
        //                                     ->first();
        // if(!$permission){
        //     return response()->json([
        //         'err_message' => 'Permission denied',
        //         'errors' => [['You do not have the necessary permissions']],
        //     ], 403);
        // }

        $passed_date = Carbon::parse(request()->month);
        $passed_month = $passed_date->clone()->month;
        $passed_year = $passed_date->clone()->year;

        // $permitted_date = Carbon::parse($permission->month_year);
        // $permitted_month = $permitted_date->month;
        // $permitted_year = $permitted_date->year;

        // if($passed_month != $permitted_month || $passed_year !=  $permitted_year){
        //     return response()->json([
        //         'err_message' => 'Permission denied',
        //         'errors' => [['You do not have the necessary permissions']],
        //     ], 403);
        // }

        $unit_info = (object) auth()->user()->org_unit_user;

        // $already_have_data = BmUserEntry::where('unit_id',$unit_info->unit_id)
        //                             ->where('bm_category_id',request()->bm_category_id)
        //                             ->whereYear('month',$permitted_year)
        //                             ->whereMonth('month',$permitted_month)
        //                             ->exists();
        // if($already_have_data){
        //     $data = BmUserEntry::where('unit_id',$unit_info->unit_id)
        //                     ->where('user_id',$unit_info->user_id)
        //                     ->where('ward_id',$unit_info->ward_id)
        //                     ->where('thana_id',$unit_info->thana_id)
        //                     ->where('city_id',$unit_info->city_id)
        //                     ->whereYear('month',$permitted_year)
        //                     ->whereMonth('month',$permitted_month)
        //                     ->where('bm_category_id',request()->bm_category_id)
        //                     ->first();

        //     $data->amount = request()->amount;
        //     $data->creator =  $unit_info->user_id;
        //     $data->save();
        //     return response()->json($data, 200);

        // }else{

            $data = new BmUserEntry();
            $data->user_id = $unit_info->user_id;
            $data->unit_id = $unit_info->unit_id;
            $data->ward_id = $unit_info->ward_id;
            $data->thana_id = $unit_info->thana_id;
            $data->city_id = $unit_info->city_id;
            $data->amount = request()->amount;
            $data->month = $passed_date;
            $data->bm_category_id = request()->bm_category_id;

            $data->creator =  $unit_info->user_id;
            $data->save();

            return response()->json($data, 200);
        // }
    }

    public function update()
    {
        $data = BmUserEntry::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'user_id' => ['required'],
            'bm_category_id' => ['required'],
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
        $data->bm_category_id = request()->bm_category_id;
        $data->month = request()->month;
        $data->amount = request()->amount;

        $data->creator = auth()->id();
        $data->save();

        return response()->json($data, 200);
    }

    public function soft_delete()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:bm_user_entries,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = BmUserEntry::find(request()->id);
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
            'id' => ['required', 'exists:bm_user_entries,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = BmUserEntry::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:bm_user_entries,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = BmUserEntry::find(request()->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }
}
