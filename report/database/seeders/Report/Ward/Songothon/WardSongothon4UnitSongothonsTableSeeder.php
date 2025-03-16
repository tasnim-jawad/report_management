<?php

namespace Database\Seeders\Report\Ward\Songothon;

use App\Models\Report\Ward\Songothon\WardSongothon4UnitSongothon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardSongothon4UnitSongothonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardSongothon4UnitSongothon::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardSongothon4UnitSongothon::create([
                    'report_info_id' => $report_info_id,
                    'general_unit_men_previous' => rand(1, 10),
                    'general_unit_men_present' => rand(1, 10),
                    'general_unit_men_increase' => rand(1, 10),
                    'general_unit_men_gatti' => rand(1, 10),
                    'general_unit_men_target' => rand(1, 10),

                    'general_unit_women_previous' => rand(1, 10),
                    'general_unit_women_present' => rand(1, 10),
                    'general_unit_women_increase' => rand(1, 10),
                    'general_unit_women_gatti' => rand(1, 10),
                    'general_unit_women_target' => rand(1, 10),

                    'ulama_unit_previous' => rand(1, 10),
                    'ulama_unit_present' => rand(1, 10),
                    'ulama_unit_increase' => rand(1, 10),
                    'ulama_unit_gatti' => rand(1, 10),
                    'ulama_unit_target' => rand(1, 10),

                    'peshajibi_unit_previous' => rand(1, 10),
                    'peshajibi_unit_present' => rand(1, 10),
                    'peshajibi_unit_increase' => rand(1, 10),
                    'peshajibi_unit_gatti' => rand(1, 10),
                    'peshajibi_unit_target' => rand(1, 10),

                    'sromik_kollyan_unit_previous' => rand(1, 10),
                    'sromik_kollyan_unit_present' => rand(1, 10),
                    'sromik_kollyan_unit_increase' => rand(1, 10),
                    'sromik_kollyan_unit_gatti' => rand(1, 10),
                    'sromik_kollyan_unit_target' => rand(1, 10),

                    'jubo_unit_previous' => rand(1, 10),
                    'jubo_unit_present' => rand(1, 10),
                    'jubo_unit_increase' => rand(1, 10),
                    'jubo_unit_gatti' => rand(1, 10),
                    'jubo_unit_target' => rand(1, 10),

                    'media_unit_previous' => rand(1, 10),
                    'media_unit_present' => rand(1, 10),
                    'media_unit_increase' => rand(1, 10),
                    'media_unit_gatti' => rand(1, 10),
                    'media_unit_target' => rand(1, 10),

                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
