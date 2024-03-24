<?php

namespace Database\Seeders\Organization;

use App\Models\Organization\OrgCityUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrgCityUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrgCityUser::truncate();
        OrgCityUser::insert([
            [
                'user_id' => 3,
                'city_id' => 1
            ],
            [
                'user_id' => 4,
                'city_id' => 1
            ],
        ]);

    }
}
