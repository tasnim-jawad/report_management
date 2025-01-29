<?php

namespace Database\Seeders\Report\Thana\Dawat;

use App\Models\Report\Thana\Dawat\ThanaDawat1RegularGroupWise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThanaDawat1RegularGroupWisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ThanaDawat1RegularGroupWise::truncate();
        $report_info_id = 145;
        for ($j = 1; $j <= 12; $j++) {
            ThanaDawat1RegularGroupWise::create([
                'report_info_id' => $report_info_id,
                'how_many_groups_are_out_man' => rand(1, 10),
                'number_of_participants_man' => rand(1, 10),
                'how_many_have_been_invited_man' => rand(1, 10),
                'how_many_associate_members_created_man' => rand(1, 10),
                'how_many_groups_are_out_woman' => rand(1, 10),
                'number_of_participants_woman' => rand(1, 10),
                'how_many_have_been_invited_woman' => rand(1, 10),
                'how_many_associate_members_created_woman' => rand(1, 10),
                'creator' => 5,
                'status' => 1,
            ]);
            $report_info_id++;
        }
    }
}
