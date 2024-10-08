<?php

namespace Database\Seeders\Report\Ward\Shomajsheba;

use App\Models\Report\Ward\Shomajsheba\WardShomajsheba1PersonalSocialWork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardShomajsheba1PersonalSocialWorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardShomajsheba1PersonalSocialWork::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardShomajsheba1PersonalSocialWork::create([
                    'report_info_id' => $report_info_id,
                    'how_many_people_did' => rand(1, 10),
                    'service_received_total' => rand(1, 10),

                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
