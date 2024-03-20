<?php

namespace App\Models\Organization;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrgType extends Model
{
    use HasFactory;

    public function org_city()                  //A Responsibility can have multiple org_city
    {
        return $this->hasMany(OrgCity::class);
    }
    public function org_thana()
    {
        return $this->hasMany(OrgThana::class);
    }
    public function org_ward()
    {
        return $this->hasMany(OrgWard::class);
    }
    public function org_unit()
    {
        return $this->hasMany(OrgUnit::class);
    }

}
