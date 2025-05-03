<?php

namespace App\Models\Organization;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrgUnit extends Model
{
    use HasFactory;

    public function org_unit_user()
    {
        return $this->hasMany(OrgUnitUser::class);
    }

    public function org_unit_responsible()
    {
        return $this->hasOne(OrgUnitResponsible::class);
    }

    public function org_type()
    {
        return $this->belongsTo(OrgType::class);
    }
    public function org_area()
    {
        return $this->belongsTo(OrgArea::class);
    }

    public function org_city()
    {
        return $this->belongsTo(OrgCity::class);
    }
    public function org_thana()
    {
        return $this->belongsTo(OrgThana::class);
    }
    public function org_ward()
    {
        return $this->belongsTo(OrgWard::class);
    }


    public function unit_to_user()
    {
        return $this->hasManyThrough(User::class ,OrgUnitUser::class,  'unit_id','id','id','user_id');
    }
    public function unit_to_responsibility()
    {
        return $this->hasManyThrough(Responsibility::class ,OrgUnitResponsible::class,  'org_unit_id','id','id','responsibility_id');
    }
}
