<?php

namespace App\Http\Controllers\Unit\Actions\UnitUser;

use Illuminate\Container\Attributes\Auth;

class GetAllData
{
    static $model = \App\Models\User::class;

    public static function execute()
    {
        try {
            $pageLimit = request()->input('limit') ?? 10;
            $orderByColumn = request()->input('sort_by_col') ?? 'id';
            $orderByType = request()->input('sort_type') ?? 'desc';
            $status = request()->input('status') ?? 1;
            $fields = request()->input('fields') ?? '*';
            $start_date = request()->input('start_date');
            $end_date = request()->input('end_date');
            $with = ['user_class', 'org_unit_user', 'org_unit_responsible'];
            $condition = [];

            if (request()->has('unit_id') && request()->input('unit_id')) {
                $condition['org_unit_user.unit_id'] = request()->input('unit_id');
            }elseif (Auth::user() && Auth::user()->org_unit_user && Auth::user()->org_unit_user->unit_id) {
                $condition['org_unit_user.unit_id'] = Auth::user()->org_unit_user->unit_id;
            }else {
                return messageResponse('Unit is not defind', [], 400, 'invalid_data');
            }
            
            $data = self::$model::query();

            if (request()->has('search') && request()->input('search')) {
                $searchKey = request()->input('search');
                $data = $data->where(function ($q) use ($searchKey) {
                    $q->where('full_name', 'like', '%' . $searchKey . '%');   
                    $q->orWhere('email', 'like', '%' . $searchKey . '%');  
                    $q->orWhere('phone', 'like', '%' . $searchKey . '%'); 
                    $q->orWhere('telegram_id', 'like', '%' . $searchKey . '%');            
                });
            }

            if ($start_date && $end_date) {
                 if ($end_date > $start_date) {
                    $data->whereBetween('created_at', [$start_date . ' 00:00:00', $end_date . ' 23:59:59']);
                } elseif ($end_date == $start_date) {
                    $data->whereDate('created_at', $start_date);
                }
            }

            if ($status == 'trased') {
                $data = $data->trased();
            }

            if (request()->has('get_all') && (int)request()->input('get_all') === 1) {
                $data = $data
                    ->with($with)
                    ->select($fields)
                    ->where($condition)
                    ->where('status', $status)
                    ->limit($pageLimit)
                    ->orderBy($orderByColumn, $orderByType)
                    ->get();
                     return entityResponse($data);
            } else if ($status == 'trased') {
                $data = $data
                    ->with($with)
                    ->select($fields)
                    ->where($condition)
                    ->orderBy($orderByColumn, $orderByType)
                    ->paginate($pageLimit);
            } else {
                $data = $data
                    ->with($with)
                    ->select($fields)
                    ->where($condition)
                    ->where('status', $status)
                    ->orderBy($orderByColumn, $orderByType)
                    ->paginate($pageLimit);
            }

            return entityResponse([
                ...$data->toArray(),
                "active_data_count" => self::$model::active()->count(),
                "inactive_data_count" => self::$model::inactive()->count(),
                "trased_data_count" => self::$model::trased()->count(),
            ]);

        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), [], 500, 'server_error');
        }
    }
}