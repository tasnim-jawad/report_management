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
        Schema::create('thana_songothon9_sofors', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('report_info_id')->nullable();

            $table->bigInteger('jela_daittoshil_total_sofor_man')->nullable();
            $table->bigInteger('mohanogor_daittoshil_total_sofor_man')->nullable();

            $table->bigInteger('upojela_president_total_sofor_man')->nullable();
            $table->bigInteger('thana_president_total_sofor_man')->nullable();

            $table->bigInteger('upojela_kormoporishod_total_sofor_man')->nullable();
            $table->bigInteger('thana_kormoporishod_total_sofor_man')->nullable();

            $table->bigInteger('upojela_team_total_sofor_man')->nullable();
            $table->bigInteger('thana_team_total_sofor_man')->nullable();

            $table->bigInteger('jela_daittoshil_total_sofor_woman')->nullable();
            $table->bigInteger('mohanogor_daittoshil_total_sofor_woman')->nullable();

            $table->bigInteger('upojela_president_total_sofor_woman')->nullable();
            $table->bigInteger('thana_president_total_sofor_woman')->nullable();

            $table->bigInteger('upojela_kormoporishod_total_sofor_woman')->nullable();
            $table->bigInteger('thana_kormoporishod_total_sofor_woman')->nullable();

            $table->bigInteger('upojela_team_total_sofor_woman')->nullable();
            $table->bigInteger('thana_team_total_sofor_woman')->nullable();

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
        Schema::dropIfExists('thana_songothon9_sofors');
    }
};
