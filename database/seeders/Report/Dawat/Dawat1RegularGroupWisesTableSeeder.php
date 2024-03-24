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
        Dawat1RegularGroupWise::create([
            'how_many_groups_are_out' => 10,
            'number_of_participants' => 20,
            'how_many_have_been_invited' => 30,
            'how_many_associate_members_created' => 5,
            'creator' => 3,
            'status' => 1,
        ]);
        Dawat1RegularGroupWise::create([
            'how_many_groups_are_out' => 15,
            'number_of_participants' => 22,
            'how_many_have_been_invited' => 20,
            'how_many_associate_members_created' => 4,
            'creator' => 3,
            'status' => 1,
        ]);
        Dawat1RegularGroupWise::create([
            'how_many_groups_are_out' => 25,
            'number_of_participants' => 42,
            'how_many_have_been_invited' => 40,
            'how_many_associate_members_created' => 14,
            'creator' => 3,
            'status' => 1,
        ]);
        Dawat1RegularGroupWise::create([
            'how_many_groups_are_out' => 5,
            'number_of_participants' => 22,
            'how_many_have_been_invited' => 10,
            'how_many_associate_members_created' => 1,
            'creator' => 3,
            'status' => 1,
        ]);
    }
}
