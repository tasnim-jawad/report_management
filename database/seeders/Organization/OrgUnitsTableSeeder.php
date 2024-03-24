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
        OrgUnit::insert([
            [
                'title' =>"1no road",
                'description' => "1no road - is an unit",
                'org_type_id' => 1,
                'org_area_id' => 1,
                'org_gender' => 'men',
            ],
            [
                'title' =>"2no road",
                'description' => "2no road - is an unit",
                'org_type_id' => 2,
                'org_area_id' => 2,
                'org_gender' => 'men',
            ],
            [
                'title' =>"3no road",
                'description' => "3no road - is an unit",
                'org_type_id' =>3,
                'org_area_id' =>3,
                'org_gender' => 'men',
            ],
            [
                'title' =>"4no road",
                'description' => "4no road - is an unit",
                'org_type_id' => 1,
                'org_area_id' => 4,
                'org_gender' => 'men',
            ],
            [
                'title' =>"5no road",
                'description' => "5no road - is an unit",
                'org_type_id' => 2,
                'org_area_id' => 1,
                'org_gender' => 'women',
            ],
            [
                'title' =>"6no road",
                'description' => "6no road - is an unit",
                'org_type_id' =>3,
                'org_area_id' => 2,
                'org_gender' => 'women',
            ],
            [
                'title' =>"7no road",
                'description' => "7no road - is an unit",
                'org_type_id' => 1,
                'org_area_id' =>3,
                'org_gender' => 'women',
            ],
        ]);
    }
}
