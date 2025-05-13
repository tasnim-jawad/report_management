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
        Schema::create('thana_songothon11_sangothonik_boithoks', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('report_info_id')->nullable();

            $table->bigInteger('upojela_mozlishe_sura_boithok_man_total')->nullable();
            $table->bigInteger('upojela_mozlishe_sura_boithok_man_target')->nullable();
            $table->bigInteger('upojela_mozlishe_sura_boithok_man_uposthiti')->nullable();
            $table->bigInteger('upojela_mozlishe_sura_boithok_women_total')->nullable();
            $table->bigInteger('upojela_mozlishe_sura_boithok_women_target')->nullable();
            $table->bigInteger('upojela_mozlishe_sura_boithok_women_uposthiti')->nullable();

            $table->bigInteger('thana_mozlishe_sura_boithok_man_total')->nullable();
            $table->bigInteger('thana_mozlishe_sura_boithok_man_target')->nullable();
            $table->bigInteger('thana_mozlishe_sura_boithok_man_uposthiti')->nullable();
            $table->bigInteger('thana_mozlishe_sura_boithok_women_total')->nullable();
            $table->bigInteger('thana_mozlishe_sura_boithok_women_target')->nullable();
            $table->bigInteger('thana_mozlishe_sura_boithok_women_uposthiti')->nullable();

            $table->bigInteger('pourosova_mozlishe_sura_boithok_man_total')->nullable();
            $table->bigInteger('pourosova_mozlishe_sura_boithok_man_target')->nullable();
            $table->bigInteger('pourosova_mozlishe_sura_boithok_man_uposthiti')->nullable();
            $table->bigInteger('pourosova_mozlishe_sura_boithok_women_total')->nullable();
            $table->bigInteger('pourosova_mozlishe_sura_boithok_women_target')->nullable();
            $table->bigInteger('pourosova_mozlishe_sura_boithok_women_uposthiti')->nullable();

            $table->bigInteger('union_mozlishe_sura_boithok_man_total')->nullable();
            $table->bigInteger('union_mozlishe_sura_boithok_man_target')->nullable();
            $table->bigInteger('union_mozlishe_sura_boithok_man_uposthiti')->nullable();
            $table->bigInteger('union_mozlishe_sura_boithok_women_total')->nullable();
            $table->bigInteger('union_mozlishe_sura_boithok_women_target')->nullable();
            $table->bigInteger('union_mozlishe_sura_boithok_women_uposthiti')->nullable();


            $table->bigInteger('upojela_kormoporishod_boithok_man_total')->nullable();
            $table->bigInteger('upojela_kormoporishod_boithok_man_target')->nullable();
            $table->bigInteger('upojela_kormoporishod_boithok_man_uposthiti')->nullable();
            $table->bigInteger('upojela_kormoporishod_boithok_women_total')->nullable();
            $table->bigInteger('upojela_kormoporishod_boithok_women_target')->nullable();
            $table->bigInteger('upojela_kormoporishod_boithok_women_uposthiti')->nullable();

            $table->bigInteger('thana_kormoporishod_boithok_man_total')->nullable();
            $table->bigInteger('thana_kormoporishod_boithok_man_target')->nullable();
            $table->bigInteger('thana_kormoporishod_boithok_man_uposthiti')->nullable();
            $table->bigInteger('thana_kormoporishod_boithok_women_total')->nullable();
            $table->bigInteger('thana_kormoporishod_boithok_women_target')->nullable();
            $table->bigInteger('thana_kormoporishod_boithok_women_uposthiti')->nullable();

            $table->bigInteger('pourosova_kormoporishod_boithok_man_total')->nullable();
            $table->bigInteger('pourosova_kormoporishod_boithok_man_target')->nullable();
            $table->bigInteger('pourosova_kormoporishod_boithok_man_uposthiti')->nullable();
            $table->bigInteger('pourosova_kormoporishod_boithok_women_total')->nullable();
            $table->bigInteger('pourosova_kormoporishod_boithok_women_target')->nullable();
            $table->bigInteger('pourosova_kormoporishod_boithok_women_uposthiti')->nullable();

            $table->bigInteger('union_kormoporishod_boithok_man_total')->nullable();
            $table->bigInteger('union_kormoporishod_boithok_man_target')->nullable();
            $table->bigInteger('union_kormoporishod_boithok_man_uposthiti')->nullable();
            $table->bigInteger('union_kormoporishod_boithok_women_total')->nullable();
            $table->bigInteger('union_kormoporishod_boithok_women_target')->nullable();
            $table->bigInteger('union_kormoporishod_boithok_women_uposthiti')->nullable();
            
            
            
            $table->bigInteger('upojela_team_boithok_man_total')->nullable();
            $table->bigInteger('upojela_team_boithok_man_target')->nullable();
            $table->bigInteger('upojela_team_boithok_man_uposthiti')->nullable();
            $table->bigInteger('upojela_team_boithok_women_total')->nullable();
            $table->bigInteger('upojela_team_boithok_women_target')->nullable();
            $table->bigInteger('upojela_team_boithok_women_uposthiti')->nullable();

            $table->bigInteger('thana_team_boithok_man_total')->nullable();
            $table->bigInteger('thana_team_boithok_man_target')->nullable();
            $table->bigInteger('thana_team_boithok_man_uposthiti')->nullable();
            $table->bigInteger('thana_team_boithok_women_total')->nullable();
            $table->bigInteger('thana_team_boithok_women_target')->nullable();
            $table->bigInteger('thana_team_boithok_women_uposthiti')->nullable();

            $table->bigInteger('pourosova_team_boithok_man_total')->nullable();
            $table->bigInteger('pourosova_team_boithok_man_target')->nullable();
            $table->bigInteger('pourosova_team_boithok_man_uposthiti')->nullable();
            $table->bigInteger('pourosova_team_boithok_women_total')->nullable();
            $table->bigInteger('pourosova_team_boithok_women_target')->nullable();
            $table->bigInteger('pourosova_team_boithok_women_uposthiti')->nullable();

            $table->bigInteger('union_team_boithok_man_total')->nullable();
            $table->bigInteger('union_team_boithok_man_target')->nullable();
            $table->bigInteger('union_team_boithok_man_uposthiti')->nullable();
            $table->bigInteger('union_team_boithok_women_total')->nullable();
            $table->bigInteger('union_team_boithok_women_target')->nullable();
            $table->bigInteger('union_team_boithok_women_uposthiti')->nullable();


            $table->bigInteger('upojela_mashik_rokon_boithok_man_total')->nullable();
            $table->bigInteger('upojela_mashik_rokon_boithok_man_target')->nullable();
            $table->bigInteger('upojela_mashik_rokon_boithok_man_uposthiti')->nullable();
            $table->bigInteger('upojela_mashik_rokon_boithok_women_total')->nullable();
            $table->bigInteger('upojela_mashik_rokon_boithok_women_target')->nullable();
            $table->bigInteger('upojela_mashik_rokon_boithok_women_uposthiti')->nullable();

            $table->bigInteger('thana_mashik_rokon_boithok_man_total')->nullable();
            $table->bigInteger('thana_mashik_rokon_boithok_man_target')->nullable();
            $table->bigInteger('thana_mashik_rokon_boithok_man_uposthiti')->nullable();
            $table->bigInteger('thana_mashik_rokon_boithok_women_total')->nullable();
            $table->bigInteger('thana_mashik_rokon_boithok_women_target')->nullable();
            $table->bigInteger('thana_mashik_rokon_boithok_women_uposthiti')->nullable();


            $table->bigInteger('upojela_boithok_man_total')->nullable();
            $table->bigInteger('upojela_boithok_man_target')->nullable();
            $table->bigInteger('upojela_boithok_man_uposthiti')->nullable();
            $table->bigInteger('upojela_boithok_women_total')->nullable();
            $table->bigInteger('upojela_boithok_women_target')->nullable();
            $table->bigInteger('upojela_boithok_women_uposthiti')->nullable();

            $table->bigInteger('thana_boithok_man_total')->nullable();
            $table->bigInteger('thana_boithok_man_target')->nullable();
            $table->bigInteger('thana_boithok_man_uposthiti')->nullable();
            $table->bigInteger('thana_boithok_women_total')->nullable();
            $table->bigInteger('thana_boithok_women_target')->nullable();
            $table->bigInteger('thana_boithok_women_uposthiti')->nullable();


            $table->bigInteger('bivagio_committee_boithok_man_total')->nullable();
            $table->bigInteger('bivagio_committee_boithok_man_target')->nullable();
            $table->bigInteger('bivagio_committee_boithok_man_uposthiti')->nullable();
            $table->bigInteger('bivagio_committee_boithok_women_total')->nullable();
            $table->bigInteger('bivagio_committee_boithok_women_target')->nullable();
            $table->bigInteger('bivagio_committee_boithok_women_uposthiti')->nullable();


            $table->bigInteger('pouroshova_boithok_man_total')->nullable();
            $table->bigInteger('pouroshova_boithok_man_target')->nullable();
            $table->bigInteger('pouroshova_boithok_man_uposthiti')->nullable();
            $table->bigInteger('pouroshova_boithok_women_total')->nullable();
            $table->bigInteger('pouroshova_boithok_women_target')->nullable();
            $table->bigInteger('pouroshova_boithok_women_uposthiti')->nullable();

            $table->bigInteger('union_boithok_man_total')->nullable();
            $table->bigInteger('union_boithok_man_target')->nullable();
            $table->bigInteger('union_boithok_man_uposthiti')->nullable();
            $table->bigInteger('union_boithok_women_total')->nullable();
            $table->bigInteger('union_boithok_women_target')->nullable();
            $table->bigInteger('union_boithok_women_uposthiti')->nullable();

            $table->bigInteger('ward_boithok_man_total')->nullable();
            $table->bigInteger('ward_boithok_man_target')->nullable();
            $table->bigInteger('ward_boithok_man_uposthiti')->nullable();
            $table->bigInteger('ward_boithok_women_total')->nullable();
            $table->bigInteger('ward_boithok_women_target')->nullable();
            $table->bigInteger('ward_boithok_women_uposthiti')->nullable();


            $table->bigInteger('pouroshova_mashik_rokon_boithok_man_total')->nullable();
            $table->bigInteger('pouroshova_mashik_rokon_boithok_man_target')->nullable();
            $table->bigInteger('pouroshova_mashik_rokon_boithok_man_uposthiti')->nullable();
            $table->bigInteger('pouroshova_mashik_rokon_boithok_women_total')->nullable();
            $table->bigInteger('pouroshova_mashik_rokon_boithok_women_target')->nullable();
            $table->bigInteger('pouroshova_mashik_rokon_boithok_women_uposthiti')->nullable();

            $table->bigInteger('union_mashik_rokon_boithok_man_total')->nullable();
            $table->bigInteger('union_mashik_rokon_boithok_man_target')->nullable();
            $table->bigInteger('union_mashik_rokon_boithok_man_uposthiti')->nullable();
            $table->bigInteger('union_mashik_rokon_boithok_women_total')->nullable();
            $table->bigInteger('union_mashik_rokon_boithok_women_target')->nullable();
            $table->bigInteger('union_mashik_rokon_boithok_women_uposthiti')->nullable();


            $table->bigInteger('unit_kormi_boithok_man_total')->nullable();
            $table->bigInteger('unit_kormi_boithok_man_target')->nullable();
            $table->bigInteger('unit_kormi_boithok_man_uposthiti')->nullable();
            $table->bigInteger('unit_kormi_boithok_women_total')->nullable();
            $table->bigInteger('unit_kormi_boithok_women_target')->nullable();
            $table->bigInteger('unit_kormi_boithok_women_uposthiti')->nullable();


            $table->bigInteger('troimasik_rokon_sommelon_man_total')->nullable();
            $table->bigInteger('troimasik_rokon_sommelon_man_target')->nullable();
            $table->bigInteger('troimasik_rokon_sommelon_man_uposthiti')->nullable();

            $table->bigInteger('troimasik_rokon_sommelon_women_total')->nullable();
            $table->bigInteger('troimasik_rokon_sommelon_women_target')->nullable();
            $table->bigInteger('troimasik_rokon_sommelon_women_uposthiti')->nullable();

            $table->bigInteger('shanmasik_rokon_sommelon_man_total')->nullable();
            $table->bigInteger('shanmasik_rokon_sommelon_man_target')->nullable();
            $table->bigInteger('shanmasik_rokon_sommelon_man_uposthiti')->nullable();
            $table->bigInteger('shanmasik_rokon_sommelon_women_total')->nullable();
            $table->bigInteger('shanmasik_rokon_sommelon_women_target')->nullable();
            $table->bigInteger('shanmasik_rokon_sommelon_women_uposthiti')->nullable();

            $table->bigInteger('barshik_rokon_sommelon_man_total')->nullable();
            $table->bigInteger('barshik_rokon_sommelon_man_target')->nullable();
            $table->bigInteger('barshik_rokon_sommelon_man_uposthiti')->nullable();
            $table->bigInteger('barshik_rokon_sommelon_women_total')->nullable();
            $table->bigInteger('barshik_rokon_sommelon_women_target')->nullable();
            $table->bigInteger('barshik_rokon_sommelon_women_uposthiti')->nullable();

            // Upojila ward Sovapoti Sommelon
            $table->bigInteger('upozila_ward_sovapoti_sommelon_man_total')->nullable();
            $table->bigInteger('upozila_ward_sovapoti_sommelon_man_target')->nullable();
            $table->bigInteger('upozila_ward_sovapoti_sommelon_man_uposthiti')->nullable();
            $table->bigInteger('upozila_ward_sovapoti_sommelon_women_total')->nullable();
            $table->bigInteger('upozila_ward_sovapoti_sommelon_women_target')->nullable();
            $table->bigInteger('upozila_ward_sovapoti_sommelon_women_uposthiti')->nullable();

            // Thana ward Sovapoti Sommelon
            $table->bigInteger('thana_ward_sovapoti_sommelon_man_total')->nullable();
            $table->bigInteger('thana_ward_sovapoti_sommelon_man_target')->nullable();
            $table->bigInteger('thana_ward_sovapoti_sommelon_man_uposthiti')->nullable();
            $table->bigInteger('thana_ward_sovapoti_sommelon_women_total')->nullable();
            $table->bigInteger('thana_ward_sovapoti_sommelon_women_target')->nullable();
            $table->bigInteger('thana_ward_sovapoti_sommelon_women_uposthiti')->nullable();

            // Upojila Kormi Sommelon
            $table->bigInteger('upozila_kormi_sommelon_man_total')->nullable();
            $table->bigInteger('upozila_kormi_sommelon_man_target')->nullable();
            $table->bigInteger('upozila_kormi_sommelon_man_uposthiti')->nullable();
            $table->bigInteger('upozila_kormi_sommelon_women_total')->nullable();
            $table->bigInteger('upozila_kormi_sommelon_women_target')->nullable();
            $table->bigInteger('upozila_kormi_sommelon_women_uposthiti')->nullable();

            // Thana Kormi Sommelon
            $table->bigInteger('thana_kormi_sommelon_man_total')->nullable();
            $table->bigInteger('thana_kormi_sommelon_man_target')->nullable();
            $table->bigInteger('thana_kormi_sommelon_man_uposthiti')->nullable();
            $table->bigInteger('thana_kormi_sommelon_women_total')->nullable();
            $table->bigInteger('thana_kormi_sommelon_women_target')->nullable();
            $table->bigInteger('thana_kormi_sommelon_women_uposthiti')->nullable();

            // Union Kormi Sommelon
            $table->bigInteger('union_kormi_sommelon_man_total')->nullable();
            $table->bigInteger('union_kormi_sommelon_man_target')->nullable();
            $table->bigInteger('union_kormi_sommelon_man_uposthiti')->nullable();
            $table->bigInteger('union_kormi_sommelon_women_total')->nullable();
            $table->bigInteger('union_kormi_sommelon_women_target')->nullable();
            $table->bigInteger('union_kormi_sommelon_women_uposthiti')->nullable();

            // Ward Kormi Sommelon
            $table->bigInteger('ward_kormi_sommelon_man_total')->nullable();
            $table->bigInteger('ward_kormi_sommelon_man_target')->nullable();
            $table->bigInteger('ward_kormi_sommelon_man_uposthiti')->nullable();
            $table->bigInteger('ward_kormi_sommelon_women_total')->nullable();
            $table->bigInteger('ward_kormi_sommelon_women_target')->nullable();
            $table->bigInteger('ward_kormi_sommelon_women_uposthiti')->nullable();

            // Upojila Vittik Unit Sovapoti o Secretary Sommelon
            $table->bigInteger('upozila_unit_sovapoti_sommelon_man_total')->nullable();
            $table->bigInteger('upozila_unit_sovapoti_sommelon_man_target')->nullable();
            $table->bigInteger('upozila_unit_sovapoti_sommelon_man_uposthiti')->nullable();
            $table->bigInteger('upozila_unit_sovapoti_sommelon_women_total')->nullable();
            $table->bigInteger('upozila_unit_sovapoti_sommelon_women_target')->nullable();
            $table->bigInteger('upozila_unit_sovapoti_sommelon_women_uposthiti')->nullable();

            // Thana Vittik Unit Sovapoti o Secretary Sommelon
            $table->bigInteger('thana_unit_sovapoti_sommelon_man_total')->nullable();
            $table->bigInteger('thana_unit_sovapoti_sommelon_man_target')->nullable();
            $table->bigInteger('thana_unit_sovapoti_sommelon_man_uposthiti')->nullable();
            $table->bigInteger('thana_unit_sovapoti_sommelon_women_total')->nullable();
            $table->bigInteger('thana_unit_sovapoti_sommelon_women_target')->nullable();
            $table->bigInteger('thana_unit_sovapoti_sommelon_women_uposthiti')->nullable();

            // Ulama Boithok
            $table->bigInteger('ulama_boithok_man_total')->nullable();
            $table->bigInteger('ulama_boithok_man_target')->nullable();
            $table->bigInteger('ulama_boithok_man_uposthiti')->nullable();
            $table->bigInteger('ulama_boithok_women_total')->nullable();
            $table->bigInteger('ulama_boithok_women_target')->nullable();
            $table->bigInteger('ulama_boithok_women_uposthiti')->nullable();

            // Ulama Somabesh
            $table->bigInteger('ulama_somabesh_man_total')->nullable();
            $table->bigInteger('ulama_somabesh_man_target')->nullable();
            $table->bigInteger('ulama_somabesh_man_uposthiti')->nullable();
            $table->bigInteger('ulama_somabesh_women_total')->nullable();
            $table->bigInteger('ulama_somabesh_women_target')->nullable();
            $table->bigInteger('ulama_somabesh_women_uposthiti')->nullable();

            // Pesha Jibi Boithok
            $table->bigInteger('pesha_jibi_boithok_man_total')->nullable();
            $table->bigInteger('pesha_jibi_boithok_man_target')->nullable();
            $table->bigInteger('pesha_jibi_boithok_man_uposthiti')->nullable();
            $table->bigInteger('pesha_jibi_boithok_women_total')->nullable();
            $table->bigInteger('pesha_jibi_boithok_women_target')->nullable();
            $table->bigInteger('pesha_jibi_boithok_women_uposthiti')->nullable();

            // Sromik Boithok
            $table->bigInteger('sromik_boithok_man_total')->nullable();
            $table->bigInteger('sromik_boithok_man_target')->nullable();
            $table->bigInteger('sromik_boithok_man_uposthiti')->nullable();
            $table->bigInteger('sromik_boithok_women_total')->nullable();
            $table->bigInteger('sromik_boithok_women_target')->nullable();
            $table->bigInteger('sromik_boithok_women_uposthiti')->nullable();

            // Sromik Somabesh
            $table->bigInteger('sromik_somabesh_man_total')->nullable();
            $table->bigInteger('sromik_somabesh_man_target')->nullable();
            $table->bigInteger('sromik_somabesh_man_uposthiti')->nullable();
            $table->bigInteger('sromik_somabesh_women_total')->nullable();
            $table->bigInteger('sromik_somabesh_women_target')->nullable();
            $table->bigInteger('sromik_somabesh_women_uposthiti')->nullable();

            // Jubok Boithok
            $table->bigInteger('jubok_boithok_man_total')->nullable();
            $table->bigInteger('jubok_boithok_man_target')->nullable();
            $table->bigInteger('jubok_boithok_man_uposthiti')->nullable();
            $table->bigInteger('jubok_boithok_women_total')->nullable();
            $table->bigInteger('jubok_boithok_women_target')->nullable();
            $table->bigInteger('jubok_boithok_women_uposthiti')->nullable();

            // male_Student Daittoshil Boithok
            $table->bigInteger('male_student_daittoshil_boithok_man_total')->nullable();
            $table->bigInteger('male_student_daittoshil_boithok_man_target')->nullable();
            $table->bigInteger('male_student_daittoshil_boithok_man_uposthiti')->nullable();
            $table->bigInteger('male_student_daittoshil_boithok_women_total')->nullable();
            $table->bigInteger('male_student_daittoshil_boithok_women_target')->nullable();
            $table->bigInteger('male_student_daittoshil_boithok_women_uposthiti')->nullable();
            // female_Student Daittoshil Boithok
            $table->bigInteger('female_student_daittoshil_boithok_man_total')->nullable();
            $table->bigInteger('female_student_daittoshil_boithok_man_target')->nullable();
            $table->bigInteger('female_student_daittoshil_boithok_man_uposthiti')->nullable();
            $table->bigInteger('female_student_daittoshil_boithok_women_total')->nullable();
            $table->bigInteger('female_student_daittoshil_boithok_women_target')->nullable();
            $table->bigInteger('female_student_daittoshil_boithok_women_uposthiti')->nullable();

            // Associate Member Somabesh
            $table->bigInteger('associate_member_somabesh_man_total')->nullable();
            $table->bigInteger('associate_member_somabesh_man_target')->nullable();
            $table->bigInteger('associate_member_somabesh_man_uposthiti')->nullable();
            $table->bigInteger('associate_member_somabesh_women_total')->nullable();
            $table->bigInteger('associate_member_somabesh_women_target')->nullable();
            $table->bigInteger('associate_member_somabesh_women_uposthiti')->nullable();

            // Associate Member Sommelon
            $table->bigInteger('associate_member_sommelon_man_total')->nullable();
            $table->bigInteger('associate_member_sommelon_man_target')->nullable();
            $table->bigInteger('associate_member_sommelon_man_uposthiti')->nullable();
            $table->bigInteger('associate_member_sommelon_women_total')->nullable();
            $table->bigInteger('associate_member_sommelon_women_target')->nullable();
            $table->bigInteger('associate_member_sommelon_women_uposthiti')->nullable();
            
            // other
            // $table->bigInteger('other_man_total')->nullable();
            // $table->bigInteger('other_man_target')->nullable();
            // $table->bigInteger('other_man_uposthiti')->nullable();
            // $table->bigInteger('other_women_total')->nullable();
            // $table->bigInteger('other_women_target')->nullable();
            // $table->bigInteger('other_women_uposthiti')->nullable();


            // $table->bigInteger('creator')->nullable();
            // $table->bigInteger('status')->nullable();

            // Others
            $table->bigInteger('others_man_total')->nullable();
            $table->bigInteger('others_man_target')->nullable();
            $table->bigInteger('others_man_uposthiti')->nullable();
            $table->bigInteger('others_women_total')->nullable();
            $table->bigInteger('others_women_target')->nullable();
            $table->bigInteger('others_women_uposthiti')->nullable();

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
        Schema::dropIfExists('thana_songothon11_sangothonik_boithoks');
    }
};
