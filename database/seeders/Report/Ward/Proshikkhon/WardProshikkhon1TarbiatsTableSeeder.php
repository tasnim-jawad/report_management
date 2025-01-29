<?php

namespace Database\Seeders\Report\Ward\Proshikkhon;

use App\Models\Report\Ward\Proshikkhon\WardProshikkhon1Tarbiat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardProshikkhon1TarbiatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardProshikkhon1Tarbiat::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardProshikkhon1Tarbiat::create([
                    'report_info_id' => $report_info_id,

                    'unit_tarbiati_boithok' =>  rand(1, 10),
                    'unit_tarbiati_boithok_target' =>  rand(1, 10),
                    'unit_tarbiati_boithok_uposthiti' =>  rand(1, 10),

                    'ward_kormi_sikkha_boithok' =>  rand(1, 10),
                    'ward_kormi_sikkha_boithok_target' =>  rand(1, 10),
                    'ward_kormi_sikkha_boithok_uposthiti' =>  rand(1, 10),

                    'urdhotono_sikkha_shibir' =>  rand(1, 10),
                    'urdhotono_sikkha_shibir_target' =>  rand(1, 10),
                    'urdhotono_sikkha_shibir_uposthiti' =>  rand(1, 10),

                    'urdhotono_sikkha_boithok' =>  rand(1, 10),
                    'urdhotono_sikkha_boithok_target' =>  rand(1, 10),
                    'urdhotono_sikkha_boithok_uposthiti' =>  rand(1, 10),

                    'gono_sikkha_boithok' =>  rand(1, 10),
                    'gono_sikkha_boithok_target' =>  rand(1, 10),
                    'gono_sikkha_boithok_uposthiti' =>  rand(1, 10),

                    'gono_noisho_ibadot' =>  rand(1, 10),
                    'gono_noisho_ibadot_target' =>  rand(1, 10),
                    'gono_noisho_ibadot_uposthiti' =>  rand(1, 10),

                    'alochona_chokro_group' =>  rand(1, 10),
                    'alochona_chokro_program' =>  rand(1, 10),
                    'alochona_chokro_uposthiti' =>  rand(1, 10),

                    'darsul_quran_program' =>  rand(1, 10),
                    'darsul_quran_uposthiti' =>  rand(1, 10),

                    'sohih_tilawat_program' =>  rand(1, 10),
                    'sohih_tilawat_uposthiti' =>  rand(1, 10),

                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
