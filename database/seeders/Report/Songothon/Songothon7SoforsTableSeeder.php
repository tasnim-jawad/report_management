<?php

namespace Database\Seeders\Report\Songothon;

use App\Models\Report\Songothon\Songothon7Sofor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Songothon7SoforsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Songothon7Sofor::truncate();
        Songothon7Sofor::create([
            'upper_leader_sofor' => 2,
            'ward_sovapotir_sofor' => 2,
            'word_sura_sodosso_sofor' => 2,
            'zilla_mohanogor_leader_sofor' => 2,
            'upozilla_thana_amir_leader_sofor' => 2,
            'upozilla_thana_kormoporisod_team_sodosso_sofor' => 2,
            'zilla_mohanogor_woman_deparment_leader_sofor' => 2,
            'upozilla_thana_woman_deparment_secretariate_sofor' => 2,
            'upozilla_thana_woman_deparment_team_member_sofor' => 2,

            'creator' => 3,
            'status' => 1,
        ]);
        Songothon7Sofor::create([
            'upper_leader_sofor' => 2,
            'ward_sovapotir_sofor' => 2,
            'word_sura_sodosso_sofor' => 2,
            'zilla_mohanogor_leader_sofor' => 2,
            'upozilla_thana_amir_leader_sofor' => 2,
            'upozilla_thana_kormoporisod_team_sodosso_sofor' => 2,
            'zilla_mohanogor_woman_deparment_leader_sofor' => 2,
            'upozilla_thana_woman_deparment_secretariate_sofor' => 2,
            'upozilla_thana_woman_deparment_team_member_sofor' => 2,

            'creator' => 3,
            'status' => 1,
        ]);
        Songothon7Sofor::create([
            'upper_leader_sofor' => 41,
            'ward_sovapotir_sofor' => 41,
            'word_sura_sodosso_sofor' => 41,
            'zilla_mohanogor_leader_sofor' => 41,
            'upozilla_thana_amir_leader_sofor' => 41,
            'upozilla_thana_kormoporisod_team_sodosso_sofor' => 41,
            'zilla_mohanogor_woman_deparment_leader_sofor' => 41,
            'upozilla_thana_woman_deparment_secretariate_sofor' => 41,
            'upozilla_thana_woman_deparment_team_member_sofor' => 41,

            'creator' => 3,
            'status' => 1,
        ]);
        Songothon7Sofor::create([
            'upper_leader_sofor' => 32,
            'ward_sovapotir_sofor' => 32,
            'word_sura_sodosso_sofor' => 32,
            'zilla_mohanogor_leader_sofor' => 32,
            'upozilla_thana_amir_leader_sofor' => 32,
            'upozilla_thana_kormoporisod_team_sodosso_sofor' => 32,
            'zilla_mohanogor_woman_deparment_leader_sofor' => 32,
            'upozilla_thana_woman_deparment_secretariate_sofor' => 32,
            'upozilla_thana_woman_deparment_team_member_sofor' => 32,

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
