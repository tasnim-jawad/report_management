<?php

namespace Database\Seeders\Report\Kormosuci;

use App\Models\Report\Kormosuci\KormosuciBastobayon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KormosuciBastobayonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KormosuciBastobayon::truncate();
        $report_info_id = 1;
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                KormosuciBastobayon::create([
                    'report_info_id' => $report_info_id,
                    'unit_masik_sadaron_sova_total' => rand(1, 10),
                    'unit_masik_sadaron_sova_target' => rand(1, 10),
                    'unit_masik_sadaron_sova_uposthiti' => rand(1, 10),
                    'iftar_mahfil_personal_total' => rand(1, 10),
                    'iftar_mahfil_personal_target' => rand(1, 10),
                    'iftar_mahfil_personal_uposthiti' => rand(1, 10),

                    'iftar_mahfil_samostic_total' => rand(1, 10),
                    'iftar_mahfil_samostic_target' => rand(1, 10),
                    'iftar_mahfil_samostic_uposthiti' => rand(1, 10),

                    'cha_chakra_total' => rand(1, 10),
                    'cha_chakra_target' => rand(1, 10),
                    'cha_chakra_uposthiti' => rand(1, 10),

                    'samostic_khawa_total' => rand(1, 10),
                    'samostic_khawa_target' => rand(1, 10),
                    'samostic_khawa_uposthiti' => rand(1, 10),

                    'sikkha_sofor_total' => rand(1, 10),
                    'sikkha_sofor_target' => rand(1, 10),
                    'sikkha_sofor_uposthiti' => rand(1, 10),
                    'creator' => 8 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
        // KormosuciBastobayon::create([
        //     'unit_masik_sadaron_sova_total' => rand(1, 10),
        //     'unit_masik_sadaron_sova_target' => rand(1, 10),
        //     'unit_masik_sadaron_sova_uposthiti' => rand(1, 10),
        //     'iftar_mahfil_personal_total' => rand(1, 10),
        //     'iftar_mahfil_personal_target' => rand(1, 10),
        //     'iftar_mahfil_personal_uposthiti' => rand(1, 10),

        //     'iftar_mahfil_samostic_total' => rand(1, 10),
        //     'iftar_mahfil_samostic_target' => rand(1, 10),
        //     'iftar_mahfil_samostic_uposthiti' => rand(1, 10),

        //     'cha_chakra_total' => rand(1, 10),
        //     'cha_chakra_target' => rand(1, 10),
        //     'cha_chakra_uposthiti' => rand(1, 10),

        //     'samostic_khawa_total' => rand(1, 10),
        //     'samostic_khawa_target' => rand(1, 10),
        //     'samostic_khawa_uposthiti' => rand(1, 10),

        //     'sikkha_sofor_total' => rand(1, 10),
        //     'sikkha_sofor_target' => rand(1, 10),
        //     'sikkha_sofor_uposthiti' => rand(1, 10),

        //     'creator' => 3,
        //     'status' => 1,
        // ]);

    }
}
