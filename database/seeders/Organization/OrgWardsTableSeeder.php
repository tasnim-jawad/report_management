<?php

namespace Database\Seeders\Organization;

use App\Models\Organization\OrgWard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrgWardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrgWard::insert([
            [
                'title' =>"1no south",
                'no' => 1,
                'description' => "1no south is a ward",
                'org_type_id' => 1,
                'org_area_id' => 1,
            ],
            [
                'title' =>"1 north",
                'no' => 1,
                'description' => "1 north is a ward",
                'org_type_id' => 2,
                'org_area_id' => 2,
            ],
            [
                'title' =>"shantipur",
                'no' => 2,
                'description' => "shantipur is a ward",
                'org_type_id' => 3,
                'org_area_id' => 3,
            ],
            [
                'title' =>"olama",
                'no' => 2,
                'description' => "olama is a ward",
                'org_type_id' => 1,
                'org_area_id' => "4",
            ],
            [
                'title' =>"sipahibag",
                'no' => 3,
                'description' => "sipahibag is a ward",
                'org_type_id' => 2,
                'org_area_id' => 1,
            ],
            [
                'title' =>"golapbag",
                'no' => 3,
                'description' => "golapbag is a ward",
                'org_type_id' => 3,
                'org_area_id' => 2,
            ],
            [
                'title' =>"kurmitola",
                'no' => 4,
                'description' => "kurmitola is a ward",
                'org_type_id' => 1,
                'org_area_id' => 3,
            ],
        ]);
    }
}
