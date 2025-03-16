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
        Schema::create('ward_songothon9_sangothonik_boithoks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->unsigned()->nullable();

            $table->bigInteger('word_sura_boithok_total')->nullable();
            $table->bigInteger('word_sura_boithok_target')->nullable();
            $table->bigInteger('word_sura_boithok_uposthiti')->nullable();

            $table->bigInteger('kormoporishod_boithok_total')->nullable();
            $table->bigInteger('kormoporishod_boithok_target')->nullable();
            $table->bigInteger('kormoporishod_boithok_uposthiti')->nullable();

            $table->bigInteger('team_boithok_total')->nullable();
            $table->bigInteger('team_boithok_target')->nullable();
            $table->bigInteger('team_boithok_uposthiti')->nullable();

            $table->bigInteger('word_boithok_total')->nullable();
            $table->bigInteger('word_boithok_target')->nullable();
            $table->bigInteger('word_boithok_uposthiti')->nullable();

            $table->bigInteger('masik_sodosso_boithok_total')->nullable();
            $table->bigInteger('masik_sodosso_boithok_target')->nullable();
            $table->bigInteger('masik_sodosso_boithok_uposthiti')->nullable();

            $table->bigInteger('unit_kormi_boithok_total')->nullable();
            $table->bigInteger('unit_kormi_boithok_target')->nullable();
            $table->bigInteger('unit_kormi_boithok_uposthiti')->nullable();

            $table->bigInteger('ulama_somabesh_total')->nullable();
            $table->bigInteger('ulama_somabesh_target')->nullable();
            $table->bigInteger('ulama_somabesh_uposthiti')->nullable();

            $table->bigInteger('jubok_somabesh_total')->nullable();
            $table->bigInteger('jubok_somabesh_target')->nullable();
            $table->bigInteger('jubok_somabesh_uposthiti')->nullable();

            $table->bigInteger('sromik_somabesh_total')->nullable();
            $table->bigInteger('sromik_somabesh_target')->nullable();
            $table->bigInteger('sromik_somabesh_uposthiti')->nullable();

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
        Schema::dropIfExists('ward_songothon9_sangothonik_boithoks');
    }
};
