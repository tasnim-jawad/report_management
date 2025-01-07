<?php

namespace App\Models\Notification;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function notifier()
    {
        return $this->belongsTo(User::class, 'creator');
    }

    public function notification_seen()
    {
        return $this->hasOne(NotificationSeen::class, 'notification_id', 'id');
    }
}
