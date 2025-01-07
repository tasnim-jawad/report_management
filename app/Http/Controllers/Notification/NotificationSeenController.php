<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Models\Notification\Notification;
use App\Models\Notification\NotificationSeen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificationSeenController extends Controller
{
    public function mark_as_seen(){
        $validator = Validator::make(request()->all(), [
            'notification_id' => 'required|integer|exists:notifications,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        $notification_id = request('notification_id');
        $notification = Notification::find($notification_id);
        if(!$notification){
            return response()->json(['message' => 'Notification not found'], 404);
        }
        $notification_seen = NotificationSeen::where('notification_id', $notification_id)->first();
        if($notification_seen){
            return response()->json([
                'status' => 'already_seen',
                'message' => 'Notification already marked as seen',
                'data' => $notification_seen
            ]);
        }
        $notification_seen = new NotificationSeen();
        $notification_seen->notification_id = $notification_id;
        $notification_seen->city_id = $notification->city_id;
        $notification_seen->thana_id = $notification->thana_id;
        $notification_seen->ward_id = $notification->ward_id;
        $notification_seen->unit_id = $notification->unit_id;
        $notification_seen->user_id = null;
        $notification_seen->title = $notification->title;
        $notification_seen->description = $notification->description;
        $notification_seen->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Notification marked as seen',
            'data' => $notification_seen
        ]);
    }
}
