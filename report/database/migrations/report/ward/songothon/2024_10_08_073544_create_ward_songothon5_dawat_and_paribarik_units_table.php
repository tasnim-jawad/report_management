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
        Schema::create('ward_songothon5_dawat_and_paribarik_units', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->unsigned()->nullable();

            $table->bigInteger('dawati_unit_previous')->nullable();
            $table->bigInteger('dawati_unit_present')->nullable();
            $table->bigInteger('dawati_unit_increase')->nullable();
            $table->bigInteger('dawati_unit_gatti')->nullable();
            $table->bigInteger('dawati_unit_target')->nullable();

            $table->bigInteger('paribarik_unit_previous')->nullable();
            $table->bigInteger('paribarik_unit_present')->nullable();
            $table->bigInteger('paribarik_unit_increase')->nullable();
            $table->bigInteger('paribarik_unit_gatti')->nullable();
            $table->bigInteger('paribarik_unit_target')->nullable();

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
        Schema::dropIfExists('ward_songothon5_dawat_and_paribarik_units');
    }
};
