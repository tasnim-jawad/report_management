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
        $report_info_id = 1;
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                Songothon7Sofor::create([
                    'report_info_id' => $report_info_id,
                    'upper_leader_sofor' => rand(1, 10),
                    'creator' => 8 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
        // Songothon7Sofor::create([
        //     'upper_leader_sofor' => 2,
        //     // 'ward_sovapotir_sofor' => 2,
        //     // 'word_sura_sodosso_sofor' => 2,
        //     // 'zilla_mohanogor_leader_sofor' => 2,
        //     // 'upozilla_thana_amir_leader_sofor' => 2,
        //     // 'upozilla_thana_kormoporisod_team_sodosso_sofor' => 2,
        //     // 'zilla_mohanogor_woman_deparment_leader_sofor' => 2,
        //     // 'upozilla_thana_woman_deparment_secretariate_sofor' => 2,
        //     // 'upozilla_thana_woman_deparment_team_member_sofor' => 2,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Songothon7Sofor::create([
        //     'upper_leader_sofor' => 31,
        //     // 'ward_sovapotir_sofor' => 2,
        //     // 'word_sura_sodosso_sofor' => 2,
        //     // 'zilla_mohanogor_leader_sofor' => 2,
        //     // 'upozilla_thana_amir_leader_sofor' => 2,
        //     // 'upozilla_thana_kormoporisod_team_sodosso_sofor' => 2,
        //     // 'zilla_mohanogor_woman_deparment_leader_sofor' => 2,
        //     // 'upozilla_thana_woman_deparment_secretariate_sofor' => 2,
        //     // 'upozilla_thana_woman_deparment_team_member_sofor' => 2,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Songothon7Sofor::create([
        //     'upper_leader_sofor' => 41,
        //     // 'ward_sovapotir_sofor' => 41,
        //     // 'word_sura_sodosso_sofor' => 41,
        //     // 'zilla_mohanogor_leader_sofor' => 41,
        //     // 'upozilla_thana_amir_leader_sofor' => 41,
        //     // 'upozilla_thana_kormoporisod_team_sodosso_sofor' => 41,
        //     // 'zilla_mohanogor_woman_deparment_leader_sofor' => 41,
        //     // 'upozilla_thana_woman_deparment_secretariate_sofor' => 41,
        //     // 'upozilla_thana_woman_deparment_team_member_sofor' => 41,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Songothon7Sofor::create([
        //     'upper_leader_sofor' => 32,
        //     // 'ward_sovapotir_sofor' => 32,
        //     // 'word_sura_sodosso_sofor' => 32,
        //     // 'zilla_mohanogor_leader_sofor' => 32,
        //     // 'upozilla_thana_amir_leader_sofor' => 32,
        //     // 'upozilla_thana_kormoporisod_team_sodosso_sofor' => 32,
        //     // 'zilla_mohanogor_woman_deparment_leader_sofor' => 32,
        //     // 'upozilla_thana_woman_deparment_secretariate_sofor' => 32,
        //     // 'upozilla_thana_woman_deparment_team_member_sofor' => 32,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
    }
}
