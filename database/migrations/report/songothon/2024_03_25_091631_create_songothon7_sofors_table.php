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
        Schema::create('songothon7_sofors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('upper_leader_sofor')->nullable();
            // $table->bigInteger('ward_sovapotir_sofor')->nullable();
            // $table->bigInteger('word_sura_sodosso_sofor')->nullable();
            // $table->bigInteger('zilla_mohanogor_leader_sofor')->nullable();
            // $table->bigInteger('upozilla_thana_amir_leader_sofor')->nullable();
            // $table->bigInteger('upozilla_thana_kormoporisod_team_sodosso_sofor')->nullable();
            // $table->bigInteger('zilla_mohanogor_woman_deparment_leader_sofor')->nullable();
            // $table->bigInteger('upozilla_thana_woman_deparment_secretariate_sofor')->nullable();
            // $table->bigInteger('upozilla_thana_woman_deparment_team_member_sofor')->nullable();

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
        Schema::dropIfExists('songothon7_sofors');
    }
};
