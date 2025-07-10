<?php

namespace App\Http\Controllers\Unit\Actions\UnitUser;

use App\Models\Organization\OrgUnit;
use App\Models\User;
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

            $unit_id = request()->query('unit_id') ?? optional(auth()->user()->org_unit_user)->unit_id;
            if (!$unit_id) {
                return messageResponse('Unit is not defined', [], 400, 'invalid_data');
            }

            $unit = OrgUnit::find($unit_id);
            if (!$unit) {
                return messageResponse('Unit not found for the provided user.', [], 404, 'not_found');
            }

            $query = User::whereHas('org_unit_user', function ($q) use ($unit_id) {
                        $q->where('unit_id', $unit_id);
                    })
                    ->whereHas('org_unit_responsible', function ($q) {
                        $q->whereNotNull('responsibility_id');
                    })
                    ->with([
                        'user_class',
                        'org_unit_responsible.responsibility'
                    ])
                    ->join('org_unit_responsibles', 'users.id', '=', 'org_unit_responsibles.user_id')
                    ->orderBy('org_unit_responsibles.responsibility_id', 'asc')
                    ->select('users.*');
            
            // 🔍 Apply search filter BEFORE get()
            if (request()->filled('search')) {
                $searchKey = request()->input('search');
                $query->where(function ($q) use ($searchKey) {
                    $q->where('full_name', 'like', '%' . $searchKey . '%')
                        ->orWhere('email', 'like', '%' . $searchKey . '%')
                        ->orWhere('phone', 'like', '%' . $searchKey . '%')
                        ->orWhere('telegram_id', 'like', '%' . $searchKey . '%');
                });
            }
        
            $data = $query->get();

            return entityResponse($data);

        } catch (\Exception $e) {
            return messageResponse($e->getMessage(), [], 500, 'server_error');
        }
    }
}