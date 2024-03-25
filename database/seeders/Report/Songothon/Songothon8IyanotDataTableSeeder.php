<?php

namespace Database\Seeders\Report\Songothon;

use App\Models\Report\Songothon\Songothon8IyanotData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Songothon8IyanotDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Songothon8IyanotData::truncate();
        Songothon8IyanotData::create([
            'associate_member_total' => 20,
            'associate_member_total_iyanot_amounts' => 22000,
            'sudhi_total' => 23,
            'sudi_total_iyanot_amounts' => 24000,

            'creator' => 3,
            'status' => 1,
        ]);
        Songothon8IyanotData::create([
            'associate_member_total' => 50,
            'associate_member_total_iyanot_amounts' => 55000,
            'sudhi_total' => 53,
            'sudi_total_iyanot_amounts' => 54000,

            'creator' => 3,
            'status' => 1,
        ]);
        Songothon8IyanotData::create([
            'associate_member_total' => 40,
            'associate_member_total_iyanot_amounts' => 44000,
            'sudhi_total' => 43,
            'sudi_total_iyanot_amounts' => 44000,

            'creator' => 3,
            'status' => 1,
        ]);
        Songothon8IyanotData::create([
            'associate_member_total' => 60,
            'associate_member_total_iyanot_amounts' => 66000,
            'sudhi_total' => 63,
            'sudi_total_iyanot_amounts' => 64000,

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
