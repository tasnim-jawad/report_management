<?php

namespace App\Http\Controllers\Thana;

use App\Http\Controllers\Controller;
use App\Models\Organization\OrgUnit;
use App\Models\Organization\OrgWard;
use App\Models\Organization\OrgWardResponsible;
use App\Models\Organization\OrgWardUser;
use App\Models\User;
use App\Models\User\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ThanaWardJonoshoktiController extends Controller
{

    public function all(){
        $thana_id = auth()->user()->org_thana_user["thana_id"];
        $ward_ids = OrgWard::where('org_thana_id', $thana_id)->pluck('id');

        $final_data = [];

        $all_user = OrgWardResponsible::whereIn('org_ward_id', $ward_ids)
                                ->whereNotNull('user_id')
                                ->with(['user', 'responsibility', 'org_ward'])
                                ->orderBy('org_ward_id')
                                ->orderByRaw('responsibility_id IS NULL, responsibility_id')
                                ->get();
        // dd($all_user);
        foreach($all_user as $user){
            // dd($user->user->full_name);
            $final_data[] = [
                'user_id' =>$user->user->id, 
                'user_name' => $user->user->full_name,
                'ward' => $user->org_ward->title,
                'ward_id' =>$user->org_ward->id,
                'responsibility' => $user->responsibility->title ?? "",
                'responsibility_id' => $user->responsibility->id ?? ""
            ];

        }

        return response()->json($final_data);
    }

    public function store(){
        DB::beginTransaction();

        try {
            $validator = Validator::make(request()->all(), [
                'ward_id' => ['required'],
                'responsibility_id' => ['required'],
                'full_name' => ['required'],
                'email' => ['required', 'unique:users', 'email'],
                'password' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'Validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }


            $ward_id = request()->ward_id;
            $responsibility_id = request()->responsibility_id;

            $ward_info = OrgWard::find($ward_id);
            if (!$ward_info) {
                return response()->json(['err_message' => 'Ward not found'], 404);
            }

            $exist_responsible_user = OrgWardResponsible::where('responsibility_id', request()->responsibility_id)
                                                    ->where('org_ward_id', request()->ward_id)
                                                    ->first();
            if ($exist_responsible_user) {
                $exist_responsible_user->responsibility_id = null;
                $exist_responsible_user->save();
            }

            $gender = $ward_info->org_gender == 'men'? 'male':'female';
            // $ward_id = $ward_info->org_ward_id;
            $thana_id = $ward_info->org_thana_id;
            $city_id = $ward_info->org_city_id;
            $role_serial = UserRole::where('title', 'ward')->first()->serial;

            $if_exist_org_unit_responsibles = OrgWardResponsible::where('responsibility_id', $responsibility_id)
                                                                ->where('org_ward_id', $ward_id)
                                                                ->exists();

            if (!$if_exist_org_unit_responsibles) {
                // Create a new user
                $user = new User();
                $user->role = $role_serial;
                $user->full_name = request()->full_name;
                $user->gender = $gender;
                $user->telegram_name = request()->telegram_name;
                $user->telegram_id = request()->telegram_id;
                $user->email = request()->email;
                $user->password = Hash::make(request()->password);
                $user->blood_group = request()->blood_group;
                $user->creator = auth()->id();
                $user->save();

                // Create org_ward_user
                $org_ward_user = new OrgWardUser();
                $org_ward_user->user_id = $user->id;
                $org_ward_user->city_id = $city_id;
                $org_ward_user->thana_id = $thana_id;
                $org_ward_user->ward_id = $ward_id;
                $org_ward_user->creator = auth()->id();
                $org_ward_user->save();

                // Create org_ward_responsibles
                $org_ward_responsibles = new OrgWardResponsible();
                $org_ward_responsibles->user_id = $user->id;
                $org_ward_responsibles->responsibility_id = $responsibility_id;
                $org_ward_responsibles->org_ward_id = $ward_id;
                $org_ward_responsibles->creator = auth()->id();
                $org_ward_responsibles->save();

                // Commit the transaction if all is successful
                DB::commit();

                // Return success response
                return response()->json([
                    'status' => 'success',
                    'org_ward_user' => $org_ward_user,
                    'user' => $user,
                    'org_ward_responsibles' => $org_ward_responsibles,
                    ], 200
                );

            } else {

                DB::rollBack();
                return response()->json([
                    'err_message' => 'This responsibility already exists for the unit.',
                    'errors' => 'This responsibility already exists for the unit.',
                ], 409);
            }

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'err_message' => 'An error occurred while saving data',
                'errors' => $e->getMessage(),
            ], 500);
        }
    }

    public function set_responsibility(){
        $validator = Validator::make(request()->all(), [
            'ward_id' => ['required'],
            'responsibility_id' => ['required'],
            'user_id' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $exist_responsible_user = OrgWardResponsible::where('responsibility_id', request()->responsibility_id)
                                                    ->where('org_ward_id', request()->ward_id)
                                                    ->where('user_id', '!=', request()->user_id)
                                                    ->first();
        if ($exist_responsible_user) {
            $exist_responsible_user->responsibility_id = null;
            $exist_responsible_user->save();
        }

        $org_ward_responsibles = OrgWardResponsible::where('user_id', request()->user_id)->first();
        $org_ward_responsibles->user_id = request()->user_id;
        $org_ward_responsibles->responsibility_id = request()->responsibility_id;
        $org_ward_responsibles->org_ward_id = request()->ward_id;
        $org_ward_responsibles->creator = auth()->id();
        $org_ward_responsibles->save();
        // Create org_ward_user

        $org_ward_user = OrgWardUser::where('user_id', request()->user_id)->first();
        $org_ward_user->ward_id = request()->ward_id;
        $org_ward_user->creator = auth()->id();
        $org_ward_user->save();

        return response()->json([
            'status' => 'success',
            'org_ward_responsibles' => $org_ward_responsibles,
            'org_ward_user' => $org_ward_user,
            ], 200
        );


    }

    public function update_unit_user(){

        $user = User::find(request()->id);
        $org_unit_responsibles = OrgWardResponsible::where('user_id', request()->id)->get()->first();
        // dd($user,$org_unit_responsibles);
        if (!$user) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'full_name' => ['required'],
            'gender' => ['required','in:male,female'],
            'email' => ['required',Rule::unique('users')->ignore($user->id)],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }


        $user->full_name = request()->full_name;
        $user->gender = request()->gender;
        $user->telegram_name = request()->telegram_name;
        $user->telegram_id = request()->telegram_id;
        $user->email = request()->email;
        $user->blood_group = request()->blood_group;
        $user->creator = auth()->id();
        $user->save();

        if($org_unit_responsibles){

            $org_unit_responsibles->responsibility_id = request()->responsibility_id;
            $org_unit_responsibles->save();

            return response()->json([$user,$org_unit_responsibles], 200);

        }else if(!$org_unit_responsibles){
            $auth_unit_all = OrgUnitUser::where('user_id', auth()->id())->first();
            $auth_user_unit = $auth_unit_all->ward_id;

            $org_unit_responsibles = new OrgWardResponsible();
            $org_unit_responsibles->user_id = request()->id;
            $org_unit_responsibles->responsibility_id = request()->responsibility_id;
            $org_unit_responsibles->org_ward_id = $auth_user_unit;
            $org_unit_responsibles->creator = auth()->id();
            $org_unit_responsibles->save();

            return response()->json([$user,$org_unit_responsibles], 200);
        }
    }


}
