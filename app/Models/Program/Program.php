<?php

namespace App\Models\Program;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public function program_delegate()
    {
        return $this->hasMany(ProgramDelegate::class);
    }
    public function program_schedule()
    {
        return $this->hasMany(ProgramSchedule::class);
    }

    
}
