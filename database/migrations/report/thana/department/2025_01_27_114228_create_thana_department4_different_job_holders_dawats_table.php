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
        Schema::create('thana_department4_different_job_holders_dawats', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('report_info_id')->unsigned()->nullable();
            // Political & Special Category
            $table->bigInteger('political_and_special_invited_man')->nullable();
            $table->bigInteger('political_and_special_been_associated_man')->nullable();
            $table->bigInteger('political_and_special_target_man')->nullable();
            $table->bigInteger('political_and_special_invited_woman')->nullable();
            $table->bigInteger('political_and_special_been_associated_woman')->nullable();
            $table->bigInteger('political_and_special_target_woman')->nullable();

            // Pesha Jibi (Professional) Category
            $table->bigInteger('pesha_jibi_invited_man')->nullable();
            $table->bigInteger('pesha_jibi_been_associated_man')->nullable();
            $table->bigInteger('pesha_jibi_target_man')->nullable();
            $table->bigInteger('pesha_jibi_invited_woman')->nullable();
            $table->bigInteger('pesha_jibi_been_associated_woman')->nullable();
            $table->bigInteger('pesha_jibi_target_woman')->nullable();

            // Olama Masayekh Category
            $table->bigInteger('olama_masayekh_invited')->nullable();
            $table->bigInteger('olama_masayekh_been_associated')->nullable();
            $table->bigInteger('olama_masayekh_target')->nullable();

            // Kormo Jibi (Working Women) Category
            $table->bigInteger('kormo_jibi_woman_invited')->nullable();
            $table->bigInteger('kormo_jibi_woman_been_associated')->nullable();
            $table->bigInteger('kormo_jibi_woman_target')->nullable();

            // Sromo Jibi (Labor) Category
            $table->bigInteger('sromo_jibi_invited_man')->nullable();
            $table->bigInteger('sromo_jibi_been_associated_man')->nullable();
            $table->bigInteger('sromo_jibi_target_man')->nullable();
            $table->bigInteger('sromo_jibi_invited_woman')->nullable();
            $table->bigInteger('sromo_jibi_been_associated_woman')->nullable();
            $table->bigInteger('sromo_jibi_target_woman')->nullable();

            // Media Worker Category
            $table->bigInteger('media_worker_invited')->nullable();
            $table->bigInteger('media_worker_been_associated')->nullable();
            $table->bigInteger('media_worker_target')->nullable();

            // Prantik Jonogosti (Marginalized Community) Category
            $table->bigInteger('prantik_jonogosti_invited')->nullable();
            $table->bigInteger('prantik_jonogosti_been_associated')->nullable();
            $table->bigInteger('prantik_jonogosti_target')->nullable();

            // Vinno Dormalombi (Other Religious Groups) Category
            $table->bigInteger('vinno_dormalombi_invited')->nullable();
            $table->bigInteger('vinno_dormalombi_been_associated')->nullable();
            $table->bigInteger('vinno_dormalombi_target')->nullable();


            // Common Fields
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
        Schema::dropIfExists('thana_department4_different_job_holders_dawats');
    }
};
