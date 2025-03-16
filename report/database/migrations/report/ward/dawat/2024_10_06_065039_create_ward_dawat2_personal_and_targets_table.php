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
        Schema::create('ward_dawat2_personal_and_targets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->unsigned()->nullable();
            $table->integer('total_rokon')->unsigned()->nullable();
            $table->integer('total_worker')->unsigned()->nullable();
            $table->integer('how_many_were_give_dawat_rokon')->unsigned()->nullable();
            $table->integer('how_many_were_give_dawat_worker')->unsigned()->nullable();
            $table->integer('how_many_have_been_invited')->unsigned()->nullable();
            $table->integer('how_many_associate_members_created')->unsigned()->nullable();
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
        Schema::dropIfExists('ward_dawat2_personal_and_targets');
    }
};
