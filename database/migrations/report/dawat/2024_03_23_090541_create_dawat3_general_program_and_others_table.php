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
        Schema::create('dawat3_general_program_and_others', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('how_many_were_give_dawat')->nullable();
            $table->bigInteger('how_many_have_been_invited')->nullable();
            $table->bigInteger('how_many_associate_members_created')->nullable();
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
        Schema::dropIfExists('dawat3_general_program_and_others');
    }
};
