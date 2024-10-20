<?php

namespace App\Models\Organization;

use App\Models\User;
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

    public function org_unit()
    {
        return $this->hasMany(OrgUnit::class);
    }


    public function ward_to_user()
    {
        return $this->hasManyThrough(User::class ,OrgWardUser::class,  'ward_id','id','id','user_id');
    }
    public function ward_to_responsibility()
    {
        // return $this->hasManyThrough(OrgWardResponsible::class, Responsibility::class);
        return $this->hasManyThrough(Responsibility::class ,OrgWardResponsible::class,  'org_ward_id','id','id','responsibility_id');
    }
}
