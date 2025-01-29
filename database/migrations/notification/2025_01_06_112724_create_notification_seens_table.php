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
        Schema::create('notification_seens', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('notification_id')->nullable();
            $table->bigInteger('city_id')->nullable();
            $table->bigInteger('thana_id')->nullable();
            $table->bigInteger('ward_id')->nullable();
            $table->bigInteger('unit_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('title',100)->nullable();
            $table->text('description')->nullable();
            
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
        Schema::dropIfExists('notification_seens');
    }
};
