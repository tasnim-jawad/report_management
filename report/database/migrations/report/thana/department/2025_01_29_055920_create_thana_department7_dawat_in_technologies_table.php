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
        Schema::create('thana_department7_dawat_in_technologies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->unsigned()->nullable();
            $table->bigInteger('total_well_known_man')->nullable();
            $table->bigInteger('total_well_known_woman')->nullable();

            $table->bigInteger('total_attended_man')->nullable();
            $table->bigInteger('total_attended_woman')->nullable();



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
        Schema::dropIfExists('thana_department7_dawat_in_technologies');
    }
};
