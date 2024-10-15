<?php

namespace App\Models\Bm\Ward\Income;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WardBmIncome extends Model
{
    use HasFactory;

    public function ward_bm_income_category()
    {
        return $this->belongsTo(WardBmIncomeCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
