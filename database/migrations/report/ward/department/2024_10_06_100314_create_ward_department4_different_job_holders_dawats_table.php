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
        Schema::create('ward_department4_different_job_holders_dawats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->unsigned()->nullable();
            $table->bigInteger('political_and_special_invited')->nullable();
            $table->bigInteger('political_and_special_been_associated')->nullable();
            $table->bigInteger('political_and_special_target')->nullable();

            $table->bigInteger('pesha_jibi_invited')->nullable();
            $table->bigInteger('pesha_jibi_been_associated')->nullable();
            $table->bigInteger('pesha_jibi_target')->nullable();

            $table->bigInteger('olama_masayekh_invited')->nullable();
            $table->bigInteger('olama_masayekh_been_associated')->nullable();
            $table->bigInteger('olama_masayekh_target')->nullable();

            $table->bigInteger('sromo_jibi_invited')->nullable();
            $table->bigInteger('sromo_jibi_been_associated')->nullable();
            $table->bigInteger('sromo_jibi_target')->nullable();

            $table->bigInteger('prantik_jonogosti_invited')->nullable();
            $table->bigInteger('prantik_jonogosti_been_associated')->nullable();
            $table->bigInteger('prantik_jonogosti_target')->nullable();

            $table->bigInteger('vinno_dormalombi_invited')->nullable();
            $table->bigInteger('vinno_dormalombi_been_associated')->nullable();
            $table->bigInteger('vinno_dormalombi_target')->nullable();

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
        Schema::dropIfExists('ward_department4_different_job_holders_dawats');
    }
};
