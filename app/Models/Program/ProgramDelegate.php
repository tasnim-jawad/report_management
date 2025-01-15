<?php

namespace App\Models\Program;

use Illuminate\Database\Eloquent\Model;

class ProgramDelegate extends Model
{
    public function program()                             //A OrgUnitResponsible can have only one user
    {
        return $this->belongsTo(Program::class);
    }
}
