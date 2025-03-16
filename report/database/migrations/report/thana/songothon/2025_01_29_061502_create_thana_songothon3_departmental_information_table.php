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
        Schema::create('thana_songothon3_departmental_information', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('report_info_id')->nullable();

            // Women Section
            $table->bigInteger('women_rokon_previous')->nullable();
            $table->bigInteger('women_rokon_present')->nullable();
            $table->bigInteger('women_rokon_increase_manonnoyon')->nullable();
            $table->bigInteger('women_rokon_increase_agoto')->nullable();
            $table->bigInteger('women_rokon_gatti_manonnoyon')->nullable();
            $table->bigInteger('women_rokon_gatti_sthanantor')->nullable();
            $table->bigInteger('women_rokon_target')->nullable();

            $table->bigInteger('women_kormi_previous')->nullable();
            $table->bigInteger('women_kormi_present')->nullable();
            $table->bigInteger('women_kormi_increase_manonnoyon')->nullable();
            $table->bigInteger('women_kormi_increase_agoto')->nullable();
            $table->bigInteger('women_kormi_gatti_manonnoyon')->nullable();
            $table->bigInteger('women_kormi_gatti_sthanantor')->nullable();
            $table->bigInteger('women_kormi_target')->nullable();

            $table->bigInteger('women_associate_member_previous')->nullable();
            $table->bigInteger('women_associate_member_present')->nullable();
            $table->bigInteger('women_associate_member_increase')->nullable();
            $table->bigInteger('women_associate_member_gatti')->nullable();
            $table->bigInteger('women_associate_member_target')->nullable();

            // Sromojibi Section
            $table->bigInteger('sromojibi_rokon_previous')->nullable();
            $table->bigInteger('sromojibi_rokon_present')->nullable();
            $table->bigInteger('sromojibi_rokon_increase_manonnoyon')->nullable();
            $table->bigInteger('sromojibi_rokon_increase_agoto')->nullable();
            $table->bigInteger('sromojibi_rokon_gatti_manonnoyon')->nullable();
            $table->bigInteger('sromojibi_rokon_gatti_sthanantor')->nullable();
            $table->bigInteger('sromojibi_rokon_target')->nullable();

            $table->bigInteger('sromojibi_kormi_previous')->nullable();
            $table->bigInteger('sromojibi_kormi_present')->nullable();
            $table->bigInteger('sromojibi_kormi_increase_manonnoyon')->nullable();
            $table->bigInteger('sromojibi_kormi_increase_agoto')->nullable();
            $table->bigInteger('sromojibi_kormi_gatti_manonnoyon')->nullable();
            $table->bigInteger('sromojibi_kormi_gatti_sthanantor')->nullable();
            $table->bigInteger('sromojibi_kormi_target')->nullable();

            $table->bigInteger('sromojibi_associate_member_previous')->nullable();
            $table->bigInteger('sromojibi_associate_member_present')->nullable();
            $table->bigInteger('sromojibi_associate_member_increase')->nullable();
            $table->bigInteger('sromojibi_associate_member_gatti')->nullable();
            $table->bigInteger('sromojibi_associate_member_target')->nullable();

            // Ulama Section
            $table->bigInteger('ulama_rokon_previous')->nullable();
            $table->bigInteger('ulama_rokon_present')->nullable();
            $table->bigInteger('ulama_rokon_increase_manonnoyon')->nullable();
            $table->bigInteger('ulama_rokon_increase_agoto')->nullable();
            $table->bigInteger('ulama_rokon_gatti_manonnoyon')->nullable();
            $table->bigInteger('ulama_rokon_gatti_sthanantor')->nullable();
            $table->bigInteger('ulama_rokon_target')->nullable();

            $table->bigInteger('ulama_kormi_previous')->nullable();
            $table->bigInteger('ulama_kormi_present')->nullable();
            $table->bigInteger('ulama_kormi_increase_manonnoyon')->nullable();
            $table->bigInteger('ulama_kormi_increase_agoto')->nullable();
            $table->bigInteger('ulama_kormi_gatti_manonnoyon')->nullable();
            $table->bigInteger('ulama_kormi_gatti_sthanantor')->nullable();
            $table->bigInteger('ulama_kormi_target')->nullable();

            $table->bigInteger('ulama_associate_member_previous')->nullable();
            $table->bigInteger('ulama_associate_member_present')->nullable();
            $table->bigInteger('ulama_associate_member_increase')->nullable();
            $table->bigInteger('ulama_associate_member_gatti')->nullable();
            $table->bigInteger('ulama_associate_member_target')->nullable();

            // Pesha Jibi Section
            $table->bigInteger('pesha_jibi_rokon_previous')->nullable();
            $table->bigInteger('pesha_jibi_rokon_present')->nullable();
            $table->bigInteger('pesha_jibi_rokon_increase_manonnoyon')->nullable();
            $table->bigInteger('pesha_jibi_rokon_increase_agoto')->nullable();
            $table->bigInteger('pesha_jibi_rokon_gatti_manonnoyon')->nullable();
            $table->bigInteger('pesha_jibi_rokon_gatti_sthanantor')->nullable();
            $table->bigInteger('pesha_jibi_rokon_target')->nullable();

            $table->bigInteger('pesha_jibi_kormi_previous')->nullable();
            $table->bigInteger('pesha_jibi_kormi_present')->nullable();
            $table->bigInteger('pesha_jibi_kormi_increase_manonnoyon')->nullable();
            $table->bigInteger('pesha_jibi_kormi_increase_agoto')->nullable();
            $table->bigInteger('pesha_jibi_kormi_gatti_manonnoyon')->nullable();
            $table->bigInteger('pesha_jibi_kormi_gatti_sthanantor')->nullable();
            $table->bigInteger('pesha_jibi_kormi_target')->nullable();

            $table->bigInteger('pesha_jibi_associate_member_previous')->nullable();
            $table->bigInteger('pesha_jibi_associate_member_present')->nullable();
            $table->bigInteger('pesha_jibi_associate_member_increase')->nullable();
            $table->bigInteger('pesha_jibi_associate_member_gatti')->nullable();
            $table->bigInteger('pesha_jibi_associate_member_target')->nullable();

            // Jubo Section
            $table->bigInteger('jubo_rokon_previous')->nullable();
            $table->bigInteger('jubo_rokon_present')->nullable();
            $table->bigInteger('jubo_rokon_increase_manonnoyon')->nullable();
            $table->bigInteger('jubo_rokon_increase_agoto')->nullable();
            $table->bigInteger('jubo_rokon_gatti_manonnoyon')->nullable();
            $table->bigInteger('jubo_rokon_gatti_sthanantor')->nullable();
            $table->bigInteger('jubo_rokon_target')->nullable();

            $table->bigInteger('jubo_kormi_previous')->nullable();
            $table->bigInteger('jubo_kormi_present')->nullable();
            $table->bigInteger('jubo_kormi_increase_manonnoyon')->nullable();
            $table->bigInteger('jubo_kormi_increase_agoto')->nullable();
            $table->bigInteger('jubo_kormi_gatti_manonnoyon')->nullable();
            $table->bigInteger('jubo_kormi_gatti_sthanantor')->nullable();
            $table->bigInteger('jubo_kormi_target')->nullable();

            $table->bigInteger('jubo_associate_member_previous')->nullable();
            $table->bigInteger('jubo_associate_member_present')->nullable();
            $table->bigInteger('jubo_associate_member_increase')->nullable();
            $table->bigInteger('jubo_associate_member_gatti')->nullable();
            $table->bigInteger('jubo_associate_member_target')->nullable();

            // Cultural Section
            $table->bigInteger('cultural_rokon_previous')->nullable();
            $table->bigInteger('cultural_rokon_present')->nullable();
            $table->bigInteger('cultural_rokon_increase_manonnoyon')->nullable();
            $table->bigInteger('cultural_rokon_increase_agoto')->nullable();
            $table->bigInteger('cultural_rokon_gatti_manonnoyon')->nullable();
            $table->bigInteger('cultural_rokon_gatti_sthanantor')->nullable();
            $table->bigInteger('cultural_rokon_target')->nullable();

            $table->bigInteger('cultural_kormi_previous')->nullable();
            $table->bigInteger('cultural_kormi_present')->nullable();
            $table->bigInteger('cultural_kormi_increase_manonnoyon')->nullable();
            $table->bigInteger('cultural_kormi_increase_agoto')->nullable();
            $table->bigInteger('cultural_kormi_gatti_manonnoyon')->nullable();
            $table->bigInteger('cultural_kormi_gatti_sthanantor')->nullable();
            $table->bigInteger('cultural_kormi_target')->nullable();

            $table->bigInteger('cultural_associate_member_previous')->nullable();
            $table->bigInteger('cultural_associate_member_present')->nullable();
            $table->bigInteger('cultural_associate_member_increase')->nullable();
            $table->bigInteger('cultural_associate_member_gatti')->nullable();
            $table->bigInteger('cultural_associate_member_target')->nullable();

            // Vinno Dormalombi Section
            $table->bigInteger('vinno_dormalombi_kormi_previous')->nullable();
            $table->bigInteger('vinno_dormalombi_kormi_present')->nullable();
            $table->bigInteger('vinno_dormalombi_kormi_increase_manonnoyon')->nullable();
            $table->bigInteger('vinno_dormalombi_kormi_increase_agoto')->nullable();
            $table->bigInteger('vinno_dormalombi_kormi_gatti_manonnoyon')->nullable();
            $table->bigInteger('vinno_dormalombi_kormi_gatti_sthanantor')->nullable();
            $table->bigInteger('vinno_dormalombi_kormi_target')->nullable();

            $table->bigInteger('vinno_dormalombi_associate_member_previous')->nullable();
            $table->bigInteger('vinno_dormalombi_associate_member_present')->nullable();
            $table->bigInteger('vinno_dormalombi_associate_member_increase')->nullable();
            $table->bigInteger('vinno_dormalombi_associate_member_gatti')->nullable();
            $table->bigInteger('vinno_dormalombi_associate_member_target')->nullable();

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
        Schema::dropIfExists('thana_songothon3_departmental_information');
    }
};
