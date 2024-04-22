<?php

namespace App\Models\Bm\Income;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BmCategory extends Model
{
    use HasFactory;

    public function bm_paid()
    {
        return $this->hasMany(BmPaid::class);
    }

    public function bm_category_user()
    {
        return $this->hasMany(BmCategoryUser::class);
    }
}
