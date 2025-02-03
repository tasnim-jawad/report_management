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
        Schema::create('thana_shomajsheba6_education_and_research_activities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->nullable();

            $table->bigInteger('ideal_teacher_produced')->nullable();
            $table->bigInteger('shikkha_seminar')->nullable();
            $table->bigInteger('alochona_shova')->nullable();
            $table->bigInteger('other')->nullable();

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
        Schema::dropIfExists('thana_shomajsheba6_education_and_research_activities');
    }
};
