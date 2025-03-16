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
        Schema::create('thana_songothon6_emarot_kayems', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('report_info_id')->nullable();

            $table->bigInteger('pouroshova_previous')->nullable();
            $table->bigInteger('pouroshova_present')->nullable();
            $table->bigInteger('pouroshova_increase')->nullable();
            $table->bigInteger('pouroshova_gatti')->nullable();
            $table->bigInteger('pouroshova_target')->nullable();

            $table->bigInteger('union_previous')->nullable();
            $table->bigInteger('union_present')->nullable();
            $table->bigInteger('union_increase')->nullable();
            $table->bigInteger('union_gatti')->nullable();
            $table->bigInteger('union_target')->nullable();

            $table->bigInteger('ward_of_city_previous')->nullable();
            $table->bigInteger('ward_of_city_present')->nullable();
            $table->bigInteger('ward_of_city_increase')->nullable();
            $table->bigInteger('ward_of_city_gatti')->nullable();
            $table->bigInteger('ward_of_city_target')->nullable();

            $table->bigInteger('ward_of_pouroshova_previous')->nullable();
            $table->bigInteger('ward_of_pouroshova_present')->nullable();
            $table->bigInteger('ward_of_pouroshova_increase')->nullable();
            $table->bigInteger('ward_of_pouroshova_gatti')->nullable();
            $table->bigInteger('ward_of_pouroshova_target')->nullable();

            $table->bigInteger('ward_of_union_previous')->nullable();
            $table->bigInteger('ward_of_union_present')->nullable();
            $table->bigInteger('ward_of_union_increase')->nullable();
            $table->bigInteger('ward_of_union_gatti')->nullable();
            $table->bigInteger('ward_of_union_target')->nullable();

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
        Schema::dropIfExists('thana_songothon6_emarot_kayems');
    }
};
