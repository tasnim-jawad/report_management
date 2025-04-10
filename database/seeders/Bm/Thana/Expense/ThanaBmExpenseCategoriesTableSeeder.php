<?php

namespace Database\Seeders\Bm\Thana\Expense;

use App\Models\Bm\Thana\Expense\ThanaBmExpenseCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThanaBmExpenseCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        ThanaBmExpenseCategory::truncate();
        ThanaBmExpenseCategory::create([
            'title' => 'নিছাব পরিশোধ',
            'description' => "প্রাপ্ত নিছাব একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        ThanaBmExpenseCategory::create([
            'title' => 'এককালীন',
            'description' => "এককালীন একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        ThanaBmExpenseCategory::create([
            'title' => 'নিয়মিত খরচ',
            'description' => "সরাসরি ইয়ানত একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        ThanaBmExpenseCategory::create([
            'title' => 'নির্বাচনী ফান্ড',
            'description' => "নির্বাচনী ফান্ড একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        ThanaBmExpenseCategory::create([
            'title' => 'শহীদ ফান্ড',
            'description' => "শহীদ ফান্ড একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        ThanaBmExpenseCategory::create([
            'title' => 'কল্যাণ তহবিল',
            'description' => "কল্যাণ তহবিল একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        ThanaBmExpenseCategory::create([
            'title' => 'সমাজকল্যাণ ও সমাজসেবা',
            'description' => "সমাজসেবা একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        ThanaBmExpenseCategory::create([
            'title' => 'দাওয়াত',
            'description' => "দাওয়াত একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        ThanaBmExpenseCategory::create([
            'title' => 'তারবিয়াত',
            'description' => "তারবিয়াত একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        ThanaBmExpenseCategory::create([
            'title' => 'মানব সম্পদ উন্নয়ন',
            'description' => "মানব সম্পদ উন্নয়ন একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        ThanaBmExpenseCategory::create([
            'title' => 'আইন ও আদালত',
            'description' => "আইন ও আদালত একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        ThanaBmExpenseCategory::create([
            'title' => 'মহিলা বিভাগ',
            'description' => "মহিলা বিভাগ একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        ThanaBmExpenseCategory::create([
            'title' => 'অন্যান্য',
            'description' => "অন্যান্য একটি ব্যয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
