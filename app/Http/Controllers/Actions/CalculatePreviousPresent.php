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
}
