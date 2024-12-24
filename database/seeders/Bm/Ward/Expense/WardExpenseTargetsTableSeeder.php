<?php

namespace Database\Seeders\Bm\Ward\Expense;

use App\Models\Bm\Ward\Expense\WardExpenseTarget;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardExpenseTargetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardExpenseTarget::truncate();
        // $report_info_id = 1;
        for ($i = 1; $i <= 2; $i++) {
            for ($k = 1; $k <= 8; $k++) {
                WardExpenseTarget::create([
                    'ward_id' => $i,
                    'thana_id' => 1,
                    'city_id' => 1,
                    'ward_bm_expense_category_id' => $k,
                    'amount' => 10 * rand(1, 5),
                    'start_from' => "2024-" . str_pad(1, 2, '0', STR_PAD_LEFT) . "-01",

                    'creator' => 8 + $i,
                    'status' => 1,
                ]);
            }
        }
    }
}
