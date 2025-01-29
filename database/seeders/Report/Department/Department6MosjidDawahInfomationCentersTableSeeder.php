<?php

namespace Database\Seeders\Report\Department;

use App\Models\Report\Department\Department6MosjidDawahInfomationCenter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Department6MosjidDawahInfomationCentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department6MosjidDawahInfomationCenter::truncate();
        Department6MosjidDawahInfomationCenter::create([
            'total_mosjid' => 12,
            'total_mosjid_increase' => 2,
            'dawat_included_mosjid' => 22,
            'dawat_included_mosjid_increase' => 12,
            'mosjid_wise_dawah_center' => 23,
            'mosjid_wise_dawah_center_increase' => 21,
            'general_dawah_center' => 26,
            'general_dawah_center_increase' => 20,
            'mosjid_information_center' => 12,
            'mosjid_information_center_increase' => 2,
            'general_information_center' => 25,
            'general_information_center_increase' => 24,
            'trained_educated_dayee' => 25,
            'trained_educated_dayee_increase' => 25,

            'creator' => 3,
            'status' => 1,
        ]);
        Department6MosjidDawahInfomationCenter::create([
            'total_mosjid' => 13,
            'total_mosjid_increase' => 3,
            'dawat_included_mosjid' => 33,
            'dawat_included_mosjid_increase' => 13,
            'mosjid_wise_dawah_center' => 33,
            'mosjid_wise_dawah_center_increase' => 31,
            'general_dawah_center' => 36,
            'general_dawah_center_increase' => 30,
            'mosjid_information_center' => 13,
            'mosjid_information_center_increase' => 3,
            'general_information_center' => 35,
            'general_information_center_increase' => 34,
            'trained_educated_dayee' => 35,
            'trained_educated_dayee_increase' => 35,

            'creator' => 3,
            'status' => 1,
        ]);
        Department6MosjidDawahInfomationCenter::create([
            'total_mosjid' => 14,
            'total_mosjid_increase' => 4,
            'dawat_included_mosjid' => 44,
            'dawat_included_mosjid_increase' => 14,
            'mosjid_wise_dawah_center' => 43,
            'mosjid_wise_dawah_center_increase' => 41,
            'general_dawah_center' => 46,
            'general_dawah_center_increase' => 40,
            'mosjid_information_center' => 14,
            'mosjid_information_center_increase' => 4,
            'general_information_center' => 45,
            'general_information_center_increase' => 44,
            'trained_educated_dayee' => 45,
            'trained_educated_dayee_increase' => 45,

            'creator' => 3,
            'status' => 1,
        ]);
        Department6MosjidDawahInfomationCenter::create([
            'total_mosjid' => 15,
            'total_mosjid_increase' => 5,
            'dawat_included_mosjid' => 55,
            'dawat_included_mosjid_increase' => 15,
            'mosjid_wise_dawah_center' => 53,
            'mosjid_wise_dawah_center_increase' => 51,
            'general_dawah_center' => 56,
            'general_dawah_center_increase' => 50,
            'mosjid_information_center' => 15,
            'mosjid_information_center_increase' => 5,
            'general_information_center' => 55,
            'general_information_center_increase' => 54,
            'trained_educated_dayee' => 55,
            'trained_educated_dayee_increase' => 55,

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
