<?php

namespace Database\Seeders\Report\Ward\Department;

use App\Models\Report\Ward\Department\WardDepartment2MohollaVittikDawat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardDepartment2MohollaVittikDawatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardDepartment2MohollaVittikDawat::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardDepartment2MohollaVittikDawat::create([
                    'report_info_id' => $report_info_id,
                    'govment_calculated_village_amount' => rand(1, 10),
                    'govment_calculated_moholla_amount' => rand(1, 10),

                    'total_village_committee' => rand(1, 10),
                    'total_village_committee_increased' => rand(1, 10),

                    'total_moholla_committee' => rand(1, 10),
                    'total_moholla_committee_increased' => rand(1, 10),

                    'special_dawat_included_village' => rand(1, 10),
                    'special_dawat_included_village_increased' => rand(1, 10),

                    'special_dawat_included_moholla' => rand(1, 10),
                    'special_dawat_included_moholla_increased' => rand(1, 10),

                    'how_many_been_invited' => rand(1, 10),
                    'how_many_associated_created' => rand(1, 10),

                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
