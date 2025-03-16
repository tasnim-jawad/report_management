<?php

namespace Database\Seeders\Bm\Income;

use App\Models\Bm\Income\BmUserEntry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BmUserEntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BmUserEntry::truncate();
        // $report_info_id = 1;
        for ($i = 1; $i <= 5; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                for ($k = 1; $k <= 8; $k++) {
                    BmUserEntry::create([
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
                    BmUserEntry::create([
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
    }
}
