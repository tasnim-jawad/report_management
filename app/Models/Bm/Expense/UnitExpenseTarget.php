<?php

namespace App\Models\Bm\Expense;

use App\Models\Organization\OrgUnit;
use App\Observers\UnitExpenseTargetObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([UnitExpenseTargetObserver::class])]
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
