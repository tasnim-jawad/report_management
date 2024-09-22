<?php

namespace Database\Seeders\Organization;

use App\Models\Organization\OrgCity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrgCitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrgCity::truncate();
        OrgCity::insert([
            [
                'title' =>"dhaka mohanogori uttor",
                'description' => "dhaka mohanogori uttor is a city",
                'org_type_id' => 1,
                'org_area_id' => 1,
                'org_gender' => 'men',
            ],
            // [
            //     'title' =>"dhaka mohanogori dokkhin",
            //     'description' => "dhaka mohanogori dokkhin is a city",
            //     'org_type_id' => 2,
            //     'org_area_id' => 2,
            //     'org_gender' => 'men',
            // ],
            // [
            //     'title' =>"rajshahi mohanogori",
            //     'description' => "rajshahi mohanogori is a city",
            //     'org_type_id' => 3,
            //     'org_area_id' => 3,
            //     'org_gender' => 'men',
            // ],
            // [
            //     'title' =>"khulna mohanogori",
            //     'description' => "khulna mohanogori is a city",
            //     'org_type_id' => 1,
            //     'org_area_id' => 4,
            //     'org_gender' => 'men',
            // ],
            // [
            //     'title' =>"chittagong mohanogori",
            //     'description' => "chittagong mohanogori is a city",
            //     'org_type_id' => 2,
            //     'org_area_id' => 1,
            //     'org_gender' => 'women',
            // ],
            // [
            //     'title' =>"rajshahi mohanogori",
            //     'description' => "chittagong mohanogori is a city",
            //     'org_type_id' => 2,
            //     'org_area_id' => 1,
            //     'org_gender' => 'women',
            // ],
        ]);
    }
}
