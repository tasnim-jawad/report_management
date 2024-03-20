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
        OrgUnit::insert([
            [
                'title' =>"1no road",
                'description' => "1no road - is an unit",
                'org_type_id' => 1,
                'org_area_id' => 1,
            ],
            [
                'title' =>"2no road",
                'description' => "2no road - is an unit",
                'org_type_id' => 2,
                'org_area_id' => 2,
            ],
            [
                'title' =>"3no road",
                'description' => "3no road - is an unit",
                'org_type_id' =>3,
                'org_area_id' =>3,
            ],
            [
                'title' =>"4no road",
                'description' => "4no road - is an unit",
                'org_type_id' => 1,
                'org_area_id' => 4,
            ],
            [
                'title' =>"5no road",
                'description' => "5no road - is an unit",
                'org_type_id' => 2,
                'org_area_id' => 1,
            ],
            [
                'title' =>"6no road",
                'description' => "6no road - is an unit",
                'org_type_id' =>3,
                'org_area_id' => 2,
            ],
            [
                'title' =>"7no road",
                'description' => "7no road - is an unit",
                'org_type_id' => 1,
                'org_area_id' =>3,
            ],
        ]);
    }
}
