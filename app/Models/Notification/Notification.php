<?php

namespace App\Models\Notification;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $appends = ['is_seen'];

    public function notifier()
    {
        return $this->belongsTo(User::class, 'creator');
    }

    public function notification_seen()
    {
        return $this->hasOne(NotificationSeen::class, 'notification_id', 'id');
    }

    public function getIsSeenAttribute($id)
    {   
        $is_seen = NotificationSeen::where('notification_id', $this->id)->exists();
        return $is_seen; // Return the original title value
    }
}
