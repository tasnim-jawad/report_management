<?php

namespace Database\Seeders\Report\Department;

use App\Models\Report\Department\Department2MohollaVittikDawat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Department2MohollaVittikDawatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department2MohollaVittikDawat::truncate();
        Department2MohollaVittikDawat::create([
            'govment_calculated_village_amount' => 2,
            'govment_calculated_moholla_amount' => 12,

            'total_village' => 12,
            'total_village_increased' => 2,

            'total_moholla' => 32,
            'total_moholla_increased' => 12,

            'special_dawat_included_village' => 12,
            'special_dawat_included_village_increased' => 2,

            'special_dawat_included' => 22,
            'special_dawat_included_moholla_increased' => 2,

            'how_many_been_invited' => 23,
            'how_many_associated_created' => 2,

            'creator' => 3,
            'status' => 1,
        ]);
        Department2MohollaVittikDawat::create([
            'govment_calculated_village_amount' => 3,
            'govment_calculated_moholla_amount' => 13,

            'total_village' => 13,
            'total_village_increased' => 3,

            'total_moholla' => 33,
            'total_moholla_increased' => 13,

            'special_dawat_included_village' => 13,
            'special_dawat_included_village_increased' => 3,

            'special_dawat_included' => 33,
            'special_dawat_included_moholla_increased' => 3,

            'how_many_been_invited' => 33,
            'how_many_associated_created' => 3,

            'creator' => 3,
            'status' => 1,
        ]);
        Department2MohollaVittikDawat::create([
            'govment_calculated_village_amount' => 4,
            'govment_calculated_moholla_amount' => 14,

            'total_village' => 14,
            'total_village_increased' => 4,

            'total_moholla' => 34,
            'total_moholla_increased' => 14,

            'special_dawat_included_village' => 14,
            'special_dawat_included_village_increased' => 4,

            'special_dawat_included' => 44,
            'special_dawat_included_moholla_increased' => 4,

            'how_many_been_invited' => 43,
            'how_many_associated_created' => 4,

            'creator' => 3,
            'status' => 1,
        ]);
        Department2MohollaVittikDawat::create([
            'govment_calculated_village_amount' => 5,
            'govment_calculated_moholla_amount' => 15,

            'total_village' => 15,
            'total_village_increased' => 5,

            'total_moholla' => 35,
            'total_moholla_increased' => 15,

            'special_dawat_included_village' => 15,
            'special_dawat_included_village_increased' => 5,

            'special_dawat_included' => 55,
            'special_dawat_included_moholla_increased' => 5,

            'how_many_been_invited' => 53,
            'how_many_associated_created' => 5,

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
