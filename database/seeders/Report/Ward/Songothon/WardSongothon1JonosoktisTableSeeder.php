<?php

namespace Database\Seeders\Report\Ward\Songothon;

use App\Models\Report\Ward\Songothon\WardSongothon1Jonosokti;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardSongothon1JonosoktisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardSongothon1Jonosokti::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardSongothon1Jonosokti::create([
                    'report_info_id' => $report_info_id,
                    'rokon_previous' =>  rand(1, 10),
                    'rokon_present' =>  rand(1, 10),
                    'rokon_briddhi' =>  rand(1, 10),
                    'rokon_gatti' =>  rand(1, 10),
                    'rokon_target' =>  rand(1, 10),

                    'worker_previous' =>  rand(1, 10),
                    'worker_present' =>  rand(1, 10),
                    'worker_briddhi' =>  rand(1, 10),
                    'worker_gatti' =>  rand(1, 10),
                    'worker_target' =>  rand(1, 10),

                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
