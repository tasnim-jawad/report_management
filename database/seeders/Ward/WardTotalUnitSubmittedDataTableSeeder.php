<?php

namespace Database\Seeders\Ward;

use App\Models\Ward\WardTotalUnitSubmittedData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardTotalUnitSubmittedDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardTotalUnitSubmittedData::truncate();
                $report_info_id = 121;
                for ($i = 1; $i <= 2; $i++) {
                    for ($j = 1; $j <= 12; $j++) {
                        WardTotalUnitSubmittedData::create([
                            'report_info_id' => $report_info_id,
                            // Dawat1
                            'dawat1_how_many_groups_are_out' => rand(1, 10),
                            'dawat1_number_of_participants' => rand(1, 10),
                            'dawat1_how_many_have_been_invited' => rand(1, 10),
                            'dawat1_how_many_associate_members_created' => rand(1, 10),

                            // Dawat2
                            'dawat2_total_rokon' => rand(1, 10),
                            'dawat2_total_worker' => rand(1, 10),
                            'dawat2_how_many_were_give_dawat_rokon' => rand(1, 10),
                            'dawat2_how_many_were_give_dawat_worker' => rand(1, 10),
                            'dawat2_how_many_have_been_invited' => rand(1, 10),
                            'dawat2_how_many_associate_members_created' => rand(1, 10),

                            // Dawat3
                            'dawat3_how_many_were_give_dawat' => rand(1, 10),
                            'dawat3_how_many_associate_members_created' => rand(1, 10),

                            // Dawat4
                            'dawat4_total_gono_songjog_group' => rand(1, 10),
                            'dawat4_total_attended' => rand(1, 10),
                            'dawat4_how_many_have_been_invited' => rand(1, 10),
                            'dawat4_how_many_associate_members_created' => rand(1, 10),

                            'dawat4_jela_mohanogor_declared_gonosonjog_group' => rand(1, 10),
                            'dawat4_jela_mohanogor_declared_gonosonjog_attended' => rand(1, 10),
                            'dawat4_jela_mohanogor_declared_gonosonjog_invited' => rand(1, 10),
                            'dawat4_jela_mohanogor_declared_gonosonjog_associated_created' => rand(1, 10),

                            // Department1
                            'department1_teacher_rokon' => rand(1, 10),
                            'department1_teacher_worker' => rand(1, 10),
                            'department1_student_rokon' => rand(1, 10),
                            'department1_student_worker' => rand(1, 10),

                            'department1_how_much_learned_quran' => rand(1, 10),
                            'department1_how_much_invited' => rand(1, 10),
                            'department1_how_much_been_associated' => rand(1, 10),

                            // Department4
                            'department4_political_and_special_invited' => rand(1, 10),
                            'department4_political_and_special_been_associated' => rand(1, 10),
                            'department4_political_and_special_target' => rand(1, 10),

                            'department4_prantik_jonogosti_invited' => rand(1, 10),
                            'department4_prantik_jonogosti_been_associated' => rand(1, 10),
                            'department4_prantik_jonogosti_target' => rand(1, 10),

                            'department4_vinno_dormalombi_invited' => rand(1, 10),
                            'department4_vinno_dormalombi_been_associated' => rand(1, 10),
                            'department4_vinno_dormalombi_target' => rand(1, 10),

                            // Department5
                            'department5_total_attended_family' => rand(1, 10),
                            'department5_how_many_new_family_invited' => rand(1, 10),

                            // Dawah Prokashona
                            'prokashona_books_in_pathagar' => rand(1, 10),
                            'prokashona_books_in_pathagar_increase' => rand(1, 10),

                            'prokashona_unit_book_distribution_center' => rand(1, 10),
                            'prokashona_unit_book_distribution_center_increase' => rand(1, 10),

                            'prokashona_unit_book_distribution' => rand(1, 10),
                            'prokashona_unit_book_distribution_increase' => rand(1, 10),

                            'prokashona_soft_copy_book_distribution' => rand(1, 10),
                            'prokashona_soft_copy_book_distribution_increase' => rand(1, 10),

                            'prokashona_dawat_link_distribution' => rand(1, 10),
                            'prokashona_dawat_link_distribution_increase' => rand(1, 10),

                            'prokashona_sonar_bangla' => rand(1, 10),
                            'prokashona_sonar_bangla_increase' => rand(1, 10),

                            'prokashona_songram' => rand(1, 10),
                            'prokashona_songram_increase' => rand(1, 10),

                            'prokashona_prithibi' => rand(1, 10),
                            'prokashona_prithibi_increase' => rand(1, 10),

                            // Kormosuci
                            'kormosuci_unit_masik_sadaron_sova_total' => rand(1, 10),
                            'kormosuci_unit_masik_sadaron_sova_target' => rand(1, 10),
                            'kormosuci_unit_masik_sadaron_sova_uposthiti' => rand(1, 10),

                            'kormosuci_iftar_mahfil_personal_total' => rand(1, 10),
                            'kormosuci_iftar_mahfil_personal_target' => rand(1, 10),
                            'kormosuci_iftar_mahfil_personal_uposthiti' => rand(1, 10),

                            'kormosuci_iftar_mahfil_samostic_total' => rand(1, 10),
                            'kormosuci_iftar_mahfil_samostic_target' => rand(1, 10),
                            'kormosuci_iftar_mahfil_samostic_uposthiti' => rand(1, 10),

                            'kormosuci_cha_chakra_total' => rand(1, 10),
                            'kormosuci_cha_chakra_target' => rand(1, 10),
                            'kormosuci_cha_chakra_uposthiti' => rand(1, 10),

                            'kormosuci_samostic_khawa_total' => rand(1, 10),
                            'kormosuci_samostic_khawa_target' => rand(1, 10),
                            'kormosuci_samostic_khawa_uposthiti' => rand(1, 10),

                            'kormosuci_sikkha_sofor_total' => rand(1, 10),
                            'kormosuci_sikkha_sofor_target' => rand(1, 10),
                            'kormosuci_sikkha_sofor_uposthiti' => rand(1, 10),

                            // Songothon1
                            'songothon1_rokon_previous' => rand(1, 10),
                            'songothon1_rokon_present' => rand(1, 10),
                            'songothon1_rokon_briddhi' => rand(1, 10),
                            'songothon1_rokon_gatti' => rand(1, 10),
                            'songothon1_rokon_target' => rand(1, 10),
                            'songothon1_worker_previous' => rand(1, 10),
                            'songothon1_worker_present' => rand(1, 10),
                            'songothon1_worker_briddhi' => rand(1, 10),
                            'songothon1_worker_gatti' => rand(1, 10),
                            'songothon1_worker_target' => rand(1, 10),

                            // Songothon2
                            'songothon2_associate_member_previous' => rand(1, 10),
                            'songothon2_associate_member_present' => rand(1, 10),
                            'songothon2_associate_member_briddhi' => rand(1, 10),
                            'songothon2_associate_member_target' => rand(1, 10),
                            'songothon2_vinno_dormalombi_worker_previous' => rand(1, 10),
                            'songothon2_vinno_dormalombi_worker_present' => rand(1, 10),
                            'songothon2_vinno_dormalombi_worker_briddhi' => rand(1, 10),
                            'songothon2_vinno_dormalombi_worker_target' => rand(1, 10),
                            'songothon2_vinno_dormalombi_associate_member_previous' => rand(1, 10),
                            'songothon2_vinno_dormalombi_associate_member_present' => rand(1, 10),
                            'songothon2_vinno_dormalombi_associate_member_briddhi' => rand(1, 10),
                            'songothon2_vinno_dormalombi_associate_member_target' => rand(1, 10),

                            // Songothon9
                            'songothon9_unit_kormi_boithok_total' => rand(1, 10),
                            'songothon9_unit_kormi_boithok_uposthiti' => rand(1, 10),

                            // Songothon5
                            'songothon5_paribarik_unit_total' => rand(1, 10),
                            'songothon5_paribarik_unit_increase' => rand(1, 10),
                            'songothon5_paribarik_unit_target' => rand(1, 10),

                            // Songothon7
                            'songothon7_upper_leader_sofor' => rand(1, 10),

                            // Songothon8
                            'songothon8_associate_member_total' => rand(1, 10),
                            'songothon8_associate_member_total_iyanot_amounts' => rand(1, 10),
                            'songothon8_sudhi_total' => rand(1, 10),
                            'songothon8_sudi_total_iyanot_amounts' => rand(1, 10),

                            // Proshikkhon
                            'proshikkhon_sohi_quran_onushilon' => rand(1, 10),
                            'proshikkhon_sohi_quran_onushilon_target' => rand(1, 10),
                            'proshikkhon_sohi_quran_onushilon_uposthiti' => rand(1, 10),

                            'proshikkhon_masala_masayel' => rand(1, 10),
                            'proshikkhon_masala_masayel_target' => rand(1, 10),
                            'proshikkhon_masala_masayel_uposthiti' => rand(1, 10),

                            'proshikkhon_darsul_quran' => rand(1, 10),
                            'proshikkhon_darsul_quran_target' => rand(1, 10),
                            'proshikkhon_darsul_quran_uposthiti' => rand(1, 10),

                            'proshikkhon_darsul_hadis' => rand(1, 10),
                            'proshikkhon_darsul_hadis_target' => rand(1, 10),
                            'proshikkhon_darsul_hadis_uposthiti' => rand(1, 10),

                            'proshikkhon_samostik_path' => rand(1, 10),
                            'proshikkhon_samostik_path_target' => rand(1, 10),
                            'proshikkhon_samostik_path_uposthiti' => rand(1, 10),

                            'proshikkhon_bishoy_vittik_onushilon' => rand(1, 10),
                            'proshikkhon_bishoy_vittik_onushilon_target' => rand(1, 10),
                            'proshikkhon_bishoy_vittik_onushilon_uposthiti' => rand(1, 10),

                            // Shomajsheba1
                            'shomajsheba1_how_many_people_did' => rand(1, 10),
                            'shomajsheba1_service_received_total' => rand(1, 10),

                            // Shomajsheba2
                            'shomajsheba2_shamajik_onusthane_ongshogrohon' => rand(1, 10),
                            'shomajsheba2_shamajik_onusthane_shohayota_prodan' => rand(1, 10),
                            'shomajsheba2_shamajik_birodh_mimangsha' => rand(1, 10),
                            'shomajsheba2_manobik_shohayota_prodan' => rand(1, 10),
                            'shomajsheba2_korje_hasana_prodan' => rand(1, 10),
                            'shomajsheba2_rogir_poricorja' => rand(1, 10),
                            'shomajsheba2_medical_shohayota_prodan' => rand(1, 10),
                            'shomajsheba2_nobojatokke_gift_prodan' => rand(1, 10),
                            'shomajsheba2_voluntarily_blood_donation_kotojon' => rand(1, 10),
                            'shomajsheba2_voluntarily_blood_donation_kotojonke' => rand(1, 10),
                            'shomajsheba2_matrikalin_sheba_prodan_kotojon' => rand(1, 10),
                            'shomajsheba2_matrikalin_sheba_prodan_kotojonke' => rand(1, 10),
                            'shomajsheba2_mayeter_gosol' => rand(1, 10),
                            'shomajsheba2_others' => rand(1, 10),

                            // Rastrio
                            'rastrio_bishishto_bekti_jogajog' => rand(1, 10),

                            // Montobbo
                            'all_montobbo' => rand(1, 10),



                            'creator' => 6 + $i,
                            'status' => 1,
                        ]);
                        $report_info_id++;
                    }
                }
    }
}
