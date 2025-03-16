<?php

namespace App\Http\Controllers\Unit\Actions;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IncomeCategoryWise
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
}
