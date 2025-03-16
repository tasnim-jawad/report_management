<?php

namespace Database\Seeders\Report\Ward\Dawat;

use App\Models\Report\Ward\Dawat\WardDawat3GeneralProgramAndOthers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardDawat3GeneralProgramAndOthersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardDawat3GeneralProgramAndOthers::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardDawat3GeneralProgramAndOthers::create([
                    'report_info_id' => $report_info_id,
                    'how_many_were_give_dawat' => rand(1, 10),
                    'how_many_associate_members_created' => rand(1, 10),
                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
