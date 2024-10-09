<?php

namespace Database\Seeders\Bm\Ward\Expense;

use App\Models\Bm\Ward\Expense\WardBmExpense;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardBmExpensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardBmExpense::truncate();
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                for ($k = 1; $k <= 9; $k++) {
                    WardBmExpense::create([
                        'user_id' => 6 + $i,
                        'ward_id' => $i,
                        'thana_id' => 1,
                        'city_id' => 1,
                        'amount' => 10 * rand(1, 5),
                        'date' => "2024-" . str_pad($j, 2, '0', STR_PAD_LEFT) . "-01",
                        'ward_bm_expense_category_id' => $k,

                        'creator' => 6 + $i,
                        'status' => 1,
                    ]);
                }
            }
        }

    }
}
