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
        Schema::create('thana_songothon4_organizational_structures', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('report_info_id')->nullable();

            $table->bigInteger('pouroshov_previous')->nullable();
            $table->bigInteger('pouroshova_present')->nullable();
            $table->bigInteger('pouroshova_increase')->nullable();
            $table->bigInteger('pouroshova_gatti')->nullable();
            $table->bigInteger('pouroshova_target')->nullable();

            $table->bigInteger('songothito_pouroshova_previous')->nullable();
            $table->bigInteger('songothito_pouroshova_present')->nullable();
            $table->bigInteger('songothito_pouroshova_increase')->nullable();
            $table->bigInteger('songothito_pouroshova_gatti')->nullable();
            $table->bigInteger('songothito_pouroshova_target')->nullable();

            $table->bigInteger('union_previous')->nullable();
            $table->bigInteger('union_present')->nullable();
            $table->bigInteger('union_increase')->nullable();
            $table->bigInteger('union_gatti')->nullable();
            $table->bigInteger('union_target')->nullable();

            $table->bigInteger('songothito_union_previous')->nullable();
            $table->bigInteger('songothito_union_present')->nullable();
            $table->bigInteger('songothito_union_increase')->nullable();
            $table->bigInteger('songothito_union_gatti')->nullable();
            $table->bigInteger('songothito_union_target')->nullable();

            $table->bigInteger('songothito_union_man_previous')->nullable();
            $table->bigInteger('songothito_union_man_present')->nullable();
            $table->bigInteger('songothito_union_man_increase')->nullable();
            $table->bigInteger('songothito_union_man_gatti')->nullable();
            $table->bigInteger('songothito_union_man_target')->nullable();

            $table->bigInteger('sangothonik_union_man_previous')->nullable();
            $table->bigInteger('sangothonik_union_man_present')->nullable();
            $table->bigInteger('sangothonik_union_man_increase')->nullable();
            $table->bigInteger('sangothonik_union_man_gatti')->nullable();
            $table->bigInteger('sangothonik_union_man_target')->nullable();

            $table->bigInteger('sangothonik_union_woman_previous')->nullable();
            $table->bigInteger('sangothonik_union_woman_present')->nullable();
            $table->bigInteger('sangothonik_union_woman_increase')->nullable();
            $table->bigInteger('sangothonik_union_woman_gatti')->nullable();
            $table->bigInteger('sangothonik_union_woman_target')->nullable();

            $table->bigInteger('union_without_member_woman_previous')->nullable();
            $table->bigInteger('union_without_member_woman_present')->nullable();
            $table->bigInteger('union_without_member_woman_increase')->nullable();
            $table->bigInteger('union_without_member_woman_gatti')->nullable();
            $table->bigInteger('union_without_member_woman_target')->nullable();

            $table->bigInteger('total_proshashonik_ward_of_city_corporation_previous')->nullable();
            $table->bigInteger('total_proshashonik_ward_of_city_corporation_present')->nullable();
            $table->bigInteger('total_proshashonik_ward_of_city_corporation_increase')->nullable();
            $table->bigInteger('total_proshashonik_ward_of_city_corporation_gatti')->nullable();
            $table->bigInteger('total_proshashonik_ward_of_city_corporation_target')->nullable();

            $table->bigInteger('total_songothito_ward_of_city_corporation_previous')->nullable();
            $table->bigInteger('total_songothito_ward_of_city_corporation_present')->nullable();
            $table->bigInteger('total_songothito_ward_of_city_corporation_increase')->nullable();
            $table->bigInteger('total_songothito_ward_of_city_corporation_gatti')->nullable();
            $table->bigInteger('total_songothito_ward_of_city_corporation_target')->nullable();

            $table->bigInteger('total_songothonik_ward_man_previous')->nullable();
            $table->bigInteger('total_songothonik_ward_man_present')->nullable();
            $table->bigInteger('total_songothonik_ward_man_increase')->nullable();
            $table->bigInteger('total_songothonik_ward_man_gatti')->nullable();
            $table->bigInteger('total_songothonik_ward_man_target')->nullable();

            $table->bigInteger('total_songothonik_ward_woman_previous')->nullable();
            $table->bigInteger('total_songothonik_ward_woman_present')->nullable();
            $table->bigInteger('total_songothonik_ward_woman_increase')->nullable();
            $table->bigInteger('total_songothonik_ward_woman_gatti')->nullable();
            $table->bigInteger('total_songothonik_ward_woman_target')->nullable();

            $table->bigInteger('total_proshashonik_ward_of_pouroshova_previous')->nullable();
            $table->bigInteger('total_proshashonik_ward_of_pouroshova_present')->nullable();
            $table->bigInteger('total_proshashonik_ward_of_pouroshova_increase')->nullable();
            $table->bigInteger('total_proshashonik_ward_of_pouroshova_gatti')->nullable();
            $table->bigInteger('total_proshashonik_ward_of_pouroshova_target')->nullable();

            $table->bigInteger('total_proshashonik_ward_of_union_previous')->nullable();
            $table->bigInteger('total_proshashonik_ward_of_union_present')->nullable();
            $table->bigInteger('total_proshashonik_ward_of_union_increase')->nullable();
            $table->bigInteger('total_proshashonik_ward_of_union_gatti')->nullable();
            $table->bigInteger('total_proshashonik_ward_of_union_target')->nullable();

            $table->bigInteger('total_songothito_ward_of_pouroshova_previous')->nullable();
            $table->bigInteger('total_songothito_ward_of_pouroshova_present')->nullable();
            $table->bigInteger('total_songothito_ward_of_pouroshova_increase')->nullable();
            $table->bigInteger('total_songothito_ward_of_pouroshova_gatti')->nullable();
            $table->bigInteger('total_songothito_ward_of_pouroshova_target')->nullable();

            $table->bigInteger('total_songothito_ward_of_union_previous')->nullable();
            $table->bigInteger('total_songothito_ward_of_union_present')->nullable();
            $table->bigInteger('total_songothito_ward_of_union_increase')->nullable();
            $table->bigInteger('total_songothito_ward_of_union_gatti')->nullable();
            $table->bigInteger('total_songothito_ward_of_union_target')->nullable();

            $table->bigInteger('total_songothonik_ward_of_pouroshova_man_previous')->nullable();
            $table->bigInteger('total_songothonik_ward_of_pouroshova_man_present')->nullable();
            $table->bigInteger('total_songothonik_ward_of_pouroshova_man_increase')->nullable();
            $table->bigInteger('total_songothonik_ward_of_pouroshova_man_gatti')->nullable();
            $table->bigInteger('total_songothonik_ward_of_pouroshova_man_target')->nullable();

            $table->bigInteger('total_songothonik_ward_of_union_man_previous')->nullable();
            $table->bigInteger('total_songothonik_ward_of_union_man_present')->nullable();
            $table->bigInteger('total_songothonik_ward_of_union_man_increase')->nullable();
            $table->bigInteger('total_songothonik_ward_of_union_man_gatti')->nullable();
            $table->bigInteger('total_songothonik_ward_of_union_man_target')->nullable();

            $table->bigInteger('total_songothonik_ward_of_pouroshova_woman_previous')->nullable();
            $table->bigInteger('total_songothonik_ward_of_pouroshova_woman_present')->nullable();
            $table->bigInteger('total_songothonik_ward_of_pouroshova_woman_increase')->nullable();
            $table->bigInteger('total_songothonik_ward_of_pouroshova_woman_gatti')->nullable();
            $table->bigInteger('total_songothonik_ward_of_pouroshova_woman_target')->nullable();

            $table->bigInteger('total_songothonik_ward_of_union_woman_previous')->nullable();
            $table->bigInteger('total_songothonik_ward_of_union_woman_present')->nullable();
            $table->bigInteger('total_songothonik_ward_of_union_woman_increase')->nullable();
            $table->bigInteger('total_songothonik_ward_of_union_woman_gatti')->nullable();
            $table->bigInteger('total_songothonik_ward_of_union_woman_target')->nullable();

            $table->bigInteger('songothonik_ward_ulama_previous')->nullable();
            $table->bigInteger('songothonik_ward_ulama_present')->nullable();
            $table->bigInteger('songothonik_ward_ulama_increase')->nullable();
            $table->bigInteger('songothonik_ward_ulama_gatti')->nullable();
            $table->bigInteger('songothonik_ward_ulama_target')->nullable();

            $table->bigInteger('songothonik_ward_peshajibi_previous')->nullable();
            $table->bigInteger('songothonik_ward_peshajibi_present')->nullable();
            $table->bigInteger('songothonik_ward_peshajibi_increase')->nullable();
            $table->bigInteger('songothonik_ward_peshajibi_gatti')->nullable();
            $table->bigInteger('songothonik_ward_peshajibi_target')->nullable();

            $table->bigInteger('songothonik_ward_jubo_previous')->nullable();
            $table->bigInteger('songothonik_ward_jubo_present')->nullable();
            $table->bigInteger('songothonik_ward_jubo_increase')->nullable();
            $table->bigInteger('songothonik_ward_jubo_gatti')->nullable();
            $table->bigInteger('songothonik_ward_jubo_target')->nullable();

            $table->bigInteger('songothonik_ward_sromo_previous')->nullable();
            $table->bigInteger('songothonik_ward_sromo_present')->nullable();
            $table->bigInteger('songothonik_ward_sromo_increase')->nullable();
            $table->bigInteger('songothonik_ward_sromo_gatti')->nullable();
            $table->bigInteger('songothonik_ward_sromo_target')->nullable();

            $table->bigInteger('songothonik_ward_media_previous')->nullable();
            $table->bigInteger('songothonik_ward_media_present')->nullable();
            $table->bigInteger('songothonik_ward_media_increase')->nullable();
            $table->bigInteger('songothonik_ward_media_gatti')->nullable();
            $table->bigInteger('songothonik_ward_media_target')->nullable();

            $table->bigInteger('songothonik_ward_cultural_previous')->nullable();
            $table->bigInteger('songothonik_ward_cultural_present')->nullable();
            $table->bigInteger('songothonik_ward_cultural_increase')->nullable();
            $table->bigInteger('songothonik_ward_cultural_gatti')->nullable();
            $table->bigInteger('songothonik_ward_cultural_target')->nullable();

            $table->bigInteger('general_unit_men_previous')->nullable();
            $table->bigInteger('general_unit_men_present')->nullable();
            $table->bigInteger('general_unit_men_increase')->nullable();
            $table->bigInteger('general_unit_men_gatti')->nullable();
            $table->bigInteger('general_unit_men_target')->nullable();

            $table->bigInteger('general_unit_women_previous')->nullable();
            $table->bigInteger('general_unit_women_present')->nullable();
            $table->bigInteger('general_unit_women_increase')->nullable();
            $table->bigInteger('general_unit_women_gatti')->nullable();
            $table->bigInteger('general_unit_women_target')->nullable();

            $table->bigInteger('ulama_unit_previous')->nullable();
            $table->bigInteger('ulama_unit_present')->nullable();
            $table->bigInteger('ulama_unit_increase')->nullable();
            $table->bigInteger('ulama_unit_gatti')->nullable();
            $table->bigInteger('ulama_unit_target')->nullable();

            $table->bigInteger('peshajibi_unit_men_previous')->nullable();
            $table->bigInteger('peshajibi_unit_men_present')->nullable();
            $table->bigInteger('peshajibi_unit_men_increase')->nullable();
            $table->bigInteger('peshajibi_unit_men_gatti')->nullable();
            $table->bigInteger('peshajibi_unit_men_target')->nullable();

            $table->bigInteger('peshajibi_unit_women_previous')->nullable();
            $table->bigInteger('peshajibi_unit_women_present')->nullable();
            $table->bigInteger('peshajibi_unit_women_increase')->nullable();
            $table->bigInteger('peshajibi_unit_women_gatti')->nullable();
            $table->bigInteger('peshajibi_unit_women_target')->nullable();

            $table->bigInteger('kormojibi_unit_women_previous')->nullable();
            $table->bigInteger('kormojibi_unit_women_present')->nullable();
            $table->bigInteger('kormojibi_unit_women_increase')->nullable();
            $table->bigInteger('kormojibi_unit_women_gatti')->nullable();
            $table->bigInteger('kormojibi_unit_women_target')->nullable();

            $table->bigInteger('jubo_unit_previous')->nullable();
            $table->bigInteger('jubo_unit_present')->nullable();
            $table->bigInteger('jubo_unit_increase')->nullable();
            $table->bigInteger('jubo_unit_gatti')->nullable();
            $table->bigInteger('jubo_unit_target')->nullable();

            $table->bigInteger('sromo_unit_man_previous')->nullable();
            $table->bigInteger('sromo_unit_man_present')->nullable();
            $table->bigInteger('sromo_unit_man_increase')->nullable();
            $table->bigInteger('sromo_unit_man_gatti')->nullable();
            $table->bigInteger('sromo_unit_man_target')->nullable();

            $table->bigInteger('sromo_unit_woman_previous')->nullable();
            $table->bigInteger('sromo_unit_woman_present')->nullable();
            $table->bigInteger('sromo_unit_woman_increase')->nullable();
            $table->bigInteger('sromo_unit_woman_gatti')->nullable();
            $table->bigInteger('sromo_unit_woman_target')->nullable();

            $table->bigInteger('media_unit_previous')->nullable();
            $table->bigInteger('media_unit_present')->nullable();
            $table->bigInteger('media_unit_increase')->nullable();
            $table->bigInteger('media_unit_gatti')->nullable();
            $table->bigInteger('media_unit_target')->nullable();

            $table->bigInteger('cultural_unit_previous')->nullable();
            $table->bigInteger('cultural_unit_present')->nullable();
            $table->bigInteger('cultural_unit_increase')->nullable();
            $table->bigInteger('cultural_unit_gatti')->nullable();
            $table->bigInteger('cultural_unit_target')->nullable();

            $table->bigInteger('creator')->nullable();
            $table->bigInteger('status')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thana_songothon4_organizational_structures');
    }
};
