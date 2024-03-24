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
        Schema::create('department5_paribarik_dawats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('total_attended_family')->nullable();
            $table->bigInteger('how_many_new_family_invited')->nullable();

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
        Schema::dropIfExists('department5_paribarik_dawats');
    }
};
