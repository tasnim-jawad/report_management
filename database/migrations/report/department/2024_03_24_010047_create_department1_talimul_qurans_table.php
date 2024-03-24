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
        Schema::create('department1_talimul_qurans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('teacher_rokon')->nullable();
            $table->bigInteger('teacher_worker')->nullable();

            $table->bigInteger('samostic_quran_learning_total_group')->nullable();
            $table->bigInteger('samostic_quran_learning_total_students')->nullable();
            $table->bigInteger('samostic_total_forkania_madrasah')->nullable();
            $table->bigInteger('samostic_total_forkania_madrasah_students')->nullable();

            $table->bigInteger('how_much_learned_quran')->nullable();
            $table->bigInteger('how_much_invited')->nullable();
            $table->bigInteger('how_much_been_associated')->nullable();

            $table->bigInteger('total_muallim')->nullable();
            $table->bigInteger('total_muallim_increased')->nullable();

            $table->string('creator', 50)->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department1_talimul_qurans');
    }
};
