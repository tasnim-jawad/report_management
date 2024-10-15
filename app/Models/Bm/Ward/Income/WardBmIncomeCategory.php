<?php

namespace App\Models\Bm\Ward\Income;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WardBmIncomeCategory extends Model
{
    use HasFactory;
    public function ward_bm_income()
    {
        return $this->hasMany(WardBmIncome::class);
    }
}
