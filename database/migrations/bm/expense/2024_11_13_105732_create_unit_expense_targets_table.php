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
        Schema::create('unit_expense_targets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('unit_id')->nullable();
            $table->bigInteger('ward_id')->nullable();
            $table->bigInteger('thana_id')->nullable();
            $table->bigInteger('city_id')->nullable();
            $table->bigInteger('bm_expense_category_id')->nullable();
            $table->integer('amount')->nullable();
            $table->date('start_from')->nullable();

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
        Schema::dropIfExists('unit_expense_targets');
    }
};
