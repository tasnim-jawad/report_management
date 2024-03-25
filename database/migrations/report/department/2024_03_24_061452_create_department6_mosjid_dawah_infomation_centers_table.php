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
        Schema::create('department6_mosjid_dawah_infomation_centers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('total_mosjid')->nullable();
            $table->bigInteger('total_mosjid_increase')->nullable();

            $table->bigInteger('dawat_included_mosjid')->nullable();
            $table->bigInteger('dawat_included_mosjid_increase')->nullable();

            $table->bigInteger('mosjid_wise_dawah_center')->nullable();
            $table->bigInteger('mosjid_wise_dawah_center_increase')->nullable();

            $table->bigInteger('general_dawah_center')->nullable();
            $table->bigInteger('general_dawah_center_increase')->nullable();

            $table->bigInteger('mosjid_information_center')->nullable();
            $table->bigInteger('mosjid_information_center_increase')->nullable();

            $table->bigInteger('general_information_center')->nullable();
            $table->bigInteger('general_information_center_increase')->nullable();

            $table->bigInteger('trained_educated_dayee')->nullable();
            $table->bigInteger('trained_educated_dayee_increase')->nullable();

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
        Schema::dropIfExists('department6_mosjid_dawah_infomation_centers');
    }
};
