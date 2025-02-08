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
        Schema::create('thana_department3_jubo_somaj_dawats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->unsigned()->nullable();
            $table->bigInteger('how_many_young_been_invited')->nullable();
            $table->bigInteger('how_many_young_been_associated')->nullable();

            $table->bigInteger('total_young_committee')->nullable();
            $table->bigInteger('total_young_committee_increased')->nullable();

            $table->bigInteger('total_new_somiti')->nullable();
            $table->bigInteger('total_new_somiti_increased')->nullable();

            $table->bigInteger('total_new_club')->nullable();
            $table->bigInteger('total_new_club_increased')->nullable();

            $table->bigInteger('stablished_somiti_total_invited')->nullable();
            $table->bigInteger('stablished_somiti_total_increased')->nullable();

            $table->bigInteger('stablished_club_total_invited')->nullable();
            $table->bigInteger('stablished_club_total_increased')->nullable();

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
        Schema::dropIfExists('thana_department3_jubo_somaj_dawats');
    }
};
