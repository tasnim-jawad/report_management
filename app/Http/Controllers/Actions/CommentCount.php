<?php

namespace App\Http\Controllers\Actions;

use App\Models\Comment\Comment;
use App\Models\Report\ReportInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CommentCount
{
    public function execute(
        $month,
        $org_type,
        $org_type_id
    ) {
        $carbon_month = Carbon::parse($month);
        // dd($carbon_month->clone()->year, $carbon_month->clone()->month);
        $report_info = ReportInfo::where('org_type_id', $org_type_id)
            ->where('org_type', $org_type)
            ->whereYear('month_year', $carbon_month->clone()->year)
            ->whereMonth('month_year', $carbon_month->clone()->month)
            ->first();

        $table_function_name = "get_" . $org_type . "_table";
        $table_names = $this->$table_function_name();
        dd($table_names);
        $result = [];
        foreach ($table_names as $table_name) {
            if ($table_name != 'income_table' && $table_name != 'expense_table') {
                $all_columns = DB::getSchemaBuilder()->getColumnListing($table_name);
                $selected_columns = array_slice($all_columns, 2, -4);
                try {
                    $table_row_id = DB::table($table_name)
                        ->where('report_info_id', $report_info->id)
                        ->pluck('id');
                } catch (\Throwable $error) {
                    dd("Throwable table_row_id", $error);
                }

                foreach ($selected_columns as $selected_column) {
                    if ($table_row_id->isNotEmpty()) {
                        $status = 1;
                        $report_info_id = $report_info->id;

                        $query = Comment::where('status', $status)
                            ->where('report_info_id', $report_info_id)
                            ->where('table_name', $table_name)
                            ->where('table_row_id', $table_row_id)
                            ->where('column_name', $selected_column)
                            ->where('org_type', $org_type)
                            ->where('org_type_id', $org_type_id)
                            ->whereYear('month_year', $carbon_month->clone()->year)
                            ->whereMonth('month_year', $carbon_month->clone()->month);
                        $data_count = $query->count();

                        $result[] = [
                            'table_name' => $table_name,
                            'column_name' => $selected_column,
                            'number_of_comment' => $data_count
                        ];
                    } else {
                        $result[] = [
                            'table_name' => $table_name,
                            'column_name' => $selected_column,
                            'number_of_comment' => 0
                        ];
                    }
                }
            } else {
                $table_row_id = null;
                if ($table_name == 'income_table') {
                    $selected_column = 'income';
                } else if ($table_name == 'expense_table') {
                    $selected_column = 'expense';
                }

                $query = Comment::where('status', 1)
                    ->where('report_info_id', $report_info->id)
                    ->where('table_name', $table_name)
                    ->where('table_row_id', $table_row_id)
                    ->where('column_name', $selected_column)
                    ->where('org_type', $org_type)
                    ->where('org_type_id', $org_type_id)
                    ->whereYear('month_year', $carbon_month->clone()->year)
                    ->whereMonth('month_year', $carbon_month->clone()->month);
                $data_count = $query->count();

                $result[] = [
                    'table_name' => $table_name,
                    'column_name' => $selected_column,
                    'number_of_comment' => $data_count
                ];
            }
        }
        // return $this->array_to_object($result);
        return $result;
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
        // $tables = DB::select('SHOW TABLES');
        // // Format the result into an array of table names
        // $table_names = array_map(function($table) {
        //     return current((array) $table);
        // }, $tables);
        $table_names = [
            "dawah_and_prokashonas",
            "dawat1_regular_group_wises",
            "dawat2_personal_and_targets",
            "dawat3_general_program_and_others",
            "dawat4_gono_songjog_and_dawat_ovijans",
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
            "income_table",
            "expense_table",
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
}
