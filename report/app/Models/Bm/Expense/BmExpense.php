<?php

namespace App\Models\Bm\Expense;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BmExpense extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function bm_expense_category()
    {
        return $this->belongsTo(BmExpenseCategory::class);
    }
}
