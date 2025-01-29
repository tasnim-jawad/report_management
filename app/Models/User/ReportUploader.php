<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportUploader extends Model
{
    use HasFactory;

    public function user()                             //A ReportUploader can have only one user
    {
        return $this->belongsTo(User::class);
    }
}
