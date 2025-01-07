<?php

namespace App\Http\Controllers\Actions;

use App\Models\Notification\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationStore 
{
    public function execute(
        $notification_title, 
        $notification_description,
        $org_type,
        $unit_id = null,
        $ward_id = null,
        $thana_id = null,
        $city_id = null,
        $user_id = null
        )
        
    {
        
        $notification = new Notification();
        $notification->user_id = $user_id;
        $notification->city_id = $city_id;
        $notification->thana_id = $thana_id;
        $notification->ward_id = $ward_id;
        $notification->unit_id = $unit_id;
        $notification->title = $notification_title;
        $notification->description = $notification_description;
        $notification->creator = auth()->user()->id;
        $notification->status = 1;
        $notification->save();

        return $notification;
    }
}
