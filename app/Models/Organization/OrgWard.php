<?php

namespace App\Models\Organization;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrgWard extends Model
{
    use HasFactory;

    public function org_ward_user()
    {
        return $this->hasMany(OrgWardUser::class);
    }
    public function org_unit_user()
    {
        return $this->hasMany(OrgUnitUser::class);
    }

    public function org_ward_responsible()
    {
        return $this->hasMany(OrgWardResponsible::class);
    }

    public function org_type()
    {
        return $this->belongsTo(OrgType::class);
    }
    public function org_area()
    {
        return $this->belongsTo(OrgArea::class);
    }
}
