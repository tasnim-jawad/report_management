<?php

namespace App\Http\Controllers\Unit\Actions\UnitUser;

use App\Models\Organization\OrgUnitResponsible;
use App\Models\Organization\OrgUnitUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class SoftDelete
{
    public static function execute()
    {
        try {
            DB::beginTransaction();
            $user = User::where('id', request()->id)->first();
            if (!$user) {
                return messageResponse('Data not found...', null, 404, 'error');
            }
            // Delete related OrgUnitUser
            OrgUnitUser::where('user_id', $user->id)->delete();
            // Delete related OrgUnitResponsible
            OrgUnitResponsible::where('user_id', $user->id)->delete();
            // Add more related deletions if needed
            $user->delete();
            DB::commit();
            return messageResponse('Item Successfully soft deleted', [], 200, 'success');
        } catch (\Exception $e) {
            DB::rollBack();
            return messageResponse($e->getMessage(),[], 500, 'server_error');
        }
    }
}