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
        Schema::create('thana_shomajsheba4_institutional_social_works', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->nullable();

            $table->bigInteger('social_institution_total')->nullable();
            $table->bigInteger('social_institution_in_thana')->nullable();
            $table->bigInteger('social_institution_in_ward')->nullable();

            $table->bigInteger('institutional_social_work_total')->nullable();
            $table->bigInteger('institutional_social_work_in_thana')->nullable();
            $table->bigInteger('institutional_social_work_in_ward')->nullable();

            $table->bigInteger('new_social_institutions_total')->nullable();
            $table->bigInteger('new_social_institutions_in_thana')->nullable();
            $table->bigInteger('new_social_institutions_in_ward')->nullable();

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
        Schema::dropIfExists('thana_shomajsheba4_institutional_social_works');
    }
};
