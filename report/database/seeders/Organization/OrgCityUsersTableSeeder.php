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
                'user_id' => 5,
                'city_id' => 1
            ],
        ]);

    }
}
