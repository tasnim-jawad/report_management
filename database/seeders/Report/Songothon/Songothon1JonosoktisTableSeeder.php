<?php

namespace Database\Seeders\Report\Songothon;

use App\Models\Report\Songothon\Songothon1Jonosokti;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Songothon1JonosoktisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Songothon1Jonosokti::truncate();
        $report_info_id = 1;
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                Songothon1Jonosokti::create([
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
                    'creator' => 8 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
        // Songothon1Jonosokti::create([
        //     'rokon_previous' =>  rand(1, 10),
        //     'rokon_present' =>  rand(1, 10),
        //     'rokon_briddhi' =>  rand(1, 10),
        //     'rokon_gatti' =>  rand(1, 10),
        //     'rokon_target' =>  rand(1, 10),

        //     'worker_previous' =>  rand(1, 10),
        //     'worker_present' =>  rand(1, 10),
        //     'worker_briddhi' =>  rand(1, 10),
        //     'worker_gatti' =>  rand(1, 10),
        //     'worker_target' =>  rand(1, 10),

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Songothon1Jonosokti::create([
        //     'rokon_previous' => 13,
        //     'rokon_present' => 13,
        //     'rokon_briddhi' => 3,
        //     'rokon_gatti' => 3,
        //     'rokon_target' => 3,

        //     'worker_previous' => 33,
        //     'worker_present' => 34,
        //     'worker_briddhi' => 3,
        //     'worker_gatti' => 3,
        //     'worker_target' => 30,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Songothon1Jonosokti::create([
        //     'rokon_previous' => 14,
        //     'rokon_present' => 14,
        //     'rokon_briddhi' => 4,
        //     'rokon_gatti' => 4,
        //     'rokon_target' => 4,

        //     'worker_previous' => 44,
        //     'worker_present' => 44,
        //     'worker_briddhi' => 4,
        //     'worker_gatti' => 4,
        //     'worker_target' => 40,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Songothon1Jonosokti::create([
        //     'rokon_previous' => 15,
        //     'rokon_present' => 15,
        //     'rokon_briddhi' => 5,
        //     'rokon_gatti' => 5,
        //     'rokon_target' => 5,

        //     'worker_previous' => 55,
        //     'worker_present' => 54,
        //     'worker_briddhi' => 5,
        //     'worker_gatti' => 5,
        //     'worker_target' => 50,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Songothon1Jonosokti::create([
        //     'rokon_previous' => 16,
        //     'rokon_present' => 16,
        //     'rokon_briddhi' => 6,
        //     'rokon_gatti' => 6,
        //     'rokon_target' => 6,

        //     'worker_previous' => 66,
        //     'worker_present' => 64,
        //     'worker_briddhi' => 6,
        //     'worker_gatti' => 6,
        //     'worker_target' => 60,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
    }
}
