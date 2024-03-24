<?php

namespace Database\Seeders\Organization;

use App\Models\Organization\OrgWardUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrgWardUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrgWardUser::truncate();
        OrgWardUser::insert([
            [
                'user_id' => 7,
                'city_id' => 1,
                'thana_id' => 1,
                'ward_id' => 1,
            ],
            [
                'user_id' => 8,
                'city_id' => 1,
                'thana_id' => 1,
                'ward_id' => 1,
            ],
        ]);
    }
}
