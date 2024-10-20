<?php

namespace App\Http\Controllers\Ward;

use App\Http\Controllers\Controller;
use App\Models\Organization\OrgWard;
use App\Models\Organization\OrgWardUser;
use App\Models\User;
use Illuminate\Http\Request;

class WardUserController extends Controller
{
    public function show(){
        $ward_id = auth()->user()->org_ward_user["ward_id"];

        $users = OrgWard::where('id',$ward_id)->with(['ward_to_user','ward_to_responsibility'])->get();
        // dd($users->toArray());

        $final_data = [];

        foreach ($users as $user) {
            foreach ($user->ward_to_user as $wardUser) {
                foreach ($user->ward_to_responsibility as $responsibility) {
                    $final_data[] = [
                        'ward_id' => $user->id,
                        'user_id' => $wardUser->id,
                        'full_name' => $wardUser->full_name,
                        'telegram_name' => $wardUser->telegram_name,
                        'email' => $wardUser->email,
                        'blood_group' => $wardUser->blood_group,
                        'responsibility' => $responsibility->title ?? "",
                        'responsibility_id' => $responsibility->id ?? "",
                    ];
                }

                // If a user has no responsibility, you can still add them with empty responsibility fields
                if ($user->ward_to_responsibility->isEmpty()) {
                    $final_data[] = [
                        'ward_id' => $user->id,
                        'user_id' => $wardUser->id,
                        'full_name' => $wardUser->full_name,
                        'telegram_name' => $wardUser->telegram_name,
                        'email' => $wardUser->email,
                        'blood_group' => $wardUser->blood_group,
                        'responsibility' => "",
                        'responsibility_id' => "",
                    ];
                }
            }
        }
        // dd($final_data);
        return response()->json($final_data);
    }
}
