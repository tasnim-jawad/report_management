<?php

namespace App\Models\Bm\Expense;

use App\Models\Organization\OrgUnit;
use Illuminate\Database\Eloquent\Model;

class UnitExpenseTarget extends Model
{
    public function bm_expense_category()
    {
        return $this->belongsTo(BmExpenseCategory::class);
    }
    public function org_unit()
    {
        return $this->belongsTo(OrgUnit::class, 'unit_id', 'id', );
    }
}
