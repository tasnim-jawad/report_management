<?php

namespace Database\Seeders\Report\Department;

use App\Models\Report\Department\Department7DawatInTechnology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Department7DawatInTechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department7DawatInTechnology::truncate();
        Department7DawatInTechnology::create([
            'total_well_known' => 13,
            'total_attended' => 3,

            'creator' => 3,
            'status' => 1,
        ]);
        Department7DawatInTechnology::create([
            'total_well_known' => 14,
            'total_attended' => 4,

            'creator' => 3,
            'status' => 1,
        ]);
        Department7DawatInTechnology::create([
            'total_well_known' => 15,
            'total_attended' => 5,

            'creator' => 3,
            'status' => 1,
        ]);
        Department7DawatInTechnology::create([
            'total_well_known' => 12,
            'total_attended' => 2,

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
