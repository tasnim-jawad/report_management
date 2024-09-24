<?php

namespace Database\Seeders\Bm\Income;

use App\Models\Bm\Income\BmCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BmCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BmCategory::truncate();
        BmCategory::create([
            'title' => 'ইয়ানত আদায়',
            'description' => "ইয়ানত আদায় একটি আয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        BmCategory::create([
            'title' => 'এককালীন',
            'description' => "এককালীন একটি আয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        BmCategory::create([
            'title' => 'নির্বাচনী ফান্ড',
            'description' => "nirbachoni একটি আয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        BmCategory::create([
            'title' => 'শহীদ ফান্ড',
            'description' => "শহীদ ফান্ড একটি আয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        BmCategory::create([
            'title' => 'কল্যাণ তহবিল',
            'description' => "কল্যাণ তহবিল একটি আয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        BmCategory::create([
            'title' => 'সমাজসেবা',
            'description' => "সমাজসেবা একটি আয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        BmCategory::create([
            'title' => 'বই বিক্রি',
            'description' => "বই বিক্রি একটি আয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
        BmCategory::create([
            'title' => 'অন্যান্য',
            'description' => "অন্যান্য একটি আয়ের খাত",

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
