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
        Schema::create('ward_rastrio4_election_activities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->unsigned()->nullable();

            $table->bigInteger('councilor_candidate')->nullable();
            $table->bigInteger('councilor_candidate_elected')->nullable();
            $table->bigInteger('councilor_candidate_second_position')->nullable();

            $table->bigInteger('member_candidate')->nullable();
            $table->bigInteger('member_candidate_elected')->nullable();
            $table->bigInteger('member_candidate_second_position')->nullable();

            $table->bigInteger('national_vote_kendro')->nullable();
            $table->bigInteger('national_vote_kendro_increase')->nullable();
            $table->bigInteger('national_vote_kendro_target')->nullable();

            $table->bigInteger('local_vote_kendro')->nullable();
            $table->bigInteger('local_vote_kendro_increase')->nullable();
            $table->bigInteger('local_vote_kendro_target')->nullable();

            $table->bigInteger('vote_kendro_committee')->nullable();
            $table->bigInteger('vote_kendro_committee_increase')->nullable();
            $table->bigInteger('vote_kendro_committee_target')->nullable();

            $table->bigInteger('vote_kendro_vittik_unit')->nullable();
            $table->bigInteger('vote_kendro_vittik_unit_increase')->nullable();
            $table->bigInteger('vote_kendro_vittik_unit_target')->nullable();

            $table->bigInteger('election_management_committee_meeting')->nullable();

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
        Schema::dropIfExists('ward_rastrio4_election_activities');
    }
};
