<?php

namespace App\Http\Controllers\Actions;

use App\Models\Report\Dawat\Dawat1RegularGroupWise;
use App\Models\Report\ReportInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResetAllData
{
    public function execute(
        $month,
        $org_type,
        $org_type_id,
        $report_info_id = null // Allow passing report_info_ids directly
    ) {
        if (is_null($report_info_id)) {
            $s_month = Carbon::parse($month);
            $report_info = ReportInfo::whereYear('month_year', $s_month->clone()->year)
                ->whereMonth('month_year', $s_month->clone()->month)
                ->where('org_type', $org_type)
                ->where('org_type_id', $org_type_id)
                ->first();
            // dd($report_info);
            $report_info_id = $report_info?->id;
        }

        // dd( $report_info_id);

        $table_function_name = "get_" . $org_type . "_table";
        $table_names = $this->$table_function_name();

        foreach ($table_names as $table_name) {
            $all_columns = DB::getSchemaBuilder()->getColumnListing($table_name);
            $selected_columns = array_slice($all_columns, 2, -4);
            
            if (empty($selected_columns)) {
                continue;
            }
            
            $update_to_null_data = [];
            foreach ($selected_columns as $selected_column) {
                $update_to_null_data[$selected_column] = null;
            }

            DB::table($table_name)
            ->where('report_info_id', $report_info_id)
            ->update($update_to_null_data);
        }

        return ;
    }

    private function array_to_object($array)
    {
        if (is_array($array)) {
            return (object) array_map([$this, 'array_to_object'], $array);
        }
        return $array;
    }

    public function get_unit_table()
    {
        $table_names = [
            "dawah_and_prokashonas",
            "dawat1_regular_group_wises",
            "dawat2_personal_and_targets",
            "dawat3_general_program_and_others",
            "dawat4_gono_songjog_and_dawat_ovijans",
            "dawat5_jonoshadharons",
            "department1_talimul_qurans",
            "department4_different_job_holders_dawats",
            "department5_paribarik_dawats",
            "department7_dawat_in_technologies",
            "kormosuci_bastobayons",
            "proshikkhon1_tarbiats",
            "rastrio1_bishishto_bektis",

            "shomajsheba1_personal_social_works",
            "shomajsheba2_unit_social_works",

            "songothon1_jonosoktis",
            "songothon2_associate_members",
            "songothon5_dawat_and_paribarik_units",
            "songothon7_sofors",
            "songothon8_iyanot_data",
            "songothon9_sangothonik_boithoks",
            "montobbos",
        ];

        return $table_names;
    }
    public function get_ward_table()
    {
        $table_names = [
            "ward_dawah_and_prokashonas",
            "ward_dawat1_regular_group_wises",
            "ward_dawat2_personal_and_targets",
            "ward_dawat3_general_program_and_others",
            "ward_dawat4_gono_songjog_and_dawat_ovijans",
            "ward_dawat5_jonoshadharons",
            "ward_department1_talimul_qurans",
            "ward_department2_moholla_vittik_dawats",
            "ward_department3_jubo_somaj_dawats",
            "ward_department4_different_job_holders_dawats",
            "ward_department5_paribarik_dawats",
            "ward_department6_mosjid_dawah_infomation_centers",
            "ward_department7_dawat_in_technologies",
            "ward_kormosuci_bastobayons",
            "ward_montobbos",
            "ward_proshikkhon1_tarbiats",
            "ward_proshikkhon2_manob_shompod_unnoyons",
            "ward_rastrio1_political_communications",
            "ward_rastrio2_kormoshuchi_bastobayons",
            "ward_rastrio3_dibosh_palons",
            "ward_rastrio4_election_activities",
            "ward_shomajsheba1_personal_social_works",
            "ward_shomajsheba2_group_social_works",
            "ward_shomajsheba3_health_and_family_kollans",
            "ward_shomajsheba4_institutional_social_works",
            "ward_songothon1_jonosoktis",
            "ward_songothon2_associate_members",
            "ward_songothon3_departmental_information",
            "ward_songothon4_unit_songothons",
            "ward_songothon5_dawat_and_paribarik_units",
            "ward_songothon6_bidayi_students_connects",
            "ward_songothon7_sofors",
            "ward_songothon8_iyanot_data",
            "ward_songothon9_sangothonik_boithoks"
        ];

        return $table_names;
    }
    public function get_thana_table()
    {
        $table_names = [
            "thana_dawat1_regular_group_wises",
            "thana_dawat2_personal_and_targets",
            "thana_dawat3_general_program_and_others",
            "thana_dawat4_gono_songjog_and_dawat_ovijans",
            "thana_dawat5_jonoshadharons",
            "thana_department1_talimul_qurans",
            "thana_department2_moholla_vittik_dawats",
            "thana_department3_jubo_somaj_dawats",
            "thana_department4_different_job_holders_dawats",
            "thana_department5_paribarik_dawats",
            "thana_department6_mosjid_dawah_infomation_centers",
            "thana_department7_dawat_in_technologies",
            "thana_department8_dawat_in_cultural_activities",
            "thana_dawah_and_prokashonas",
            "thana_kormosuci_bastobayons",
            "thana_montobbos",
            "thana_proshikkhon1_tarbiats",
            "thana_proshikkhon2_manob_shompod_organizational_activities",
            "thana_proshikkhon3_manob_shompod_training_courses",
            "thana_rastrio1_political_communications",
            "thana_rastrio2_kormoshuchi_bastobayons",
            "thana_rastrio3_dibosh_palons",
            "thana_rastrio4_election_activities",
            "thana_rastrio5_broadcast_and_media",
            "thana_rastrio6_human_rights",
            "thana_rastrio7_industry_and_trades",
            "thana_rastrio8_entrepreneurial_developments",
            "thana_shomajsheba1_preparing_trained_social_workers",
            "thana_shomajsheba2_personal_social_works",
            "thana_shomajsheba3_group_social_works",
            "thana_shomajsheba4_institutional_social_works",
            "thana_shomajsheba5_health_and_family_kollans",
            "thana_shomajsheba6_education_and_research_activities",
            "thana_shomajsheba7_expenses",
            "thana_songothon10_iyanot_data",
            "thana_songothon1_jonosoktis",
            "thana_songothon2_associate_members",
            "thana_songothon3_departmental_information",
            "thana_songothon4_organizational_structures",
            "thana_songothon5_dawat_and_paribarik_units",
            "thana_songothon6_emarot_kayems",
            "thana_songothon7_bidayi_students_connects",
            "thana_songothon8_associate_and_side_organizations",
            "thana_songothon9_sofors",
            "thana_songothon10_iyanot_data",
            "thana_songothon11_sangothonik_boithoks"
        ];

        return $table_names;
    }
}
