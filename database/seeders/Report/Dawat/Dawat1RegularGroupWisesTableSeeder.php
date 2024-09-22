<?php

namespace Database\Seeders\Report\Dawat;

use App\Models\Report\Dawat\Dawat1RegularGroupWise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Dawat1RegularGroupWisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dawat1RegularGroupWise::truncate();
        $report_info_id = 1;
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                Dawat1RegularGroupWise::create([
                    'report_info_id' => $report_info_id,
                    'how_many_groups_are_out' => rand(1, 10),
                    'number_of_participants' => rand(1, 10),
                    'how_many_have_been_invited' => rand(1, 10),
                    'how_many_associate_members_created' => rand(1, 10),
                    'creator' => 8 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
        // Dawat1RegularGroupWise::create([
        //     'how_many_groups_are_out' => 10,
        //     'number_of_participants' => 20,
        //     'how_many_have_been_invited' => 30,
        //     'how_many_associate_members_created' => 5,
        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Dawat1RegularGroupWise::create([
        //     'how_many_groups_are_out' => 15,
        //     'number_of_participants' => 22,
        //     'how_many_have_been_invited' => 20,
        //     'how_many_associate_members_created' => 4,
        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Dawat1RegularGroupWise::create([
        //     'how_many_groups_are_out' => 25,
        //     'number_of_participants' => 42,
        //     'how_many_have_been_invited' => 40,
        //     'how_many_associate_members_created' => 14,
        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Dawat1RegularGroupWise::create([
        //     'how_many_groups_are_out' => 5,
        //     'number_of_participants' => 22,
        //     'how_many_have_been_invited' => 10,
        //     'how_many_associate_members_created' => 1,
        //     'creator' => 3,
        //     'status' => 1,
        // ]);
    }
}
