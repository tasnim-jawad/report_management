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
        Schema::create('shomajsheba2_unit_social_works', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->unsigned()->nullable();
            $table->bigInteger('shamajik_onusthane_ongshogrohon')->nullable();
            $table->bigInteger('shamajik_onusthane_shohayota_prodan')->nullable();
            $table->bigInteger('shamajik_birodh_mimangsha')->nullable();
            $table->bigInteger('manobik_shohayota_prodan')->nullable();
            $table->bigInteger('korje_hasana_prodan')->nullable();
            $table->bigInteger('rogir_poricorja')->nullable();
            $table->bigInteger('medical_shohayota_prodan')->nullable();
            $table->bigInteger('nobojatokke_gift_prodan')->nullable();
            $table->bigInteger('voluntarily_blood_donation_kotojon')->nullable();
            $table->bigInteger('voluntarily_blood_donation_kotojonke')->nullable();
            $table->bigInteger('matrikalin_sheba_prodan_kotojon')->nullable();
            $table->bigInteger('matrikalin_sheba_prodan_kotojonke')->nullable();
            $table->bigInteger('mayeter_gosol')->nullable();
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
        Schema::dropIfExists('shomajsheba2_unit_social_works');
    }
};
