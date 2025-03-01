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
        Schema::create('thana_proshikkhon1_tarbiats', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('report_info_id')->nullable();

            $table->bigInteger('unit_tarbiati_boithok_man_total')->nullable();
            $table->bigInteger('unit_tarbiati_boithok_man_target')->nullable();
            $table->bigInteger('unit_tarbiati_boithok_man_uposthiti')->nullable();

            $table->bigInteger('unit_tarbiati_boithok_women_total')->nullable();
            $table->bigInteger('unit_tarbiati_boithok_women_target')->nullable();
            $table->bigInteger('unit_tarbiati_boithok_women_uposthiti')->nullable();

            $table->bigInteger('upozila_vittik_rokon_shikkha_shibir_man_total')->nullable();
            $table->bigInteger('upozila_vittik_rokon_shikkha_shibir_man_target')->nullable();
            $table->bigInteger('upozila_vittik_rokon_shikkha_shibir_man_uposthiti')->nullable();
            $table->bigInteger('upozila_vittik_rokon_shikkha_shibir_women_total')->nullable();
            $table->bigInteger('upozila_vittik_rokon_shikkha_shibir_women_target')->nullable();
            $table->bigInteger('upozila_vittik_rokon_shikkha_shibir_women_uposthiti')->nullable();

            $table->bigInteger('thana_vittik_rokon_shikkha_boithok_man_total')->nullable();
            $table->bigInteger('thana_vittik_rokon_shikkha_boithok_man_target')->nullable();
            $table->bigInteger('thana_vittik_rokon_shikkha_boithok_man_uposthiti')->nullable();
            $table->bigInteger('thana_vittik_rokon_shikkha_boithok_women_total')->nullable();
            $table->bigInteger('thana_vittik_rokon_shikkha_boithok_women_target')->nullable();
            $table->bigInteger('thana_vittik_rokon_shikkha_boithok_women_uposthiti')->nullable();

            $table->bigInteger('upozila_vittik_selected_kormi_shikkha_shibir_man_total')->nullable();
            $table->bigInteger('upozila_vittik_selected_kormi_shikkha_shibir_man_target')->nullable();
            $table->bigInteger('upozila_vittik_selected_kormi_shikkha_shibir_man_uposthiti')->nullable();
            $table->bigInteger('upozila_vittik_selected_kormi_shikkha_shibir_women_total')->nullable();
            $table->bigInteger('upozila_vittik_selected_kormi_shikkha_shibir_women_target')->nullable();
            $table->bigInteger('upozila_vittik_selected_kormi_shikkha_shibir_women_uposthiti')->nullable();

            $table->bigInteger('thana_vittik_selected_kormi_shikkha_boithok_man_total')->nullable();
            $table->bigInteger('thana_vittik_selected_kormi_shikkha_boithok_man_target')->nullable();
            $table->bigInteger('thana_vittik_selected_kormi_shikkha_boithok_man_uposthiti')->nullable();
            $table->bigInteger('thana_vittik_selected_kormi_shikkha_boithok_women_total')->nullable();
            $table->bigInteger('thana_vittik_selected_kormi_shikkha_boithok_women_target')->nullable();
            $table->bigInteger('thana_vittik_selected_kormi_shikkha_boithok_women_uposthiti')->nullable();

            $table->bigInteger('upozila_vittik_kormi_shikkha_shibir_man_total')->nullable();
            $table->bigInteger('upozila_vittik_kormi_shikkha_shibir_man_target')->nullable();
            $table->bigInteger('upozila_vittik_kormi_shikkha_shibir_man_uposthiti')->nullable();
            $table->bigInteger('upozila_vittik_kormi_shikkha_shibir_women_total')->nullable();
            $table->bigInteger('upozila_vittik_kormi_shikkha_shibir_women_target')->nullable();
            $table->bigInteger('upozila_vittik_kormi_shikkha_shibir_women_uposthiti')->nullable();

            $table->bigInteger('thana_vittik_kormi_shikkha_boithok_man_total')->nullable();
            $table->bigInteger('thana_vittik_kormi_shikkha_boithok_man_target')->nullable();
            $table->bigInteger('thana_vittik_kormi_shikkha_boithok_man_uposthiti')->nullable();
            $table->bigInteger('thana_vittik_kormi_shikkha_boithok_women_total')->nullable();
            $table->bigInteger('thana_vittik_kormi_shikkha_boithok_women_target')->nullable();
            $table->bigInteger('thana_vittik_kormi_shikkha_boithok_women_uposthiti')->nullable();

            $table->bigInteger('former_Student_kormi_training_program')->nullable();

            $table->bigInteger('upozila_former_Student_kormi_training_program_man_total')->nullable();
            $table->bigInteger('upozila_former_Student_kormi_training_program_man_target')->nullable();
            $table->bigInteger('upozila_former_Student_kormi_training_program_man_uposthiti')->nullable();
            $table->bigInteger('upozila_former_Student_kormi_training_program_women_total')->nullable();
            $table->bigInteger('upozila_former_Student_kormi_training_program_women_target')->nullable();
            $table->bigInteger('upozila_former_Student_kormi_training_program_women_uposthiti')->nullable();

            $table->bigInteger('thana_former_Student_kormi_training_program_man_total')->nullable();
            $table->bigInteger('thana_former_Student_kormi_training_program_man_target')->nullable();
            $table->bigInteger('thana_former_Student_kormi_training_program_man_uposthiti')->nullable();
            $table->bigInteger('thana_former_Student_kormi_training_program_women_total')->nullable();
            $table->bigInteger('thana_former_Student_kormi_training_program_women_target')->nullable();
            $table->bigInteger('thana_former_Student_kormi_training_program_women_uposthiti')->nullable();

            $table->bigInteger('pouroshova_kormi_shikkha_boithok_man_total')->nullable();
            $table->bigInteger('pouroshova_kormi_shikkha_boithok_man_target')->nullable();
            $table->bigInteger('pouroshova_kormi_shikkha_boithok_man_uposthiti')->nullable();
            $table->bigInteger('pouroshova_kormi_shikkha_boithok_women_total')->nullable();
            $table->bigInteger('pouroshova_kormi_shikkha_boithok_women_target')->nullable();
            $table->bigInteger('pouroshova_kormi_shikkha_boithok_women_uposthiti')->nullable();

            $table->bigInteger('union_kormi_shikkha_boithok_man_total')->nullable();
            $table->bigInteger('union_kormi_shikkha_boithok_man_target')->nullable();
            $table->bigInteger('union_kormi_shikkha_boithok_man_uposthiti')->nullable();
            $table->bigInteger('union_kormi_shikkha_boithok_women_total')->nullable();
            $table->bigInteger('union_kormi_shikkha_boithok_women_target')->nullable();
            $table->bigInteger('union_kormi_shikkha_boithok_women_uposthiti')->nullable();

            $table->bigInteger('ward_kormi_shikkha_boithok_man_total')->nullable();
            $table->bigInteger('ward_kormi_shikkha_boithok_man_target')->nullable();
            $table->bigInteger('ward_kormi_shikkha_boithok_man_uposthiti')->nullable();
            $table->bigInteger('ward_kormi_shikkha_boithok_women_total')->nullable();
            $table->bigInteger('ward_kormi_shikkha_boithok_women_target')->nullable();
            $table->bigInteger('ward_kormi_shikkha_boithok_women_uposthiti')->nullable();

            $table->bigInteger('gono_sikkha_boithok_man_total')->nullable();
            $table->bigInteger('gono_sikkha_boithok_man_target')->nullable();
            $table->bigInteger('gono_sikkha_boithok_man_uposthiti')->nullable();
            $table->bigInteger('gono_sikkha_boithok_women_total')->nullable();
            $table->bigInteger('gono_sikkha_boithok_women_target')->nullable();
            $table->bigInteger('gono_sikkha_boithok_women_uposthiti')->nullable();

            $table->bigInteger('gono_noisho_ibadot_man_total')->nullable();
            $table->bigInteger('gono_noisho_ibadot_man_target')->nullable();
            $table->bigInteger('gono_noisho_ibadot_man_uposthiti')->nullable();
            $table->bigInteger('gono_noisho_ibadot_women_total')->nullable();
            $table->bigInteger('gono_noisho_ibadot_women_target')->nullable();
            $table->bigInteger('gono_noisho_ibadot_women_uposthiti')->nullable();

            $table->bigInteger('rokon_path_cokro_man_total_group')->nullable();
            $table->bigInteger('rokon_path_cokro_man_total_odhibeshon')->nullable();
            $table->bigInteger('rokon_path_cokro_man_total_uposthiti')->nullable();
            $table->bigInteger('rokon_path_cokro_woman_total_group')->nullable();
            $table->bigInteger('rokon_path_cokro_woman_total_odhibeshon')->nullable();
            $table->bigInteger('rokon_path_cokro_woman_total_uposthiti')->nullable();

            $table->bigInteger('kormi_path_cokro_man_total_group')->nullable();
            $table->bigInteger('kormi_path_cokro_man_total_odhibeshon')->nullable();
            $table->bigInteger('kormi_path_cokro_man_total_uposthiti')->nullable();
            $table->bigInteger('kormi_path_cokro_woman_total_group')->nullable();
            $table->bigInteger('kormi_path_cokro_woman_total_odhibeshon')->nullable();
            $table->bigInteger('kormi_path_cokro_woman_total_uposthiti')->nullable();

            $table->bigInteger('kormi_alochona_cokro_man_total_group')->nullable();
            $table->bigInteger('kormi_alochona_cokro_man_total_odhibeshon')->nullable();
            $table->bigInteger('kormi_alochona_cokro_man_total_uposthiti')->nullable();
            $table->bigInteger('kormi_alochona_cokro_woman_total_group')->nullable();
            $table->bigInteger('kormi_alochona_cokro_woman_total_odhibeshon')->nullable();
            $table->bigInteger('kormi_alochona_cokro_woman_total_uposthiti')->nullable();

            $table->bigInteger('quran_study_circle_man_total_group')->nullable();
            $table->bigInteger('quran_study_circle_man_total_odhibeshon')->nullable();
            $table->bigInteger('quran_study_circle_man_total_uposthiti')->nullable();
            $table->bigInteger('quran_study_circle_woman_total_group')->nullable();
            $table->bigInteger('quran_study_circle_woman_total_odhibeshon')->nullable();
            $table->bigInteger('quran_study_circle_woman_total_uposthiti')->nullable();

            $table->bigInteger('darsul_quran_man_program')->nullable();
            $table->bigInteger('darsul_quran_man_odhibeshon')->nullable();
            $table->bigInteger('darsul_quran_man_uposthiti')->nullable();
            $table->bigInteger('darsul_quran_woman_program')->nullable();
            $table->bigInteger('darsul_quran_woman_odhibeshon')->nullable();
            $table->bigInteger('darsul_quran_woman_uposthiti')->nullable();

            $table->bigInteger('sohih_tilawat_man_program')->nullable();
            $table->bigInteger('sohih_tilawat_man_uposthiti')->nullable();
            $table->bigInteger('sohih_tilawat_woman_program')->nullable();
            $table->bigInteger('sohih_tilawat_woman_uposthiti')->nullable();

            $table->string('creator')->nullable();
            $table->string('status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thana_proshikkhon1_tarbiats');
    }
};
