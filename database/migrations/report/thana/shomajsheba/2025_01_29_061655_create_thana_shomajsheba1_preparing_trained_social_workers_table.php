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
        Schema::create('thana_shomajsheba1_preparing_trained_social_workers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->nullable();
            $table->bigInteger('trained_social_worker')->nullable();
            $table->bigInteger('training_courses_this_year_total')->nullable();
            $table->bigInteger('training_courses_this_year_target')->nullable();
            $table->bigInteger('people_completed_training_courses_this_year_total')->nullable();
            $table->bigInteger('people_completed_training_courses_this_year_target')->nullable();
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
        Schema::dropIfExists('thana_shomajsheba1_preparing_trained_social_workers');
    }
};
