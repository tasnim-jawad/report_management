<?php

namespace Database\Seeders\Report\Proshikkhon;

use App\Models\Report\Proshikkhon\Proshikkhon1Tarbiat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Proshikkhon1TarbiatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proshikkhon1Tarbiat::truncate();
        $report_info_id = 1;
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                Proshikkhon1Tarbiat::create([
                    'report_info_id' => $report_info_id,
                    'sohi_quran_onushilon' => rand(1, 10),
                    'sohi_quran_onushilon_target' => rand(1, 10),
                    'sohi_quran_onushilon_uposthiti' => rand(1, 10),

                    'masala_masayel' => rand(1, 10),
                    'masala_masayel_target' => rand(1, 10),
                    'masala_masayel_uposthiti' => rand(1, 10),

                    'darsul_quran' => rand(1, 10),
                    'darsul_quran_target' => rand(1, 10),
                    'darsul_quran_uposthiti' => rand(1, 10),

                    'darsul_hadis' => rand(1, 10),
                    'darsul_hadis_target' => rand(1, 10),
                    'darsul_hadis_uposthiti' => rand(1, 10),

                    'samostik_path' => rand(1, 10),
                    'samostik_path_target' => rand(1, 10),
                    'samostik_path_uposthiti' => rand(1, 10),

                    'bishoy_vittik_onushilon' => rand(1, 10),
                    'bishoy_vittik_onushilon_target' => rand(1, 10),
                    'bishoy_vittik_onushilon_uposthiti' => rand(1, 10),

                    'creator' => 8 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
        // Proshikkhon1Tarbiat::create([
        //     'tarbiati_boithok_total' => rand(1, 10),
        //     'tarbiati_boithok_target' => rand(1, 10),
        //     'tarbiati_boithok_uposthiti' => rand(1, 10),

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Proshikkhon1Tarbiat::create([
        //     'tarbiati_boithok_total' => 13,
        //     'tarbiati_boithok_target' => 33,
        //     'tarbiati_boithok_uposthiti' => 43,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Proshikkhon1Tarbiat::create([
        //     'tarbiati_boithok_total' => 14,
        //     'tarbiati_boithok_target' => 44,
        //     'tarbiati_boithok_uposthiti' => 44,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Proshikkhon1Tarbiat::create([
        //     'tarbiati_boithok_total' => 15,
        //     'tarbiati_boithok_target' => 55,
        //     'tarbiati_boithok_uposthiti' => 45,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
    }
}
