<?php

namespace App\Models\Organization;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrgWardResponsible extends Model
{
    use HasFactory;

    public function user()                             //A OrgWardResponsible can have only one user
    {
        return $this->belongsTo(User::class);
    }

    public function responsibility()
    {
        return $this->belongsTo(Responsibility::class);
    }
    public function org_ward()
    {
        return $this->belongsTo(OrgWard::class);
    }
}
