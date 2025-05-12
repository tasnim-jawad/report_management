<?php

namespace App\Http\Controllers\Bm\Thana\Expense;

use App\Http\Controllers\Controller;
use App\Models\Bm\Thana\Expense\ThanaBmExpense;
use App\Models\Bm\Thana\Expense\ThanaBmExpenseCategory;
use App\Models\Report\ReportManagementControl;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ThanaBmExpenseController extends Controller
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

        $query = ThanaBmExpense::where('status', $status)->orderBy($orderBy, $orderByType);
        // $query = User::latest()->get();

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', '%' . $key . '%')
                    ->orWhere('user_id', 'LIKE', '%' . $key . '%')
                    ->orWhere('thana_id', 'LIKE',  '%' . $key . '%')
                    ->orWhere('city_id', 'LIKE',  '%' . $key . '%')
                    ->orWhere('amount', 'LIKE',  '%' . $key . '%')
                    ->orWhere('date', 'LIKE',  '%' . $key . '%');
            });
        }

        $datas = $query->paginate($paginate);
        return response([
            'data' => $datas,
            'status' => 'success'
        ]);
    }

    public function single_thana()
    {
        $passed_date = Carbon::parse(request()->all()['month']);
        $passed_month = $passed_date->month;
        $passed_year = $passed_date->year;

        $permission  = ReportManagementControl::where('report_type', 'thana')
            ->where('is_active', 1)
            ->latest()
            ->first();
        $permitted_date = $permission && $permission->month_year ? Carbon::parse($permission->month_year) : null;
        $permitted_month = $permitted_date ? $permitted_date->month : null;
        $permitted_year = $permitted_date ? $permitted_date->year : null;
        // dd($passed_month,$permitted_month);
        if ($passed_month == $permitted_month && $passed_year == $permitted_year) {
            $is_permitted = true;
        } else {
            $is_permitted = false;
        }
        // dd(auth()->user(),auth()->user()->org_thana_user["thana_id"]);
        $thana_id = auth()->user()->org_thana_user["thana_id"];
        $data = ThanaBmExpense::with('thana_bm_expense_category')
            ->where('thana_id', $thana_id)
            ->whereMonth('date', $passed_month)
            ->whereYear('date', $passed_year)
            ->get();
        // dd($data);
        $total_expense = $data->sum('amount');

        return response()->json([
            'status' => 'success',
            'is_permitted' => $is_permitted,
            'data' => $data,
            'total_expense' => $total_expense,
        ], 200);
    }

    public function bm_total_expense($month)
    {
        $org_thana_user = User::where('id', auth()->user()->id)->with('org_thana_user')->get()->first()->org_thana_user;
        $date = Carbon::parse($month);
        $query = ThanaBmExpense::query();
        $filter = $query->whereYear('date', $date->clone()->year)->whereMonth('date', $date->clone()->month)->where('thana_id', $org_thana_user->thana_id);
        $total_expense = $filter->sum('amount');
        $category_id = $filter->with('thana_bm_expense_category')->pluck('thana_bm_expense_category_id')->all();
        $category_unique_id = array_values(array_unique($category_id));

        $data = [];
        foreach ($category_unique_id as $index => $item) {
            $testQuery = ThanaBmExpense::query();
            $totalAmount = $testQuery->whereYear('date', $date->clone()->year)
                ->whereMonth('date', $date->clone()->month)
                ->where('thana_bm_expense_category_id', $item)
                ->where('thana_id', $org_thana_user->thana_id)
                ->sum('amount');
            $bmCategory = ThanaBmExpenseCategory::find($item);
            $data[$index]['amount'] = $totalAmount;
            $data[$index]['category'] = $bmCategory->title;
        }

        if ($data) {
            return response([
                'status' => "success",
                'data' => $data,
                'total_expense' => $total_expense,
            ], 200);
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
        $data = ThanaBmExpense::with('thana_bm_expense_category')->where('id', $id)
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
    public function existing_data()
    {
        // dd(request()->all()['category_id']);
        $permission  = ReportManagementControl::where('report_type', 'thana')
            ->where('is_active', 1)
            ->latest()
            ->first();

        $permitted_date = $permission && $permission->month_year ? Carbon::parse($permission->month_year) : null;
        $permitted_month = $permitted_date ? $permitted_date->month : null;
        $permitted_year = $permitted_date ? $permitted_date->year : null;
        if (!$permitted_date) {
            return response()->json([
                'status' => 'success',
                'amount' => '',
            ], 200);
        }
        // $permitted_date = Carbon::parse($permission->month_year);
        // $permitted_month = $permitted_date->month;
        // $permitted_year = $permitted_date->year;
        $thana_info = (object) auth()->user()->org_thana_user;

        $existing_data = ThanaBmExpense::where('thana_id', $thana_info->thana_id)
            ->where('thana_bm_expense_category_id', request()->all()['category_id'])
            ->whereYear('date', $permitted_year)
            ->whereMonth('date', $permitted_month)
            ->first();
        // dd($existing_data->amount);
        if ($existing_data) {
            return response()->json([
                'status' => 'success',
                'amount' => $existing_data->amount,
            ], 200);
        } else {
            return response()->json([
                'status' => 'success',
                'amount' => '',
            ], 200);
        }
    }
    public function store()
    {
        // dd(request()->all());
        $validator = Validator::make(request()->all(), [
            'amount' => ['required', 'integer'],
            'thana_bm_expense_category_id' => ['required'],
            'month' => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $month = Carbon::parse(request()->month);
        $upper_organization_id = auth()->user()->org_thana_user->city_id;

        $permission = ReportManagementControl::whereYear('month_year', $month->clone()->year)
            ->whereMonth('month_year', $month->clone()->month)
            ->where('is_active', 1)
            ->where('report_type', 'thana')
            ->where('upper_organization_id', $upper_organization_id)
            ->latest()
            ->first();

        // $permission  = ReportManagementControl::where('report_type', 'thana')
        //     ->where('is_active', 1)
        //     ->latest()
        //     ->first();
        if (!$permission) {
            return response()->json([
                'err_message' => 'Permission denied',
                'errors' => [['You do not have the necessary permissions']],
            ], 403);
        }

        // $passed_date = Carbon::parse(request()->month);
        // $passed_month = $passed_date->clone()->month;
        // $passed_year = $passed_date->clone()->year;

        $permitted_date = Carbon::parse($permission->month_year);
        $permitted_month = $permitted_date->month;
        $permitted_year = $permitted_date->year;

        // if ($passed_month != $permitted_month || $passed_year !=  $permitted_year) {
        //     return response()->json([
        //         'err_message' => 'Permission denied',
        //         'errors' => [['You do not have the necessary permissions']],
        //     ], 403);
        // }
        // dd(auth()->user());
        $thana_info = (object) auth()->user()->org_thana_user;

        $already_have_data = ThanaBmExpense::where('thana_id', $thana_info->thana_id)
            ->where('thana_bm_expense_category_id', request()->thana_bm_expense_category_id)
            ->whereYear('date', $permitted_year)
            ->whereMonth('date', $permitted_month)
            ->exists();

        if ($already_have_data) {
            $data = ThanaBmExpense::where('user_id', $thana_info->user_id)

                ->where('thana_id', $thana_info->thana_id)
                ->where('city_id', $thana_info->city_id)
                ->whereYear('date', $permitted_year)
                ->whereMonth('date', $permitted_month)
                ->where('thana_bm_expense_category_id', request()->thana_bm_expense_category_id)
                ->first();
            $data->amount = request()->amount;
            $data->creator =  $thana_info->user_id;
            $data->save();

            return response()->json($data, 200);
        } else {
            $data = new ThanaBmExpense();
            $data->user_id = $thana_info->user_id;
            $data->thana_id = $thana_info->thana_id;
            $data->city_id = $thana_info->city_id;
            $data->amount = request()->amount;
            $data->date = $permission->month_year;
            $data->thana_bm_expense_category_id = request()->thana_bm_expense_category_id;

            $data->creator = auth()->id();
            $data->save();

            return response()->json($data, 200);
        }
    }

    public function update()
    {
        $data = ThanaBmExpense::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'amount' => ['required', 'integer'],
            'thana_bm_expense_category_id' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        // dd($data);
        $passed_date = Carbon::parse($data->date);
        $passed_month = $passed_date->month;
        $passed_year = $passed_date->year;
        $permission = ReportManagementControl::where('report_type', 'thana')
            ->where('is_active', 1)
            ->latest()
            ->first();
        $permitted_date = $permission && $permission->month_year ? Carbon::parse($permission->month_year) : null;
        $permitted_month = $permitted_date ? $permitted_date->month : null;
        $permitted_year = $permitted_date ? $permitted_date->year : null;


        if ($passed_month == $permitted_month && $passed_year == $permitted_year) {
            $data->amount = request()->amount;
            $data->thana_bm_expense_category_id = request()->thana_bm_expense_category_id;

            $data->creator = auth()->id();
            $data->save();

            return response()->json($data, 200);
        } else {
            return response()->json([
                'err_message' => 'Permission denied',
                'errors' => [['You do not have the necessary permissions']],
            ], 403);
        }
    }

    public function soft_delete()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:thana_bm_expenses,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = ThanaBmExpense::find(request()->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:thana_bm_expenses,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = ThanaBmExpense::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:thana_bm_expenses,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = ThanaBmExpense::find(request()->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }
}