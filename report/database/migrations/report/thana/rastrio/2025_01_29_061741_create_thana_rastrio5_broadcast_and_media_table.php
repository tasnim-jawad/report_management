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
        Schema::create('thana_rastrio5_broadcast_and_media', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->nullable();

            $table->string('press_release')->nullable();
            $table->string('bibriti')->nullable();
            $table->string('protibad_lipi')->nullable();

            $table->string('social_media_post')->nullable();
            $table->string('social_media_live_program')->nullable();

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
        Schema::dropIfExists('thana_rastrio5_broadcast_and_media');
    }
};
