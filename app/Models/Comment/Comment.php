<?php

namespace App\Models\Comment;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function user()                             //A user can have only one user_role
    {
        return $this->belongsTo(User::class,'commenter_id','id');
    }
}
