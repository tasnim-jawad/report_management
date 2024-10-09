<?php

namespace Database\Seeders\Bm\Ward\Income;

use App\Models\Bm\Ward\Income\WardBmIncomeCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardBmIncomeCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardBmIncomeCategory::truncate();
        WardBmIncomeCategory::create([
            'title' => 'প্রাপ্ত নিছাব',
            'description' => "প্রাপ্ত নিছাব একটি আয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        WardBmIncomeCategory::create([
            'title' => 'সরাসরি ইয়ানত',
            'description' => "সরাসরি ইয়ানত একটি আয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        WardBmIncomeCategory::create([
            'title' => 'এককালীন',
            'description' => "এককালীন একটি আয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        WardBmIncomeCategory::create([
            'title' => 'নির্বাচনী ফান্ড',
            'description' => "নির্বাচনী ফান্ড একটি আয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        WardBmIncomeCategory::create([
            'title' => 'শহীদ ফান্ড',
            'description' => "শহীদ ফান্ড একটি আয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        WardBmIncomeCategory::create([
            'title' => 'কল্যাণ তহবিল',
            'description' => "কল্যাণ তহবিল একটি আয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        WardBmIncomeCategory::create([
            'title' => 'সমাজকল্যাণ ও সমাজসেবা',
            'description' => "সমাজকল্যাণ ও সমাজসেবা একটি আয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        WardBmIncomeCategory::create([
            'title' => 'প্রকাশনা',
            'description' => "প্রকাশনা একটি আয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        WardBmIncomeCategory::create([
            'title' => 'বই বিক্রি',
            'description' => "বই বিক্রি একটি আয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
