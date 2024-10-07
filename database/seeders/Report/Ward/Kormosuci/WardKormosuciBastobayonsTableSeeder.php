<?php

namespace Database\Seeders\Report\Ward\Kormosuci;

use App\Models\Report\Ward\Kormosuci\WardKormosuciBastobayon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardKormosuciBastobayonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardKormosuciBastobayon::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardKormosuciBastobayon::create([
                    'report_info_id' => $report_info_id,
                    'unit_masik_sadaron_sova_total' => rand(1, 10),
                    'unit_masik_sadaron_sova_target' => rand(1, 10),
                    'unit_masik_sadaron_sova_uposthiti' => rand(1, 10),

                    'dawati_sova_total' => rand(1, 10),
                    'dawati_sova_target' => rand(1, 10),
                    'dawati_sova_uposthiti' => rand(1, 10),

                    'alochona_sova_total' => rand(1, 10),
                    'alochona_sova_target' => rand(1, 10),
                    'alochona_sova_uposthiti' => rand(1, 10),

                    'sudhi_somabesh_total' => rand(1, 10),
                    'sudhi_somabesh_target' => rand(1, 10),
                    'sudhi_somabesh_uposthiti' => rand(1, 10),

                    'siratunnabi_mahfil_total' => rand(1, 10),
                    'siratunnabi_mahfil_target' => rand(1, 10),
                    'siratunnabi_mahfil_uposthiti' => rand(1, 10),

                    'eid_reunion_total' => rand(1, 10),
                    'eid_reunion_target' => rand(1, 10),
                    'eid_reunion_uposthiti' => rand(1, 10),

                    'dars_total' => rand(1, 10),
                    'dars_target' => rand(1, 10),
                    'dars_uposthiti' => rand(1, 10),

                    'tafsir_total' => rand(1, 10),
                    'tafsir_target' => rand(1, 10),
                    'tafsir_uposthiti' => rand(1, 10),

                    'dawati_jonosova_total' => rand(1, 10),
                    'dawati_jonosova_target' => rand(1, 10),
                    'dawati_jonosova_uposthiti' => rand(1, 10),

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

                    'kirat_protijogita_total' => rand(1, 10),
                    'kirat_protijogita_target' => rand(1, 10),
                    'kirat_protijogita_uposthiti' => rand(1, 10),

                    'hamd_nat_protijogita_total' => rand(1, 10),
                    'hamd_nat_protijogita_target' => rand(1, 10),
                    'hamd_nat_protijogita_uposthiti' => rand(1, 10),

                    'others_total' => rand(1, 10),
                    'others_target' => rand(1, 10),
                    'others_uposthiti' => rand(1, 10),

                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
