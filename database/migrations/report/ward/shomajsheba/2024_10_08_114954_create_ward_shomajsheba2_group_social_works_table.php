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
        Schema::create('ward_shomajsheba2_group_social_works', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->unsigned()->nullable();

            $table->bigInteger('number_of_general_service_teams')->nullable();
            $table->bigInteger('number_of_technical_service_teams')->nullable();
            $table->bigInteger('number_of_volunteer_teams')->nullable();


            $table->bigInteger('minor_unnoyonmulok_kaj')->nullable();
            $table->bigInteger('shamajik_onusthane_ongshogrohon')->nullable();
            $table->bigInteger('shamajik_onusthane_shohayota_prodan')->nullable();
            $table->bigInteger('shamajik_birodh_mimangsha')->nullable();
            $table->bigInteger('manobik_shohayota_prodan')->nullable();
            $table->bigInteger('korje_hasana_prodan')->nullable();
            $table->bigInteger('porishkar_poricchonnota_ovijan')->nullable();
            $table->bigInteger('moshok_nidhon_ovijan')->nullable();
            $table->bigInteger('rogir_poricorja')->nullable();
            $table->bigInteger('medical_shohayota_prodan')->nullable();
            $table->bigInteger('voluntarily_blood_donation_kotojon')->nullable();
            $table->bigInteger('voluntarily_blood_donation_kotojonke')->nullable();
            $table->bigInteger('nobojatokke_gift_prodan')->nullable();
            $table->bigInteger('vrammoman_school_calu')->nullable();
            $table->bigInteger('vrammoman_moktob_calu')->nullable();
            $table->bigInteger('technical_services_kotojon')->nullable();
            $table->bigInteger('technical_services_prodan_kotojonke')->nullable();
            $table->bigInteger('online_services_prodan_kotojonke')->nullable();
            $table->bigInteger('brikkho_ropon')->nullable();
            $table->bigInteger('public_awareness_programs')->nullable();
            $table->bigInteger('tran_bitoron')->nullable();
            $table->bigInteger('vinnodhormabolombider_service_prodan_kotojon')->nullable();
            $table->bigInteger('vinnodhormabolombider_service_prodan_kotojonke')->nullable();
            $table->bigInteger('mayeter_gosol_kotojonke')->nullable();
            $table->bigInteger('janajay_ongshogrohon')->nullable();
            $table->bigInteger('low_capital_employment_kotojonke')->nullable();
            $table->bigInteger('others')->nullable();

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
        Schema::dropIfExists('ward_shomajsheba2_group_social_works');
    }
};
