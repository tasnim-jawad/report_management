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
        Schema::create('ward_songothon2_associate_members', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->unsigned()->nullable();
            $table->bigInteger('associate_member_man_previous')->nullable();
            $table->bigInteger('associate_member_man_present')->nullable();
            $table->bigInteger('associate_member_man_briddhi')->nullable();
            $table->bigInteger('associate_member_man_target')->nullable();

            $table->bigInteger('associate_member_woman_previous')->nullable();
            $table->bigInteger('associate_member_woman_present')->nullable();
            $table->bigInteger('associate_member_woman_briddhi')->nullable();
            $table->bigInteger('associate_member_woman_target')->nullable();

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
        Schema::dropIfExists('ward_songothon2_associate_members');
    }
};
