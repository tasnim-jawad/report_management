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
        Schema::create('thana_dawat2_personal_and_targets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->unsigned()->nullable();
            $table->integer('total_rokon_man')->unsigned()->nullable();
            $table->integer('total_worker_man')->unsigned()->nullable();
            $table->integer('total_rokon_woman')->unsigned()->nullable();
            $table->integer('total_worker_woman')->unsigned()->nullable();

            $table->integer('how_many_were_give_dawat_rokon_man')->unsigned()->nullable();
            $table->integer('how_many_were_give_dawat_worker_man')->unsigned()->nullable();
            $table->integer('how_many_were_give_dawat_rokon_woman')->unsigned()->nullable();
            $table->integer('how_many_were_give_dawat_worker_woman')->unsigned()->nullable();
            
            
            
            $table->integer('how_many_have_been_invited_man')->unsigned()->nullable();
            $table->integer('how_many_have_been_invited_woman')->unsigned()->nullable();

            $table->integer('how_many_associate_members_created_man')->unsigned()->nullable();
            $table->integer('how_many_associate_members_created_woman_woman')->unsigned()->nullable();
            
            $table->integer('creator')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thana_dawat2_personal_and_targets');
    }
};
