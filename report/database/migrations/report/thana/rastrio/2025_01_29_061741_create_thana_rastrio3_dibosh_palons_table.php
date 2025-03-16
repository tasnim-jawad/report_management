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
        Schema::create('thana_rastrio3_dibosh_palons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->nullable();

            $table->bigInteger('shadhinota_o_jatio_dibosh_total_programs')->nullable();
            $table->bigInteger('shadhinota_o_jatio_dibosh_attend')->nullable();

            $table->bigInteger('bijoy_dibosh_total_programs')->nullable();
            $table->bigInteger('bijoy_dibosh_attend')->nullable();

            $table->bigInteger('others_total_programs')->nullable();
            $table->bigInteger('others_attend')->nullable();

            $table->bigInteger('mattrivasha_dibosh_total_programs')->nullable();
            $table->bigInteger('mattrivasha_dibosh_attend')->nullable();

            $table->bigInteger('international_womens_day_total_programs')->nullable();
            $table->bigInteger('international_womens_day_attend')->nullable();

            $table->bigInteger('may_day_total_programs')->nullable();
            $table->bigInteger('international_womens_day')->nullable();
            $table->bigInteger('international_womens_day_attend')->nullable();

            $table->bigInteger('may_day')->nullable();
            $table->bigInteger('may_day_attend')->nullable();

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
        Schema::dropIfExists('thana_rastrio3_dibosh_palons');
    }
};
