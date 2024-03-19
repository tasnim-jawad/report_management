<?php

namespace Database\Seeders\Organization;

use App\Models\User\OrgThanaUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrgThanaUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrgThanaUser::insert([
            [
                'user_id' => 3,
                'city_id' => 1,
                'thana_id' => 1
            ],
            [
                'user_id' => 4,
                'city_id' => 1,
                'thana_id' => 1
            ],

        ]);
    }
}
