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
        $report_info_id = 1;
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                Department7DawatInTechnology::create([
                    'report_info_id' => $report_info_id,
                    'total_well_known' => rand(1, 10),
                    'total_attended' => rand(1, 10),
                    'creator' => 8 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
        // Department7DawatInTechnology::create([
        //     'total_well_known' => 13,
        //     'total_attended' => 3,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Department7DawatInTechnology::create([
        //     'total_well_known' => 14,
        //     'total_attended' => 4,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Department7DawatInTechnology::create([
        //     'total_well_known' => 15,
        //     'total_attended' => 5,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Department7DawatInTechnology::create([
        //     'total_well_known' => 12,
        //     'total_attended' => 2,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
    }
}
