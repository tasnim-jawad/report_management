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
        Schema::create('bm_expenses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('unit_id')->nullable();
            $table->bigInteger('ward_id')->nullable();
            $table->bigInteger('thana_id')->nullable();
            $table->bigInteger('city_id')->nullable();
            $table->integer('amount')->nullable();
            $table->date('date')->nullable();
            $table->bigInteger('bm_expense_category_id')->nullable();
            //for report submission status
            $table->enum('report_submit_status', ['unsubmitted','submitted'])->default('unsubmitted');
            $table->enum('report_approved_status', ['pending','approved','rejected'])->default('pending');
            //for track about target
            $table->bigInteger('unit_expense_targets_id')->nullable();
            $table->bigInteger('unit_expense_targets_amount')->nullable();

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
        Schema::dropIfExists('bm_expenses');
    }
};
