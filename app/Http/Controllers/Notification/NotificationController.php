<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Models\Notification\Notification;
use App\Models\Organization\OrgThana;
use App\Models\Organization\OrgUnit;
use App\Models\Organization\OrgWard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function all_notification_for_unit()
    {   
        // dd(request()->all());
        $validator = Validator::make(request()->all(), [
            'unit_id' => 'required|integer|exists:org_units,id',
            'all' => 'sometimes|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        $unit_id = request('unit_id');
        $unit_info = OrgUnit::find($unit_id);
        if(!$unit_info){
            return response()->json(['message' => 'Unit not found'], 404);
        }
        // dd($unit_info);  
        $ward_id = $unit_info->org_ward_id;
        $thana_id = $unit_info->org_thana_id;
        $city_id = $unit_info->org_city_id; 

        $notifications_query = Notification::where('unit_id', $unit_id)
            ->where('ward_id', $ward_id)
            ->where('thana_id', $thana_id)
            ->where('city_id', $city_id)
            ->with('notifier');

        // Apply the unseen filter if 'all' is not present or not true
        if (!request('all')) {
            $notifications_query->whereDoesntHave('notification_seen', function ($q) {
                $q->whereColumn('notification_seens.notification_id', 'notifications.id');
            });
        }

        // Get the notifications and order by latest
        $notifications = $notifications_query->orderBy('id', 'desc')->get();


        
        return response()->json([
            'status' => 'success',
            'data' => $notifications
        ]);
    }

    public function all_notification_for_thana()
    {   
        // dd(request()->all());
        $validator = Validator::make(request()->all(), [
            'thana_id' => 'required|integer|exists:org_thanas,id',
            'all' => 'sometimes|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        $thana_id = request('thana_id');
        $thana_info = OrgThana::find($thana_id);
        if(!$thana_info){
            return response()->json(['message' => 'Thana not found'], 404);
        }
        $thana_id = $thana_info->id;
        $city_id = $thana_info->org_city_id; 
        $notifications_query = Notification::where('thana_id', $thana_id)
            ->where('city_id', $city_id)
            ->where('ward_id', null)
            ->where('unit_id', null)
            ->with('notifier');
        
        // Apply the unseen filter if 'all' is not present or not true
        if (!request('all')) {
            $notifications_query->whereDoesntHave('notification_seen', function ($q) {
                $q->whereColumn('notification_seens.notification_id', 'notifications.id');
            });
        }

        // Get the notifications and order by latest
        $notifications = $notifications_query->orderBy('id', 'desc')->get();


        // dd($notifications);
        return response()->json([
            'status' => 'success',
            'data' => $notifications
        ]);
    }
    public function all_notification_for_ward()
    {   
        // dd(request()->all());
        $validator = Validator::make(request()->all(), [
            'ward_id' => 'required|integer|exists:org_wards,id',
            'all' => 'sometimes|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        $ward_id = request('ward_id');
        $ward_info = OrgWard::find($ward_id);
        if(!$ward_info){
            return response()->json(['message' => 'ward not found'], 404);
        }
        $ward_id = $ward_info->id;
        $thana_id = $ward_info->org_thana_id; 
        $city_id = $ward_info->org_city_id; 
        $notifications_query = Notification::where('ward_id', $ward_id)
            ->where('city_id', $city_id)
            ->where('thana_id', $thana_id)
            ->where('unit_id', null)
            ->with('notifier');
        
        // Apply the unseen filter if 'all' is not present or not true
        if (!request('all')) {
            $notifications_query->whereDoesntHave('notification_seen', function ($q) {
                $q->whereColumn('notification_seens.notification_id', 'notifications.id');
            });
        }

        // Get the notifications and order by latest
        $notifications = $notifications_query->orderBy('id', 'desc')->get();


        // dd($notifications);
        return response()->json([
            'status' => 'success',
            'data' => $notifications
        ]);
    }
}

// $notifications = Notification::where('unit_id', $unit_id)
//     ->Where('ward_id', $ward_id)
//     ->Where('thana_id', $thana_id)
//     ->Where('city_id', $city_id)
//     ->with('notifier')
//     ->whereDoesntHave('notification_seen', function($q) {
//         $q->whereColumn('notification_seens.notification_id', 'notifications.id');
//     })
//     ->orderBy('id', 'desc')
//     ->get();