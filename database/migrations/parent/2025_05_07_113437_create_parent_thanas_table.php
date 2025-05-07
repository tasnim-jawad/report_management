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
        Schema::create('parent_thanas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("man_thana_id")->unsigned()->nullable();
            $table->bigInteger("woman_thana_id")->unsigned()->nullable();
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
        Schema::dropIfExists('parent_thanas');
    }
};
