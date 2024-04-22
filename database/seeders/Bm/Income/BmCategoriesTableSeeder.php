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
            'title' => 'Dharjo',
            'description' => "Dharjo is an income",

            'creator' => 3,
            'status' => 1,
        ]);
        BmCategory::create([
            'title' => 'ekkalin',
            'description' => "ekkalin is an income",

            'creator' => 3,
            'status' => 1,
        ]);
        BmCategory::create([
            'title' => 'nirbachoni',
            'description' => "nirbachoni is an income",

            'creator' => 3,
            'status' => 1,
        ]);
        BmCategory::create([
            'title' => 'Shomaj sheba',
            'description' => "Shomaj sheba is an income",

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
