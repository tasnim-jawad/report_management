<?php

namespace Database\Seeders\Organization;

use App\Models\Organization\OrgThana;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrgThanasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrgThana::insert([
            [
                'title' =>"moddho badda",
                'description' => "moddho badda is a thana",
                'org_type_id' => 1,
                'org_area_id' => 1,
            ],
            [
                'title' =>"badda",
                'description' => "badda is a thana",
                'org_type_id' => 2,
                'org_area_id' => 2,
            ],
            [
                'title' =>"haji para",
                'description' => "haji para is a thana",
                'org_type_id' => 3,
                'org_area_id' => 3,
            ],
            [
                'title' =>"kalshi",
                'description' => "kalshi is a thana",
                'org_type_id' => 1,
                'org_area_id' => 4,
            ],
            [
                'title' =>"rampura",
                'description' => "rampura is a thana",
                'org_type_id' => 2,
                'org_area_id' => 1,
            ],
            [
                'title' =>"kuril",
                'description' => "kuril is a thana",
                'org_type_id' => 3,
                'org_area_id' => 2,
            ],
            [
                'title' =>"technical",
                'description' => "technical is a thana",
                'org_type_id' => 1,
                'org_area_id' => 3,
            ],
        ]);
    }
}
