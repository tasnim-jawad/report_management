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
        Schema::create('ward_expense_target_logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ward_expense_targets_id')->nullable();
            $table->date('created_date')->nullable();
            $table->string('action'); // Action type: create, update, delete
            $table->string('model'); // Name of the model
            $table->unsignedBigInteger('model_id'); // ID of the affected model
            $table->json('payload')->nullable(); // Data changes or details

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
        Schema::dropIfExists('ward_expense_target_logs');
    }
};
