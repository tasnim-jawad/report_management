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
        Schema::create('thana_bm_category_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('thana_id')->nullable();
            $table->bigInteger('city_id')->nullable();
            $table->integer('amount')->nullable();
            $table->bigInteger('thana_bm_income_category_id')->nullable();
            $table->tinyInteger('is_active')->default(1)->nullable();

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
        Schema::dropIfExists('thana_bm_category_users');
    }
};
