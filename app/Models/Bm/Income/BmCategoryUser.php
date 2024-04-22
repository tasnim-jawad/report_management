<?php

namespace App\Models\Bm\Income;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BmCategoryUser extends Model
{
    use HasFactory;

    public function bm_category()
    {
        return $this->belongsTo(BmCategory::class);
    }
}
