<?php

namespace App\Http\Controllers\Bm\Ward\Expense;

use App\Http\Controllers\Controller;
use App\Models\Bm\Ward\Expense\WardExpenseTarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class WardExpenseTargetController extends Controller
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

        $query = WardExpenseTarget::where('status', $status)->orderBy($orderBy, $orderByType)->with('ward_bm_expense_category');
        // $query = User::latest()->get();

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', '%' . $key . '%')
                    ->orWhere('ward_id', '%' . $key . '%')
                    ->orWhere('thana_id', '%' . $key . '%')
                    ->orWhere('city_id', '%' . $key . '%')
                    ->orWhere('ward_bm_expense_category_id', '%' . $key . '%')
                    ->orWhere('amount', '%' . $key . '%')
                    ->orWhere('start_from', '%' . $key . '%');
            });
        }
        // dd($query->paginate($paginate)->toArray());
        $datas = $query->paginate($paginate);
        return response([
            'data' => $datas,
            'status' => 'success'
        ]);
    }
    public function thana_wise(){
        $thana_info = (object) auth()->user()->org_thana_user;
        $latest_ward_targets = WardExpenseTarget::select(
                            'ward_expense_targets.id',
                            'ward_expense_targets.ward_id',
                            'ward_expense_targets.thana_id',
                            'ward_expense_targets.city_id',
                            'ward_expense_targets.ward_bm_expense_category_id',
                            'ward_expense_targets.start_from',
                            'ward_expense_targets.amount'
                        )
                        ->joinSub(
                            DB::table('ward_expense_targets')
                                ->select(
                                    'ward_id',
                                    'thana_id',
                                    'city_id',
                                    'ward_bm_expense_category_id',
                                    DB::raw('MAX(start_from) as latest_start_from')
                                )
                                ->groupBy( 'ward_id', 'thana_id', 'city_id', 'ward_bm_expense_category_id'),
                            'latest',
                            function ($join) {
                                $join->on('ward_expense_targets.ward_id', '=', 'latest.ward_id')
                                    ->on('ward_expense_targets.thana_id', '=', 'latest.thana_id')
                                    ->on('ward_expense_targets.city_id', '=', 'latest.city_id')
                                    ->on('ward_expense_targets.ward_bm_expense_category_id', '=', 'latest.ward_bm_expense_category_id')
                                    ->on('ward_expense_targets.start_from', '=', 'latest.latest_start_from');
                            }
                        )
                        ->with(['ward_bm_expense_category', 'org_ward'])
                        ->orderBy('ward_bm_expense_category_id', 'asc')
                        ->get();

        // dd($latest_ward_targets->toArray());
        // dd($targets->toArray());
        return response([
            'data' => $latest_ward_targets,
            'status' => 'success'
        ]);
    }

    public function show($id)
    {
        $select = ["*"];
        if (request()->has('select_all') && request()->select_all) {
            $select = "*";
        }
        $data = WardExpenseTarget::where('id', $id)
            ->select($select)
            ->with('ward_bm_expense_category')
            ->with('org_ward')
            ->first();
            // dd($data);
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
            'ward_id' => ['required'],
            'ward_bm_expense_category_id' => ['required'],
            'amount' => ['required'],
            'start_from' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        $thana_info = (object) auth()->user()->org_thana_user;

        $data = new WardExpenseTarget();
        $data->ward_id = request()->ward_id;
        $data->thana_id = $thana_info->thana_id;
        $data->city_id = $thana_info->city_id;
        $data->amount = request()->amount;
        $data->ward_bm_expense_category_id = request()->ward_bm_expense_category_id;
        $data->start_from = request()->start_from;

        $data->creator = auth()->id();
        $data->save();

        return response()->json($data, 200);
    }

    public function update()
    {
        $data = WardExpenseTarget::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'ward_id' => ['required'],
            'ward_bm_expense_category_id' => ['required'],
            'amount' => ['required'],
            'start_from' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        $thana_info = (object) auth()->user()->org_thana_user;

        $data->ward_id = request()->ward_id;
        $data->thana_id = $thana_info->thana_id;
        $data->city_id = $thana_info->city_id;
        $data->amount = request()->amount;
        $data->ward_bm_expense_category_id = request()->ward_bm_expense_category_id;
        $data->start_from = request()->start_from;

        $data->creator = auth()->id();
        $data->update();

        return response()->json($data, 200);
    }

    public function soft_delete()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:ward_expense_targets,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = WardExpenseTarget::find(request()->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:ward_expense_targets,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = WardExpenseTarget::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:ward_expense_targets,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = WardExpenseTarget::find(request()->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }
}
