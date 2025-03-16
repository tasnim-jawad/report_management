<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public function toggle_dashboard_permission()
    {
        try {
            // dd(request()->all());
            $validator = Validator::make(request()->all(), [
                'user_id' => ['required', 'exists:users,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }
            
            $user = User::findOrFail(request()->user_id);
            $user->is_permitted = !$user->is_permitted;  // Toggle the is_permitted value
            $user->save();


            return response()->json(['message' => 'Permission toggled successfully']);

        } catch (\Throwable $th) {
            // throw $th;
            // return messageResponse($e->getMessage(),[], 500, 'server_error');

            return response()->json([
                'err_message' => 'An error occurred while toggling permission.',
            ], 500);

        }
    }
}
