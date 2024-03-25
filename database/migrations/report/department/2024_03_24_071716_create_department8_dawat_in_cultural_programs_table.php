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
        Schema::create('department8_dawat_in_cultural_programs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('total_cultural_team')->nullable();
            $table->bigInteger('total_program')->nullable();
            $table->bigInteger('total_invited')->nullable();

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
        Schema::dropIfExists('department8_dawat_in_cultural_programs');
    }
};
