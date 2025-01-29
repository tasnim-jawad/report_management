<?php

namespace App\Models\Bm\Income;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class BmUserEntry extends Model
{
    public function bm_category()
    {
        return $this->belongsTo(BmCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
