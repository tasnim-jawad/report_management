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
        KormosuciBastobayon::create([
            'unit_masik_sadaron_sova_total' => 21,
            'unit_masik_sadaron_sova_target' => 29,
            'unit_masik_sadaron_sova_uposthiti' => 29,
            // 'dawati_sova_total' => 22,
            // 'dawati_sova_target' => 28,
            // 'alochona_sova_total' => 12,
            // 'alochona_sova_target' => 23,
            // 'sudhi_somabesh_total' => 21,
            // 'sudhi_somabesh_target' => 29,
            // 'siratunnabi_mahfil_total' => 24,
            // 'siratunnabi_mahfil_target' => 27,
            // 'eid_reunion_total' => 20,
            // 'eid_reunion_target' => 24,
            // 'dars_total' => 24,
            // 'dars_target' => 28,
            // 'tafsir_total' => 22,
            // 'tafsir_target' => 27,
            // 'dawati_jonosova_total' => 28,
            // 'dawati_jonosova_target' => 23,
            'iftar_mahfil_personal_total' => 23,
            'iftar_mahfil_personal_target' => 24,
            'iftar_mahfil_personal_uposthiti' => 24,

            'iftar_mahfil_samostic_total' => 28,
            'iftar_mahfil_samostic_target' => 29,
            'iftar_mahfil_samostic_uposthiti' => 29,

            'cha_chakra_total' => 24,
            'cha_chakra_target' => 27,
            'cha_chakra_uposthiti' => 27,

            'samostic_khawa_total' => 27,
            'samostic_khawa_target' => 26,
            'samostic_khawa_uposthiti' => 26,

            'sikkha_sofor_total' => 23,
            'sikkha_sofor_target' => 27,
            'sikkha_sofor_uposthiti' => 27,

            // 'kirat_protijogita_total' => 23,
            // 'kirat_protijogita_target' => 27,

            // 'hamd_nat_protijogita_total' => 22,
            // 'hamd_nat_protijogita_target' => 28,

            // 'others_total' => 12,
            // 'others_target' => 24,


            'creator' => 3,
            'status' => 1,
        ]);

    }
}
