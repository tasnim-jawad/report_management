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
        Schema::create('songothon2_associate_members', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('associate_member_previous')->nullable();
            $table->bigInteger('associate_member_present')->nullable();
            $table->bigInteger('associate_member_briddhi')->nullable();
            $table->bigInteger('associate_member_target')->nullable();
            $table->bigInteger('vinno_dormalombi_worker_previous')->nullable();
            $table->bigInteger('vinno_dormalombi_worker_present')->nullable();
            $table->bigInteger('vinno_dormalombi_worker_briddhi')->nullable();
            $table->bigInteger('vinno_dormalombi_worker_target')->nullable();
            $table->bigInteger('vinno_dormalombi_associate_member_previous')->nullable();
            $table->bigInteger('vinno_dormalombi_associate_member_present')->nullable();
            $table->bigInteger('vinno_dormalombi_associate_member_briddhi')->nullable();
            $table->bigInteger('vinno_dormalombi_associate_member_target')->nullable();

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
        Schema::dropIfExists('songothon2_associate_members');
    }
};
