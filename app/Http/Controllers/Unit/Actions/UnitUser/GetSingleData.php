<?php

namespace App\Http\Controllers\Unit\Actions\UnitUser;

use App\Models\Organization\OrgUnit;
use App\Models\Organization\OrgUnitResponsible;
use \App\Models\User;

class GetSingleData
{
    public static function execute($unit_id)
    {
        try {
            // $user_id = (int) $user_id;
            // if (!$user_id) {
            //     return messageResponse('Invalid user ID provided.', [], 400, 'error');
            // }
            // $user = User::find($user_id);
            // if (!$user) {
            //     return messageResponse('User not found.', [], 404, 'not_found');
            // }

            // $unit_id = User::find($user_id)->org_unit_user["unit_id"];
            
            if (!$unit_id) {
                return messageResponse('User is not associated with any unit.', [], 404, 'not_found');
            }
            $unit = OrgUnit::find($unit_id);
            if (!$unit) {
                return messageResponse('Unit not found for the provided user.', [], 404, 'not_found');
            }

            $responsibility = OrgUnitResponsible::where('user_id', $user_id)->where('org_unit_id', $unit_id)
                ->with('responsibility')
                ->first();
            if (!$responsibility) {
                return messageResponse('No responsibility found for the user in this unit.', [], 404, 'not_found');
            }   

            $data = [
                'user' => $user,
                'unit' => $unit,
                'responsibility' => $responsibility
            ];
            // dd($data);
            return entityResponse($data);
        } catch (\Exception $e) {
            return messageResponse($e->getMessage(),[], 500, 'server_error');
        }
    }
}