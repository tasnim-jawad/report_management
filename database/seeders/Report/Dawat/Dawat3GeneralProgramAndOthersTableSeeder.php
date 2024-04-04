<?php

namespace Database\Seeders\Report\Dawat;

use App\Models\Report\Dawat\Dawat3GeneralProgramAndOthers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Dawat3GeneralProgramAndOthersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dawat3GeneralProgramAndOthers::truncate();
        Dawat3GeneralProgramAndOthers::create([
            'how_many_were_give_dawat' => 10,
            // 'how_many_have_been_invited' => 23,
            'how_many_associate_members_created' => 25,
            'creator' => 3,
            'status' => 1,
        ]);
        Dawat3GeneralProgramAndOthers::create([
            'how_many_were_give_dawat' => 30,
            // 'how_many_have_been_invited' => 65,
            'how_many_associate_members_created' => 35,
            'creator' => 3,
            'status' => 1,
        ]);
        Dawat3GeneralProgramAndOthers::create([
            'how_many_were_give_dawat' => 30,
            // 'how_many_have_been_invited' => 40,
            'how_many_associate_members_created' => 12,
            'creator' => 3,
            'status' => 1,
        ]);
        Dawat3GeneralProgramAndOthers::create([
            'how_many_were_give_dawat' => 20,
            // 'how_many_have_been_invited' => 15,
            'how_many_associate_members_created' => 5,
            'creator' => 3,
            'status' => 1,
        ]);
    }
}
