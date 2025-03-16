<?php

namespace Database\Seeders\Bm\Income;

use App\Models\Bm\Income\BmCategoryUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BmCategoryUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BmCategoryUser::truncate();
        BmCategoryUser::create([
            'user_id' => 1,
            'unit_id' => 1,
            'ward_id' => 1,
            'thana_id' => 1,
            'city_id' => 1,
            'amount' => 1000,
            'bm_category_id' => 1,

            'creator' => 2,
            'status' => 1,
        ]);
        BmCategoryUser::create([
            'user_id' => 2,
            'unit_id' => 2,
            'ward_id' => 2,
            'thana_id' => 2,
            'city_id' => 2,
            'amount' => 2000,
            'bm_category_id' => 2,

            'creator' => 3,
            'status' => 1,
        ]);
        BmCategoryUser::create([
            'user_id' => 3,
            'unit_id' => 3,
            'ward_id' => 3,
            'thana_id' => 3,
            'city_id' => 3,
            'amount' => 3000,
            'bm_category_id' => 3,

            'creator' => 3,
            'status' => 1,
        ]);
        BmCategoryUser::create([
            'user_id' => 4,
            'unit_id' => 4,
            'ward_id' => 4,
            'thana_id' => 4,
            'city_id' => 4,
            'amount' => 4000,
            'bm_category_id' => 4,

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
