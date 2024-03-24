<?php

namespace Database\Seeders\Report\Dawat;

use App\Models\Report\Dawat\Dawat2PersonalAndTarget;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Dawat2PersonalAndTargetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dawat2PersonalAndTarget::truncate();
        Dawat2PersonalAndTarget::create([
            'total_rokon' => 2,
            'total_worker' => 32,
            'how_many_were_give_dawat' => 10,
            'how_many_have_been_invited' => 23,
            'how_many_associate_members_created' => 25,
            'creator' => 3,
            'status' => 1,
        ]);
        Dawat2PersonalAndTarget::create([
            'total_rokon' => 3,
            'total_worker' => 40,
            'how_many_were_give_dawat' => 30,
            'how_many_have_been_invited' => 65,
            'how_many_associate_members_created' => 35,
            'creator' => 3,
            'status' => 1,
        ]);
        Dawat2PersonalAndTarget::create([
            'total_rokon' => 4,
            'total_worker' => 30,
            'how_many_were_give_dawat' => 30,
            'how_many_have_been_invited' => 40,
            'how_many_associate_members_created' => 12,
            'creator' => 3,
            'status' => 1,
        ]);
        Dawat2PersonalAndTarget::create([
            'total_rokon' => 2,
            'total_worker' => 24,
            'how_many_were_give_dawat' => 20,
            'how_many_have_been_invited' => 15,
            'how_many_associate_members_created' => 5,
            'creator' => 3,
            'status' => 1,
        ]);
    }
}
