<?php

namespace App\Models\Bm\Thana\Income;

use App\Models\Shudhi\Shudhi;
use Illuminate\Database\Eloquent\Model;

class ThanaShudhiEntry extends Model
{
    public function thana_bm_income_category()
    {
        return $this->belongsTo(ThanaBmIncomeCategory::class);
    }

    public function shudhi()
    {
        return $this->belongsTo(Shudhi::class);
    }
}
