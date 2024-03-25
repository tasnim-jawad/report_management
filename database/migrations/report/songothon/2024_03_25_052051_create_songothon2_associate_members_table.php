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
        Schema::create('songothon2_associate_members', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('men_previous')->nullable();
            $table->bigInteger('men_present')->nullable();
            $table->bigInteger('men_briddhi')->nullable();
            $table->bigInteger('men_target')->nullable();
            $table->bigInteger('women_previous')->nullable();
            $table->bigInteger('women_present')->nullable();
            $table->bigInteger('women_briddhi')->nullable();
            $table->bigInteger('women_target')->nullable();
            $table->bigInteger('vinno_dormalombi_previous')->nullable();
            $table->bigInteger('vinno_dormalombi_present')->nullable();
            $table->bigInteger('vinno_dormalombi_briddhi')->nullable();
            $table->bigInteger('vinno_domalombi_target')->nullable();

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
        Schema::dropIfExists('songothon2_associate_members');
    }
};
