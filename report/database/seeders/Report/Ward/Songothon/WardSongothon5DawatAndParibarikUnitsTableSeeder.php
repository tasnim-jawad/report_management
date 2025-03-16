<?php

namespace Database\Seeders\Report\Ward\Songothon;

use App\Models\Report\Ward\Songothon\WardSongothon5DawatAndParibarikUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardSongothon5DawatAndParibarikUnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardSongothon5DawatAndParibarikUnit::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardSongothon5DawatAndParibarikUnit::create([
                    'report_info_id' => $report_info_id,

                    'dawati_unit_previous' => rand(1, 10),
                    'dawati_unit_present' => rand(1, 10),
                    'dawati_unit_increase' => rand(1, 10),
                    'dawati_unit_gatti' => rand(1, 10),
                    'dawati_unit_target' => rand(1, 10),

                    'paribarik_unit_previous' => rand(1, 10),
                    'paribarik_unit_present' => rand(1, 10),
                    'paribarik_unit_increase' => rand(1, 10),
                    'paribarik_unit_gatti' => rand(1, 10),
                    'paribarik_unit_target' => rand(1, 10),

                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
