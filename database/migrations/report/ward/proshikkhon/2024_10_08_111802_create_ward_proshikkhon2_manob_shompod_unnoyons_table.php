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
        Schema::create('ward_proshikkhon2_manob_shompod_unnoyons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->unsigned()->nullable();

            $table->integer('dawah_uposthiti')->unsigned()->nullable();
            $table->integer('shomajkormo_uposthiti')->unsigned()->nullable();
            $table->integer('media_uposthiti')->unsigned()->nullable();

            $table->integer('ict_uposthiti')->unsigned()->nullable();
            $table->integer('office_uposthiti')->unsigned()->nullable();
            $table->integer('financial_management_uposthiti')->unsigned()->nullable();
            $table->integer('english_language_uposthiti')->unsigned()->nullable();
            $table->integer('arabic_language_uposthiti')->unsigned()->nullable();

            $table->integer('trade_oriented_technical_training_uposthiti')->unsigned()->nullable();

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
        Schema::dropIfExists('ward_proshikkhon2_manob_shompod_unnoyons');
    }
};
