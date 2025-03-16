<?php

namespace Database\Seeders\Report\Ward\Songothon;

use App\Models\Report\Ward\Songothon\WardSongothon6BidayiStudentsConnect;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardSongothon6BidayiStudentsConnectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardSongothon6BidayiStudentsConnect::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardSongothon6BidayiStudentsConnect::create([
                    'report_info_id' => $report_info_id,
                    'Joined_student_man_member' => rand(1, 10),
                    'Joined_student_man_associate' => rand(1, 10),
                    'Joined_student_man_worker' => rand(1, 10),

                    'Joined_student_women_member' => rand(1, 10),
                    'Joined_student_women_associate' => rand(1, 10),
                    'Joined_student_women_worker' => rand(1, 10),

                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
