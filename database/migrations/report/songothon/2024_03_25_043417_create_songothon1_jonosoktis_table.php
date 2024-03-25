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
        Schema::create('songothon1_jonosoktis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('rokon_previous')->nullable();
            $table->bigInteger('rokon_present')->nullable();
            $table->bigInteger('rokon_briddhi')->nullable();
            $table->bigInteger('rokon_gatti')->nullable();
            $table->bigInteger('rokon_target')->nullable();
            $table->bigInteger('worker_previous')->nullable();
            $table->bigInteger('worker_present')->nullable();
            $table->bigInteger('worker_briddhi')->nullable();
            $table->bigInteger('worker_gatti')->nullable();
            $table->bigInteger('worker_target')->nullable();

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
        Schema::dropIfExists('songothon1_jonosoktis');
    }
};
