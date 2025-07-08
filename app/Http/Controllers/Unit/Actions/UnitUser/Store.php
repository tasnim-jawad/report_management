<?php

namespace App\Http\Controllers\Unit\Actions\UnitUser;

use App\Models\Organization\OrgCity;
use App\Models\Organization\OrgThana;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use \App\Models\User;
use App\Models\Organization\OrgUnit;
use App\Models\Organization\OrgUnitUser;
use App\Models\Organization\OrgUnitResponsible;
use App\Models\Organization\OrgWard;
use App\Models\User\UserRole;

class Store
{
    public static function execute($request)
    {
        try {
            $requestData = $request->validated();
            DB::beginTransaction();

            if (isset($requestData['unit_id'])) {
                $unitExists = OrgUnit::where('id', $requestData['unit_id'])->exists();
                if (!$unitExists) {
                    return messageResponse('The provided unit does not exist', [], 400, 'invalid_data');
                }else {
                    $unit_id = $requestData['unit_id'];
                }
            }else {
                $auth_unit_user_info = OrgUnitUser::where('user_id', Auth::id())->first();
                if (!$auth_unit_user_info) {
                    return messageResponse('The authenticated user is not associated with any unit', [], 403, 'unauthorized');
                }
                $unit_id = $auth_unit_user_info->unit_id;
            }
            
            $unit_info = OrgUnit::where('id', $unit_id)->first();
            if (!$unit_info) {
                return messageResponse('The provided unit does not exist', [], 404, 'not_found');
            }

            $ward_id = isset($unit_info) ? $unit_info->org_ward_id : null;
            $thana_id = isset($unit_info) ? $unit_info->org_thana_id : null;
            $city_id = isset($unit_info) ? $unit_info->org_city_id : null;
            
        
            $thana_info = OrgThana::where('id', $thana_id)->first();
            if (!$thana_info) {
                return messageResponse('thana not found', [], 400, 'invalid_data');
            }

            $org_gender = $thana_info->org_gender;
            $user_gender = $org_gender == 'men' ? 'male' : 'female';
            $unit_role_id = UserRole::where('title', 'unit')->first()->serial ?? null;

            // Check if the user class ID is provided
            $user = new User();
            $user->role_id = $unit_role_id;
            $user->user_class_id = $requestData['user_class_id'];
            $user->full_name = $requestData['full_name'];
            $user->phone = $requestData['phone'];
            $user->gender = $user_gender;
            $user->image = $requestData['image'] ?? 'default.jpg';
            $user->telegram_id = $requestData['telegram_id'] ?? null;
            $user->email = $requestData['email'];
            $user->password = Hash::make($requestData['password']);
            $user->blood_group = $requestData['blood_group'] ?? null;
            $user->educational_qualification = $requestData['educational_qualification'] ?? null;
            $user->age = $requestData['age'] ?? null;
            $user->is_permitted = $requestData['is_permitted'] ?? 0;

            $user->creator = Auth::id();
            $user->status = $requestData['status'] ?? 1;
            $user->save();



            $org_unit_user = new OrgUnitUser();
            $org_unit_user->user_id = $user->id;
            $org_unit_user->city_id = $city_id;
            $org_unit_user->thana_id = $thana_id;
            $org_unit_user->ward_id = $ward_id;
            $org_unit_user->unit_id = $unit_id;
            $org_unit_user->creator = Auth::id();
            $org_unit_user->save();

            $org_unit_responsibles = null;
            if (isset($requestData['responsibility_id'])) {
                $org_unit_responsibles = new OrgUnitResponsible();
                $org_unit_responsibles->user_id = $user->id;
                $org_unit_responsibles->responsibility_id = $requestData['responsibility_id'];
                $org_unit_responsibles->org_unit_id = $unit_id;
                $org_unit_responsibles->creator = Auth::id();
                $org_unit_responsibles->save();
            }

            DB::commit();
            $data = [
                'user' => $user,
                'org_unit_user' => $org_unit_user,
                'org_unit_responsibles' => $org_unit_responsibles,
            ];

            return messageResponse('Item added successfully', $data, 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return messageResponse($e->getMessage(), [], 500, 'server_error');
        }
    }
}