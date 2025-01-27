<?php

namespace Database\Seeders\Report;

use App\Models\Report\ReportInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReportInfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReportInfo::truncate();
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                ReportInfo::create([
                    'org_type' => 'unit',
                    'org_type_id' => $i,
                    'responsibility_id' => 1,
                    'responsibility_name' => 'সভাপতি',
                    'month_year' => "2024-" . str_pad($j, 2, '0', STR_PAD_LEFT) . "-01", // Fixes the date format
                    'report_type' => 'monthly',
                    'creator' => 8 + $i,
                    'status' => 1,
                ]);
            }
        }
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                ReportInfo::create([
                    'org_type' => 'ward',
                    'org_type_id' => $i,
                    'responsibility_id' => 1,
                    'responsibility_name' => 'সভাপতি',
                    'month_year' => "2024-" . str_pad($j, 2, '0', STR_PAD_LEFT) . "-01",
                    'report_type' => 'monthly',
                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
            }
        }
        for ($i = 1; $i <= 1; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                ReportInfo::create([
                    'org_type' => 'thana',
                    'org_type_id' => $i,
                    'responsibility_id' => 1,
                    'responsibility_name' => 'সভাপতি',
                    'month_year' => "2024-" . str_pad($j, 2, '0', STR_PAD_LEFT) . "-01",
                    'report_type' => 'monthly',
                    'creator' => 5,
                    'status' => 1,
                ]);
            }
        }

        // ReportInfo::insert([
        //     [
        //         'org_type' => 'unit',
        //         'org_type_id' => 1,
        //         'responsibility_id' => 1,
        //         'responsibility_name' => 'president',
        //         'month_year' => '2024-12-01',
        //         'report_type' => 'monthly',
        //         'creator' => 3,
        //         'status' => 1,
        //     ],
        //     [
        //         'org_type' => 'thana',
        //         'org_type_id' => 2,
        //         'responsibility_id' => 2,
        //         'responsibility_name' => 'secretary',
        //         'month_year' => '2024-12-01',
        //         'report_type' => 'sixmonth',
        //         'creator' => 3,
        //         'status' => 1,
        //     ],
        //     [
        //         'org_type' => 'ward',
        //         'org_type_id' => 3,
        //         'responsibility_id' => 3,
        //         'responsibility_name' => 'Organizing Secretary',
        //         'month_year' => '2024-12-01',
        //         'report_type' => 'yearly',
        //         'creator' => 3,
        //         'status' => 1,
        //     ],
        // ]);
    }
}
