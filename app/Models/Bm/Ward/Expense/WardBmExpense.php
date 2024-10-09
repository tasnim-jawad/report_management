<?php

namespace App\Models\Bm\Ward\Expense;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WardBmExpense extends Model
{
    use HasFactory;

    public function ward_bm_expense_category()
    {
        return $this->belongsTo(WardBmExpenseCategory::class);
    }
}
