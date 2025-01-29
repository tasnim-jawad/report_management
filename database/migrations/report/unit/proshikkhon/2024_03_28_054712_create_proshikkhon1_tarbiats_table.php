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
        Schema::create('proshikkhon1_tarbiats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->unsigned()->nullable();
            $table->integer('sohi_quran_onushilon')->unsigned()->nullable();
            $table->integer('sohi_quran_onushilon_target')->unsigned()->nullable();
            $table->integer('sohi_quran_onushilon_uposthiti')->unsigned()->nullable();

            $table->integer('masala_masayel')->unsigned()->nullable();
            $table->integer('masala_masayel_target')->unsigned()->nullable();
            $table->integer('masala_masayel_uposthiti')->unsigned()->nullable();

            $table->integer('darsul_quran')->unsigned()->nullable();
            $table->integer('darsul_quran_target')->unsigned()->nullable();
            $table->integer('darsul_quran_uposthiti')->unsigned()->nullable();

            $table->integer('darsul_hadis')->unsigned()->nullable();
            $table->integer('darsul_hadis_target')->unsigned()->nullable();
            $table->integer('darsul_hadis_uposthiti')->unsigned()->nullable();

            $table->integer('samostik_path')->unsigned()->nullable();
            $table->integer('samostik_path_target')->unsigned()->nullable();
            $table->integer('samostik_path_uposthiti')->unsigned()->nullable();

            $table->integer('bishoy_vittik_onushilon')->unsigned()->nullable();
            $table->integer('bishoy_vittik_onushilon_target')->unsigned()->nullable();
            $table->integer('bishoy_vittik_onushilon_uposthiti')->unsigned()->nullable();

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
        Schema::dropIfExists('proshikkhon1_tarbiats');
    }
};
