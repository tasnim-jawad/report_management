<?php

namespace Database\Seeders\Report\Ward\Dawat;

use App\Models\Report\Ward\Dawat\WardDawat2PersonalAndTarget;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardDawat2PersonalAndTargetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardDawat2PersonalAndTarget::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardDawat2PersonalAndTarget::create([
                    'report_info_id' => $report_info_id,
                    'total_rokon' => rand(1, 10),
                    'total_worker' => rand(1, 10),
                    'how_many_were_give_dawat_rokon' => rand(1, 10),
                    'how_many_were_give_dawat_worker' => rand(1, 10),
                    'how_many_have_been_invited' => rand(1, 10),
                    'how_many_associate_members_created' => rand(1, 10),
                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
