<?php

namespace Database\Seeders\Organization;

use App\Models\Organization\OrgUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrgUnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrgUnit::truncate();
        for($i = 1;$i<= 5; $i++){
            OrgUnit::create([
                'title' => "$i no road",
                'description' => "$i no road - is an unit",
                'org_city_id' => 1,
                'org_thana_id' => 1,
                'org_ward_id' => 1,
                'org_type_id' => 1,
                'org_area_id' => 1,
                'org_gender' => 'men',
            ]);
        }
        for($i = 6;$i<= 10; $i++){
            OrgUnit::create([
                'title' => "$i no road",
                'description' => "$i no road - is an unit",
                'org_city_id' => 1,
                'org_thana_id' => 1,
                'org_ward_id' => 2,
                'org_type_id' => 1,
                'org_area_id' => 1,
                'org_gender' => 'men',
            ]);
        }
    }
}
