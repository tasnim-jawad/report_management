<?php

namespace App\Http\Controllers\Unit\Actions\UnitUser;

use App\Models\Organization\OrgUnitUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Organization\OrgUnitResponsible;

class UpdateStatus
{
    public static function execute()
    {
        try {
            DB::beginTransaction();
            $user = User::where('id', request('id'))->first();
            if (!$user) {
                return messageResponse('Data not found...', null, 404, 'error');
            }
            // Toggle status for related OrgUnitUser
            OrgUnitUser::where('user_id', $user->id)->update(['status' => $user->status == 1 ? 0 : 1]);
            // Toggle status for related OrgUnitResponsible
            OrgUnitResponsible::where('user_id', $user->id)->update(['status' => $user->status == 1 ? 0 : 1]);
            
            
            $user->status = $user->status == 1 ? 0 : 1;
            $user->update();
            DB::commit();
            return messageResponse('Item updated successfully', $user, 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return messageResponse($e->getMessage(), [], 500, 'server_error');
        }
    }
}