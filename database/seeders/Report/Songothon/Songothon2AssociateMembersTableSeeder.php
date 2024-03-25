<?php

namespace Database\Seeders\Report\Songothon;

use App\Models\Report\Songothon\Songothon2AssociateMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Songothon2AssociateMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Songothon2AssociateMember::truncate();
        Songothon2AssociateMember::create([
            'men_previous' => 12,
            'men_present' => 24,
            'men_briddhi' => 12,
            'men_target' => 2,

            'women_previous' => 22,
            'women_present' => 24,
            'women_briddhi' => 25,
            'women_target' => 24,

            'vinno_dormalombi_previous' => 23,
            'vinno_dormalombi_present' => 23,
            'vinno_dormalombi_briddhi' => 25,
            'vinno_domalombi_target' => 27,

            'creator' => 3,
            'status' => 1,
        ]);
        Songothon2AssociateMember::create([
            'men_previous' => 14,
            'men_present' => 44,
            'men_briddhi' => 14,
            'men_target' => 4,

            'women_previous' => 44,
            'women_present' => 44,
            'women_briddhi' => 45,
            'women_target' => 44,

            'vinno_dormalombi_previous' => 43,
            'vinno_dormalombi_present' => 43,
            'vinno_dormalombi_briddhi' => 45,
            'vinno_domalombi_target' => 47,

            'creator' => 3,
            'status' => 1,
        ]);
        Songothon2AssociateMember::create([
            'men_previous' => 13,
            'men_present' => 34,
            'men_briddhi' => 13,
            'men_target' => 3,

            'women_previous' => 33,
            'women_present' => 34,
            'women_briddhi' => 35,
            'women_target' => 34,

            'vinno_dormalombi_previous' => 33,
            'vinno_dormalombi_present' => 33,
            'vinno_dormalombi_briddhi' => 35,
            'vinno_domalombi_target' => 37,

            'creator' => 3,
            'status' => 1,
        ]);
        Songothon2AssociateMember::create([
            'men_previous' => 15,
            'men_present' => 54,
            'men_briddhi' => 15,
            'men_target' => 5,

            'women_previous' => 55,
            'women_present' => 54,
            'women_briddhi' => 55,
            'women_target' => 54,

            'vinno_dormalombi_previous' => 53,
            'vinno_dormalombi_present' => 53,
            'vinno_dormalombi_briddhi' => 55,
            'vinno_domalombi_target' => 57,

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
