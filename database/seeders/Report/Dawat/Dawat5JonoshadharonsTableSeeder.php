<?php

namespace Database\Seeders\Report\Dawat;

use App\Models\Report\Dawat\Dawat5Jonoshadharon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Dawat5JonoshadharonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dawat5Jonoshadharon::truncate();
        $report_info_id = 1;
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                Dawat5Jonoshadharon::create([
                    'report_info_id' => $report_info_id,
                    'jonoshadharon_dawat_target' => rand(1, 10),

                    'creator' => 8 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
