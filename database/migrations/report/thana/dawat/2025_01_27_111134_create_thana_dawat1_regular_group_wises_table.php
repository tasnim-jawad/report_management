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
        Schema::create('thana_dawat1_regular_group_wises', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->nullable();
            $table->bigInteger('how_many_groups_are_out_man')->nullable();
            $table->bigInteger('number_of_participants_man')->nullable();
            $table->bigInteger('how_many_have_been_invited_man')->nullable();
            $table->bigInteger('how_many_associate_members_created_man')->nullable();
            $table->bigInteger('how_many_groups_are_out_woman')->nullable();
            $table->bigInteger('number_of_participants_woman')->nullable();
            $table->bigInteger('how_many_have_been_invited_woman')->nullable();
            $table->bigInteger('how_many_associate_members_created_woman')->nullable();
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
        Schema::dropIfExists('thana_dawat1_regular_group_wises');
    }
};
