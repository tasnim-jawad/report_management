<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserClass extends Model
{
    use HasFactory;

    public function user()                             //A UserClass can have only one user
    {
        return $this->belongsTo(User::class);
    }
}
