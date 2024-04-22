<?php

namespace Database\Seeders\Bm\Expense;

use App\Models\Bm\Expense\BmExpense;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BmExpensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BmExpense::truncate();
        BmExpense::create([
            'user_id' => 1,
            'unit_id' => 1,
            'ward_id' => 1,
            'thana_id' => 1,
            'city_id' => 1,
            'amount' => 1000,
            'date' => "2024-04-21",
            'bm_expense_category_id' => 1,

            'creator' => 2,
            'status' => 1,
        ]);
        BmExpense::create([
            'user_id' => 2,
            'unit_id' => 2,
            'ward_id' => 2,
            'thana_id' => 2,
            'city_id' => 2,
            'amount' => 2000,
            'date' => "2024-04-21",
            'bm_expense_category_id' => 2,

            'creator' => 3,
            'status' => 1,
        ]);
        BmExpense::create([
            'user_id' => 3,
            'unit_id' => 3,
            'ward_id' => 3,
            'thana_id' => 3,
            'city_id' => 3,
            'amount' => 3000,
            'date' => "2024-04-21",
            'bm_expense_category_id' => 3,

            'creator' => 3,
            'status' => 1,
        ]);
        BmExpense::create([
            'user_id' => 4,
            'unit_id' => 4,
            'ward_id' => 4,
            'thana_id' => 4,
            'city_id' => 4,
            'amount' => 4000,
            'date' => "2024-04-21",
            'bm_expense_category_id' => 4,

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
