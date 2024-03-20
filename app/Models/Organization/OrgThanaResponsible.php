<?php

namespace App\Models\Organization;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrgThanaResponsible extends Model
{
    use HasFactory;

    public function user()                             //A OrgThanaResponsible can have only one user
    {
        return $this->belongsTo(User::class);
    }
    public function responsibility()
    {
        return $this->belongsTo(Responsibility::class);
    }
    public function org_thana()
    {
        return $this->belongsTo(OrgThana::class);
    }
}
