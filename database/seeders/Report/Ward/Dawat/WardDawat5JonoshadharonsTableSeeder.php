<?php

namespace Database\Seeders\Report\Ward\Dawat;

use App\Models\Report\Ward\Dawat\WardDawat5Jonoshadharon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardDawat5JonoshadharonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardDawat5Jonoshadharon::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardDawat5Jonoshadharon::create([
                    'report_info_id' => $report_info_id,
                    'total_population' => rand(1, 10),

                    'creator' => 8 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
