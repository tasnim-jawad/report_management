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
        Schema::create('report_management_controls', function (Blueprint $table) {
            $table->id();
            $table->date('month_year')->nullable();
            $table->enum('report_type',['unit', 'ward', 'thana','city'])->nullable();
            $table->tinyInteger('is_active')->default(0);

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
        Schema::dropIfExists('report_management_controls');
    }
};
