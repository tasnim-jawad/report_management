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
            'title' => 'ইয়ানত জমা',
            'description' => "ইয়ানত জমা একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        BmExpenseCategory::create([
            'title' => 'এককালীন',
            'description' => "এককালীন একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        BmExpenseCategory::create([
            'title' => 'নির্বাচনী ফান্ড',
            'description' => "নির্বাচনী ফান্ড একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        BmExpenseCategory::create([
            'title' => 'শহীদ ফান্ড',
            'description' => "শহীদ ফান্ড একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        BmExpenseCategory::create([
            'title' => 'কল্যাণ তহবিল',
            'description' => "কল্যাণ তহবিল একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        BmExpenseCategory::create([
            'title' => 'সমাজসেবা',
            'description' => "সমাজসেবা একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        BmExpenseCategory::create([
            'title' => 'অন্যান্য',
            'description' => "অন্যান্য একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
