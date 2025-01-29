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
        Schema::create('ward_songothon4_unit_songothons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->unsigned()->nullable();
            $table->bigInteger('general_unit_men_previous')->nullable();
            $table->bigInteger('general_unit_men_present')->nullable();
            $table->bigInteger('general_unit_men_increase')->nullable();
            $table->bigInteger('general_unit_men_gatti')->nullable();
            $table->bigInteger('general_unit_men_target')->nullable();

            $table->bigInteger('general_unit_women_previous')->nullable();
            $table->bigInteger('general_unit_women_present')->nullable();
            $table->bigInteger('general_unit_women_increase')->nullable();
            $table->bigInteger('general_unit_women_gatti')->nullable();
            $table->bigInteger('general_unit_women_target')->nullable();

            $table->bigInteger('ulama_unit_previous')->nullable();
            $table->bigInteger('ulama_unit_present')->nullable();
            $table->bigInteger('ulama_unit_increase')->nullable();
            $table->bigInteger('ulama_unit_gatti')->nullable();
            $table->bigInteger('ulama_unit_target')->nullable();

            $table->bigInteger('peshajibi_unit_previous')->nullable();
            $table->bigInteger('peshajibi_unit_present')->nullable();
            $table->bigInteger('peshajibi_unit_increase')->nullable();
            $table->bigInteger('peshajibi_unit_gatti')->nullable();
            $table->bigInteger('peshajibi_unit_target')->nullable();

            $table->bigInteger('sromik_kollyan_unit_previous')->nullable();
            $table->bigInteger('sromik_kollyan_unit_present')->nullable();
            $table->bigInteger('sromik_kollyan_unit_increase')->nullable();
            $table->bigInteger('sromik_kollyan_unit_gatti')->nullable();
            $table->bigInteger('sromik_kollyan_unit_target')->nullable();

            $table->bigInteger('jubo_unit_previous')->nullable();
            $table->bigInteger('jubo_unit_present')->nullable();
            $table->bigInteger('jubo_unit_increase')->nullable();
            $table->bigInteger('jubo_unit_gatti')->nullable();
            $table->bigInteger('jubo_unit_target')->nullable();

            $table->bigInteger('media_unit_previous')->nullable();
            $table->bigInteger('media_unit_present')->nullable();
            $table->bigInteger('media_unit_increase')->nullable();
            $table->bigInteger('media_unit_gatti')->nullable();
            $table->bigInteger('media_unit_target')->nullable();

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
        Schema::dropIfExists('ward_songothon4_unit_songothons');
    }
};
