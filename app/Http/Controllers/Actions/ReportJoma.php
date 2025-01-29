<?php

namespace App\Http\Controllers\Actions;

use App\Models\Report\ReportInfo;
use App\Models\Report\ReportManagementControl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportJoma
{
    public function execute($month, $org_type, $org_type_id){
        $carbon_month = Carbon::parse($month);
        // $org_unit_user = OrgUnitUser::where('user_id',auth()->id())->first();

        // if (!$org_unit_user) {
        //     return response()->json([
        //         'err_message' => 'Unit information not found for this user.',
        //     ], 404);
        // }

        // $unit_id = $org_unit_user->unit_id;

        $permission  = ReportManagementControl::where('report_type', $org_type)
                                            ->whereYear('month_year', $carbon_month->clone()->year)
                                            ->whereMonth('month_year', $carbon_month->clone()->month)
                                            ->where('is_active', 1)
                                            ->latest()
                                            ->first();

        if (!$permission) {
            return response()->json([
                'err_message' => 'Permission denied',
                'errors' => [['You do not have the necessary permissions']],
            ], 403);
        }

        $report_info = ReportInfo::where('org_type_id', $org_type_id)
                    ->where('org_type', $org_type)
                    ->whereYear('month_year', $carbon_month->year)
                    ->whereMonth('month_year', $carbon_month->month)
                    ->first();

        if (!$report_info) {
            return response()->json([
                'err_message' => 'Report information not found.',
                'errors' => [['You do not have any data']],
            ], 404);
        }

        $get_info = "get_{$org_type}_info";
        $org_type_wise_data = $this->$get_info();
        $org_type_column = "{$org_type}_id";

        dd($org_type_wise_data );
        switch (true) {
            case $report_info->report_submit_status === 'unsubmitted' &&
                $report_info->report_approved_status === 'pending':
                $report_info->report_submit_status = 'submitted';
                $report_info->save();
                // Update related BmPaid records
                DB::table($org_type_wise_data['income_table'])->where($org_type_column, $org_type_id)
                    ->whereYear('month', $carbon_month->year)
                    ->whereMonth('month', $carbon_month->month)
                    ->update(['report_submit_status' => 'submitted']);

                // Update related BmExpense records
                DB::table($org_type_wise_data['expense_table'])->where($org_type_column, $org_type_id)
                    ->whereYear('date', $carbon_month->year)
                    ->whereMonth('date', $carbon_month->month)
                    ->update(['report_submit_status' => 'submitted']);

                return response()->json([
                    'status' => 'success',
                    'report_status' => 'submitted',
                    'message' => 'রিপোর্ট জমা করা হয়েছে ।',
                ], 200);

            case $report_info->report_submit_status === 'submitted' &&
                $report_info->report_approved_status === 'rejected':
                $report_info->report_approved_status = 'pending';
                $report_info->save();

                // Update related BmPaid records
                DB::table($org_type_wise_data['income_table'])->where($org_type_column, $org_type_id)
                    ->whereYear('month', $carbon_month->year)
                    ->whereMonth('month', $carbon_month->month)
                    ->update(['report_approved_status' => 'pending']);

                // Update related BmPaid records
                DB::table($org_type_wise_data['expense_table'])->where($org_type_column, $org_type_id)
                    ->whereYear('date', $carbon_month->year)
                    ->whereMonth('date', $carbon_month->month)
                    ->update(['report_approved_status' => 'pending']);

                return response()->json([
                    'status' => 'success',
                    'report_status' => 'resubmitted',
                    'message' => 'রিপোর্ট পুনরায় জমা সম্পন্ন হয়েছে ।',
                ], 200);

            case $report_info->report_submit_status === 'submitted' &&
                $report_info->report_approved_status === 'approved':
                return response()->json([
                    'err_message' => 'Report is already approved and cannot be resubmitted.',
                    'errors' => [['already approved and cannot be resubmitted.']],
                ], 400);

            default:
                return response()->json([
                    'err_message' => 'No valid action for the current report status.',
                    'errors' => [['No valid action ']],
                ], 422);
        }
    }

    public function get_unit_info()
    {
        $data = [
            'income_table' => "bm_paids",
            'expense_table' => "bm_expenses",
        ];

        return $data;
    }

    public function get_ward_info()
    {
        $data = [
            'income_table' => "ward_bm_incomes",
            'expense_table' => "ward_bm_expenses",
        ];

        return $data;
    }
}
