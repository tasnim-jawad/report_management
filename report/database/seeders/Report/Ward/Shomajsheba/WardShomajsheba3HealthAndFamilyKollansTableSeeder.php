<?php

namespace Database\Seeders\Report\Ward\Shomajsheba;

use App\Models\Report\Ward\Shomajsheba\WardShomajsheba3HealthAndFamilyKollan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardShomajsheba3HealthAndFamilyKollansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardShomajsheba3HealthAndFamilyKollan::truncate();
                $report_info_id = 121;
                for ($i = 1; $i <= 2; $i++) {
                    for ($j = 1; $j <= 12; $j++) {
                        WardShomajsheba3HealthAndFamilyKollan::create([
                            'report_info_id' => $report_info_id,

                            'health_worker_training_programs_attendance' =>  rand(1, 10),
                            'participated_in_health_care_work' =>  rand(1, 10),
                            'served_people' =>  rand(1, 10),

                            'creator' => 6 + $i,
                            'status' => 1,
                        ]);
                        $report_info_id++;
                    }
                }
    }
}
