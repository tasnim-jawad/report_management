<?php

namespace App\Models\Bm\Expense;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BmExpenseCategory extends Model
{
    use HasFactory;

    public function bm_expanse()
    {
        return $this->hasMany(BmExpense::class);
    }

    public function parent_expense_category()
    {
        return $this->belongsTo(BmExpenseCategory::class,'parent_id','id');
    }
}
