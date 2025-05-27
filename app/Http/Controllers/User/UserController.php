<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Organization\OrgCity;
use App\Models\Organization\OrgThana;
use App\Models\Organization\OrgThanaUser;
use App\Models\Organization\OrgUnitResponsible;
use App\Models\Organization\OrgUnitUser;
use App\Models\Organization\OrgWard;
use App\Models\Organization\OrgWardUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function user_info(){
        // dd(auth()->user());
        $user = auth()->user();
        $user_responsibility = auth_user_unit_responsibilities_info(auth()->id());
        $Org_unit_user = OrgUnitUser::where('user_id', auth()->id())->get()->first();
        $ward_id = $Org_unit_user->ward_id;
        $ward = OrgWard::find($ward_id);
        // return [$user,$user_responsibility];
        return response()->json([
            'user' => $user,
            'responsibility' => $user_responsibility,
            'ward_id' => $ward_id,
            'ward' => $ward,
        ]);
    }
    public function ward_user_info(){
        // dd(auth()->user());
        $user = auth()->user();
        $user_responsibility = auth_user_ward_responsibilities_info(auth()->id());
        $org_ward_user = OrgWardUser::where('user_id', auth()->id())->get()->first();
        $thana_id = $org_ward_user->thana_id;
        $thana = OrgThana::find($thana_id);
        // return [$user,$user_responsibility];
        return response()->json([
            'user' => $user,
            'responsibility' => $user_responsibility,
            'thana_id' => $thana_id,
            'thana' => $thana,
        ]);
    }
    public function thana_user_info(){
        // dd(auth()->user());
        $user = auth()->user();
        $user_responsibility = auth_user_thana_responsibilities_info(auth()->id());
        $org_thana_user = OrgThanaUser::where('user_id', auth()->id())->get()->first();
        $city_id = $org_thana_user->city_id;
        $city = OrgCity::find($city_id);
        // return [$user,$user_responsibility];
        return response()->json([
            'user' => $user,
            'responsibility' => $user_responsibility,
            'city_id' => $city_id,
            'city' => $city,
        ]);
    }
    public function all()
    {
        $paginate = (int) request()->paginate ?? 10;
        $orderBy = request()->orderBy ?? 'id';
        $orderByType = request()->orderByType ?? 'ASC';

        $status = 1;
        if (request()->has('status')) {
            $status = request()->status;
        }
        // dd($status);

        $query = User::where('status', $status)->orderBy($orderBy, $orderByType);
        // $query = User::latest()->get();

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', '%' . $key . '%')
                    ->orWhere('role', '%' . $key . '%')
                    ->orWhere('full_name', '%' . $key . '%')
                    ->orWhere('gender', '%' . $key . '%')
                    ->orWhere('telegram_name', '%' . $key . '%')
                    ->orWhere('telegram_id', '%' . $key . '%');

            });
        }

        $datas = $query->paginate($paginate);
        return response()->json($datas);
    }

    public function show($id)
    {
        $select = ["*"];
        if (request()->has('select_all') && request()->select_all) {
            $select = "*";
        }
        $data = User::where('id', $id)
            ->select($select)
            ->first();
        if ($data) {
            return response()->json($data, 200);
        } else {
            return response()->json([
                'err_message' => 'data not found',
                'errors' => [
                    'user' => [],
                ],
            ], 404);
        }
    }
    public function show_unit_user(){
        // $all_unit_users = User::whereExist("id")
        $unit_id = auth()->user()->org_unit_user["unit_id"];
        // dd($unit_id);
        $result = User::with('org_unit_responsible.responsibility')->whereExists(function ($query) use ($unit_id) {
            $query->select("*")
                ->from('org_unit_users')
                ->whereRaw('org_unit_users.user_id = users.id')
                ->where('org_unit_users.unit_id', $unit_id);
        })->get();

        // dd($result->toArray());

        return response()->json($result);
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

    public function store()
    {
        // dd(request()->all());
        $validator = Validator::make(request()->all(), [
            'role' => ['required'],
            'full_name' => ['required'],
            'gender' => ['required','in:male,female'],
            'telegram_name' => ['required'],
            'telegram_id' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'blood_group' => ['required'],
            'creator' => ['required'],
        ], [
            'role.required' => 'Please select a role.',
            'full_name.required' => 'Please provide your full name.',
            'gender.required' => 'Please select your gender.',
            'gender.in' => 'Gender must be either male or female.',
            'telegram_name.required' => 'Please provide your Telegram name.',
            'telegram_id.required' => 'Please provide your Telegram ID.',
            'email.required' => 'Please enter your email address.',
            'password.required' => 'Please set a password.',
            'blood_group.required' => 'Please provide your blood group.',
            'creator.required' => 'Creator information is required.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new User();
        $data->role = request()->role;
        $data->full_name = request()->full_name;
        $data->gender = request()->gender;
        $data->telegram_name = request()->telegram_name;
        $data->telegram_id = request()->telegram_id;
        $data->email = request()->email;
        $data->password = Hash::make(request()->password);
        $data->blood_group = request()->blood_group;
        $data->creator = request()->creator;
        $data->save();

        if (request()->hasFile('image')) {
            //
        }

        return response()->json($data, 200);
    }

    public function update()
    {
        $data = User::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'role' => ['required'],
            'full_name' => ['required'],
            'gender' => ['required'],
            'telegram_name' => ['required'],
            'telegram_id' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'blood_group' => ['required'],
            'creator' => ['required'],
            'status' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->role = request()->role;
        $data->full_name = request()->full_name;
        $data->gender = request()->gender;
        $data->telegram_name = request()->telegram_name;
        $data->telegram_id = request()->telegram_id;
        $data->email = request()->email;
        $data->password = Hash::make(request()->password);
        $data->blood_group = request()->blood_group;
        $data->creator = request()->creator;
        $data->status = request()->status;
        $data->save();

        if (request()->hasFile('image')) {
            //
        }
        return response()->json($data, 200);
    }

    public function soft_delete()
    {
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
        $data->status = 0;
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
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
            $org_unit_user = OrgUnitUser::where('user_id',request()->id)->get()->first();
            $org_unit_user->delete();
            $org_unit_responsible = OrgUnitResponsible::where('user_id',request()->id)->get()->first();
            $org_unit_responsible->delete();
        }

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
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
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }

}









