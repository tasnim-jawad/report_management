<?php

namespace App\Models\Organization;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrgThanaUser extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function org_city()
    {
        return $this->belongsTo(OrgCity::class);
    }
    public function org_thana()
    {
        return $this->belongsTo(OrgThana::class);
    }
}
