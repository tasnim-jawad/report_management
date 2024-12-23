<?php

namespace App\Http\Controllers\Thana;

use App\Http\Controllers\Controller;
use App\Models\Organization\OrgThana;
use App\Models\Organization\OrgThanaResponsible;
use App\Models\Organization\OrgThanaUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ThanaUserController extends Controller
{
    public function show()
    {
        $thana_id = auth()->user()->org_thana_user["thana_id"];
        $thana = OrgThana::find($thana_id);
        $users = $thana->thana_to_user()->with([
            'org_thana_responsible',
            'org_thana_responsible.responsibility'
        ])->get();
        // dd($users->toArray());

        return response()->json($users);
    }

    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'full_name' => ['required'],
            'gender' => ['sometimes', 'in:male,female'],
            'email' => ['required', 'unique:users'],
            'password' => ['required'],
            'responsibility_id' => ['nullable'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        DB::beginTransaction();

        try {
            $auth_thana_info = OrgThanaUser::where('user_id', auth()->id())->first();
            $auth_thana = $auth_thana_info->thana_id;
            $auth_city = $auth_thana_info->city_id;

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

            $org_thana_user = new OrgThanaUser();
            $org_thana_user->user_id = $user->id;
            $org_thana_user->city_id = $auth_city;
            $org_thana_user->thana_id = $auth_thana;
            $org_thana_user->creator = auth()->id();
            $org_thana_user->save();

            if (request()->responsibility_id) {
                $org_thana_responsibles = new OrgThanaResponsible();
                $org_thana_responsibles->user_id = $user->id;
                $org_thana_responsibles->responsibility_id = request()->responsibility_id;
                $org_thana_responsibles->org_thana_id = $auth_thana;
                $org_thana_responsibles->creator = auth()->id();
                $org_thana_responsibles->save();
            }

            DB::commit();

            return response()->json([$org_thana_user, $user], 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'err_message' => 'Transaction failed',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function update()
    {
        $user = User::find(request()->id);
        $org_thana_responsibles = OrgThanaResponsible::where('user_id', request()->id)->get()->first();
        // dd($user,$org_unit_responsibles);
        if (!$user) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'full_name' => ['required'],
            'gender' => ['sometimes', 'in:male,female'],
            'email' => ['required', Rule::unique('users')->ignore($user->id)],
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

        if ($org_thana_responsibles) {
            if ($org_thana_responsibles->responsibility_id == 1 || $org_thana_responsibles->responsibility_id == 2) {
                return response()->json([$user], 200);
            } else {
                $org_thana_responsibles->responsibility_id = request()->responsibility_id ?? null;
                $org_thana_responsibles->save();

                return response()->json([$user], 200);
            }
        } else if (!$org_thana_responsibles) {
            if (request()->responsibility_id) {
                $auth_thana_all = OrgThanaUser::where('user_id', auth()->id())->first();
                $auth_user_thana = $auth_thana_all->thana_id;

                $org_thana_responsibles = new OrgThanaResponsible();
                $org_thana_responsibles->user_id = request()->id;
                $org_thana_responsibles->responsibility_id = request()->responsibility_id;
                $org_thana_responsibles->org_thana_id = $auth_user_thana;
                $org_thana_responsibles->creator = auth()->id();
                $org_thana_responsibles->save();

                return response()->json([$user, $org_thana_responsibles], 200);
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
        try {

            DB::transaction(function () {
                $data = User::findOrFail(request()->id);
                $data->delete();

                $org_thana_user = OrgThanaUser::where('user_id', request()->id)->first();
                if ($org_thana_user) {
                    $org_thana_user->delete();
                }

                $org_thana_responsible = OrgThanaResponsible::where('user_id', request()->id)->first();
                if ($org_thana_responsible) {
                    $org_thana_responsible->delete();
                }
            });

            return response()->json([
                'result' => 'deleted',
            ], 200);

        } catch (\Exception $e) {
            Log::error('Transaction failed: ' . $e->getMessage());
            return response()->json([
                'err_message' => 'An unexpected error occurred. Please try again later.',
            ], 500);
        }

    }
}
