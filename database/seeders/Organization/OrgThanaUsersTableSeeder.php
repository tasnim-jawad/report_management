<?php

namespace Database\Seeders\Organization;

use App\Models\Organization\OrgThanaUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrgThanaUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrgThanaUser::truncate();
        OrgThanaUser::insert([
            [
                'user_id' => 7,
                'city_id' => 1,
                'thana_id' => 1
            ],
            [
                'user_id' => 8,
                'city_id' => 1,
                'thana_id' => 1
            ],

        ]);
    }
}
