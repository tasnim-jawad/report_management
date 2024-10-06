<?php

namespace Database\Seeders\Report\Ward\Dawat;

use App\Models\Report\Ward\Dawat\WardDawat1RegularGroupWise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardDawat1RegularGroupWisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardDawat1RegularGroupWise::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardDawat1RegularGroupWise::create([
                    'report_info_id' => $report_info_id,
                    'how_many_groups_are_out' => rand(1, 10),
                    'number_of_participants' => rand(1, 10),
                    'how_many_have_been_invited' => rand(1, 10),
                    'how_many_associate_members_created' => rand(1, 10),
                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
