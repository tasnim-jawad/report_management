<?php

namespace Database\Seeders\Organization;

use App\Models\Organization\Responsibility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResponsibilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Responsibility::truncate();
        Responsibility::insert([
            [
                'title' =>"সভাপতি",
                'description' => "head of a organization",
            ],
            [
                'title' =>"সেক্রেটারী",
                'description' => "secretary of a organization",
            ],
            [
                'title' =>"সাংগঠনিক সম্পাদক",
                'description' => "Organizing Secretary of a organization",
            ],
            [
                'title' =>"দফতর সম্পাদক",
                'description' => "দফতর of a organization",
            ],
            [
                'title' =>"আর্থ সম্পাদক",
                'description' => "bm of a organization",
            ],
            [
                'title' =>"শিক্ষা সম্পাদক",
                'description' => "শিক্ষা secretary of a organization",
            ],
            [
                'title' =>"প্রকাশনা সম্পাদক",
                'description' => "প্রকাশনা of a organization",
            ],
            [
                'title' =>"এইচআরডি সম্পাদক",
                'description' => "এইচআরডি of a organization",
            ],
            [
                'title' =>"দাওয়াহ সম্পাদক",
                'description' => "দাওয়াহ of a organization",
            ],
            [
                'title' =>"দফতর সম্পাদক",
                'description' => "দফতর of a organization",
            ],
            [
                'title' =>"সমাজকল্যাণ সম্পাদক",
                'description' => "সমাজকল্যাণ of a organization",
            ],
            [
                'title' =>"সাংস্কৃতিক সম্পাদক",
                'description' => "সাংস্কৃতিক of a organization",
            ],
            
        ]);
    }
}
