<?php

namespace Database\Seeders\Report;

use App\Models\Report\ReportManagementControl;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
Use Carbon\Carbon;

class ReportManagementControlsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReportManagementControl::truncate();
        $year = date('Y');
        // for ($month = 1; $month <= 12; $month++) {
        //     for ($i = 1; $i <= 2; $i++) {
        //         ReportManagementControl::create([
        //             'month_year' => Carbon::createFromDate($year, $month, 1)->format('Y-m-d'),
        //             'report_type' => 'unit',
        //             'upper_organization_id' => $i,
        //             'is_active' => 0,
        //             'creator' => 7,
        //             'status' => 1,
        //         ]);
        //     }
        // }
        // for ($month = 1; $month <= 12; $month++) {
        //     for ($i = 1; $i <= 1; $i++){
        //         ReportManagementControl::create([
        //             'month_year' => Carbon::createFromDate($year, $month, 1)->format('Y-m-d'),
        //             'report_type' => 'ward',
        //             'upper_organization_id' => $i,
        //             'is_active' => 0,
        //             'creator' => 5,
        //             'status' => 1,
        //         ]);
        //     }
        // }
        for ($month = 1; $month <= 12; $month++) {
            for ($i = 1; $i <= 1; $i++){
                ReportManagementControl::create([
                    'month_year' => Carbon::createFromDate($year, $month, 1)->format('Y-m-d'),
                    'report_type' => 'thana',
                    'upper_organization_id' => $i,
                    'is_active' => 0,
                    'creator' => 5,
                    'status' => 1,
                ]);
            }
        }
    }
}
//php artisan db:seed --class="Database\Seeders\Report\ReportManagementControlsTableSeeder"
