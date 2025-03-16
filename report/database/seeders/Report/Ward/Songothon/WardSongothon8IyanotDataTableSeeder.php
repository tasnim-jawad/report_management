<?php

namespace Database\Seeders\Report\Ward\Songothon;

use App\Models\Report\Ward\Songothon\WardSongothon8IyanotData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardSongothon8IyanotDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardSongothon8IyanotData::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardSongothon8IyanotData::create([
                    'report_info_id' => $report_info_id,
                    'associate_member_total' => rand(1, 10),
                    'associate_member_total_iyanot_amounts' => rand(100, 1000),
                    'sudhi_total' => rand(1, 10),
                    'sudi_total_iyanot_amounts' => rand(100, 1000),

                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
