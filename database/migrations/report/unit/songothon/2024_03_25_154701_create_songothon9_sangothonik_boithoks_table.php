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
        Schema::create('songothon9_sangothonik_boithoks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->unsigned()->nullable();
            $table->bigInteger('unit_kormi_boithok_total')->nullable();
            $table->bigInteger('unit_kormi_boithok_uposthiti')->nullable();

            // $table->bigInteger('word_sura_boithok_man_total')->nullable();
            // $table->bigInteger('word_sura_boithok_man_target')->nullable();
            // $table->bigInteger('word_sura_boithok_man_uposthiti')->nullable();
            // $table->bigInteger('word_sura_boithok_women_total')->nullable();
            // $table->bigInteger('word_sura_boithok_women_target')->nullable();
            // $table->bigInteger('word_sura_boithok_women_uposthiti')->nullable();

            // $table->bigInteger('kormoporishod_boithok_man_total')->nullable();
            // $table->bigInteger('kormoporishod_boithok_man_target')->nullable();
            // $table->bigInteger('kormoporishod_boithok_man_uposthiti')->nullable();
            // $table->bigInteger('kormoporishod_boithok_women_total')->nullable();
            // $table->bigInteger('kormoporishod_boithok_women_target')->nullable();
            // $table->bigInteger('kormoporishod_boithok_women_uposthiti')->nullable();

            // $table->bigInteger('upozilla_rokon_boithok_man_total')->nullable();
            // $table->bigInteger('upozilla_rokon_boithok_man_target')->nullable();
            // $table->bigInteger('upozilla_rokon_boithok_man_uposthiti')->nullable();
            // $table->bigInteger('upozilla_rokon_boithok_women_total')->nullable();
            // $table->bigInteger('upozilla_rokon_boithok_women_target')->nullable();
            // $table->bigInteger('upozilla_rokon_boithok_women_uposthiti')->nullable();

            // $table->bigInteger('thana_rokon_boithok_man_total')->nullable();
            // $table->bigInteger('thana_rokon_boithok_man_target')->nullable();
            // $table->bigInteger('thana_rokon_boithok_man_uposthiti')->nullable();
            // $table->bigInteger('thana_rokon_boithok_women_total')->nullable();
            // $table->bigInteger('thana_rokon_boithok_women_target')->nullable();
            // $table->bigInteger('thana_rokon_boithok_women_uposthiti')->nullable();

            // $table->bigInteger('division_committee_boithok_man_total')->nullable();
            // $table->bigInteger('division_committee_boithok_man_target')->nullable();
            // $table->bigInteger('division_committee_boithok_man_uposthiti')->nullable();
            // $table->bigInteger('division_committee_boithok_women_total')->nullable();
            // $table->bigInteger('division_committee_boithok_women_target')->nullable();
            // $table->bigInteger('division_committee_boithok_women_uposthiti')->nullable();

            // $table->bigInteger('pourosova_boithok_man_total')->nullable();
            // $table->bigInteger('pourosova_boithok_man_target')->nullable();
            // $table->bigInteger('pourosova_boithok_man_uposthiti')->nullable();
            // $table->bigInteger('pourosova_boithok_women_total')->nullable();
            // $table->bigInteger('pourosova_boithok_women_target')->nullable();
            // $table->bigInteger('pourosova_boithok_women_uposthiti')->nullable();

            // $table->bigInteger('union_boithok_man_total')->nullable();
            // $table->bigInteger('union_boithok_man_target')->nullable();
            // $table->bigInteger('union_boithok_man_uposthiti')->nullable();
            // $table->bigInteger('union_boithok_women_total')->nullable();
            // $table->bigInteger('union_boithok_women_target')->nullable();
            // $table->bigInteger('union_boithok_women_uposthiti')->nullable();

            // $table->bigInteger('word_boithok_man_total')->nullable();
            // $table->bigInteger('word_boithok_man_target')->nullable();
            // $table->bigInteger('word_boithok_man_uposthiti')->nullable();
            // $table->bigInteger('word_boithok_women_total')->nullable();
            // $table->bigInteger('word_boithok_women_target')->nullable();
            // $table->bigInteger('word_boithok_women_uposthiti')->nullable();

            // $table->bigInteger('team_boithok_man_total')->nullable();
            // $table->bigInteger('team_boithok_man_target')->nullable();
            // $table->bigInteger('team_boithok_man_uposthiti')->nullable();
            // $table->bigInteger('team_boithok_women_total')->nullable();
            // $table->bigInteger('team_boithok_women_target')->nullable();
            // $table->bigInteger('team_boithok_women_uposthiti')->nullable();

            // $table->bigInteger('masik_sodosso_boithok_man_total')->nullable();
            // $table->bigInteger('masik_sodosso_boithok_man_target')->nullable();
            // $table->bigInteger('masik_sodosso_boithok_man_uposthiti')->nullable();
            // $table->bigInteger('masik_sodosso_boithok_women_total')->nullable();
            // $table->bigInteger('masik_sodosso_boithok_women_target')->nullable();
            // $table->bigInteger('masik_sodosso_boithok_women_uposthiti')->nullable();

            // $table->bigInteger('pourosova_masik_sodosso_boithok_man_total')->nullable();
            // $table->bigInteger('pourosova_masik_sodosso_boithok_man_target')->nullable();
            // $table->bigInteger('pourosova_masik_sodosso_boithok_man_uposthiti')->nullable();
            // $table->bigInteger('pourosova_masik_sodosso_boithok_women_total')->nullable();
            // $table->bigInteger('pourosova_masik_sodosso_boithok_women_target')->nullable();
            // $table->bigInteger('pourosova_masik_sodosso_boithok_women_uposthiti')->nullable();

            // $table->bigInteger('union_masik_sodosso_boithok_man_total')->nullable();
            // $table->bigInteger('union_masik_sodosso_boithok_man_target')->nullable();
            // $table->bigInteger('union_masik_sodosso_boithok_man_uposthiti')->nullable();
            // $table->bigInteger('union_masik_sodosso_boithok_women_total')->nullable();
            // $table->bigInteger('union_masik_sodosso_boithok_women_target')->nullable();
            // $table->bigInteger('union_masik_sodosso_boithok_women_uposthiti')->nullable();

            // $table->bigInteger('unit_kormi_boithok_man_total')->nullable();
            // $table->bigInteger('unit_kormi_boithok_man_target')->nullable();
            // $table->bigInteger('unit_kormi_boithok_man_uposthiti')->nullable();
            // $table->bigInteger('unit_kormi_boithok_women_total')->nullable();
            // $table->bigInteger('unit_kormi_boithok_women_target')->nullable();
            // $table->bigInteger('unit_kormi_boithok_women_uposthiti')->nullable();

            // $table->bigInteger('ulama_somabesh_man_total')->nullable();
            // $table->bigInteger('ulama_somabesh_man_target')->nullable();
            // $table->bigInteger('ulama_somabesh_man_uposthiti')->nullable();
            // $table->bigInteger('ulama_somabesh_women_total')->nullable();
            // $table->bigInteger('ulama_somabesh_women_target')->nullable();
            // $table->bigInteger('ulama_somabesh_women_uposthiti')->nullable();

            // $table->bigInteger('jubok_somabesh_man_total')->nullable();
            // $table->bigInteger('jubok_somabesh_man_target')->nullable();
            // $table->bigInteger('jubok_somabesh_man_uposthiti')->nullable();
            // $table->bigInteger('jubok_somabesh_women_total')->nullable();
            // $table->bigInteger('jubok_somabesh_women_target')->nullable();
            // $table->bigInteger('jubok_somabesh_women_uposthiti')->nullable();

            // $table->bigInteger('sromik_somabesh_man_total')->nullable();
            // $table->bigInteger('sromik_somabesh_man_target')->nullable();
            // $table->bigInteger('sromik_somabesh_man_uposthiti')->nullable();
            // $table->bigInteger('sromik_somabesh_women_total')->nullable();
            // $table->bigInteger('sromik_somabesh_women_target')->nullable();
            // $table->bigInteger('sromik_somabesh_women_uposthiti')->nullable();

            // $table->bigInteger('trimasik_rokon_sommelon_man_total')->nullable();
            // $table->bigInteger('trimasik_rokon_sommelon_man_target')->nullable();
            // $table->bigInteger('trimasik_rokon_sommelon_man_uposthiti')->nullable();
            // $table->bigInteger('trimasik_rokon_sommelon_women_total')->nullable();
            // $table->bigInteger('trimasik_rokon_sommelon_women_target')->nullable();
            // $table->bigInteger('trimasik_rokon_sommelon_women_uposthiti')->nullable();

            // $table->bigInteger('sammasik_rokon_sommelon_man_total')->nullable();
            // $table->bigInteger('sammasik_rokon_sommelon_man_target')->nullable();
            // $table->bigInteger('sammasik_rokon_sommelon_man_uposthiti')->nullable();
            // $table->bigInteger('sammasik_rokon_sommelon_women_total')->nullable();
            // $table->bigInteger('sammasik_rokon_sommelon_women_target')->nullable();
            // $table->bigInteger('sammasik_rokon_sommelon_women_uposthiti')->nullable();

            // $table->bigInteger('barsik_rokon_sommelon_man_total')->nullable();
            // $table->bigInteger('barsik_rokon_sommelon_man_target')->nullable();
            // $table->bigInteger('barsik_rokon_sommelon_man_uposthiti')->nullable();
            // $table->bigInteger('barsik_rokon_sommelon_women_total')->nullable();
            // $table->bigInteger('barsik_rokon_sommelon_women_target')->nullable();
            // $table->bigInteger('barsik_rokon_sommelon_women_uposthiti')->nullable();

            // $table->bigInteger('upozila_ward_sovapoti_sommelon_man_total')->nullable();
            // $table->bigInteger('upozila_ward_sovapoti_sommelon_man_target')->nullable();
            // $table->bigInteger('upozila_ward_sovapoti_sommelon_man_uposthiti')->nullable();
            // $table->bigInteger('upozila_ward_sovapoti_sommelon_women_total')->nullable();
            // $table->bigInteger('upozila_ward_sovapoti_sommelon_women_target')->nullable();
            // $table->bigInteger('upozila_ward_sovapoti_sommelon_women_uposthiti')->nullable();

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
        Schema::dropIfExists('songothon9_sangothonik_boithoks');
    }
};
