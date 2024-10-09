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
        Schema::create('ward_rastrio3_dibosh_palons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->unsigned()->nullable();

            $table->bigInteger('shadhinota_o_jatio_dibosh_total_programs')->nullable();
            $table->bigInteger('shadhinota_o_jatio_dibosh_attend')->nullable();

            $table->bigInteger('bijoy_dibosh_total_programs')->nullable();
            $table->bigInteger('bijoy_dibosh_attend')->nullable();

            $table->bigInteger('mattrivasha_dibosh_total_programs')->nullable();
            $table->bigInteger('mattrivasha_dibosh_attend')->nullable();

            $table->bigInteger('others_total_programs')->nullable();
            $table->bigInteger('others_attend')->nullable();

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
        Schema::dropIfExists('ward_rastrio3_dibosh_palons');
    }
};
