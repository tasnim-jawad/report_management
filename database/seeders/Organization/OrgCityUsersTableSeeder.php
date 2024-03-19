<?php

namespace Database\Seeders\Organization;

use App\Models\User\OrgCityUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrgCityUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrgCityUser::insert([
            [
                'user_id' => 1,
                'city_id' => 1
            ],
            [
                'user_id' => 2,
                'city_id' => 1
            ],
        ]);

    }
}
