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
        Schema::create('org_areas', function (Blueprint $table) {
            $table->id();
            $table->string('ward',50)->nullable();
            $table->string('pourosova',50)->nullable();
            $table->string('thana',50)->nullable();
            $table->string('creator', 50)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('org_areas');
    }
};
