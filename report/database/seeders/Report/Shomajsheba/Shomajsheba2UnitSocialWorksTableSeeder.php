<?php

namespace Database\Seeders\Report\Shomajsheba;

use App\Models\Report\Shomajsheba\Shomajsheba2UnitSocialWork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Shomajsheba2UnitSocialWorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shomajsheba2UnitSocialWork::truncate();
        $report_info_id = 1;
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                Shomajsheba2UnitSocialWork::create([
                    'report_info_id' => $report_info_id,
                    'shamajik_onusthane_ongshogrohon' => rand(1, 10),
                    'shamajik_onusthane_shohayota_prodan' => rand(1, 10),
                    'shamajik_birodh_mimangsha' => rand(1, 10),
                    'manobik_shohayota_prodan' => rand(1, 10),
                    'korje_hasana_prodan' => rand(1, 10),
                    'rogir_poricorja' => rand(1, 10),
                    'medical_shohayota_prodan' => rand(1, 10),
                    'nobojatokke_gift_prodan' => rand(1, 10),
                    'voluntarily_blood_donation_kotojon' => rand(1, 10),
                    'voluntarily_blood_donation_kotojonke' => rand(1, 10),
                    'matrikalin_sheba_prodan_kotojon' => rand(1, 10),
                    'matrikalin_sheba_prodan_kotojonke' => rand(1, 10),
                    'mayeter_gosol' => rand(1, 10),
                    'others' => rand(1, 10),
                    'creator' => 8 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
        // Shomajsheba2UnitSocialWork::create([
        //     'shamajik_onusthane_ongshogrohon' => rand(1, 10),
        //     'shamajik_onusthane_shohayota_prodan' => rand(1, 10),
        //     'shamajik_birodh_mimangsha' => rand(1, 10),
        //     'manobik_shohayota_prodan' => rand(1, 10),
        //     'korje_hasana_prodan' => rand(1, 10),
        //     'rogir_poricorja' => rand(1, 10),
        //     'medical_shohayota_prodan' => rand(1, 10),
        //     'nobojatokke_gift_prodan' => rand(1, 10),
        //     'voluntarily_blood_donation_kotojon' => rand(1, 10),
        //     'voluntarily_blood_donation_kotojonke' => rand(1, 10),
        //     'matrikalin_sheba_prodan_kotojon' => rand(1, 10),
        //     'matrikalin_sheba_prodan_kotojonke' => rand(1, 10),
        //     'mayeter_gosol' => rand(1, 10),
        //     'others' => rand(1, 10),


        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Shomajsheba2UnitSocialWork::create([
        //     'shamajik_onusthane_ongshogrohon' => 13,
        //     'shamajik_onusthane_shohayota_prodan' => 33,
        //     'shamajik_birodh_mimangsha' => 33,
        //     'manobik_shohayota_prodan' => 34,
        //     'korje_hasana_prodan' => 35,
        //     'rogir_poricorja' => 36,
        //     'medical_shohayota_prodan' => 13,
        //     'nobojatokke_gift_prodan' => 33,
        //     'voluntarily_blood_donation_kotojon' => 38,
        //     'voluntarily_blood_donation_kotojonke' => 63,
        //     'matrikalin_sheba_prodan_kotojon' => 37,
        //     'matrikalin_sheba_prodan_kotojonke' => 53,
        //     'mayeter_gosol' => 3,
        //     'others' => 13,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Shomajsheba2UnitSocialWork::create([
        //     'shamajik_onusthane_ongshogrohon' => 14,
        //     'shamajik_onusthane_shohayota_prodan' => 43,
        //     'shamajik_birodh_mimangsha' => 44,
        //     'manobik_shohayota_prodan' => 44,
        //     'korje_hasana_prodan' => 45,
        //     'rogir_poricorja' => 46,
        //     'medical_shohayota_prodan' => 14,
        //     'nobojatokke_gift_prodan' => 44,
        //     'voluntarily_blood_donation_kotojon' => 48,
        //     'voluntarily_blood_donation_kotojonke' => 64,
        //     'matrikalin_sheba_prodan_kotojon' => 47,
        //     'matrikalin_sheba_prodan_kotojonke' => 54,
        //     'mayeter_gosol' => 4,
        //     'others' => 14,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Shomajsheba2UnitSocialWork::create([
        //     'shamajik_onusthane_ongshogrohon' => 15,
        //     'shamajik_onusthane_shohayota_prodan' => 53,
        //     'shamajik_birodh_mimangsha' => 55,
        //     'manobik_shohayota_prodan' => 54,
        //     'korje_hasana_prodan' => 55,
        //     'rogir_poricorja' => 56,
        //     'medical_shohayota_prodan' => 15,
        //     'nobojatokke_gift_prodan' => 55,
        //     'voluntarily_blood_donation_kotojon' => 58,
        //     'voluntarily_blood_donation_kotojonke' => 65,
        //     'matrikalin_sheba_prodan_kotojon' => 57,
        //     'matrikalin_sheba_prodan_kotojonke' => 55,
        //     'mayeter_gosol' => 5,
        //     'others' => 15,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
    }
}
