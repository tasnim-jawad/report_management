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
        Shomajsheba2UnitSocialWork::create([
            'shamajik_onusthane_ongshogrohon' => 12,
            'shamajik_onusthane_shohayota_prodan' => 23,
            'shamajik_birodh_mimangsha' => 22,
            'manobik_shohayota_prodan' => 24,
            'korje_hasana_prodan' => 25,
            'rogir_poricorja' => 26,
            'medical_shohayota_prodan' => 12,
            'nobojatokke_gift_prodan' => 22,
            'voluntarily_blood_donation_kotojon' => 28,
            'voluntarily_blood_donation_kotojonke' => 62,
            'matrikalin_sheba_prodan_kotojon' => 27,
            'matrikalin_sheba_prodan_kotojonke' => 52,
            'mayeter_gosol' => 2,
            'others' => 12,


            'creator' => 3,
            'status' => 1,
        ]);
        Shomajsheba2UnitSocialWork::create([
            'shamajik_onusthane_ongshogrohon' => 13,
            'shamajik_onusthane_shohayota_prodan' => 33,
            'shamajik_birodh_mimangsha' => 33,
            'manobik_shohayota_prodan' => 34,
            'korje_hasana_prodan' => 35,
            'rogir_poricorja' => 36,
            'medical_shohayota_prodan' => 13,
            'nobojatokke_gift_prodan' => 33,
            'voluntarily_blood_donation_kotojon' => 38,
            'voluntarily_blood_donation_kotojonke' => 63,
            'matrikalin_sheba_prodan_kotojon' => 37,
            'matrikalin_sheba_prodan_kotojonke' => 53,
            'mayeter_gosol' => 3,
            'others' => 13,

            'creator' => 3,
            'status' => 1,
        ]);
        Shomajsheba2UnitSocialWork::create([
            'shamajik_onusthane_ongshogrohon' => 14,
            'shamajik_onusthane_shohayota_prodan' => 43,
            'shamajik_birodh_mimangsha' => 44,
            'manobik_shohayota_prodan' => 44,
            'korje_hasana_prodan' => 45,
            'rogir_poricorja' => 46,
            'medical_shohayota_prodan' => 14,
            'nobojatokke_gift_prodan' => 44,
            'voluntarily_blood_donation_kotojon' => 48,
            'voluntarily_blood_donation_kotojonke' => 64,
            'matrikalin_sheba_prodan_kotojon' => 47,
            'matrikalin_sheba_prodan_kotojonke' => 54,
            'mayeter_gosol' => 4,
            'others' => 14,

            'creator' => 3,
            'status' => 1,
        ]);
        Shomajsheba2UnitSocialWork::create([
            'shamajik_onusthane_ongshogrohon' => 15,
            'shamajik_onusthane_shohayota_prodan' => 53,
            'shamajik_birodh_mimangsha' => 55,
            'manobik_shohayota_prodan' => 54,
            'korje_hasana_prodan' => 55,
            'rogir_poricorja' => 56,
            'medical_shohayota_prodan' => 15,
            'nobojatokke_gift_prodan' => 55,
            'voluntarily_blood_donation_kotojon' => 58,
            'voluntarily_blood_donation_kotojonke' => 65,
            'matrikalin_sheba_prodan_kotojon' => 57,
            'matrikalin_sheba_prodan_kotojonke' => 55,
            'mayeter_gosol' => 5,
            'others' => 15,

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
