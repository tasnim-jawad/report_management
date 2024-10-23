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
        Schema::create('report_infos', function (Blueprint $table) {
            $table->id();
            $table->enum('org_type',['city', 'thana', 'ward', 'unit'])->nullable();
            $table->bigInteger('org_type_id')->nullable();
            $table->bigInteger('responsibility_id')->nullable();
            $table->string('responsibility_name',50)->nullable();
            $table->date('month_year')->nullable();
            $table->enum('report_submit_status', ['unsubmitted','submitted'])->default('unsubmitted');
            $table->enum('report_approved_status', ['pending','approved','rejected'])->default('pending');
            $table->string('report_type',50)->nullable();
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
        Schema::dropIfExists('report_infos');
    }
};
