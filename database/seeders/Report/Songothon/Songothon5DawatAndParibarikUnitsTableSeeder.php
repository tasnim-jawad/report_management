<?php

namespace Database\Seeders\Report\Songothon;

use App\Models\Report\Songothon\Songothon5DawatAndParibarikUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Songothon5DawatAndParibarikUnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Songothon5DawatAndParibarikUnit::truncate();
        $report_info_id = 1;
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                Songothon5DawatAndParibarikUnit::create([
                    'report_info_id' => $report_info_id,
                    'paribarik_unit_total' => rand(1, 10),
                    'paribarik_unit_increase' => rand(1, 10),
                    'paribarik_unit_target' => rand(1, 10),
                    'creator' => 8 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
        // Songothon5DawatAndParibarikUnit::create([
        //     'paribarik_unit_total' => rand(1, 10),
        //     'paribarik_unit_increase' => rand(1, 10),
        //     'paribarik_unit_target' => rand(1, 10),

        //     // 'dawati_unit_previous' => 32,
        //     // 'dawati_unit_present' => 32,
        //     // 'dawati_unit_increase' => 32,
        //     // 'dawati_unit_gatti' => 32,
        //     // 'dawati_unit_target' => 32,

        //     // 'paribarik_unit_previous' => 32,
        //     // 'paribarik_unit_present' => 32,
        //     // 'paribarik_unit_increase' => 32,
        //     // 'paribarik_unit_gatti' => 32,
        //     // 'paribarik_unit_target' => 32,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Songothon5DawatAndParibarikUnit::create([
        //     'paribarik_unit_total' => 36,
        //     'paribarik_unit_increase' => 36,
        //     'paribarik_unit_target' => 36,

        //     // 'dawati_unit_previous' => 21,
        //     // 'dawati_unit_present' => 21,
        //     // 'dawati_unit_increase' => 21,
        //     // 'dawati_unit_gatti' => 21,
        //     // 'dawati_unit_target' => 21,

        //     // 'paribarik_unit_previous' => 21,
        //     // 'paribarik_unit_present' => 21,
        //     // 'paribarik_unit_increase' => 21,
        //     // 'paribarik_unit_gatti' => 21,
        //     // 'paribarik_unit_target' => 21,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Songothon5DawatAndParibarikUnit::create([
        //     'paribarik_unit_total' => 34,
        //     'paribarik_unit_increase' => 34,
        //     'paribarik_unit_target' => 34,

        //     // 'dawati_unit_previous' => 37,
        //     // 'dawati_unit_present' => 37,
        //     // 'dawati_unit_increase' => 37,
        //     // 'dawati_unit_gatti' => 37,
        //     // 'dawati_unit_target' => 37,

        //     // 'paribarik_unit_previous' => 37,
        //     // 'paribarik_unit_present' => 37,
        //     // 'paribarik_unit_increase' => 37,
        //     // 'paribarik_unit_gatti' => 37,
        //     // 'paribarik_unit_target' => 37,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Songothon5DawatAndParibarikUnit::create([
        //     'paribarik_unit_total' => 35,
        //     'paribarik_unit_increase' => 35,
        //     'paribarik_unit_target' => 35,

        //     // 'dawati_unit_previous' => 543,
        //     // 'dawati_unit_present' => 543,
        //     // 'dawati_unit_increase' => 543,
        //     // 'dawati_unit_gatti' => 543,
        //     // 'dawati_unit_target' => 543,

        //     // 'paribarik_unit_previous' => 543,
        //     // 'paribarik_unit_present' => 543,
        //     // 'paribarik_unit_increase' => 543,
        //     // 'paribarik_unit_gatti' => 543,
        //     // 'paribarik_unit_target' => 543,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
    }
}
