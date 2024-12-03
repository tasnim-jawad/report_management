<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment\Comment;
use App\Models\Report\ReportInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function all()
    {
        $orderBy = request()->orderBy ?? 'id';
        $orderByType = request()->orderByType ?? 'DESC';
        $status = 1;


        $query = Comment::where('status', $status)->orderBy($orderBy, $orderByType)->with('user');
        $datas = $query->get();

        return response()->json([
            'status' => 'success',
            'data' => $datas,
        ], 200);
    }

    public function index()
    {
        $orderBy = request()->orderBy ?? 'id';
        $orderByType = request()->orderByType ?? 'DESC';
        $status = 1;

        $carbon_month = Carbon::parse(request()->month);
        $org_type = request()->org_type;
        $org_type_id = request()->org_type_id;
        $table_name = request()->table_name;
        $column_name = request()->column_name;

        $report_info_id = ReportInfo::where('org_type_id', $org_type_id)
            ->where('org_type', $org_type)
            ->whereYear('month_year', $carbon_month->clone()->year)
            ->whereMonth('month_year', $carbon_month->clone()->month)
            ->pluck('id');
        dd($report_info_id);
        $query = Comment::where('status', $status)
            ->whereYear('month_year', $carbon_month->clone()->year)
            ->whereMonth('month_year', $carbon_month->clone()->month)
            ->where('org_type', $org_type)
            ->where('org_type_id', $org_type_id)
            ->where('table_name', $table_name)
            ->where('org_type', $org_type)
            ->orderBy($orderBy, $orderByType)
            ->with('user');
        $datas = $query->get();

        return response()->json([
            'status' => 'success',
            'data' => $datas,
        ], 200);
    }
    public function column_comment_all()
    {
        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
            'org_type' => ['required'],
            'org_type_id' => ['required'],
            'table_name' => ['required'],
            'column_name' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $carbon_month = Carbon::parse(request()->month);
        $org_type = request()->org_type;
        $org_type_id = request()->org_type_id;
        $table_name = request()->table_name;
        $column_name = request()->column_name;

        $report_info = ReportInfo::where('org_type_id', $org_type_id)
            ->where('org_type', $org_type)
            ->whereYear('month_year', $carbon_month->clone()->year)
            ->whereMonth('month_year', $carbon_month->clone()->month)
            ->first();
        // dd($report_info);
        if (!$report_info) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['report not found ']],
            ], 422);
        }

        $table_row = DB::table($table_name)
            ->where('report_info_id', $report_info->id)
            ->first();

        if (!$table_row) {
            $table_row_id = DB::table($table_name)->insertGetId([
                'report_info_id' => $report_info->id,
                'creator' => auth()->user()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            $table_row_id = $table_row->id;
        }


        $orderBy = request()->orderBy ?? 'id';
        $orderByType = request()->orderByType ?? 'DESC';
        $status = 1;
        $report_info_id = $report_info->id;

        $query = Comment::where('status', $status)
            ->where('report_info_id', $report_info_id)
            ->where('table_name', $table_name)
            ->where('table_row_id', $table_row_id)
            ->where('column_name', $column_name)
            ->where('org_type', $org_type)
            ->where('org_type_id', $org_type_id)
            ->whereYear('month_year', $carbon_month->clone()->year)
            ->whereMonth('month_year', $carbon_month->clone()->month)
            ->orderBy($orderBy, $orderByType)
            ->with('user');
        $datas = $query->get();

        return response()->json([
            'status' => 'success',
            'data' => $datas,
        ], 200);
    }

    public function show($id)
    {

        $select = ["*"];
        if (request()->has('select_all') && request()->select_all) {
            $select = "*";
        }
        $data = Comment::where('id', $id)
            ->select($select)
            ->first();
        if ($data) {
            return response()->json($data, 200);
        } else {
            return response()->json([
                'err_message' => 'data not found',
                'errors' => [
                    'user' => [],
                ],
            ], 404);
        }
    }

    public function store()
    {
        // dd(request()->all());
        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
            'org_type' => ['required'],
            'org_type_id' => ['required'],
            'table_name' => ['required'],
            'column_name' => ['required'],
            'comment' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $carbon_month = Carbon::parse(request()->month);
        $org_type = request()->org_type;
        $org_type_id = request()->org_type_id;
        $table_name = request()->table_name;
        $column_name = request()->column_name;
        $comment = request()->comment;

        $report_info = ReportInfo::where('org_type_id', $org_type_id)
            ->where('org_type', $org_type)
            ->whereYear('month_year', $carbon_month->clone()->year)
            ->whereMonth('month_year', $carbon_month->clone()->month)
            ->first();
        // dd($report_info);
        if (!$report_info) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['report not found ']],
            ], 422);
        }

        $table_row = DB::table($table_name)
            ->where('report_info_id', $report_info->id)
            ->first();

        if (!$table_row) {
            $table_row_id = DB::table($table_name)->insertGetId([
                'report_info_id' => $report_info->id,
                'creator' => auth()->user()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            $table_row_id = $table_row->id;
        }

        // dd($table_row_id);

        $data = new Comment();
        $data->report_info_id = $report_info->id;
        $data->table_name = $table_name;
        $data->table_row_id = $table_row_id;
        $data->column_name = $column_name;
        $data->org_type = $org_type;
        $data->org_type_id = $org_type_id;
        $data->month_year = $carbon_month;
        $data->commenter_id = auth()->user()->id;
        $data->comment = $comment;

        $data->creator = auth()->id();
        $data->save();

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200);
    }

    public function update()
    {
        $data = Comment::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'title' => ['required'],
            'description' => ['required'],
            'parent_id' => ['nullable', 'integer', 'exists:bm_categories,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->title = request()->title;
        $data->description = request()->description;
        $data->parent_id = request()->parent_id;
        $data->creator = auth()->id();
        $data->save();

        return response()->json($data, 200);
    }

    public function soft_delete()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:bm_categories,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Comment::find(request()->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:bm_categories,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Comment::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:bm_categories,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Comment::find(request()->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }
}
