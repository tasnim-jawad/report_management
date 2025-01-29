<?php

namespace App\Http\Controllers\Ward;

use App\Http\Controllers\Controller;
use App\Models\Organization\OrgWard;
use App\Models\Organization\OrgWardResponsible;
use App\Models\Organization\OrgWardUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class WardUserController extends Controller
{
    public function show(){
        $ward_id = auth()->user()->org_ward_user["ward_id"];
        $ward = OrgWard::find($ward_id);
        $users = $ward->ward_to_user()->with([
            'org_ward_responsible',
            'org_ward_responsible.responsibility'
            ])->get();
        // dd($users->toArray());

        return response()->json($users);
    }

    public function store(){
        // dd(request()->all(),auth()->user(),auth()->user()->role);
        $validator = Validator::make(request()->all(), [
            'full_name' => ['required'],
            'gender' => ['sometimes', 'in:male,female'],
            'email' => ['required','unique:users'],
            'password' => ['required'],
            'responsibility_id' => ['nullable'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        // dd(request()->all());
        $auth_ward_info = OrgWardUser::where('user_id', auth()->id())->first();
        $auth_ward = $auth_ward_info->ward_id;
        $auth_thana = $auth_ward_info->thana_id;
        $auth_city = $auth_ward_info->city_id;

        $user = new User();
        $user->role = auth()->user()->role;
        $user->full_name = request()->full_name;
        $user->gender = request()->gender ?? "male";
        $user->telegram_name = request()->telegram_name;
        $user->telegram_id = request()->telegram_id;
        $user->email = request()->email;
        $user->password = Hash::make(request()->password);
        $user->blood_group = request()->blood_group;
        $user->creator = auth()->id();
        $user->save();

        if ($user->save()){
            $user_id = User::where('email', request()->email)->latest()->first()->id;

            $org_ward_user = new OrgWardUser();
            $org_ward_user->user_id = $user_id;
            $org_ward_user->city_id =$auth_city;
            $org_ward_user->thana_id =$auth_thana;
            $org_ward_user->ward_id =$auth_ward;
            $org_ward_user->creator = auth()->id();
            $org_ward_user->save();


            if (request()->responsibility_id) {
                $org_ward_responsibles = new OrgWardResponsible();
                $org_ward_responsibles->user_id = $user_id;
                $org_ward_responsibles->responsibility_id = request()->responsibility_id;
                $org_ward_responsibles->org_ward_id = $auth_ward;
                $org_ward_responsibles->creator = auth()->id();
                $org_ward_responsibles->save();
            }

            return response()->json([$org_ward_user,$user,], 200);
        }


    }

    public function update(){
        $user = User::find(request()->id);
        $org_ward_responsibles = OrgWardResponsible::where('user_id', request()->id)->get()->first();
        // dd($user,$org_unit_responsibles);
        if (!$user) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'full_name' => ['required'],
            'gender' => ['sometimes','in:male,female'],
            'email' => ['required',Rule::unique('users')->ignore($user->id)],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $user->full_name = request()->full_name;
        $user->telegram_name = request()->telegram_name;
        $user->telegram_id = request()->telegram_id;
        $user->email = request()->email;
        $user->blood_group = request()->blood_group;
        $user->creator = auth()->id();
        $user->save();

        if($org_ward_responsibles){
            if($org_ward_responsibles->responsibility_id == 1 || $org_ward_responsibles->responsibility_id == 2){
                return response()->json([$user], 200);
            }else{
                $org_ward_responsibles->responsibility_id = request()->responsibility_id ?? null;
                $org_ward_responsibles->save();

                return response()->json([$user], 200);
            }

        }else if(!$org_ward_responsibles){
            if(request()->responsibility_id){
                $auth_ward_all = OrgWardUser::where('user_id', auth()->id())->first();
                $auth_user_ward = $auth_ward_all->ward_id;

                $org_ward_responsibles = new OrgWardResponsible();
                $org_ward_responsibles->user_id = request()->id;
                $org_ward_responsibles->responsibility_id = request()->responsibility_id;
                $org_ward_responsibles->org_ward_id = $auth_user_ward;
                $org_ward_responsibles->creator = auth()->id();
                $org_ward_responsibles->save();

                return response()->json([$user,$org_ward_responsibles], 200);
            }
        }
    }

    public function destroy()
    {
        // dd(request()->all());
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:users,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = User::find(request()->id);
        $deleted = $data->delete();

        if($deleted){
            $org_ward_user = OrgWardUser::where('user_id',request()->id)->get()->first();
            $org_ward_user->delete();
            $org_ward_responsible = OrgWardResponsible::where('user_id',request()->id)->get()->first();
            $org_ward_responsible->delete();
        }

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }
}
