<?php

namespace Database\Seeders\Report\Ward\Songothon;

use App\Models\Report\Ward\Songothon\WardSongothon2AssociateMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardSongothon2AssociateMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardSongothon2AssociateMember::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardSongothon2AssociateMember::create([
                    'report_info_id' => $report_info_id,
                    'associate_member_man_previous' => rand(1, 10),
                    'associate_member_man_present' => rand(1, 10),
                    'associate_member_man_briddhi' => rand(1, 10),
                    'associate_member_man_target' => rand(1, 10),

                    'associate_member_woman_previous' => rand(1, 10),
                    'associate_member_woman_present' => rand(1, 10),
                    'associate_member_woman_briddhi' => rand(1, 10),
                    'associate_member_woman_target' => rand(1, 10),

                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
