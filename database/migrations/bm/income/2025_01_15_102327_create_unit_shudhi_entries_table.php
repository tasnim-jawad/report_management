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
        Schema::create('unit_shudhi_entries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('shudhi_id')->nullable();
            $table->bigInteger('unit_id')->nullable();
            $table->bigInteger('ward_id')->nullable();
            $table->bigInteger('thana_id')->nullable();
            $table->bigInteger('city_id')->nullable();
            $table->integer('amount')->nullable();
            $table->date('month')->nullable();
            $table->bigInteger('bm_category_id')->nullable();
            $table->enum('report_submit_status', ['unsubmitted','submitted'])->default('unsubmitted');
            $table->enum('report_approved_status', ['pending','approved','rejected'])->default('pending');

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
        Schema::dropIfExists('unit_shudhi_entries');
    }
};
