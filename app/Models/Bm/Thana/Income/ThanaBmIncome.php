<?php

namespace App\Models\Bm\Thana\Income;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ThanaBmIncome extends Model
{
    public function thana_bm_income_category()
    {
        return $this->belongsTo(ThanaBmIncomeCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
