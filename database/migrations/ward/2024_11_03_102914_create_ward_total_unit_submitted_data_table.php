<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ward_total_unit_submitted_data', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->unsigned()->nullable();
            // Dawat1
            $table->bigInteger('dawat1_how_many_groups_are_out')->nullable();
            $table->bigInteger('dawat1_number_of_participants')->nullable();
            $table->bigInteger('dawat1_how_many_have_been_invited')->nullable();
            $table->bigInteger('dawat1_how_many_associate_members_created')->nullable();

            // Dawat2
            $table->bigInteger('dawat2_total_rokon')->nullable();
            $table->bigInteger('dawat2_total_worker')->nullable();
            $table->bigInteger('dawat2_how_many_were_give_dawat_rokon')->nullable();
            $table->bigInteger('dawat2_how_many_were_give_dawat_worker')->nullable();
            $table->bigInteger('dawat2_how_many_have_been_invited')->nullable();
            $table->bigInteger('dawat2_how_many_associate_members_created')->nullable();

            // Dawat3
            $table->bigInteger('dawat3_how_many_were_give_dawat')->nullable();
            $table->bigInteger('dawat3_how_many_associate_members_created')->nullable();

            // Dawat4
            $table->bigInteger('dawat4_total_gono_songjog_group')->nullable();
            $table->bigInteger('dawat4_total_attended')->nullable();
            $table->bigInteger('dawat4_how_many_have_been_invited')->nullable();
            $table->bigInteger('dawat4_how_many_associate_members_created')->nullable();

            $table->bigInteger('dawat4_jela_mohanogor_declared_gonosonjog_group')->nullable();
            $table->bigInteger('dawat4_jela_mohanogor_declared_gonosonjog_attended')->nullable();
            $table->bigInteger('dawat4_jela_mohanogor_declared_gonosonjog_invited')->nullable();
            $table->bigInteger('dawat4_jela_mohanogor_declared_gonosonjog_associated_created')->nullable();

            // Department1
            $table->bigInteger('department1_teacher_rokon')->nullable();
            $table->bigInteger('department1_teacher_worker')->nullable();
            $table->bigInteger('department1_student_rokon')->nullable();
            $table->bigInteger('department1_student_worker')->nullable();

            $table->bigInteger('department1_how_much_learned_quran')->nullable();
            $table->bigInteger('department1_how_much_invited')->nullable();
            $table->bigInteger('department1_how_much_been_associated')->nullable();

            // Department4
            $table->bigInteger('department4_political_and_special_invited')->nullable();
            $table->bigInteger('department4_political_and_special_been_associated')->nullable();
            $table->bigInteger('department4_political_and_special_target')->nullable();

            $table->bigInteger('department4_prantik_jonogosti_invited')->nullable();
            $table->bigInteger('department4_prantik_jonogosti_been_associated')->nullable();
            $table->bigInteger('department4_prantik_jonogosti_target')->nullable();

            $table->bigInteger('department4_vinno_dormalombi_invited')->nullable();
            $table->bigInteger('department4_vinno_dormalombi_been_associated')->nullable();
            $table->bigInteger('department4_vinno_dormalombi_target')->nullable();

            // Department5
            $table->bigInteger('department5_total_attended_family')->nullable();
            $table->bigInteger('department5_how_many_new_family_invited')->nullable();

            // Dawah Prokashona
            $table->bigInteger('prokashona_books_in_pathagar')->nullable();
            $table->bigInteger('prokashona_books_in_pathagar_increase')->nullable();

            $table->bigInteger('prokashona_unit_book_distribution_center')->nullable();
            $table->bigInteger('prokashona_unit_book_distribution_center_increase')->nullable();

            $table->bigInteger('prokashona_unit_book_distribution')->nullable();
            $table->bigInteger('prokashona_unit_book_distribution_increase')->nullable();

            $table->bigInteger('prokashona_soft_copy_book_distribution')->nullable();
            $table->bigInteger('prokashona_soft_copy_book_distribution_increase')->nullable();

            $table->bigInteger('prokashona_dawat_link_distribution')->nullable();
            $table->bigInteger('prokashona_dawat_link_distribution_increase')->nullable();

            $table->bigInteger('prokashona_sonar_bangla')->nullable();
            $table->bigInteger('prokashona_sonar_bangla_increase')->nullable();

            $table->bigInteger('prokashona_songram')->nullable();
            $table->bigInteger('prokashona_songram_increase')->nullable();

            $table->bigInteger('prokashona_prithibi')->nullable();
            $table->bigInteger('prokashona_prithibi_increase')->nullable();

            // Kormosuci
            $table->bigInteger('kormosuci_unit_masik_sadaron_sova_total')->nullable();
            $table->bigInteger('kormosuci_unit_masik_sadaron_sova_target')->nullable();
            $table->bigInteger('kormosuci_unit_masik_sadaron_sova_uposthiti')->nullable();

            $table->bigInteger('kormosuci_iftar_mahfil_personal_total')->nullable();
            $table->bigInteger('kormosuci_iftar_mahfil_personal_target')->nullable();
            $table->bigInteger('kormosuci_iftar_mahfil_personal_uposthiti')->nullable();

            $table->bigInteger('kormosuci_iftar_mahfil_samostic_total')->nullable();
            $table->bigInteger('kormosuci_iftar_mahfil_samostic_target')->nullable();
            $table->bigInteger('kormosuci_iftar_mahfil_samostic_uposthiti')->nullable();

            $table->bigInteger('kormosuci_cha_chakra_total')->nullable();
            $table->bigInteger('kormosuci_cha_chakra_target')->nullable();
            $table->bigInteger('kormosuci_cha_chakra_uposthiti')->nullable();

            $table->bigInteger('kormosuci_samostic_khawa_total')->nullable();
            $table->bigInteger('kormosuci_samostic_khawa_target')->nullable();
            $table->bigInteger('kormosuci_samostic_khawa_uposthiti')->nullable();

            $table->bigInteger('kormosuci_sikkha_sofor_total')->nullable();
            $table->bigInteger('kormosuci_sikkha_sofor_target')->nullable();
            $table->bigInteger('kormosuci_sikkha_sofor_uposthiti')->nullable();

            // Songothon1
            $table->bigInteger('songothon1_rokon_previous')->nullable();
            $table->bigInteger('songothon1_rokon_present')->nullable();
            $table->bigInteger('songothon1_rokon_briddhi')->nullable();
            $table->bigInteger('songothon1_rokon_gatti')->nullable();
            $table->bigInteger('songothon1_rokon_target')->nullable();

            $table->bigInteger('songothon1_worker_previous')->nullable();
            $table->bigInteger('songothon1_worker_present')->nullable();
            $table->bigInteger('songothon1_worker_briddhi')->nullable();
            $table->bigInteger('songothon1_worker_gatti')->nullable();
            $table->bigInteger('songothon1_worker_target')->nullable();

            // Songothon2
            $table->bigInteger('songothon2_associate_member_previous')->nullable();
            $table->bigInteger('songothon2_associate_member_present')->nullable();
            $table->bigInteger('songothon2_associate_member_briddhi')->nullable();
            $table->bigInteger('songothon2_associate_member_target')->nullable();

            $table->bigInteger('songothon2_vinno_dormalombi_worker_previous')->nullable();
            $table->bigInteger('songothon2_vinno_dormalombi_worker_present')->nullable();
            $table->bigInteger('songothon2_vinno_dormalombi_worker_briddhi')->nullable();
            $table->bigInteger('songothon2_vinno_dormalombi_worker_target')->nullable();

            $table->bigInteger('songothon2_vinno_dormalombi_associate_member_previous')->nullable();
            $table->bigInteger('songothon2_vinno_dormalombi_associate_member_present')->nullable();
            $table->bigInteger('songothon2_vinno_dormalombi_associate_member_briddhi')->nullable();
            $table->bigInteger('songothon2_vinno_dormalombi_associate_member_target')->nullable();

            // Songothon9
            $table->bigInteger('songothon9_unit_kormi_boithok_total')->nullable();
            $table->bigInteger('songothon9_unit_kormi_boithok_uposthiti')->nullable();

            // Songothon5
            $table->bigInteger('songothon5_paribarik_unit_total')->nullable();
            $table->bigInteger('songothon5_paribarik_unit_increase')->nullable();
            $table->bigInteger('songothon5_paribarik_unit_target')->nullable();

            // Songothon7
            $table->bigInteger('songothon7_upper_leader_sofor')->nullable();

            // Songothon8
            $table->bigInteger('songothon8_associate_member_total')->nullable();
            $table->bigInteger('songothon8_associate_member_total_iyanot_amounts')->nullable();
            $table->bigInteger('songothon8_sudhi_total')->nullable();
            $table->bigInteger('songothon8_sudi_total_iyanot_amounts')->nullable();

            // Proshikkhon
            $table->bigInteger('proshikkhon_sohi_quran_onushilon')->nullable();
            $table->bigInteger('proshikkhon_sohi_quran_onushilon_target')->nullable();
            $table->bigInteger('proshikkhon_sohi_quran_onushilon_uposthiti')->nullable();

            $table->bigInteger('proshikkhon_masala_masayel')->nullable();
            $table->bigInteger('proshikkhon_masala_masayel_target')->nullable();
            $table->bigInteger('proshikkhon_masala_masayel_uposthiti')->nullable();

            $table->bigInteger('proshikkhon_darsul_quran')->nullable();
            $table->bigInteger('proshikkhon_darsul_quran_target')->nullable();
            $table->bigInteger('proshikkhon_darsul_quran_uposthiti')->nullable();

            $table->bigInteger('proshikkhon_darsul_hadis')->nullable();
            $table->bigInteger('proshikkhon_darsul_hadis_target')->nullable();
            $table->bigInteger('proshikkhon_darsul_hadis_uposthiti')->nullable();

            $table->bigInteger('proshikkhon_samostik_path')->nullable();
            $table->bigInteger('proshikkhon_samostik_path_target')->nullable();
            $table->bigInteger('proshikkhon_samostik_path_uposthiti')->nullable();

            $table->bigInteger('proshikkhon_bishoy_vittik_onushilon')->nullable();
            $table->bigInteger('proshikkhon_bishoy_vittik_onushilon_target')->nullable();
            $table->bigInteger('proshikkhon_bishoy_vittik_onushilon_uposthiti')->nullable();

            // Shomajsheba1
            $table->bigInteger('shomajsheba1_how_many_people_did')->nullable();
            $table->bigInteger('shomajsheba1_service_received_total')->nullable();

            // Shomajsheba2
            $table->bigInteger('shomajsheba2_shamajik_onusthane_ongshogrohon')->nullable();
            $table->bigInteger('shomajsheba2_shamajik_onusthane_shohayota_prodan')->nullable();
            $table->bigInteger('shomajsheba2_shamajik_birodh_mimangsha')->nullable();
            $table->bigInteger('shomajsheba2_manobik_shohayota_prodan')->nullable();
            $table->bigInteger('shomajsheba2_korje_hasana_prodan')->nullable();
            $table->bigInteger('shomajsheba2_rogir_poricorja')->nullable();
            $table->bigInteger('shomajsheba2_medical_shohayota_prodan')->nullable();
            $table->bigInteger('shomajsheba2_nobojatokke_gift_prodan')->nullable();
            $table->bigInteger('shomajsheba2_voluntarily_blood_donation_kotojon')->nullable();
            $table->bigInteger('shomajsheba2_voluntarily_blood_donation_kotojonke')->nullable();
            $table->bigInteger('shomajsheba2_matrikalin_sheba_prodan_kotojon')->nullable();
            $table->bigInteger('shomajsheba2_matrikalin_sheba_prodan_kotojonke')->nullable();
            $table->bigInteger('shomajsheba2_mayeter_gosol')->nullable();
            $table->bigInteger('shomajsheba2_others')->nullable();

            // Rastrio
            $table->bigInteger('rastrio_bishishto_bekti_jogajog')->nullable();

            // Montobbo
            $table->text('all_montobbo')->nullable();




            $table->bigInteger('creator')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ward_total_unit_submitted_data');
    }
};
