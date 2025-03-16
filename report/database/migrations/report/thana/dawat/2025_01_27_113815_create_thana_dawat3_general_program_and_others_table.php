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
        Schema::create('thana_dawat3_general_program_and_others', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->unsigned()->nullable();

            $table->integer('how_many_were_give_dawat_man')->unsigned()->nullable();
            $table->integer('how_many_were_give_dawat_woman')->unsigned()->nullable();

            $table->integer('how_many_associate_members_created_man')->unsigned()->nullable();
            $table->integer('how_many_associate_members_created_woman')->unsigned()->nullable();

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
        Schema::dropIfExists('thana_dawat3_general_program_and_others');
    }
};
