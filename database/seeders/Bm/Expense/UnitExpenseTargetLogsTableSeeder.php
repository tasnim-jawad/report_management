<?php

namespace Database\Seeders\Bm\Expense;

use App\Models\Bm\Expense\UnitExpenseTargetLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitExpenseTargetLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UnitExpenseTargetLog::truncate();
        // $report_info_id = 1;
        for ($i = 1; $i <= 5; $i++) {
            for ($k = 1; $k <= 7; $k++) {
                UnitExpenseTargetLog::create([
                    'unit_expense_targets_id' => $i,
                    'created_date' => "2024-" . str_pad(1, 2, '0', STR_PAD_LEFT) . "-01",
                    'unit_id' => $i,
                    'ward_id' => 1,
                    'thana_id' => 1,
                    'city_id' => 1,
                    'bm_expense_category_id' => $k,
                    'amount' => 10 * rand(1, 5),
                    'start_from' => "2024-" . str_pad(1, 2, '0', STR_PAD_LEFT) . "-01",

                    'creator' => 8 + $i,
                    'status' => 1,
                ]);
            }
        }
        for ($i = 6; $i <= 10; $i++) {
            for ($k = 1; $k <= 7; $k++) {
                UnitExpenseTargetLog::create([
                    'unit_expense_targets_id' => $i,
                    'created_date' => "2024-" . str_pad(1, 2, '0', STR_PAD_LEFT) . "-01",
                    'unit_id' => $i,
                    'ward_id' => 2,
                    'thana_id' => 1,
                    'city_id' => 1,
                    'bm_expense_category_id' => $k,
                    'amount' => 10 * rand(1, 5),
                    'start_from' => "2024-" . str_pad(1, 2, '0', STR_PAD_LEFT) . "-01",

                    'creator' => 8 + $i,
                    'status' => 1,
                ]);
            }
        }
    }
}
