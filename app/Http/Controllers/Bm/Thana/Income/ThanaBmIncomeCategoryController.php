<?php

namespace App\Http\Controllers\Bm\Thana\Income;

use App\Http\Controllers\Controller;
use App\Models\Bm\Thana\Income\ThanaBmIncomeCategory;
use Illuminate\Http\Request;
use App\Models\Bm\Ward\Income\WardBmIncome;
use App\Models\Bm\Ward\Income\WardBmIncomeCategory;
use App\Models\Report\ReportManagementControl;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class ThanaBmIncomeCategoryController extends Controller
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

        $query = ThanaBmIncomeCategory::where('status', $status)->orderBy($orderBy, $orderByType);
        // $query = User::latest()->get();

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', '%' . $key . '%')
                    ->orWhere('title', '%' . $key . '%')
                    ->orWhere('description', '%' . $key . '%');
            });
        }

        $datas = $query->paginate($paginate);
        return response()->json($datas);
    }
    public function parent_category()
    {
        $datas = ThanaBmIncomeCategory::where('parent_id', 0)
            ->orderBy('id', 'asc')
            ->where('status', 1)
            ->get();
        // dd("parent_category ward income",$datas);

        return response()->json($datas);
    }

    public function show($id)
    {

        $select = ["*"];
        if (request()->has('select_all') && request()->select_all) {
            $select = "*";
        }
        $data = ThanaBmIncomeCategory::where('id', $id)
            ->select($select)
            ->with('parent_income_category')
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
            'title' => ['required'],
            'description' => ['required'],
            'parent_id' => ['nullable', 'integer', 'exists:ward_bm_income_categories,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new ThanaBmIncomeCategory();
        $data->title = request()->title;
        $data->description = request()->description;
        $data->parent_id = request()->parent_id;
        $data->creator = auth()->id();
        $data->save();

        return response()->json($data, 200);
    }

    public function update()
    {
        $data = ThanaBmIncomeCategory::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'title' => ['required'],
            'description' => ['required'],
            'parent_id' => ['nullable', 'integer', 'exists:ward_bm_income_categories,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->title = request()->title;
        $data->description = request()->description;
        $data->parent_id = request()->parent_id;
        $data->creator = auth()->id();
        $data->save();

        return response()->json($data, 200);
    }

    public function soft_delete()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:ward_bm_income_categories,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = ThanaBmIncomeCategory::find(request()->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:ward_bm_income_categories,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = ThanaBmIncomeCategory::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:ward_bm_income_categories,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = ThanaBmIncomeCategory::find(request()->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }
}