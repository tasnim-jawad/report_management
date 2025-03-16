<?php

namespace Database\Seeders\Bm\Income;

use App\Models\Bm\Income\BmPaid;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BmPaidsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BmPaid::truncate();
        // $report_info_id = 1;
        for ($i = 1; $i <= 5; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                for ($k = 1; $k <= 8; $k++) {
                    BmPaid::create([
                        'user_id' => 8 + $i,
                        'unit_id' => $i,
                        'ward_id' => 1,
                        'thana_id' => 1,
                        'city_id' => 1,
                        'amount' => 10 * rand(1, 5),
                        'month' => "2024-" . str_pad($j, 2, '0', STR_PAD_LEFT) . "-01",
                        'bm_category_id' => $k,

                        'creator' => 8 + $i,
                        'status' => 1,
                    ]);
                }
            }
        }
        for ($i = 6; $i <= 10; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                for ($k = 1; $k <= 8; $k++) {
                    BmPaid::create([
                        'user_id' => 8 + $i,
                        'unit_id' => $i,
                        'ward_id' => 2,
                        'thana_id' => 1,
                        'city_id' => 1,
                        'amount' => 10 * rand(1, 5),
                        'month' => "2024-" . str_pad($j, 2, '0', STR_PAD_LEFT) . "-01",
                        'bm_category_id' => $k,

                        'creator' => 8 + $i,
                        'status' => 1,
                    ]);
                }
            }
        }
        // BmPaid::create([
        //     'user_id' => 1,
        //     'unit_id' => 1,
        //     'ward_id' => 1,
        //     'thana_id' => 1,
        //     'city_id' => 1,
        //     'amount' => 1000,
        //     'month' => "2024-04-21",
        //     'bm_category_id' => 1,

        //     'creator' => 2,
        //     'status' => 1,
        // ]);
        // BmPaid::create([
        //     'user_id' => 2,
        //     'unit_id' => 2,
        //     'ward_id' => 2,
        //     'thana_id' => 2,
        //     'city_id' => 2,
        //     'amount' => 2000,
        //     'month' => "2024-04-21",
        //     'bm_category_id' => 2,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // BmPaid::create([
        //     'user_id' => 3,
        //     'unit_id' => 3,
        //     'ward_id' => 3,
        //     'thana_id' => 3,
        //     'city_id' => 3,
        //     'amount' => 3000,
        //     'month' => "2024-04-21",
        //     'bm_category_id' => 3,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // BmPaid::create([
        //     'user_id' => 4,
        //     'unit_id' => 4,
        //     'ward_id' => 4,
        //     'thana_id' => 4,
        //     'city_id' => 4,
        //     'amount' => 4000,
        //     'month' => "2024-04-21",
        //     'bm_category_id' => 4,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
    }
}
