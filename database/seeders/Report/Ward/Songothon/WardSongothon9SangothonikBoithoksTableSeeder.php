<?php

namespace Database\Seeders\Report\Ward\Songothon;

use App\Models\Report\Ward\Songothon\WardSongothon9SangothonikBoithok;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardSongothon9SangothonikBoithoksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardSongothon9SangothonikBoithok::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardSongothon9SangothonikBoithok::create([
                    'report_info_id' => $report_info_id,

                    'word_sura_boithok_total' =>  rand(1, 10),
                    'word_sura_boithok_target' =>  rand(1, 10),
                    'word_sura_boithok_uposthiti' =>  rand(1, 10),

                    'kormoporishod_boithok_total' =>  rand(1, 10),
                    'kormoporishod_boithok_target' =>  rand(1, 10),
                    'kormoporishod_boithok_uposthiti' =>  rand(1, 10),

                    'team_boithok_total' =>  rand(1, 10),
                    'team_boithok_target' =>  rand(1, 10),
                    'team_boithok_uposthiti' =>  rand(1, 10),

                    'word_boithok_total' =>  rand(1, 10),
                    'word_boithok_target' =>  rand(1, 10),
                    'word_boithok_uposthiti' =>  rand(1, 10),

                    'masik_sodosso_boithok_total' =>  rand(1, 10),
                    'masik_sodosso_boithok_target' =>  rand(1, 10),
                    'masik_sodosso_boithok_uposthiti' =>  rand(1, 10),

                    'unit_kormi_boithok_total' =>  rand(1, 10),
                    'unit_kormi_boithok_target' =>  rand(1, 10),
                    'unit_kormi_boithok_uposthiti' =>  rand(1, 10),

                    'ulama_somabesh_total' =>  rand(1, 10),
                    'ulama_somabesh_target' =>  rand(1, 10),
                    'ulama_somabesh_uposthiti' =>  rand(1, 10),

                    'jubok_somabesh_total' =>  rand(1, 10),
                    'jubok_somabesh_target' =>  rand(1, 10),
                    'jubok_somabesh_uposthiti' =>  rand(1, 10),

                    'sromik_somabesh_total' =>  rand(1, 10),
                    'sromik_somabesh_target' =>  rand(1, 10),
                    'sromik_somabesh_uposthiti' =>  rand(1, 10),

                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
