<?php

namespace Database\Seeders\Report\Department;

use App\Models\Report\Department\Department8DawatInCulturalProgram;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Department8DawatInCulturalProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department8DawatInCulturalProgram::truncate();
        Department8DawatInCulturalProgram::create([
            'total_cultural_team' => 12,
            'total_program' => 2,
            'total_invited' => 2,

            'creator' => 3,
            'status' => 1,
        ]);
        Department8DawatInCulturalProgram::create([
            'total_cultural_team' => 13,
            'total_program' => 3,
            'total_invited' => 3,

            'creator' => 3,
            'status' => 1,
        ]);
        Department8DawatInCulturalProgram::create([
            'total_cultural_team' => 14,
            'total_program' => 4,
            'total_invited' => 4,

            'creator' => 3,
            'status' => 1,
        ]);
        Department8DawatInCulturalProgram::create([
            'total_cultural_team' => 15,
            'total_program' => 5,
            'total_invited' => 5,

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
