<?php

namespace App\Models\Bm\Income;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BmPaid extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bm_category()
    {
        return $this->belongsTo(BmCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
