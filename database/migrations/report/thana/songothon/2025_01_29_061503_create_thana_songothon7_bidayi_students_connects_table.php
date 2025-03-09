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
        Schema::create('thana_songothon7_bidayi_students_connects', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('report_info_id')->nullable();

            $table->bigInteger('Joined_student_man_member')->nullable();
            $table->bigInteger('Joined_student_man_associate')->nullable();
            $table->bigInteger('Joined_student_man_worker')->nullable();

            $table->bigInteger('Joined_student_women_member')->nullable();
            $table->bigInteger('Joined_student_women_associate')->nullable();
            $table->bigInteger('Joined_student_women_worker')->nullable();

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
        Schema::dropIfExists('thana_songothon7_bidayi_students_connects');
    }
};
