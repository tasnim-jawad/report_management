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
        Schema::create('thana_shomajsheba7_expenses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->nullable();
            $table->bigInteger('percentage_of_expense')->nullable();
            $table->string('creator')->nullable();
            $table->string('status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thana_shomajsheba7_expenses');
    }
};
