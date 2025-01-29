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
        Schema::create('thana_department1_talimul_qurans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->unsigned()->nullable();

            $table->bigInteger('teacher_rokon_man')->nullable();
            $table->bigInteger('teacher_rokon_woman')->nullable();
            $table->bigInteger('teacher_worker_man')->nullable();
            $table->bigInteger('teacher_worker_woman')->nullable();

            $table->bigInteger('student_rokon_man')->nullable();
            $table->bigInteger('student_rokon_woman')->nullable();
            $table->bigInteger('student_worker_man')->nullable();
            $table->bigInteger('student_worker_woman')->nullable();


            $table->bigInteger('quran_learning_total_group')->nullable();
            $table->bigInteger('quran_learning_total_students')->nullable();

            $table->bigInteger('total_forkania_madrasah')->nullable();
            $table->bigInteger('total_forkania_madrasah_students')->nullable();

            $table->bigInteger('total_moktob')->nullable();
            $table->bigInteger('total_moktob_students')->nullable();

            $table->bigInteger('how_much_learned_sohih_tilawat')->nullable();

            $table->bigInteger('how_much_invited_man')->nullable();
            $table->bigInteger('how_much_invited_woman')->nullable();

            $table->bigInteger('how_much_been_associated_man')->nullable();
            $table->bigInteger('how_much_been_associated_woman')->nullable();

            $table->bigInteger('total_muallim_man')->nullable();
            $table->bigInteger('total_muallim_woman')->nullable();

            $table->bigInteger('total_muallim_increased_man')->nullable();
            $table->bigInteger('total_muallim_increased_woman')->nullable();

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
        Schema::dropIfExists('thana_department1_talimul_qurans');
    }
};
