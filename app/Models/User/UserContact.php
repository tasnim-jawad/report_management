<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    use HasFactory;

    public function user()                             //A UserContact can have only one user
    {
        return $this->belongsTo(User::class);
    }
}
