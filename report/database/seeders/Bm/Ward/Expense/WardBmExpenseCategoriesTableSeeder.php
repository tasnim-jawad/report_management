<?php

namespace Database\Seeders\Bm\Ward\Expense;

use App\Models\Bm\Ward\Expense\WardBmExpenseCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardBmExpenseCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardBmExpenseCategory::truncate();
        WardBmExpenseCategory::create([
            'title' => 'নিছাব পরিশোধ',
            'description' => "প্রাপ্ত নিছাব একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        WardBmExpenseCategory::create([
            'title' => 'এককালীন',
            'description' => "এককালীন একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        WardBmExpenseCategory::create([
            'title' => 'স্থানীয় খরচ',
            'description' => "সরাসরি ইয়ানত একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        WardBmExpenseCategory::create([
            'title' => 'নির্বাচনী ফান্ড',
            'description' => "নির্বাচনী ফান্ড একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        WardBmExpenseCategory::create([
            'title' => 'শহীদ ফান্ড',
            'description' => "শহীদ ফান্ড একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        WardBmExpenseCategory::create([
            'title' => 'কল্যাণ তহবিল',
            'description' => "কল্যাণ তহবিল একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        WardBmExpenseCategory::create([
            'title' => 'সমাজকল্যাণ ও সমাজসেবা',
            'description' => "সমাজসেবা একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        WardBmExpenseCategory::create([
            'title' => 'দাওয়াত',
            'description' => "দাওয়াত একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        WardBmExpenseCategory::create([
            'title' => 'অন্যান্য',
            'description' => "অন্যান্য একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
