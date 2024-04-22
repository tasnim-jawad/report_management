<?php

namespace Database\Seeders\Bm\Expense;

use App\Models\Bm\Expense\BmExpenseCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BmExpenseCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BmExpenseCategory::truncate();
        BmExpenseCategory::create([
            'title' => 'urdhotono eanot porishodh',
            'description' => "urdhotono eanot porishodh is an expense",

            'creator' => 3,
            'status' => 1,
        ]);
        BmExpenseCategory::create([
            'title' => 'Zakat',
            'description' => "Zakat is an expense",

            'creator' => 3,
            'status' => 1,
        ]);
        BmExpenseCategory::create([
            'title' => 'Joruri',
            'description' => "Joruri is an expense",

            'creator' => 3,
            'status' => 1,
        ]);
        BmExpenseCategory::create([
            'title' => 'Shomaj sheba',
            'description' => "Shomaj sheba is an expense",

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
