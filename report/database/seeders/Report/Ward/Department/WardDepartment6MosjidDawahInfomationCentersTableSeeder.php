<?php

namespace Database\Seeders\Report\Ward\Department;

use App\Models\Report\Ward\Department\WardDepartment6MosjidDawahInfomationCenter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardDepartment6MosjidDawahInfomationCentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardDepartment6MosjidDawahInfomationCenter::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardDepartment6MosjidDawahInfomationCenter::create([
                    'report_info_id' => $report_info_id,
                    'total_mosjid' => rand(1, 10),
                    'total_mosjid_increase' => rand(1, 10),

                    'dawat_included_mosjid' => rand(1, 10),
                    'dawat_included_mosjid_increase' => rand(1, 10),

                    'mosjid_wise_dawah_center' => rand(1, 10),
                    'mosjid_wise_dawah_center_increase' => rand(1, 10),

                    'general_dawah_center' => rand(1, 10),
                    'general_dawah_center_increase' => rand(1, 10),

                    'mosjid_wise_information_center' => rand(1, 10),
                    'mosjid_wise_information_center_increase' => rand(1, 10),

                    'general_information_center' => rand(1, 10),
                    'general_information_center_increase' => rand(1, 10),

                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
