<?php

namespace App\Http\Controllers\Unit\Actions\UnitUser;

use App\Models\User;
use App\Models\Organization\OrgUnitUser;
use App\Models\Organization\OrgUnitResponsible;
use Illuminate\Support\Facades\DB;

class DestroyData
{
    public static function execute($id)
    {
        try {
            DB::beginTransaction();
            $user = User::where('id', $id)->first();
            if (!$user) {
                return messageResponse('Data not found...', null, 404, 'error');
            }
            // Delete related OrgUnitUser
            OrgUnitUser::where('user_id', $user->id)->forceDelete();
            // Delete related OrgUnitResponsible
            OrgUnitResponsible::where('user_id', $user->id)->forceDelete();
            // Add more related deletions if needed
            $user->forceDelete();
            DB::commit();
            return messageResponse('Item Successfully deleted', [], 200, 'success');
        } catch (\Exception $e) {
            DB::rollBack();
            return messageResponse($e->getMessage(), [], 500, 'server_error');
        }
    }
}