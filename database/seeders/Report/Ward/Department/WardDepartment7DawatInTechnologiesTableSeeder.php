<?php

namespace Database\Seeders\Report\Ward\Department;

use App\Models\Report\Ward\Department\WardDepartment7DawatInTechnology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardDepartment7DawatInTechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardDepartment7DawatInTechnology::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardDepartment7DawatInTechnology::create([
                    'report_info_id' => $report_info_id,
                    'total_well_known' => rand(1, 10),
                    'total_attended' => rand(1, 10),

                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
