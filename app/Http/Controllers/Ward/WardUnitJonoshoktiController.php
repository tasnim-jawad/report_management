<?php

namespace App\Http\Controllers\Ward;

use App\Http\Controllers\Controller;
use App\Models\Organization\OrgUnit;
use App\Models\Organization\OrgUnitResponsible;
use App\Models\Organization\OrgUnitUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WardUnitJonoshoktiController extends Controller
{

    public function all(){
        $ward_id = auth()->user()->org_ward_user["ward_id"];
        $unit_ids = OrgUnit::where('org_ward_id', $ward_id)->pluck('id');

        $final_data = [];

        $all_user = OrgUnitResponsible::whereIn('org_unit_id', $unit_ids)
                                ->whereNotNull('user_id')
                                ->with(['user', 'responsibility', 'org_unit'])
                                ->orderBy('org_unit_id')
                                ->orderByRaw('responsibility_id IS NULL, responsibility_id')
                                ->get();

        foreach($all_user as $user){
            $final_data[] = [
                'user_id' =>$user->user->id,
                'user_name' => $user->user->full_name,
                'unit' => $user->org_unit->title,
                'responsibility' => $user->responsibility->title ?? "",
            ];

        }

        return response()->json($final_data);
    }

    public function store_unit_user(){
        // dd(request()->all(),auth()->user(),auth()->user()->role);
        $validator = Validator::make(request()->all(), [
            'full_name' => ['required'],
            'gender' => ['required','in:male,female'],
            'email' => ['required','unique:users'],
            // 'telegram_id' => ['numeric'],
            'password' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $auth_unit_all = OrgUnitUser::where('user_id', auth()->id())->first();
        $auth_user_unit = $auth_unit_all->unit_id;
        $auth_user_ward = $auth_unit_all->ward_id;
        $auth_user_thana = $auth_unit_all->thana_id;
        $auth_user_city = $auth_unit_all->city_id;

        $user = new User();
        $user->role = auth()->user()->role;
        $user->full_name = request()->full_name;
        $user->gender = request()->gender;
        $user->telegram_name = request()->telegram_name;
        $user->telegram_id = request()->telegram_id;
        $user->email = request()->email;
        $user->password = Hash::make(request()->password);
        $user->blood_group = request()->blood_group;
        $user->creator = auth()->id();
        $user->save();

        if ($user->save()){
            $user_id = User::where('email', request()->email)->latest()->first()->id;

            $org_unit_user = new OrgUnitUser();
            $org_unit_user->user_id = $user_id;
            $org_unit_user->city_id =$auth_user_city;
            $org_unit_user->thana_id =$auth_user_thana;
            $org_unit_user->ward_id =$auth_user_ward;
            $org_unit_user->unit_id =$auth_user_unit;
            $org_unit_user->creator = auth()->id();
            $org_unit_user->save();

            $org_unit_responsibles = new OrgUnitResponsible();
            $org_unit_responsibles->user_id = $user_id;
            $org_unit_responsibles->responsibility_id = request()->responsibility_id;
            $org_unit_responsibles->org_unit_id = $auth_user_unit;
            $org_unit_responsibles->creator = auth()->id();
            $org_unit_responsibles->save();

            return response()->json([$org_unit_user,$user,$org_unit_responsibles], 200);
        }


    }
    public function update_unit_user(){

        $user = User::find(request()->id);
        $org_unit_responsibles = OrgUnitResponsible::where('user_id', request()->id)->get()->first();
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
            $auth_user_unit = $auth_unit_all->unit_id;

            $org_unit_responsibles = new OrgUnitResponsible();
            $org_unit_responsibles->user_id = request()->id;
            $org_unit_responsibles->responsibility_id = request()->responsibility_id;
            $org_unit_responsibles->org_unit_id = $auth_user_unit;
            $org_unit_responsibles->creator = auth()->id();
            $org_unit_responsibles->save();

            return response()->json([$user,$org_unit_responsibles], 200);
        }
    }
}
