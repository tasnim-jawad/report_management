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
        OrgThana::truncate();
        OrgThana::insert([
            [
                'title' =>"mirpur 1",
                'description' => "mirpur 1 is a thana",
                'org_city_id' => 1,
                'org_type_id' => 1,
                'org_area_id' => 1,
                'org_gender' => 'men',
            ],
            // [
            //     'title' =>"mirpur 2",
            //     'description' => "mirpur 2 is a thana",
            //     'org_type_id' => 1,
            //     'org_area_id' => 1,
            //     'org_gender' => 'men',
            // ],
            // [
            //     'title' =>"haji para",
            //     'description' => "haji para is a thana",
            //     'org_type_id' => 3,
            //     'org_area_id' => 3,
            //     'org_gender' => 'men',
            // ],
            // [
            //     'title' =>"kalshi",
            //     'description' => "kalshi is a thana",
            //     'org_type_id' => 1,
            //     'org_area_id' => 4,
            //     'org_gender' => 'men',
            // ],
            // [
            //     'title' =>"rampura",
            //     'description' => "rampura is a thana",
            //     'org_type_id' => 2,
            //     'org_area_id' => 1,
            //     'org_gender' => 'women',
            // ],
            // [
            //     'title' =>"kuril",
            //     'description' => "kuril is a thana",
            //     'org_type_id' => 3,
            //     'org_area_id' => 2,
            //     'org_gender' => 'women',
            // ],
            // [
            //     'title' =>"technical",
            //     'description' => "technical is a thana",
            //     'org_type_id' => 1,
            //     'org_area_id' => 3,
            //     'org_gender' => 'women',
            // ],
        ]);
    }
}
