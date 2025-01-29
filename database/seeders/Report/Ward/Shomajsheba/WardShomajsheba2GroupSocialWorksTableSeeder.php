<?php

namespace Database\Seeders\Report\Ward\Shomajsheba;

use App\Models\Report\Ward\Shomajsheba\WardShomajsheba2GroupSocialWork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardShomajsheba2GroupSocialWorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardShomajsheba2GroupSocialWork::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardShomajsheba2GroupSocialWork::create([
                    'report_info_id' => $report_info_id,

                    'number_of_general_service_teams' => rand(1, 10),
                    'number_of_technical_service_teams' => rand(1, 10),
                    'number_of_volunteer_teams' => rand(1, 10),

                    'minor_unnoyonmulok_kaj' => rand(1, 10),
                    'shamajik_onusthane_ongshogrohon' =>  rand(1, 10),
                    'shamajik_onusthane_shohayota_prodan' =>  rand(1, 10),
                    'shamajik_birodh_mimangsha' =>  rand(1, 10),
                    'manobik_shohayota_prodan' =>  rand(1, 10),
                    'korje_hasana_prodan' =>  rand(1, 10),
                    'porishkar_poricchonnota_ovijan' =>  rand(1, 10),
                    'moshok_nidhon_ovijan' =>  rand(1, 10),
                    'rogir_poricorja' =>  rand(1, 10),
                    'medical_shohayota_prodan' =>  rand(1, 10),
                    'voluntarily_blood_donation_kotojon' =>  rand(1, 10),
                    'voluntarily_blood_donation_kotojonke' =>  rand(1, 10),
                    'nobojatokke_gift_prodan' =>  rand(1, 10),
                    'vrammoman_school_calu' =>  rand(1, 10),
                    'vrammoman_moktob_calu' =>  rand(1, 10),
                    'technical_services_kotojon' =>  rand(1, 10),
                    'technical_services_prodan_kotojonke' =>  rand(1, 10),
                    'online_services_prodan_kotojonke' =>  rand(1, 10),
                    'brikkho_ropon' =>  rand(1, 10),
                    'public_awareness_programs' =>  rand(1, 10),
                    'tran_bitoron' =>  rand(1, 10),
                    'vinnodhormabolombider_service_prodan_kotojon' =>  rand(1, 10),
                    'vinnodhormabolombider_service_prodan_kotojonke' =>  rand(1, 10),
                    'mayeter_gosol_kotojonke' =>  rand(1, 10),
                    'janajay_ongshogrohon' =>  rand(1, 10),
                    'low_capital_employment_kotojonke' =>  rand(1, 10),
                    'others' =>  rand(1, 10),

                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
