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
        Schema::create('thana_shomajsheba5_health_and_family_kollans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->nullable();

            $table->bigInteger('health_worker_produced')->nullable();
            $table->bigInteger('nurse_produced')->nullable();
            $table->bigInteger('dhattri_produced')->nullable();
            $table->bigInteger('parenting_training_program')->nullable();

            $table->bigInteger('health_education_training_program')->nullable();
            $table->bigInteger('health_education_training_programs_attendance')->nullable();
            $table->bigInteger('participated_in_health_care_work')->nullable();
            $table->bigInteger('served_people')->nullable();

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
        Schema::dropIfExists('thana_shomajsheba5_health_and_family_kollans');
    }
};
