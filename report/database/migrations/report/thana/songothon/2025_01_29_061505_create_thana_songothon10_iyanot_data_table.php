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
        Schema::create('thana_songothon10_iyanot_data', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('report_info_id')->nullable();

            $table->bigInteger('associate_member_total')->nullable();
            $table->bigInteger('associate_member_total_iyanot_amounts')->nullable();
            $table->bigInteger('sudhi_total')->nullable();
            $table->bigInteger('sudi_total_iyanot_amounts')->nullable();

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
        Schema::dropIfExists('thana_songothon10_iyanot_data');
    }
};
