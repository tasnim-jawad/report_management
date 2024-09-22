<?php

namespace Database\Seeders\Organization;

use App\Models\Organization\OrgCityResponsible;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrgCityResponsiblesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrgCityResponsible::truncate();
        OrgCityResponsible::insert([
            [
                'user_id' => 5,
                'responsibility_id' => 1,
                'org_city_id' => 1,
            ],
            // [
            //     'user_id' => 6,
            //     'responsibility_id' => 2,
            //     'org_city_id' => 1,
            // ],
        ]);
    }
}
