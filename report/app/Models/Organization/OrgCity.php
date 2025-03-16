<?php

namespace App\Models\Organization;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrgCity extends Model
{
    use HasFactory;

    public function org_city_user()                         //A OrgCity can have many org_city_user
    {
        return $this->hasMany(OrgCityUser::class);
    }
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

    public function org_city_responsible()                  //A OrgCity can have multiple org_city_responsible
    {
        return $this->hasMany(OrgCityResponsible::class);
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

}
