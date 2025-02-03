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
        Schema::create('thana_rastrio4_election_activities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('report_info_id')->nullable();

            $table->bigInteger('city_corporation_total')->nullable();
            $table->bigInteger('city_corporation_total_candidate')->nullable();
            $table->bigInteger('city_corporation_total_candidate_participated')->nullable();
            $table->bigInteger('city_corporation_Mayor_candidate_elected')->nullable();
            $table->bigInteger('city_corporation_chairman_candidate_elected')->nullable();
            $table->bigInteger('city_corporation_vice_chairman_candidate_man_elected')->nullable();
            $table->bigInteger('city_corporation_vice_chairman_candidate_woman_elected')->nullable();
            $table->bigInteger('city_corporation_councilor_candidate_man_elected')->nullable();
            $table->bigInteger('city_corporation_councilor_candidate_woman_elected')->nullable();
            $table->bigInteger('city_corporation_member_candidate_man_elected')->nullable();
            $table->bigInteger('city_corporation_member_candidate_woman_elected')->nullable();
            $table->bigInteger('city_corporation_Mayor_candidate_second_position')->nullable();
            $table->bigInteger('city_corporation_chairman_candidate_second_position')->nullable();
            $table->bigInteger('city_corporation_vice_chairman_candidate_man_second_position')->nullable();
            $table->bigInteger('city_corporation_vice_chairman_candidate_woman_second_position')->nullable();
            $table->bigInteger('city_corporation_councilor_candidate_man_second_position')->nullable();
            $table->bigInteger('city_corporation_councilor_candidate_woman_second_position')->nullable();
            $table->bigInteger('city_corporation_member_candidate_man_second_position')->nullable();
            $table->bigInteger('city_corporation_member_candidate_woman_second_position')->nullable();

            $table->bigInteger('pouroshova_total')->nullable();
            $table->bigInteger('pouroshova_total_candidate')->nullable();
            $table->bigInteger('pouroshova_total_candidate_participated')->nullable();
            $table->bigInteger('pouroshova_Mayor_candidate_elected')->nullable();
            $table->bigInteger('pouroshova_chairman_candidate_elected')->nullable();
            $table->bigInteger('pouroshova_vice_chairman_candidate_man_elected')->nullable();
            $table->bigInteger('pouroshova_vice_chairman_candidate_woman_elected')->nullable();
            $table->bigInteger('pouroshova_councilor_candidate_man_elected')->nullable();
            $table->bigInteger('pouroshova_councilor_candidate_woman_elected')->nullable();
            $table->bigInteger('pouroshova_member_candidate_man_elected')->nullable();
            $table->bigInteger('pouroshova_member_candidate_woman_elected')->nullable();
            $table->bigInteger('pouroshova_Mayor_candidate_second_position')->nullable();
            $table->bigInteger('pouroshova_chairman_candidate_second_position')->nullable();
            $table->bigInteger('pouroshova_vice_chairman_candidate_man_second_position')->nullable();
            $table->bigInteger('pouroshova_vice_chairman_candidate_woman_second_position')->nullable();
            $table->bigInteger('pouroshova_councilor_candidate_man_second_position')->nullable();
            $table->bigInteger('pouroshova_councilor_candidate_woman_second_position')->nullable();
            $table->bigInteger('pouroshova_member_candidate_man_second_position')->nullable();
            $table->bigInteger('pouroshova_member_candidate_woman_second_position')->nullable();

            $table->bigInteger('upojela_porishod_total')->nullable();
            $table->bigInteger('upojela_porishod_total_candidate')->nullable();
            $table->bigInteger('upojela_porishod_total_candidate_participated')->nullable();
            $table->bigInteger('upojela_porishod_Mayor_candidate_elected')->nullable();
            $table->bigInteger('upojela_porishod_chairman_candidate_elected')->nullable();
            $table->bigInteger('upojela_porishod_vice_chairman_candidate_man_elected')->nullable();
            $table->bigInteger('upojela_porishod_vice_chairman_candidate_woman_elected')->nullable();
            $table->bigInteger('upojela_porishod_councilor_candidate_man_elected')->nullable();
            $table->bigInteger('upojela_porishod_councilor_candidate_woman_elected')->nullable();
            $table->bigInteger('upojela_porishod_member_candidate_man_elected')->nullable();
            $table->bigInteger('upojela_porishod_member_candidate_woman_elected')->nullable();
            $table->bigInteger('upojela_porishod_Mayor_candidate_second_position')->nullable();
            $table->bigInteger('upojela_porishod_chairman_candidate_second_position')->nullable();
            $table->bigInteger('upojela_porishod_vice_chairman_candidate_man_second_position')->nullable();
            $table->bigInteger('upojela_porishod_vice_chairman_candidate_woman_second_position')->nullable();
            $table->bigInteger('upojela_porishod_councilor_candidate_man_second_position')->nullable();
            $table->bigInteger('upojela_porishod_councilor_candidate_woman_second_position')->nullable();
            $table->bigInteger('upojela_porishod_member_candidate_man_second_position')->nullable();
            $table->bigInteger('upojela_porishod_member_candidate_woman_second_position')->nullable();

            $table->bigInteger('union_porishod_total')->nullable();
            $table->bigInteger('union_porishod_total_candidate')->nullable();
            $table->bigInteger('union_porishod_total_candidate_participated')->nullable();
            $table->bigInteger('union_porishod_Mayor_candidate_elected')->nullable();
            $table->bigInteger('union_porishod_chairman_candidate_elected')->nullable();
            $table->bigInteger('union_porishod_vice_chairman_candidate_man_elected')->nullable();
            $table->bigInteger('union_porishod_vice_chairman_candidate_woman_elected')->nullable();
            $table->bigInteger('union_porishod_councilor_candidate_man_elected')->nullable();
            $table->bigInteger('union_porishod_councilor_candidate_woman_elected')->nullable();
            $table->bigInteger('union_porishod_member_candidate_man_elected')->nullable();
            $table->bigInteger('union_porishod_member_candidate_woman_elected')->nullable();
            $table->bigInteger('union_porishod_Mayor_candidate_second_position')->nullable();
            $table->bigInteger('union_porishod_chairman_candidate_second_position')->nullable();
            $table->bigInteger('union_porishod_vice_chairman_candidate_man_second_position')->nullable();
            $table->bigInteger('union_porishod_vice_chairman_candidate_woman_second_position')->nullable();
            $table->bigInteger('union_porishod_councilor_candidate_man_second_position')->nullable();
            $table->bigInteger('union_porishod_councilor_candidate_woman_second_position')->nullable();
            $table->bigInteger('union_porishod_member_candidate_man_second_position')->nullable();
            $table->bigInteger('union_porishod_member_candidate_woman_second_position')->nullable();

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

            $table->bigInteger('booth_vittik_unit')->nullable();
            $table->bigInteger('booth_vittik_unit_increase')->nullable();
            $table->bigInteger('booth_vittik_unit_target')->nullable();

            $table->bigInteger('upojela_vittik_election_management_committee_meeting')->nullable();
            $table->bigInteger('thana_vittik_election_management_committee_meeting')->nullable();
            $table->bigInteger('pouroshova_vittik_election_management_committee_meeting')->nullable();
            $table->bigInteger('union_vittik_election_management_committee_meeting')->nullable();
            $table->bigInteger('ward_vittik_election_management_committee_meeting')->nullable();

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
        Schema::dropIfExists('thana_rastrio4_election_activities');
    }
};
