<?php

namespace App\Models\Bm\Thana\Expense;

use Illuminate\Database\Eloquent\Model;

class ThanaBmExpense extends Model
{
    public function thana_bm_expense_category()
    {
        return $this->belongsTo(ThanaBmExpenseCategory::class);
    }
}