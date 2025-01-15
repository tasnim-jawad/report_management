<?php

namespace App\Models\Bm\Income;

use App\Models\Shudhi\Shudhi;
use Illuminate\Database\Eloquent\Model;

class UnitShudhiEntry extends Model
{
    public function bm_category()
    {
        return $this->belongsTo(BmCategory::class);
    }

    public function shudhi()
    {
        return $this->belongsTo(Shudhi::class);
    }
}
