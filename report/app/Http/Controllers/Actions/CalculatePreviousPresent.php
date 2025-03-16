<?php

namespace App\Http\Controllers\Actions;

use App\Http\Controllers\Controller;
use App\Models\Report\ReportInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalculatePreviousPresent
{
    public function execute($start_month, $end_month, $org_type, $org_type_id)
    {
        $s_month = Carbon::parse($start_month);
        $e_month = Carbon::parse($end_month);

        $previous_month = $s_month->clone()->subMonth()->endOfMonth();
        $total_approved_report_info_ids_previous = $this->get_approved_report_ids($previous_month, $org_type, $org_type_id);
        $total_approved_report_info_ids_present = $this->get_approved_report_ids($e_month->clone()->endOfMonth(), $org_type, $org_type_id);
        // dd($total_approved_report_info_ids_previous,$total_approved_report_info_ids_present);
        $results = [];
        $parameter_function_name ="get_" . $org_type . "_calculations";
        $calculation_parameters = $this->$parameter_function_name();
        foreach ($calculation_parameters as $key => $config) {
            $table = $config['table'];
            $columns = $config['columns'];

            if ($config['type'] === 'previous_present') {
                $results["{$key}_previous"] = $this->calculate_previous_present(
                    $table,
                    $total_approved_report_info_ids_previous,
                    $columns['increase'],
                    $columns['decrease']
                );

                $results["{$key}_present"] = $this->calculate_previous_present(
                    $table,
                    $total_approved_report_info_ids_present,
                    $columns['increase'],
                    $columns['decrease']
                );
            } elseif ($config['type'] === 'increase') {
                $results["{$key}_previous"] = $this->calculate_increase(
                    $table,
                    $total_approved_report_info_ids_previous,
                    $columns['increase']
                );

                $results["{$key}_present"] = $this->calculate_increase(
                    $table,
                    $total_approved_report_info_ids_present,
                    $columns['increase']
                );
            }
        }

        // dd($results);
        return (object) $results;
    }

    private function get_approved_report_ids($month, $org_type, $org_type_id)
    {
        return ReportInfo::where('org_type_id', $org_type_id)
            ->where('org_type', $org_type)
            ->where('report_approved_status', 'approved')
            ->whereDate('month_year', '<=', $month)
            ->pluck('id');
    }

    private function calculate_previous_present($table, $report_info_ids, $increase_column, $decrease_column)
    {
        return DB::table($table)
            ->whereIn('report_info_id', $report_info_ids)
            ->sum($increase_column) -
            DB::table($table)
            ->whereIn('report_info_id', $report_info_ids)
            ->sum($decrease_column);
    }

    private function calculate_increase($table, $report_info_ids, $increase_column)
    {
        return DB::table($table)
            ->whereIn('report_info_id', $report_info_ids)
            ->sum($increase_column);
    }

    private function get_unit_calculations()
    {
        return [
            'unit_book_distribution_center' => [
                'table' => 'dawah_and_prokashonas',
                'columns' => ['increase' => 'unit_book_distribution_center_increase'],
                'type' => 'increase',
            ],
            'books_in_pathagar' => [
                'table' => 'dawah_and_prokashonas',
                'columns' => ['increase' => 'books_in_pathagar_increase'],
                'type' => 'increase',
            ],
            'sonar_bangla' => [
                'table' => 'dawah_and_prokashonas',
                'columns' => ['increase' => 'sonar_bangla_increase'],
                'type' => 'increase',
            ],
            'songram' => [
                'table' => 'dawah_and_prokashonas',
                'columns' => ['increase' => 'songram_increase'],
                'type' => 'increase',
            ],
            'prithibi' => [
                'table' => 'dawah_and_prokashonas',
                'columns' => ['increase' => 'prithibi_increase'],
                'type' => 'increase',
            ],


            'paribarik_unit_total' => [
                'table' => 'songothon5_dawat_and_paribarik_units',
                'columns' => ['increase' => 'paribarik_unit_increase'],
                'type' => 'increase',
            ],


            'rokon' => [
                'table' => 'songothon1_jonosoktis',
                'columns' => ['increase' => 'rokon_briddhi', 'decrease' => 'rokon_gatti'],
                'type' => 'previous_present',
            ],
            'worker' => [
                'table' => 'songothon1_jonosoktis',
                'columns' => ['increase' => 'worker_briddhi', 'decrease' => 'worker_gatti'],
                'type' => 'previous_present',
            ],
            'associate_member' => [
                'table' => 'songothon2_associate_members',
                'columns' => ['increase' => 'associate_member_briddhi'],
                'type' => 'increase',
            ],
            'vinno_dormalombi_worker' => [
                'table' => 'songothon2_associate_members',
                'columns' => ['increase' => 'vinno_dormalombi_worker_briddhi'],
                'type' => 'increase',
            ],
            'vinno_dormalombi_associate_member' => [
                'table' => 'songothon2_associate_members',
                'columns' => ['increase' => 'vinno_dormalombi_associate_member_briddhi'],
                'type' => 'increase',
            ],
        ];
    }
    private function get_ward_calculations()
    {
        return [
            'total_village_committee' => [
                'table' => 'ward_department2_moholla_vittik_dawats',
                'columns' => ['increase' => 'total_village_committee_increased'],
                'type' => 'increase',
            ],
            'total_moholla_committee' => [
                'table' => 'ward_department2_moholla_vittik_dawats',
                'columns' => ['increase' => 'total_moholla_committee_increased'],
                'type' => 'increase',
            ],
            'special_dawat_included_village' => [
                'table' => 'ward_department2_moholla_vittik_dawats',
                'columns' => ['increase' => 'special_dawat_included_village_increased'],
                'type' => 'increase',
            ],
            'special_dawat_included_moholla' => [
                'table' => 'ward_department2_moholla_vittik_dawats',
                'columns' => ['increase' => 'special_dawat_included_moholla_increased'],
                'type' => 'increase',
            ],


            'total_young_committee' => [
                'table' => 'ward_department3_jubo_somaj_dawats',
                'columns' => ['increase' => 'total_young_committee_increased'],
                'type' => 'increase',
            ],
            'total_new_club' => [
                'table' => 'ward_department3_jubo_somaj_dawats',
                'columns' => ['increase' => 'total_new_club_increased'],
                'type' => 'increase',
            ],
            'stablished_club_total_invited' => [
                'table' => 'ward_department3_jubo_somaj_dawats',
                'columns' => ['increase' => 'stablished_club_total_increased'],
                'type' => 'increase',
            ],


            'total_mosjid' => [
                'table' => 'ward_department6_mosjid_dawah_infomation_centers',
                'columns' => ['increase' => 'total_mosjid_increase'],
                'type' => 'increase',
            ],
            'dawat_included_mosjid' => [
                'table' => 'ward_department6_mosjid_dawah_infomation_centers',
                'columns' => ['increase' => 'dawat_included_mosjid_increase'],
                'type' => 'increase',
            ],
            'mosjid_wise_dawah_center' => [
                'table' => 'ward_department6_mosjid_dawah_infomation_centers',
                'columns' => ['increase' => 'mosjid_wise_dawah_center_increase'],
                'type' => 'increase',
            ],


            'general_dawah_center' => [
                'table' => 'ward_department6_mosjid_dawah_infomation_centers',
                'columns' => ['increase' => 'general_dawah_center_increase'],
                'type' => 'increase',
            ],
            'mosjid_wise_information_center' => [
                'table' => 'ward_department6_mosjid_dawah_infomation_centers',
                'columns' => ['increase' => 'mosjid_wise_information_center_increase'],
                'type' => 'increase',
            ],
            'general_information_center' => [
                'table' => 'ward_department6_mosjid_dawah_infomation_centers',
                'columns' => ['increase' => 'general_information_center_increase'],
                'type' => 'increase',
            ],



            'total_pathagar' => [
                'table' => 'ward_dawah_and_prokashonas',
                'columns' => ['increase' => 'total_pathagar_increase'],
                'type' => 'increase',
            ],
            'books_in_pathagar' => [
                'table' => 'ward_dawah_and_prokashonas',
                'columns' => ['increase' => 'books_in_pathagar_increase'],
                'type' => 'increase',
            ],
            'unit_book_distribution_center' => [
                'table' => 'ward_dawah_and_prokashonas',
                'columns' => ['increase' => 'unit_book_distribution_center_increase'],
                'type' => 'increase',
            ],
            'ward_book_sales_center' => [
                'table' => 'ward_dawah_and_prokashonas',
                'columns' => ['increase' => 'ward_book_sales_center_increase'],
                'type' => 'increase',
            ],
            'ward_book_sales' => [
                'table' => 'ward_dawah_and_prokashonas',
                'columns' => ['increase' => 'ward_book_sales_increase'],
                'type' => 'increase',
            ],
            'sonar_bangla' => [
                'table' => 'ward_dawah_and_prokashonas',
                'columns' => ['increase' => 'sonar_bangla_increase'],
                'type' => 'increase',
            ],
            'songram' => [
                'table' => 'ward_dawah_and_prokashonas',
                'columns' => ['increase' => 'songram_increase'],
                'type' => 'increase',
            ],
            'prithibi' => [
                'table' => 'ward_dawah_and_prokashonas',
                'columns' => ['increase' => 'prithibi_increase'],
                'type' => 'increase',
            ],



            'rokon' => [
                'table' => 'ward_songothon1_jonosoktis',
                'columns' => ['increase' => 'rokon_briddhi', 'decrease' => 'rokon_gatti'],
                'type' => 'previous_present',
            ],
            'worker' => [
                'table' => 'ward_songothon1_jonosoktis',
                'columns' => ['increase' => 'worker_briddhi', 'decrease' => 'worker_gatti'],
                'type' => 'previous_present',
            ],

            'associate_member_man' => [
                'table' => 'ward_songothon2_associate_members',
                'columns' => ['increase' => 'associate_member_man_briddhi'],
                'type' => 'increase',
            ],
            'associate_member_woman' => [
                'table' => 'ward_songothon2_associate_members',
                'columns' => ['increase' => 'associate_member_woman_briddhi'],
                'type' => 'increase',
            ],


            'women_rokon' => [
                'table' => 'ward_songothon3_departmental_information',
                'columns' => ['increase' => 'women_rokon_increase', 'decrease' => 'women_rokon_gatti'],
                'type' => 'previous_present',
            ],
            'women_kormi' => [
                'table' => 'ward_songothon3_departmental_information',
                'columns' => ['increase' => 'women_kormi_increase', 'decrease' => 'women_kormi_gatti'],
                'type' => 'previous_present',
            ],
            'women_associate_member' => [
                'table' => 'ward_songothon3_departmental_information',
                'columns' => ['increase' => 'women_associate_member_increase', 'decrease' => 'women_associate_member_gatti'],
                'type' => 'previous_present',
            ],



            'sromojibi_rokon' => [
                'table' => 'ward_songothon3_departmental_information',
                'columns' => ['increase' => 'sromojibi_rokon_increase', 'decrease' => 'sromojibi_rokon_gatti'],
                'type' => 'previous_present',
            ],
            'sromojibi_kormi' => [
                'table' => 'ward_songothon3_departmental_information',
                'columns' => ['increase' => 'sromojibi_kormi_increase', 'decrease' => 'sromojibi_kormi_gatti'],
                'type' => 'previous_present',
            ],
            'sromojibi_associate_member' => [
                'table' => 'ward_songothon3_departmental_information',
                'columns' => ['increase' => 'sromojibi_associate_member_increase', 'decrease' => 'sromojibi_associate_member_gatti'],
                'type' => 'previous_present',
            ],



            'ulama_rokon' => [
                'table' => 'ward_songothon3_departmental_information',
                'columns' => ['increase' => 'ulama_rokon_increase', 'decrease' => 'ulama_rokon_gatti'],
                'type' => 'previous_present',
            ],
            'ulama_kormi' => [
                'table' => 'ward_songothon3_departmental_information',
                'columns' => ['increase' => 'ulama_kormi_increase', 'decrease' => 'ulama_kormi_gatti'],
                'type' => 'previous_present',
            ],
            'ulama_associate_member' => [
                'table' => 'ward_songothon3_departmental_information',
                'columns' => ['increase' => 'ulama_associate_member_increase', 'decrease' => 'ulama_associate_member_gatti'],
                'type' => 'previous_present',
            ],


            'pesha_jibi_rokon' => [
                'table' => 'ward_songothon3_departmental_information',
                'columns' => ['increase' => 'pesha_jibi_rokon_increase', 'decrease' => 'pesha_jibi_rokon_gatti'],
                'type' => 'previous_present',
            ],
            'pesha_jibi_kormi' => [
                'table' => 'ward_songothon3_departmental_information',
                'columns' => ['increase' => 'pesha_jibi_kormi_increase', 'decrease' => 'pesha_jibi_kormi_gatti'],
                'type' => 'previous_present',
            ],
            'pesha_jibi_associate_member' => [
                'table' => 'ward_songothon3_departmental_information',
                'columns' => ['increase' => 'pesha_jibi_associate_member_increase', 'decrease' => 'pesha_jibi_associate_member_gatti'],
                'type' => 'previous_present',
            ],


            'jubo_rokon' => [
                'table' => 'ward_songothon3_departmental_information',
                'columns' => ['increase' => 'jubo_rokon_increase', 'decrease' => 'jubo_rokon_gatti'],
                'type' => 'previous_present',
            ],
            'jubo_kormi' => [
                'table' => 'ward_songothon3_departmental_information',
                'columns' => ['increase' => 'jubo_kormi_increase', 'decrease' => 'jubo_kormi_gatti'],
                'type' => 'previous_present',
            ],
            'jubo_associate_member' => [
                'table' => 'ward_songothon3_departmental_information',
                'columns' => ['increase' => 'jubo_associate_member_increase', 'decrease' => 'jubo_associate_member_gatti'],
                'type' => 'previous_present',
            ],


            'vinno_dormalombi_kormi' => [
                'table' => 'ward_songothon3_departmental_information',
                'columns' => ['increase' => 'vinno_dormalombi_kormi_increase', 'decrease' => 'vinno_dormalombi_kormi_gatti'],
                'type' => 'previous_present',
            ],
            'vinno_dormalombi_associate_member' => [
                'table' => 'ward_songothon3_departmental_information',
                'columns' => ['increase' => 'vinno_dormalombi_associate_member_increase', 'decrease' => 'vinno_dormalombi_associate_member_gatti'],
                'type' => 'previous_present',
            ],



            'general_unit_men' => [
                'table' => 'ward_songothon4_unit_songothons',
                'columns' => ['increase' => 'general_unit_men_increase', 'decrease' => 'general_unit_men_gatti'],
                'type' => 'previous_present',
            ],
            'general_unit_women' => [
                'table' => 'ward_songothon4_unit_songothons',
                'columns' => ['increase' => 'general_unit_women_increase', 'decrease' => 'general_unit_women_gatti'],
                'type' => 'previous_present',
            ],
            'ulama_unit' => [
                'table' => 'ward_songothon4_unit_songothons',
                'columns' => ['increase' => 'ulama_unit_increase', 'decrease' => 'ulama_unit_gatti'],
                'type' => 'previous_present',
            ],
            'peshajibi_unit' => [
                'table' => 'ward_songothon4_unit_songothons',
                'columns' => ['increase' => 'peshajibi_unit_increase', 'decrease' => 'peshajibi_unit_gatti'],
                'type' => 'previous_present',
            ],
            'sromik_kollyan_unit' => [
                'table' => 'ward_songothon4_unit_songothons',
                'columns' => ['increase' => 'sromik_kollyan_unit_increase', 'decrease' => 'sromik_kollyan_unit_gatti'],
                'type' => 'previous_present',
            ],
            'jubo_unit' => [
                'table' => 'ward_songothon4_unit_songothons',
                'columns' => ['increase' => 'jubo_unit_increase', 'decrease' => 'jubo_unit_gatti'],
                'type' => 'previous_present',
            ],
            'media_unit' => [
                'table' => 'ward_songothon4_unit_songothons',
                'columns' => ['increase' => 'media_unit_increase', 'decrease' => 'media_unit_gatti'],
                'type' => 'previous_present',
            ],


            'dawati_unit' => [
                'table' => 'ward_songothon5_dawat_and_paribarik_units',
                'columns' => ['increase' => 'dawati_unit_increase', 'decrease' => 'dawati_unit_gatti'],
                'type' => 'previous_present',
            ],
            'paribarik_unit' => [
                'table' => 'ward_songothon5_dawat_and_paribarik_units',
                'columns' => ['increase' => 'paribarik_unit_increase', 'decrease' => 'paribarik_unit_gatti'],
                'type' => 'previous_present',
            ],


            'national_vote_kendro' => [
                'table' => 'ward_rastrio4_election_activities',
                'columns' => ['increase' => 'national_vote_kendro_increase'],
                'type' => 'increase',
            ],
            'local_vote_kendro' => [
                'table' => 'ward_rastrio4_election_activities',
                'columns' => ['increase' => 'local_vote_kendro_increase'],
                'type' => 'increase',
            ],
            'vote_kendro_committee' => [
                'table' => 'ward_rastrio4_election_activities',
                'columns' => ['increase' => 'vote_kendro_committee_increase'],
                'type' => 'increase',
            ],
            'vote_kendro_vittik_unit' => [
                'table' => 'ward_rastrio4_election_activities',
                'columns' => ['increase' => 'vote_kendro_vittik_unit_increase'],
                'type' => 'increase',
            ],


        ];
    }
    private function get_thana_calculations()
    {
        return [

            'total_young_committee' => [
                'table' => 'thana_department3_jubo_somaj_dawats',
                'columns' => ['increase' => 'total_young_committee_increased'],
                'type' => 'increase',
            ],
            'number_of_participants' => [
                'table' => 'thana_department3_jubo_somaj_dawats',
                'columns' => ['increase' => 'total_young_committee_increased'],
                'type' => 'increase',
            ],


        ];
    }
}
