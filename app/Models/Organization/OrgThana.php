<?php

namespace App\Models\Organization;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrgThana extends Model
{
    use HasFactory;

    public function org_thana_user()
    {
        return $this->hasMany(OrgThanaUser::class);
    }
    public function org_ward_user()
    {
        return $this->hasMany(OrgWardUser::class);
    }
    public function org_unit_user()
    {
        return $this->hasMany(OrgUnitUser::class);
    }

    public function org_thana_responsible()
    {
        return $this->hasMany(OrgThanaResponsible::class);
    }

    public function org_type()
    {
        return $this->belongsTo(OrgType::class);
    }
    public function org_area()
    {
        return $this->belongsTo(OrgArea::class);
    }

    public function org_unit()
    {
        return $this->hasMany(OrgUnit::class);
    }


    public function thana_to_user()
    {
        return $this->hasManyThrough(User::class ,OrgThanaUser::class,  'thana_id','id','id','user_id');
    }
    public function thana_to_responsibility()
    {
        return $this->hasManyThrough(Responsibility::class ,OrgThanaResponsible::class,  'org_thana_id','id','id','responsibility_id');
    }
}
