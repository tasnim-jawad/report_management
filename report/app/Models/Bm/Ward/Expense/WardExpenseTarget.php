<?php

namespace App\Models\Bm\Ward\Expense;

use App\Models\Organization\OrgWard;
use App\Observers\WardExpenseTargetObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([WardExpenseTargetObserver::class])]
class WardExpenseTarget extends Model
{
    public function ward_bm_expense_category()
    {
        return $this->belongsTo(WardBmExpenseCategory::class);
    }
    public function org_ward()
    {
        return $this->belongsTo(OrgWard::class, 'ward_id', 'id', );
    }
}
