<?php

namespace Database\Seeders\Organization;

use App\Models\User\OrgCity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrgCitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrgCity::insert([
            [
                'title' =>"dhaka mohanogori uttor",
                'description' => "dhaka mohanogori uttor is a city",
                'org_type_id' => 1,
                'org_area_id' => 1,
            ],
            [
                'title' =>"dhaka mohanogori dokkhin",
                'description' => "dhaka mohanogori dokkhin is a city",
                'org_type_id' => 2,
                'org_area_id' => 2,
            ],
            [
                'title' =>"rajshahi mohanogori",
                'description' => "rajshahi mohanogori is a city",
                'org_type_id' => 3,
                'org_area_id' => 3,
            ],
            [
                'title' =>"khulna mohanogori",
                'description' => "khulna mohanogori is a city",
                'org_type_id' => 1,
                'org_area_id' => 4,
            ],
            [
                'title' =>"chittagong mohanogori",
                'description' => "chittagong mohanogori is a city",
                'org_type_id' => 2,
                'org_area_id' => 1,
            ],
        ]);
    }
}
