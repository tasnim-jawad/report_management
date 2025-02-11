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
        Schema::create('thana_proshikkhon3_manob_shompod_training_courses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->nullable();
            $table->bigInteger('dawah_uposthiti')->nullable();
            $table->bigInteger('shomajkormo_uposthiti')->nullable();
            $table->bigInteger('media_uposthiti')->nullable();
            $table->bigInteger('ict_uposthiti')->nullable();
            $table->bigInteger('office_uposthiti')->nullable();
            $table->bigInteger('financial_management_uposthiti')->nullable();
            $table->bigInteger('english_language_uposthiti')->nullable();
            $table->bigInteger('arabic_language_uposthiti')->nullable();
            $table->bigInteger('trade_oriented_technical_training_uposthiti')->nullable();
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
        Schema::dropIfExists('thana_proshikkhon2_manob_shompod_training_courses');
    }
};
