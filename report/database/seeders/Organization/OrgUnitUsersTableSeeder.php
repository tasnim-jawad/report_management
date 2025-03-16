<?php

namespace Database\Seeders\Organization;

use App\Models\Organization\OrgUnitUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrgUnitUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrgUnitUser::truncate();
        for($i = 1;$i<= 5; $i++){
            OrgUnitUser::create([
                'user_id' => 8 + $i,
                'city_id' => 1,
                'thana_id' => 1,
                'ward_id' => 1,
                'unit_id' => $i,
            ]);
        }
        for($i = 6;$i<= 10; $i++){
            OrgUnitUser::create([
                'user_id' => 8 + $i,
                'city_id' => 1,
                'thana_id' => 1,
                'ward_id' => 2,
                'unit_id' => $i,
            ]);
        }

        // OrgUnitUser::insert([


        //     [
        //         'user_id' => 9,
        //         'city_id' => 1,
        //         'thana_id' => 1,
        //         'ward_id' => 1,
        //         'unit_id' => 1,
        //     ],
        //     [
        //         'user_id' => 10,
        //         'city_id' => 1,
        //         'thana_id' => 1,
        //         'ward_id' => 1,
        //         'unit_id' => 1,
        //     ],
        //     [
        //         'user_id' => 11,
        //         'city_id' => 1,
        //         'thana_id' => 1,
        //         'ward_id' => 1,
        //         'unit_id' => 2,
        //     ],
        //     [
        //         'user_id' => 12,
        //         'city_id' => 1,
        //         'thana_id' => 1,
        //         'ward_id' => 1,
        //         'unit_id' => 2,
        //     ],
        // ]);
    }
}
