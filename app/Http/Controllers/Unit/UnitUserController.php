<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use App\Models\Organization\OrgUnit;
use App\Models\Organization\OrgUnitResponsible;
use App\Models\Organization\OrgUnitUser;
use App\Models\Organization\OrgWardUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

use App\Http\Controllers\Unit\Validations\UnitUserStoreValidation as DataStoreValidation;
use App\Http\Controllers\Unit\Actions\UnitUser\Store;
use App\Http\Controllers\Unit\Actions\UnitUser\GetAllData;
use App\Http\Controllers\Unit\Actions\UnitUser\GetSingleData;
use App\Http\Controllers\Unit\Actions\UnitUser\SoftDelete;
use App\Http\Controllers\Unit\Actions\UnitUser\UpdateStatus;
use App\Http\Controllers\Unit\Actions\UnitUser\DestroyData;
use App\Http\Controllers\Unit\Actions\UnitUser\Update;

class UnitUserController extends Controller
{
    // public function show()
    // {
    //     $unit_id = auth()->user()->org_unit_user["unit_id"];
    //     $unit = OrgUnit::find($unit_id);
    //     $users = $unit->unit_to_user()->with([
    //         'org_unit_responsible',
    //         'org_unit_responsible.responsibility'
    //     ])->get();
    //     // dd($users->toArray());

    //     return response()->json($users);
    // }
    public function show_unit_user(){
        // $all_unit_users = User::whereExist("id")
        $unit_id = auth()->user()->org_unit_user["unit_id"];
        // dd($unit_id);
        $result = User::whereHas('org_unit_responsible', function ($query) {
                    $query->whereNotNull('responsibility_id');
                })
                ->with('org_unit_responsible.responsibility')->whereExists(function ($query) use ($unit_id) {
                    $query->select("*")
                        ->from('org_unit_users')
                        ->whereRaw('org_unit_users.user_id = users.id')
                        ->where('org_unit_users.unit_id', $unit_id);
                })
                ->join('org_unit_responsibles', 'users.id', '=', 'org_unit_responsibles.user_id') // Join the related table
                ->orderBy('org_unit_responsibles.responsibility_id', 'asc') // Sort by responsibility_id
                ->select('users.*') // Select user columns only
                ->get();

        // dd($result->toArray());

        return response()->json($result);
    }
    public function store_unit_user(){
        // dd(request()->all(),auth()->user(),auth()->user()->role);
        $validator = Validator::make(request()->all(), [
            'full_name' => ['required'],
            'gender' => ['sometimes','in:male,female'],
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

        DB::beginTransaction();

        try {

            $auth_unit_all = OrgUnitUser::where('user_id', auth()->id())->first();
            $auth_user_unit = $auth_unit_all->unit_id;
            $auth_unit = OrgUnit::where('id',$auth_user_unit)->first();
            $gender = $auth_unit->org_gender == 'men'? 'male':'female';
            $auth_user_ward = $auth_unit_all->ward_id;
            $auth_user_thana = $auth_unit_all->thana_id;
            $auth_user_city = $auth_unit_all->city_id;

            $user = new User();
            $user->role = auth()->user()->role;
            $user->full_name = request()->full_name;
            $user->gender = $gender;
            $user->telegram_name = request()->telegram_name;
            $user->telegram_id = request()->telegram_id;
            $user->email = request()->email;
            $user->password = Hash::make(request()->password);
            $user->blood_group = request()->blood_group;
            $user->creator = auth()->id();
            $user->save();


            $org_unit_user = new OrgUnitUser();
            $org_unit_user->user_id = $user->id;
            $org_unit_user->city_id =$auth_user_city;
            $org_unit_user->thana_id =$auth_user_thana;
            $org_unit_user->ward_id =$auth_user_ward;
            $org_unit_user->unit_id =$auth_user_unit;
            $org_unit_user->creator = auth()->id();
            $org_unit_user->save();

            
            if (request()->responsibility_id){
                // $user_id = User::where('email', request()->email)->latest()->first()->id;

                // $org_unit_user = new OrgUnitUser();
                // $org_unit_user->user_id = $user_id;
                // $org_unit_user->city_id =$auth_user_city;
                // $org_unit_user->thana_id =$auth_user_thana;
                // $org_unit_user->ward_id =$auth_user_ward;
                // $org_unit_user->unit_id =$auth_user_unit;
                // $org_unit_user->creator = auth()->id();
                // $org_unit_user->save();

                $org_unit_responsibles = new OrgUnitResponsible();
                $org_unit_responsibles->user_id = $user->id;
                $org_unit_responsibles->responsibility_id = request()->responsibility_id ?? null;
                $org_unit_responsibles->org_unit_id = $auth_user_unit;
                $org_unit_responsibles->creator = auth()->id();
                $org_unit_responsibles->save();

                // return response()->json([$org_unit_user,$user,$org_unit_responsibles], 200);
            }

            DB::commit();

            return response()->json([$org_unit_user,$user,$org_unit_responsibles], 200);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'err_message' => 'Transaction failed',
                'error' => $e->getMessage(),
            ], 500);
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
        $user->gender = request()->gender ?? 'male';
        $user->telegram_name = request()->telegram_name;
        $user->telegram_id = request()->telegram_id;
        $user->email = request()->email;
        $user->blood_group = request()->blood_group;
        $user->creator = auth()->id();
        $user->save();

        if($org_unit_responsibles){
            if ($org_unit_responsibles->responsibility_id == 1 || $org_unit_responsibles->responsibility_id == 2) {
                return response()->json([$user], 200);
            } else {
                $org_unit_responsibles->responsibility_id = request()->responsibility_id;
                $org_unit_responsibles->save();

                return response()->json([$user,$org_unit_responsibles], 200);
            }
        }else if(!$org_unit_responsibles){
            if (request()->responsibility_id) {
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

    //-------------------------------------
    public function index(){
        
        $unit_id = request()->query('unit_id') ?? auth()->user()->org_unit_user->unit_id;
        $data = GetAllData::execute($unit_id);
        return $data;
    }
    public function update(DataStoreValidation $request, $slug)
    {
        $data = Update::execute($request, $slug);
        return $data;
    }
    public function updateStatus()
    {
        $data = UpdateStatus::execute();
        return $data;
    }

    public function softDelete()
    {
        $data = SoftDelete::execute();
        return $data;
    }
    public function destroy($id)
    {
        $data = DestroyData::execute($id);
        return $data;
    }
    public function store(DataStoreValidation $request)
    {
        $data = Store::execute($request);
        return $data;
    }
    public function show()
    {
        $user_id = request()->route('user_id');
        $data = GetSingleData::execute($user_id);
        return $data;
    }
}
