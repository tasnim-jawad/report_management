<?php

namespace Database\Seeders\Report\Songothon;

use App\Models\Report\Songothon\Songothon5DawatAndParibarikUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Songothon5DawatAndParibarikUnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Songothon5DawatAndParibarikUnit::truncate();
        Songothon5DawatAndParibarikUnit::create([
            'dawati_unit_previous' => 32,
            'dawati_unit_present' => 32,
            'dawati_unit_increase' => 32,
            'dawati_unit_gatti' => 32,
            'dawati_unit_target' => 32,

            'paribarik_unit_previous' => 32,
            'paribarik_unit_present' => 32,
            'paribarik_unit_increase' => 32,
            'paribarik_unit_gatti' => 32,
            'paribarik_unit_target' => 32,

            'creator' => 3,
            'status' => 1,
        ]);
        Songothon5DawatAndParibarikUnit::create([
            'dawati_unit_previous' => 21,
            'dawati_unit_present' => 21,
            'dawati_unit_increase' => 21,
            'dawati_unit_gatti' => 21,
            'dawati_unit_target' => 21,

            'paribarik_unit_previous' => 21,
            'paribarik_unit_present' => 21,
            'paribarik_unit_increase' => 21,
            'paribarik_unit_gatti' => 21,
            'paribarik_unit_target' => 21,

            'creator' => 3,
            'status' => 1,
        ]);
        Songothon5DawatAndParibarikUnit::create([
            'dawati_unit_previous' => 37,
            'dawati_unit_present' => 37,
            'dawati_unit_increase' => 37,
            'dawati_unit_gatti' => 37,
            'dawati_unit_target' => 37,

            'paribarik_unit_previous' => 37,
            'paribarik_unit_present' => 37,
            'paribarik_unit_increase' => 37,
            'paribarik_unit_gatti' => 37,
            'paribarik_unit_target' => 37,

            'creator' => 3,
            'status' => 1,
        ]);
        Songothon5DawatAndParibarikUnit::create([
            'dawati_unit_previous' => 543,
            'dawati_unit_present' => 543,
            'dawati_unit_increase' => 543,
            'dawati_unit_gatti' => 543,
            'dawati_unit_target' => 543,

            'paribarik_unit_previous' => 543,
            'paribarik_unit_present' => 543,
            'paribarik_unit_increase' => 543,
            'paribarik_unit_gatti' => 543,
            'paribarik_unit_target' => 543,

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
