<?php

namespace Database\Seeders\Report\Ward\Songothon;

use App\Models\Report\Ward\Songothon\WardSongothon7Sofor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardSongothon7SoforsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardSongothon7Sofor::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardSongothon7Sofor::create([
                    'report_info_id' => $report_info_id,
                    'upper_leader_sofor' => rand(1, 10),
                    'ward_sovapotir_sofor' => rand(1, 10),
                    'word_sura_sodosso_sofor' => rand(1, 10),

                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
