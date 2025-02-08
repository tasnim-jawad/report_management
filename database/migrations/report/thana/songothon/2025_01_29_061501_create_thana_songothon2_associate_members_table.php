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
        Schema::create('thana_songothon2_associate_members', function (Blueprint $table) {
            $table->id();
            // Report Reference ID
            $table->bigInteger('report_info_id')->nullable();

            // Associate Member (Men)
            $table->bigInteger('associate_member_man_previous')->nullable();
            $table->bigInteger('associate_member_man_present')->nullable();
            $table->bigInteger('associate_member_man_briddhi')->nullable();
            $table->bigInteger('associate_member_man_target')->nullable();

            // Associate Member (Women)
            $table->bigInteger('associate_member_woman_previous')->nullable();
            $table->bigInteger('associate_member_woman_present')->nullable();
            $table->bigInteger('associate_member_woman_briddhi')->nullable();
            $table->bigInteger('associate_member_woman_target')->nullable();

            // Common Fields
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
        Schema::dropIfExists('thana_songothon2_associate_members');
    }
};
