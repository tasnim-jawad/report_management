<?php

namespace App\Models\Notification;

use Illuminate\Database\Eloquent\Model;

class NotificationSeen extends Model
{
    public function notification()
    {
        return $this->belongsTo(Notification::class, 'notification_id');    
    }
}
