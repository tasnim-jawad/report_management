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
        ReportManagementControl::create([
            'month_year' => Carbon::now()->toDateString(),
            'report_type' => 'unit',
            'is_active' => 1,

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
//php artisan db:seed --class="Database\Seeders\Report\ReportManagementControlsTableSeeder"
