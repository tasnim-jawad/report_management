<?php

namespace App\Http\Controllers\Bm\Expense;

use App\Http\Controllers\Controller;
use App\Models\Bm\Expense\UnitExpenseTarget;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UnitExpenseTargetController extends Controller
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

        $query = UnitExpenseTarget::where('status', $status)->orderBy($orderBy, $orderByType)->with('bm_expense_category');
        // $query = User::latest()->get();

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', '%' . $key . '%')
                    ->orWhere('unit_id', '%' . $key . '%')
                    ->orWhere('ward_id', '%' . $key . '%')
                    ->orWhere('thana_id', '%' . $key . '%')
                    ->orWhere('city_id', '%' . $key . '%')
                    ->orWhere('bm_expense_category_id', '%' . $key . '%')
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
    public function ward_wise(){
        $ward_info = (object) auth()->user()->org_ward_user;
        // dd($ward_info);
        // $targets = UnitExpenseTarget::where('ward_id',$ward_info->ward_id)
        //                             ->where('thana_id',$ward_info->thana_id)
        //                             ->where('city_id',$ward_info->city_id)
        //                             ->where('status', 1 )
        //                             ->with('bm_expense_category')
        //                             ->with('org_unit')
        //                             ->orderBy('id', 'desc')
        //                             ->select('unit_id','ward_id', 'thana_id','city_id','bm_expense_category_id','start_from')
        //                             ->groupBy('unit_id','ward_id', 'thana_id','city_id','bm_expense_category_id')
        //                             ->get()
        //                             ->map(function($item){
        //                                 $item_details = UnitExpenseTarget::where('unit_id', $item->unit_id)
        //                                         ->where('start_from',$item->start_from)
        //                                         ->orderBy('id', 'desc')
        //                                         ->first();

        //                                 $item->id = $item_details->id;
        //                                 $item->amount = $item_details->amount;
        //                                 $item->start_from = $item_details->start_from;
        //                                 return $item;
        //                             });
        $latestUnitTargets = UnitExpenseTarget::select(
                            'unit_expense_targets.id',
                            'unit_expense_targets.unit_id',
                            'unit_expense_targets.ward_id',
                            'unit_expense_targets.thana_id',
                            'unit_expense_targets.city_id',
                            'unit_expense_targets.bm_expense_category_id',
                            'unit_expense_targets.start_from',
                            'unit_expense_targets.amount'
                        )
                        ->joinSub(
                            DB::table('unit_expense_targets')
                                ->select(
                                    'unit_id',
                                    'ward_id',
                                    'thana_id',
                                    'city_id',
                                    'bm_expense_category_id',
                                    DB::raw('MAX(start_from) as latest_start_from')
                                )
                                ->groupBy('unit_id', 'ward_id', 'thana_id', 'city_id', 'bm_expense_category_id'),
                            'latest',
                            function ($join) {
                                $join->on('unit_expense_targets.unit_id', '=', 'latest.unit_id')
                                    ->on('unit_expense_targets.ward_id', '=', 'latest.ward_id')
                                    ->on('unit_expense_targets.thana_id', '=', 'latest.thana_id')
                                    ->on('unit_expense_targets.city_id', '=', 'latest.city_id')
                                    ->on('unit_expense_targets.bm_expense_category_id', '=', 'latest.bm_expense_category_id')
                                    ->on('unit_expense_targets.start_from', '=', 'latest.latest_start_from');
                            }
                        )
                        ->with(['bm_expense_category', 'org_unit'])
                        ->orderBy('bm_expense_category_id', 'asc')
                        ->get();

        // dd($latestUnitTargets->toArray());
        // dd($targets->toArray());
        return response([
            'data' => $latestUnitTargets,
            'status' => 'success'
        ]);
    }

    public function show($id)
    {
        $select = ["*"];
        if (request()->has('select_all') && request()->select_all) {
            $select = "*";
        }
        $data = UnitExpenseTarget::where('id', $id)
            ->select($select)
            ->with('bm_expense_category')
            ->with('org_unit')
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
            'unit_id' => ['required'],
            'bm_expense_category_id' => ['required'],
            'amount' => ['required'],
            'start_from' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        $ward_info = (object) auth()->user()->org_ward_user;

        $data = new UnitExpenseTarget();
        $data->unit_id = request()->unit_id;
        $data->ward_id = $ward_info->ward_id;
        $data->thana_id = $ward_info->thana_id;
        $data->city_id = $ward_info->city_id;
        $data->amount = request()->amount;
        $data->bm_expense_category_id = request()->bm_expense_category_id;
        $data->start_from = request()->start_from;

        $data->creator = auth()->id();
        $data->save();

        return response()->json($data, 200);
    }

    public function update()
    {
        $data = UnitExpenseTarget::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'unit_id' => ['required'],
            'bm_expense_category_id' => ['required'],
            'amount' => ['required'],
            'start_from' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        $ward_info = (object) auth()->user()->org_ward_user;

        $data->unit_id = request()->unit_id;
        $data->ward_id = $ward_info->ward_id;
        $data->thana_id = $ward_info->thana_id;
        $data->city_id = $ward_info->city_id;
        $data->amount = request()->amount;
        $data->bm_expense_category_id = request()->bm_expense_category_id;
        $data->start_from = request()->start_from;

        $data->creator = auth()->id();
        $data->update();

        return response()->json($data, 200);
    }

    public function soft_delete()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:unit_expense_targets,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = UnitExpenseTarget::find(request()->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:unit_expense_targets,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = UnitExpenseTarget::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:unit_expense_targets,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = UnitExpenseTarget::find(request()->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }
}


/*
sql table name is unit_targets find the latest based on start_form date
id,unit_id,start_from
1,1,2024-05-01
2,1,2024-06-01
3,1,2024-07-01
4,2,2024-05-01
5,2,2024-06-01
6,2,2024-07-01

result
3,1,2024-07-01
6,4,2024-07-01


*/


