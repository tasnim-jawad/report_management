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
        Schema::create('thana_proshikkhon2_manob_shompod_organizational_activities', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('report_info_id')->nullable();
            $table->bigInteger('upojela_manobshompod_committee')->nullable();
            $table->bigInteger('upojela_manobshompod_committee_boithok')->nullable();
            $table->bigInteger('thana_manobshompod_committee')->nullable();
            $table->bigInteger('thana_manobshompod_committee_boithok')->nullable();
            $table->bigInteger('manpower_career_motivation_programs')->nullable();
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
        Schema::dropIfExists('thana_proshikkhon2_manob_shompod_organizational_activities');
    }
};
