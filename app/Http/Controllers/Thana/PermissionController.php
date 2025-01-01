<?php

namespace App\Http\Controllers\Thana;

use App\Http\Controllers\Controller;
use App\Models\Organization\OrgThana;
use App\Models\Report\ReportManagementControl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public function ward_report_joma_permitted_month()
    {
        // dd("ward_report_joma_permitted_month");
        $thana_id = auth()->user()->org_thana_user->thana_id;
        // dd($thana_id);
        $data = ReportManagementControl::where('upper_organization_id', $thana_id)
            ->where('report_type', 'ward')
            ->where('is_active', 1)
            ->select('month_year')
            ->latest()
            ->first();
        if ($data) {
            return response()->json([
                'data' => $data,
                'status' => 'success',
            ], 200);
        } else {
            return response()->json([
                'data' => 'কোনো মাসেই রিপোর্ট জমা দেয়ার কোনো অনুমতি নেই',
                'status' => 'fail',
            ], 200);
        }
        // dd($data->month_year);

    }
    public function set_ward_report_joma_permission()
    {
        // dd(request()->all());
        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $month_year = Carbon::parse(request()->month);
        $thana_id = auth()->user()->org_thana_user->thana_id;
        $thana = OrgThana::find($thana_id);
        if (!$thana) {
            return response()->json([
                'status' => 'fail',
                'message' => 'থানা খুঁজে পাওয়া যায়নি।'
            ], 200);
        }

        ReportManagementControl::where('upper_organization_id', $thana_id)
            ->where('report_type', 'ward')
            ->update(['is_active' => 0]);

        $data = ReportManagementControl::where('upper_organization_id', $thana_id)
            ->where('report_type', 'ward')
            ->whereYear('month_year', $month_year->clone()->year)
            ->whereMonth('month_year', $month_year->clone()->month)
            ->latest()
            ->first();
        if ($data) {
            $data->update(['is_active' => 1]);
        } else {

            $data = new ReportManagementControl();
            $data->month_year = $month_year->clone()->toDateString();
            $data->report_type = 'ward';
            $data->upper_organization_id = $thana_id;
            $data->is_active = 1;

            $data->creator = auth()->id();
            $data->save();
        }

        return response()->json([
            'status' => 'success',
            "message" => "পারমিশন আপডেট করা হয়েছে ।"
        ], 200);
    }

    public function remove_ward_report_joma_permission()
    {
        $thana_id = auth()->user()->org_thana_user->thana_id;
        ReportManagementControl::where('upper_organization_id', $thana_id)
            ->where('report_type', 'ward')
            ->update(['is_active' => 0]);

        return response()->json([
            'status' => 'success',
            "message" => "পারমিশন রিমুভ করা হয়েছে।"
        ], 200);
    }

    public function toggle_dashboard_permission()
    {
        try {
            $validator = Validator::make(request()->all(), [
                'user_id' => ['required', 'exists:users,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $user = User::findOrFail(request()->user_id);
            $user->is_permitted = !$user->is_permitted;  // Toggle the is_permitted value
            $user->save();

            return response()->json(['message' => 'Permission toggled successfully']);

        } catch (\Throwable $th) {
            // throw $th;
            // return messageResponse($e->getMessage(),[], 500, 'server_error');

            return response()->json([
                'err_message' => 'An error occurred while toggling permission.',
            ], 500);

        }
    }
}
