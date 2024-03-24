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
        ReportInfo::insert([
            [
                'org_type' => 'sromik kollan',
                'org_type_id' => 1,
                'responsibility_id' => 1,
                'responsibility_name' => 'president',
                'month_year' => '2024-12-01',
                'report_type' => 'monthly',
                'creator' => 3,
                'status' => 1,
            ],
            [
                'org_type' => 'engineers forum',
                'org_type_id' => 2,
                'responsibility_id' => 2,
                'responsibility_name' => 'secretary',
                'month_year' => '2024-12-01',
                'report_type' => 'sixmonth',
                'creator' => 3,
                'status' => 1,
            ],
            [
                'org_type' => 'doctors forum',
                'org_type_id' => 3,
                'responsibility_id' => 3,
                'responsibility_name' => 'Organizing Secretary',
                'month_year' => '2024-12-01',
                'report_type' => 'yearly',
                'creator' => 3,
                'status' => 1,
            ],
        ]);
    }
}
