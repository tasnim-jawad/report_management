<?php

namespace App\Http\Controllers\Actions;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BmReport
{
    public function execute($start_month, $end_month, $org_type, $org_type_id, $transaction_type, $report_approved_status = ['approved'], $is_need_sum = true)
    {
        $start_month_date = Carbon::parse($start_month);
        $end_month_date = Carbon::parse($end_month);

        // Ensure $report_approved_status is always an array
        $approved_status_array = is_array($report_approved_status) ? $report_approved_status : [$report_approved_status];

        $info_function_name = "get_" . $org_type . "_" . $transaction_type . "_info";
        $transaction_info = $this->$info_function_name();

        $category_id_column = $transaction_info['category_id_column_name_in_transaction_table'];
        $category_table_name = $transaction_info['category_table_name'];
        $transaction_table_name = $transaction_info['transaction_table_name'];
        $month_column = $transaction_info['month_column'];

        // Step 1: Fetch all categories once
        $categories = DB::table($category_table_name)
            ->select(['id', 'parent_id', 'title'])
            ->get()
            ->keyBy('id');

        // Step 2: Fetch all relevant transactions in the given date range
        $org_type_column_name = $org_type . '_id';
        $transactions = DB::table($transaction_table_name)
            ->whereBetween($month_column, [$start_month_date->startOfMonth(), $end_month_date->endOfMonth()])
            ->where($org_type_column_name, $org_type_id)
            ->whereIn('report_approved_status', $approved_status_array)
            ->get();

        // Step 3: Calculate total transaction amount
        $total_transaction_amount = $transactions->sum('amount');

        // Step 4: Group transactions by category
        $category_wise_amount = $transactions->groupBy($category_id_column)->map(function ($group) {
            return $group->sum('amount');
        });

        // Step 5: Build category-wise data
        $category_wise_data = [];
        foreach ($categories as $id => $category) {
            $category_total_amount = $category_wise_amount->get($id, 0);

            if ($category_total_amount == 0) {
                $category_total_amount = '';
            }

            if ($category->parent_id != 0 && $is_need_sum) {
                // Handle subcategories
                if (isset($category_wise_data[$category->parent_id])) {
                    if ($category_total_amount !== '') {
                        $category_wise_data[$category->parent_id]['amount'] += $category_total_amount;
                    }
                } else {
                    $category_wise_data[$category->parent_id] = [
                        'amount' => $category_total_amount,
                        'category_name' => $categories[$category->parent_id]->title ?? '',
                        'category_id' => $category->parent_id,
                    ];
                }
            } else {
                // Handle main categories
                $category_wise_data[$id] = [
                    'amount' => $category_total_amount,
                    'category_name' => $category->title,
                    'category_id' => $id,
                ];
            }
        }

        // dd([
        //     'total_amount' => $total_transaction_amount,
        //     'category_wise_data' => array_values($category_wise_data),
        // ]);

        return $this->array_to_object([
            'total_amount' => $total_transaction_amount,
            'category_wise_data' => array_values($category_wise_data),
        ]);
    }

    private function array_to_object($array)
    {
        if (is_array($array)) {
            return (object) array_map([$this, 'array_to_object'], $array);
        }
        return $array;
    }

    public function get_unit_income_info()
    {
        $data = [
            'category_table_name' => "bm_categories",
            'transaction_table_name' => "bm_paids",
            'category_id_column_name_in_transaction_table' => "bm_category_id",
            'category_id_column_name_in_transaction_table' => "bm_category_id",
            'month_column' => "month",
        ];

        return $data;
    }

    public function get_unit_expense_info()
    {
        $data = [
            'category_table_name' => "bm_expense_categories",
            'transaction_table_name' => "bm_expenses",
            'category_id_column_name_in_transaction_table' => "bm_expense_category_id",
            'month_column' => "date",
        ];

        return $data;
    }
}
