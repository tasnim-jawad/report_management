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
        Schema::create('thana_department2_moholla_vittik_dawats', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('report_info_id')->unsigned()->nullable();

            $table->bigInteger('govment_calculated_village_amount')->nullable();
            $table->bigInteger('govment_calculated_moholla_amount')->nullable();

            $table->bigInteger('total_village_committee')->nullable();
            $table->bigInteger('total_village_committee_increased')->nullable();

            $table->bigInteger('total_moholla_committee')->nullable();
            $table->bigInteger('total_moholla_committee_increased')->nullable();

            $table->bigInteger('special_dawat_included_village')->nullable();
            $table->bigInteger('special_dawat_included_village_increased')->nullable();

            $table->bigInteger('special_dawat_included_moholla')->nullable();
            $table->bigInteger('special_dawat_included_moholla_increased')->nullable();

            $table->bigInteger('how_many_been_invited')->nullable();
            $table->bigInteger('how_many_associated_created')->nullable();


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
        Schema::dropIfExists('thana_department2_moholla_vittik_dawats');
    }
};
