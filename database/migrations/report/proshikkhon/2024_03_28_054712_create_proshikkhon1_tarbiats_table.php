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
        Schema::create('proshikkhon1_tarbiats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tarbiati_boithok_total')->nullable();
            $table->bigInteger('tarbiati_boithok_target')->nullable();
            $table->bigInteger('tarbiati_boithok_uposthiti')->nullable();

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
        Schema::dropIfExists('proshikkhon1_tarbiats');
    }
};
