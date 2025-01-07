<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Models\Notification\Notification;
use App\Models\Organization\OrgUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function all_notification_for_unit(  )
    {   
        // dd($unit_id);
        $validator = Validator::make(request()->all(), [
            'unit_id' => 'required|integer|exists:org_units,id',
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

        $notifications = Notification::where('unit_id', $unit_id)
            ->Where('ward_id', $ward_id)
            ->Where('thana_id', $thana_id)
            ->Where('city_id', $city_id)
            ->with('notifier')
            ->whereDoesntHave('notification_seen', function($q) {
                $q->whereColumn('notification_seens.notification_id', 'notifications.id');
            })
            ->orderBy('id', 'desc')
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $notifications
        ]);
    }
}
