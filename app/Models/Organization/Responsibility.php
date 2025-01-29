<?php

namespace App\Models\Organization;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsibility extends Model
{
    use HasFactory;

    public function org_city_responsible()                  //A Responsibility can have multiple org_city_responsible
    {
        return $this->hasMany(OrgCityResponsible::class);
    }
    public function org_thana_responsible()
    {
        return $this->hasMany(OrgThanaResponsible::class);
    }
    public function org_ward_responsible()
    {
        return $this->hasMany(OrgWardResponsible::class);
    }
    public function org_unit_responsible()
    {
        return $this->hasMany(OrgUnitResponsible::class);
    }

}
