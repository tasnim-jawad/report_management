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
            } elseif ($config['type'] === 'pp_increase_both_gatti_both') {
                $results["{$key}_previous"] = $this->calculate_pp_increase_both_gatti_both(
                    $table,
                    $total_approved_report_info_ids_previous,
                    $columns['increase_manonnoyon'],
                    $columns['increase_agoto'],
                    $columns['decrease_manonnoyon'],
                    $columns['decrease_sthanantor'],
                );

                $results["{$key}_present"] = $this->calculate_pp_increase_both_gatti_both(
                    $table,
                    $total_approved_report_info_ids_present,
                    $columns['increase_manonnoyon'],
                    $columns['increase_agoto'],
                    $columns['decrease_manonnoyon'],
                    $columns['decrease_sthanantor'],
                );
            } elseif ($config['type'] === 'pp_increase_both_gatti_one') {
                $results["{$key}_previous"] = $this->calculate_pp_increase_both_gatti_one(
                    $table,
                    $total_approved_report_info_ids_previous,
                    $columns['increase_manonnoyon'],
                    $columns['increase_agoto'],
                    $columns['decrease']
                );

                $results["{$key}_present"] = $this->calculate_pp_increase_both_gatti_one(
                    $table,
                    $total_approved_report_info_ids_present,
                    $columns['increase_manonnoyon'],
                    $columns['increase_agoto'],
                    $columns['decrease']
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
    
    private function calculate_pp_increase_both_gatti_both($table, $report_info_ids, $increase_manonnoyon, $increase_agoto ,$decrease_manonnoyon ,$decrease_sthanantor)
    {
        return 
            (
                DB::table($table)->whereIn('report_info_id', $report_info_ids)->sum($increase_manonnoyon) +
                DB::table($table)->whereIn('report_info_id', $report_info_ids)->sum($increase_agoto) 
            )
                -
            (
                DB::table($table)->whereIn('report_info_id', $report_info_ids)->sum($decrease_manonnoyon) +
                DB::table($table)->whereIn('report_info_id', $report_info_ids)->sum($decrease_sthanantor) 
            );
    }

    private function calculate_pp_increase_both_gatti_one($table, $report_info_ids, $increase_manonnoyon, $increase_agoto ,$decrease)
    {
        return 
            (
                DB::table($table)->whereIn('report_info_id', $report_info_ids)->sum($increase_manonnoyon) +
                DB::table($table)->whereIn('report_info_id', $report_info_ids)->sum($increase_agoto) 
            )
                -
            (
                DB::table($table)->whereIn('report_info_id', $report_info_ids)->sum($decrease) 
            );
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

            'total_muallim_man' => [
                'table' => 'thana_department1_talimul_qurans',
                'columns' => ['increase' => 'total_muallim_increased_man'],
                'type' => 'increase',
            ],
            'total_muallim_woman' => [
                'table' => 'thana_department1_talimul_qurans',
                'columns' => ['increase' => 'total_muallim_increased_woman'],
                'type' => 'increase',
            ],

            // ২. গ্রাম ও মহল্লাভিত্তিক দাওয়াত
            'total_village_committee' => [
                'table' => 'thana_department2_moholla_vittik_dawats',
                'columns' => ['increase' => 'total_village_committee_increased'],
                'type' => 'increase',
            ],
            'total_moholla_committee' => [
                'table' => 'thana_department2_moholla_vittik_dawats',
                'columns' => ['increase' => 'total_moholla_committee_increased'],
                'type' => 'increase',
            ],
            'special_dawat_included_village' => [
                'table' => 'thana_department2_moholla_vittik_dawats',
                'columns' => ['increase' => 'special_dawat_included_village_increased'],
                'type' => 'increase',
            ],
            'special_dawat_included_moholla' => [
                'table' => 'thana_department2_moholla_vittik_dawats',
                'columns' => ['increase' => 'special_dawat_included_moholla_increased'],
                'type' => 'increase',
            ],

            // ৩. যুব সমাজের মাঝে দাওয়াত*:
            'total_young_committee' => [
                'table' => 'thana_department3_jubo_somaj_dawats',
                'columns' => ['increase' => 'total_young_committee_increased'],
                'type' => 'increase',
            ],
            'total_new_somiti' => [
                'table' => 'thana_department3_jubo_somaj_dawats',
                'columns' => ['increase' => 'total_new_somiti_increased'],
                'type' => 'increase',
            ],
            'total_new_club' => [
                'table' => 'thana_department3_jubo_somaj_dawats',
                'columns' => ['increase' => 'total_new_club_increased'],
                'type' => 'increase',
            ],
            'stablished_somiti_total_invited' => [
                'table' => 'thana_department3_jubo_somaj_dawats',
                'columns' => ['increase' => 'stablished_somiti_total_increased'],
                'type' => 'increase',
            ],
            'stablished_club_total_invited' => [
                'table' => 'thana_department3_jubo_somaj_dawats',
                'columns' => ['increase' => 'stablished_club_total_increased'],
                'type' => 'increase',
            ],

            // ৬. মসজিদ/দাওয়াহ্ সেন্টার/তথ্যসেবা কেন্দ্রভিত্তিক দাওয়াত
            'total_mosjid' => [
                'table' => 'thana_department6_mosjid_dawah_infomation_centers',
                'columns' => ['increase' => 'total_mosjid_increase'],
                'type' => 'increase',
            ],
            'dawat_included_mosjid' => [
                'table' => 'thana_department6_mosjid_dawah_infomation_centers',
                'columns' => ['increase' => 'dawat_included_mosjid_increase'],
                'type' => 'increase',
            ],
            'mosjid_wise_dawah_center' => [
                'table' => 'thana_department6_mosjid_dawah_infomation_centers',
                'columns' => ['increase' => 'mosjid_wise_dawah_center_increase'],
                'type' => 'increase',
            ],
            'general_dawah_center' => [
                'table' => 'thana_department6_mosjid_dawah_infomation_centers',
                'columns' => ['increase' => 'general_dawah_center_increase'],
                'type' => 'increase',
            ],
            'mosjid_wise_information_center' => [
                'table' => 'thana_department6_mosjid_dawah_infomation_centers',
                'columns' => ['increase' => 'mosjid_wise_information_center_increase'],
                'type' => 'increase',
            ],
            'general_information_center' => [
                'table' => 'thana_department6_mosjid_dawah_infomation_centers',
                'columns' => ['increase' => 'general_information_center_increase'],
                'type' => 'increase',
            ],
            'trained_employed_dai' => [
                'table' => 'thana_department6_mosjid_dawah_infomation_centers',
                'columns' => ['increase' => 'trained_employed_dai_increase'],
                'type' => 'increase',
            ],



            // গ) দাওয়াহ্ ও প্রকাশনা:
            'total_pathagar' => [
                'table' => 'thana_dawah_and_prokashonas',
                'columns' => ['increase' => 'total_pathagar_increase'],
                'type' => 'increase',
            ],
            'total_online_library' => [
                'table' => 'thana_dawah_and_prokashonas',
                'columns' => ['increase' => 'total_online_library_increase'],
                'type' => 'increase',
            ],
            'books_in_pathagar' => [
                'table' => 'thana_dawah_and_prokashonas',
                'columns' => ['increase' => 'books_in_pathagar_increase'],
                'type' => 'increase',
            ],
            'books_in_online_library' => [
                'table' => 'thana_dawah_and_prokashonas',
                'columns' => ['increase' => 'books_in_online_library_increase'],
                'type' => 'increase',
            ],
            'unit_book_distribution_center' => [
                'table' => 'thana_dawah_and_prokashonas',
                'columns' => ['increase' => 'unit_book_distribution_center_increase'],
                'type' => 'increase',
            ],
            'ward_book_sales_center' => [
                'table' => 'thana_dawah_and_prokashonas',
                'columns' => ['increase' => 'ward_book_sales_center_increase'],
                'type' => 'increase',
            ],
            'sonar_bangla' => [
                'table' => 'thana_dawah_and_prokashonas',
                'columns' => ['increase' => 'sonar_bangla_increase'],
                'type' => 'increase',
            ],
            'songram' => [
                'table' => 'thana_dawah_and_prokashonas',
                'columns' => ['increase' => 'songram_increase'],
                'type' => 'increase',
            ],
            'prithibi' => [
                'table' => 'thana_dawah_and_prokashonas',
                'columns' => ['increase' => 'prithibi_increase'],
                'type' => 'increase',
            ],


            // ১. জনশক্তি
            'rokon' => [
                'table' => 'thana_songothon1_jonosoktis',
                'columns' => [
                    'increase_manonnoyon' => 'rokon_briddhi_manonnoyon', 
                    'increase_agoto' => 'rokon_briddhi_agoto',
                    'decrease' => 'rokon_gatti'
                ],
                'type' => 'pp_increase_both_gatti_one',
            ],
            'worker' => [
                'table' => 'thana_songothon1_jonosoktis',
                'columns' => ['increase' => 'worker_briddhi', 'decrease' => 'worker_gatti'],
                'type' => 'previous_present',
            ],



            // ২. সহযোগী সদস্য :
            'associate_member_man' => [
                'table' => 'thana_songothon2_associate_members',
                'columns' => ['increase' => 'associate_member_man_briddhi'],
                'type' => 'increase',
            ],
            'associate_member_woman' => [
                'table' => 'thana_songothon2_associate_members',
                'columns' => ['increase' => 'associate_member_woman_briddhi'],
                'type' => 'increase',
            ],


            // ৩. বিভাগভিত্তিক তথ্য:

            // মহিলা
            'women_rokon' => [
                'table' => 'thana_songothon3_departmental_information',
                'columns' => [
                    'increase_manonnoyon' => 'women_rokon_increase_manonnoyon', 
                    'increase_agoto' => 'women_rokon_increase_agoto',
                    'decrease_manonnoyon' => 'women_rokon_gatti_manonnoyon',
                    'decrease_sthanantor' => 'women_rokon_gatti_sthanantor'
                ],
                'type' => 'pp_increase_both_gatti_both',
            ],
            'women_kormi' => [
                'table' => 'thana_songothon3_departmental_information',
                'columns' => [
                    'increase_manonnoyon' => 'women_kormi_increase_manonnoyon', 
                    'increase_agoto' => 'women_kormi_increase_agoto',
                    'decrease_manonnoyon' => 'women_kormi_gatti_manonnoyon',
                    'decrease_sthanantor' => 'women_kormi_gatti_sthanantor'
                ],
                'type' => 'pp_increase_both_gatti_both',
            ],
            'women_associate_member' => [
                'table' => 'thana_songothon3_departmental_information',
                'columns' => ['increase' => 'women_associate_member_increase'],
                'type' => 'increase',
            ],


            // শ্রম*
            'sromojibi_rokon' => [
                'table' => 'thana_songothon3_departmental_information',
                'columns' => [
                    'increase_manonnoyon' => 'sromojibi_rokon_increase_manonnoyon', 
                    'increase_agoto' => 'sromojibi_rokon_increase_agoto',
                    'decrease_manonnoyon' => 'sromojibi_rokon_gatti_manonnoyon',
                    'decrease_sthanantor' => 'sromojibi_rokon_gatti_sthanantor'
                ],
                'type' => 'pp_increase_both_gatti_both',
            ],
            'sromojibi_kormi' => [
                'table' => 'thana_songothon3_departmental_information',
                'columns' => [
                    'increase_manonnoyon' => 'sromojibi_kormi_increase_manonnoyon', 
                    'increase_agoto' => 'sromojibi_kormi_increase_agoto',
                    'decrease_manonnoyon' => 'sromojibi_kormi_gatti_manonnoyon',
                    'decrease_sthanantor' => 'sromojibi_kormi_gatti_sthanantor'
                ],
                'type' => 'pp_increase_both_gatti_both',
            ],
            'sromojibi_associate_member' => [
                'table' => 'thana_songothon3_departmental_information',
                'columns' => ['increase' => 'sromojibi_associate_member_increase'],
                'type' => 'increase',
            ],


            // উলামা
            'ulama_rokon' => [
                'table' => 'thana_songothon3_departmental_information',
                'columns' => [
                    'increase_manonnoyon' => 'ulama_rokon_increase_manonnoyon', 
                    'increase_agoto' => 'ulama_rokon_increase_agoto',
                    'decrease_manonnoyon' => 'ulama_rokon_gatti_manonnoyon',
                    'decrease_sthanantor' => 'ulama_rokon_gatti_sthanantor'
                ],
                'type' => 'pp_increase_both_gatti_both',
            ],
            'ulama_kormi' => [
                'table' => 'thana_songothon3_departmental_information',
                'columns' => [
                    'increase_manonnoyon' => 'ulama_kormi_increase_manonnoyon', 
                    'increase_agoto' => 'ulama_kormi_increase_agoto',
                    'decrease_manonnoyon' => 'ulama_kormi_gatti_manonnoyon',
                    'decrease_sthanantor' => 'ulama_kormi_gatti_sthanantor'
                ],
                'type' => 'pp_increase_both_gatti_both',
            ],
            'ulama_associate_member' => [
                'table' => 'thana_songothon3_departmental_information',
                'columns' => ['increase' => 'ulama_associate_member_increase'],
                'type' => 'increase',
            ],


            // পেশাজীবী
            'pesha_jibi_rokon' => [
                'table' => 'thana_songothon3_departmental_information',
                'columns' => [
                    'increase_manonnoyon' => 'pesha_jibi_rokon_increase_manonnoyon', 
                    'increase_agoto' => 'pesha_jibi_rokon_increase_agoto',
                    'decrease_manonnoyon' => 'pesha_jibi_rokon_gatti_manonnoyon',
                    'decrease_sthanantor' => 'pesha_jibi_rokon_gatti_sthanantor'
                ],
                'type' => 'pp_increase_both_gatti_both',
            ],
            'pesha_jibi_kormi' => [
                'table' => 'thana_songothon3_departmental_information',
                'columns' => [
                    'increase_manonnoyon' => 'pesha_jibi_kormi_increase_manonnoyon', 
                    'increase_agoto' => 'pesha_jibi_kormi_increase_agoto',
                    'decrease_manonnoyon' => 'pesha_jibi_kormi_gatti_manonnoyon',
                    'decrease_sthanantor' => 'pesha_jibi_kormi_gatti_sthanantor'
                ],
                'type' => 'pp_increase_both_gatti_both',
            ],
            'pesha_jibi_associate_member' => [
                'table' => 'thana_songothon3_departmental_information',
                'columns' => ['increase' => 'pesha_jibi_associate_member_increase'],
                'type' => 'increase',
            ],


            // যুব
            'jubo_rokon' => [
                'table' => 'thana_songothon3_departmental_information',
                'columns' => [
                    'increase_manonnoyon' => 'jubo_rokon_increase_manonnoyon', 
                    'increase_agoto' => 'jubo_rokon_increase_agoto',
                    'decrease_manonnoyon' => 'jubo_rokon_gatti_manonnoyon',
                    'decrease_sthanantor' => 'jubo_rokon_gatti_sthanantor'
                ],
                'type' => 'pp_increase_both_gatti_both',
            ],
            'jubo_kormi' => [
                'table' => 'thana_songothon3_departmental_information',
                'columns' => [
                    'increase_manonnoyon' => 'jubo_kormi_increase_manonnoyon', 
                    'increase_agoto' => 'jubo_kormi_increase_agoto',
                    'decrease_manonnoyon' => 'jubo_kormi_gatti_manonnoyon',
                    'decrease_sthanantor' => 'jubo_kormi_gatti_sthanantor'
                ],
                'type' => 'pp_increase_both_gatti_both',
            ],
            'jubo_associate_member' => [
                'table' => 'thana_songothon3_departmental_information',
                'columns' => ['increase' => 'jubo_associate_member_increase'],
                'type' => 'increase',
            ],


            // সাহিত্য ও সংস্কৃতি
            'cultural_rokon' => [
                'table' => 'thana_songothon3_departmental_information',
                'columns' => [
                    'increase_manonnoyon' => 'cultural_rokon_increase_manonnoyon', 
                    'increase_agoto' => 'cultural_rokon_increase_agoto',
                    'decrease_manonnoyon' => 'cultural_rokon_gatti_manonnoyon',
                    'decrease_sthanantor' => 'cultural_rokon_gatti_sthanantor'
                ],
                'type' => 'pp_increase_both_gatti_both',
            ],
            'cultural_kormi' => [
                'table' => 'thana_songothon3_departmental_information',
                'columns' => [
                    'increase_manonnoyon' => 'cultural_kormi_increase_manonnoyon', 
                    'increase_agoto' => 'cultural_kormi_increase_agoto',
                    'decrease_manonnoyon' => 'cultural_kormi_gatti_manonnoyon',
                    'decrease_sthanantor' => 'cultural_kormi_gatti_sthanantor'
                ],
                'type' => 'pp_increase_both_gatti_both',
            ],
            'cultural_associate_member' => [
                'table' => 'thana_songothon3_departmental_information',
                'columns' => ['increase' => 'cultural_associate_member_increase'],
                'type' => 'increase',
            ],


            // ভিন্নধর্মাবলম্বী
            'vinno_dormalombi_kormi' => [
                'table' => 'thana_songothon3_departmental_information',
                'columns' => [
                    'increase_manonnoyon' => 'vinno_dormalombi_kormi_increase_manonnoyon', 
                    'increase_agoto' => 'vinno_dormalombi_kormi_increase_agoto',
                    'decrease_manonnoyon' => 'vinno_dormalombi_kormi_gatti_manonnoyon',
                    'decrease_sthanantor' => 'vinno_dormalombi_kormi_gatti_sthanantor'
                ],
                'type' => 'pp_increase_both_gatti_both',
            ],
            'vinno_dormalombi_associate_member' => [
                'table' => 'thana_songothon3_departmental_information',
                'columns' => ['increase' => 'vinno_dormalombi_associate_member_increase'],
                'type' => 'increase',
            ],


            // ৪. সাংগঠনিক কাঠামো*:
            'pouroshova' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'pouroshova_increase', 'decrease' => 'pouroshova_gatti'],
                'type' => 'previous_present',
            ],
            'songothito_pouroshova' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'songothito_pouroshova_increase', 'decrease' => 'songothito_pouroshova_gatti'],
                'type' => 'previous_present',
            ],
            'union' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'union_increase', 'decrease' => 'union_gatti'],
                'type' => 'previous_present',
            ],
            'songothito_union' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'songothito_union_increase', 'decrease' => 'songothito_union_gatti'],
                'type' => 'previous_present',
            ],
            'sangothonik_union_man' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'sangothonik_union_man_increase', 'decrease' => 'sangothonik_union_man_gatti'],
                'type' => 'previous_present',
            ],
            'sangothonik_union_woman' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'sangothonik_union_woman_increase', 'decrease' => 'sangothonik_union_woman_gatti'],
                'type' => 'previous_present',
            ],
            'union_without_member' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'union_without_member_increase', 'decrease' => 'union_without_member_gatti'],
                'type' => 'previous_present',
            ],
            'total_proshashonik_ward_of_city_corporation' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'total_proshashonik_ward_of_city_corporation_increase', 'decrease' => 'total_proshashonik_ward_of_city_corporation_gatti'],
                'type' => 'previous_present',
            ],
            'total_songothito_ward_of_city_corporation' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'total_songothito_ward_of_city_corporation_increase', 'decrease' => 'total_songothito_ward_of_city_corporation_gatti'],
                'type' => 'previous_present',
            ],
            'total_songothonik_ward_man' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'total_songothonik_ward_man_increase', 'decrease' => 'total_songothonik_ward_man_gatti'],
                'type' => 'previous_present',
            ],
            'total_songothonik_ward_woman' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'total_songothonik_ward_woman_increase', 'decrease' => 'total_songothonik_ward_woman_gatti'],
                'type' => 'previous_present',
            ],




            'total_proshashonik_ward_of_pouroshova' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'total_proshashonik_ward_of_pouroshova_increase', 'decrease' => 'total_proshashonik_ward_of_pouroshova_gatti'],
                'type' => 'previous_present',
            ],
            'total_proshashonik_ward_of_union' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'total_proshashonik_ward_of_union_increase', 'decrease' => 'total_proshashonik_ward_of_union_gatti'],
                'type' => 'previous_present',
            ],
            'total_songothito_ward_of_pouroshova' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'total_songothito_ward_of_pouroshova_increase', 'decrease' => 'total_songothito_ward_of_pouroshova_gatti'],
                'type' => 'previous_present',
            ],
            'total_songothito_ward_of_union' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'total_songothito_ward_of_union_increase', 'decrease' => 'total_songothito_ward_of_union_gatti'],
                'type' => 'previous_present',
            ],
            'total_songothonik_ward_of_pouroshova_man' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'total_songothonik_ward_of_pouroshova_man_increase', 'decrease' => 'total_songothonik_ward_of_pouroshova_man_gatti'],
                'type' => 'previous_present',
            ],
            'total_songothonik_ward_of_union_man' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'total_songothonik_ward_of_union_man_increase', 'decrease' => 'total_songothonik_ward_of_union_man_gatti'],
                'type' => 'previous_present',
            ],
            'total_songothonik_ward_of_pouroshova_woman' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'total_songothonik_ward_of_pouroshova_woman_increase', 'decrease' => 'total_songothonik_ward_of_pouroshova_woman_gatti'],
                'type' => 'previous_present',
            ],
            'total_songothonik_ward_of_union_woman' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'total_songothonik_ward_of_union_woman_increase', 'decrease' => 'total_songothonik_ward_of_union_woman_gatti'],
                'type' => 'previous_present',
            ],
            // অন্যান্য সাংগঠনিক ওয়ার্ড
            'songothonik_ward_ulama' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'songothonik_ward_ulama_increase', 'decrease' => 'songothonik_ward_ulama_gatti'],
                'type' => 'previous_present',
            ],
            'songothonik_ward_peshajibi' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'songothonik_ward_peshajibi_increase', 'decrease' => 'songothonik_ward_peshajibi_gatti'],
                'type' => 'previous_present',
            ],
            'songothonik_ward_jubo' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'songothonik_ward_jubo_increase', 'decrease' => 'songothonik_ward_jubo_gatti'],
                'type' => 'previous_present',
            ],
            'songothonik_ward_sromo' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'songothonik_ward_sromo_increase', 'decrease' => 'songothonik_ward_sromo_gatti'],
                'type' => 'previous_present',
            ],
            'songothonik_ward_media' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'songothonik_ward_media_increase', 'decrease' => 'songothonik_ward_media_gatti'],
                'type' => 'previous_present',
            ],
            'songothonik_ward_cultural' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'songothonik_ward_cultural_increase', 'decrease' => 'songothonik_ward_cultural_gatti'],
                'type' => 'previous_present',
            ],
            // ইউনিট সংগঠন
            'general_unit_men' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'general_unit_men_increase', 'decrease' => 'general_unit_men_gatti'],
                'type' => 'previous_present',
            ],
            'general_unit_women' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'general_unit_women_increase', 'decrease' => 'general_unit_women_gatti'],
                'type' => 'previous_present',
            ],
            'ulama_unit' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'ulama_unit_increase', 'decrease' => 'ulama_unit_gatti'],
                'type' => 'previous_present',
            ],
            'peshajibi_unit_men' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'peshajibi_unit_men_increase', 'decrease' => 'peshajibi_unit_men_gatti'],
                'type' => 'previous_present',
            ],
            'peshajibi_unit_women' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'peshajibi_unit_women_increase', 'decrease' => 'peshajibi_unit_women_gatti'],
                'type' => 'previous_present',
            ],
            'kormojibi_unit_women' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'kormojibi_unit_women_increase', 'decrease' => 'kormojibi_unit_women_gatti'],
                'type' => 'previous_present',
            ],
            'jubo_unit' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'jubo_unit_increase', 'decrease' => 'jubo_unit_gatti'],
                'type' => 'previous_present',
            ],
            'sromo_unit_man' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'sromo_unit_man_increase', 'decrease' => 'sromo_unit_man_gatti'],
                'type' => 'previous_present',
            ],
            'sromo_unit_woman' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'sromo_unit_woman_increase', 'decrease' => 'sromo_unit_woman_gatti'],
                'type' => 'previous_present',
            ],
            'media_unit' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'media_unit_increase', 'decrease' => 'media_unit_gatti'],
                'type' => 'previous_present',
            ],
            'cultural_unit' => [
                'table' => 'thana_songothon4_organizational_structures',
                'columns' => ['increase' => 'cultural_unit_increase', 'decrease' => 'cultural_unit_gatti'],
                'type' => 'previous_present',
            ],


            // ৫. দাওয়াতি ও পারিবারিক ইউনিট*:
            'dawati_unit' => [
                'table' => 'thana_songothon5_dawat_and_paribarik_units',
                'columns' => ['increase' => 'dawati_unit_increase', 'decrease' => 'dawati_unit_gatti'],
                'type' => 'previous_present',
            ],
            'paribarik_unit' => [
                'table' => 'thana_songothon5_dawat_and_paribarik_units',
                'columns' => ['increase' => 'paribarik_unit_increase', 'decrease' => 'paribarik_unit_gatti'],
                'type' => 'previous_present',
            ],




            // ৬. এমারত কায়েম: (name er por "_emarot" add kora hoyeche jate duplicate na hoy)
            'pouroshova_emarot' => [
                'table' => 'thana_songothon6_emarot_kayems',
                'columns' => ['increase' => 'pouroshova_increase', 'decrease' => 'pouroshova_gatti'],
                'type' => 'previous_present',
            ],
            'union_emarot' => [
                'table' => 'thana_songothon6_emarot_kayems',
                'columns' => ['increase' => 'union_increase', 'decrease' => 'union_gatti'],
                'type' => 'previous_present',
            ],
            'ward_of_city_emarot' => [
                'table' => 'thana_songothon6_emarot_kayems',
                'columns' => ['increase' => 'ward_of_city_increase', 'decrease' => 'ward_of_city_gatti'],
                'type' => 'previous_present',
            ],
            'ward_of_pouroshova_emarot' => [
                'table' => 'thana_songothon6_emarot_kayems',
                'columns' => ['increase' => 'ward_of_pouroshova_increase', 'decrease' => 'ward_of_pouroshova_gatti'],
                'type' => 'previous_present',
            ],
            'ward_of_union_emarot' => [
                'table' => 'thana_songothon6_emarot_kayems',
                'columns' => ['increase' => 'ward_of_union_increase', 'decrease' => 'ward_of_union_gatti'],
                'type' => 'previous_present',
            ],




            // ৪. জাতীয় ও স্থানীয় নির্বাচনভিত্তিক কার্যক্রম:
            'national_vote_kendro' => [
                'table' => 'thana_rastrio4_election_activities',
                'columns' => ['increase' => 'national_vote_kendro_increase'],
                'type' => 'increase',
            ],
            'local_vote_kendro' => [
                'table' => 'thana_rastrio4_election_activities',
                'columns' => ['increase' => 'local_vote_kendro_increase'],
                'type' => 'increase',
            ],
            'vote_kendro_committee' => [
                'table' => 'thana_rastrio4_election_activities',
                'columns' => ['increase' => 'vote_kendro_committee_increase'],
                'type' => 'increase',
            ],
            'vote_kendro_vittik_unit' => [
                'table' => 'thana_rastrio4_election_activities',
                'columns' => ['increase' => 'vote_kendro_vittik_unit_increase'],
                'type' => 'increase',
            ],
            'booth_vittik_unit' => [
                'table' => 'thana_rastrio4_election_activities',
                'columns' => ['increase' => 'booth_vittik_unit_increase'],
                'type' => 'increase',
            ],


            // ৬. মানবাধিকার
            'human_rights_activist_produced' => [
                'table' => 'thana_rastrio6_human_rights',
                'columns' => ['increase' => 'human_rights_activist_produced_increase'],
                'type' => 'increase',
            ],


            // ৮. উদ্যোক্তা তৈরি:
            'krishi_uddogta_toiri' => [
                'table' => 'thana_rastrio8_entrepreneurial_developments',
                'columns' => ['increase' => 'krishi_uddogta_toiri_increase'],
                'type' => 'increase',
            ],
            'sheba_uddogta_toiri' => [
                'table' => 'thana_rastrio8_entrepreneurial_developments',
                'columns' => ['increase' => 'sheba_uddogta_toiri_increase'],
                'type' => 'increase',
            ],
            'shilpo_uddogta_toiri' => [
                'table' => 'thana_rastrio8_entrepreneurial_developments',
                'columns' => ['increase' => 'shilpo_uddogta_toiri_increase'],
                'type' => 'increase',
            ],
            'banijjo_uddogta_toiri' => [
                'table' => 'thana_rastrio8_entrepreneurial_developments',
                'columns' => ['increase' => 'banijjo_uddogta_toiri_increase'],
                'type' => 'increase',
            ],
            'other_uddogta_toiri' => [
                'table' => 'thana_rastrio8_entrepreneurial_developments',
                'columns' => ['increase' => 'other_uddogta_toiri_increase'],
                'type' => 'increase',
            ],
            'other' => [
                'table' => 'thana_rastrio8_entrepreneurial_developments',
                'columns' => ['increase' => 'other_increase'],
                'type' => 'increase',
            ],





            // 'column_heading' => [
            //     'table' => 'ward_department3_jubo_somaj_dawats',
            //     'columns' => ['increase' => 'stablished_club_total_increased'],
            //     'type' => 'increase',
            // ],

            // 'column_previous_present' => [
            //     'table' => 'ward_songothon5_dawat_and_paribarik_units',
            //     'columns' => ['increase' => 'paribarik_unit_increase', 'decrease' => 'paribarik_unit_gatti'],
            //     'type' => 'previous_present',
            // ],

            // 'pp_increase_both_gatti_both' => [
            //     'table' => 'ward_songothon5_dawat_and_paribarik_units',
            //     'columns' => [
            //         'increase_manonnoyon' => 'paribarik_unit_increase', 
            //         'increase_agoto' => 'paribarik_unit_gatti',
            //         'decrease_manonnoyon' => 'paribarik_unit_gatti',
            //         'decrease_sthanantor' => 'paribarik_unit_gatti'
            //     ],
            //     'type' => 'pp_increase_both_gatti_both',
            // ],


            // 'pp_increase_both_gatti_one' => [
            //     'table' => 'ward_songothon5_dawat_and_paribarik_units',
            //     'columns' => [
            //         'increase_manonnoyon' => 'paribarik_unit_increase', 
            //         'increase_agoto' => 'paribarik_unit_gatti',
            //         'decrease' => 'paribarik_unit_gatti'
            //     ],
            //     'type' => 'pp_increase_both_gatti_one',
            // ],



        ];
    }
}
