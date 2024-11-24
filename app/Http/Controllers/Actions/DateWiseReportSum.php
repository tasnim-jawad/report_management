<?php

namespace App\Http\Controllers\Actions;

use App\Models\Report\Dawat\Dawat1RegularGroupWise;
use App\Models\Report\ReportInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DateWiseReportSum
{
    public function execute($start_month , $end_month ,$org_type , $org_type_id){
        $s_month = Carbon::parse($start_month);
        $e_month = Carbon::parse($end_month);
        $report_info_ids = ReportInfo::whereBetween('month_year', [$s_month->startOfMonth(), $e_month->endOfMonth()])
                                        ->where('org_type',$org_type)
                                        ->where('org_type_id',$org_type_id)
                                        ->where('report_approved_status','approved')
                                        ->pluck('id');


        $table_function_name = "get_" . $org_type . "_table";
        $table_names = $this->$table_function_name();

        $result = [];
        foreach ($table_names as $table_name){
            $all_columns = DB::getSchemaBuilder()->getColumnListing($table_name);
            $selected_columns = array_slice($all_columns, 2, -4);

            foreach ($selected_columns as $selected_column){
                $sum = DB::table($table_name)->whereIn('report_info_id', $report_info_ids)->sum($selected_column);
                $result[$table_name][$selected_column] = $sum ;
            }
        }

        return $result;
    }

    public function get_unit_table(){
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
            "department2_moholla_vittik_dawats",
            "department3_jubo_somaj_dawats",
            "department4_different_job_holders_dawats",
            "department5_paribarik_dawats",
            "department6_mosjid_dawah_infomation_centers",
            "department7_dawat_in_technologies",
            "department8_dawat_in_cultural_programs",
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
        ];

        return $table_names;
    }
}
