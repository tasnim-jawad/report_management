<?php

namespace App\Models\Bm\Ward\Expense;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WardBmExpenseCategory extends Model
{
    use HasFactory;

    public function ward_bm_expanse()
    {
        return $this->hasMany(WardBmExpense::class);
    }

    public function parent_expanse_category()
    {
        return $this->belongsTo(WardBmExpenseCategory::class,'parent_id','id');
    }
}
