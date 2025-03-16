<?php

namespace Database\Seeders\Report\Thana\Dawat;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Report\Thana\Dawat\ThanaDawat5Jonoshadharon;

class ThanaDawat5JonoshadharonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ThanaDawat5Jonoshadharon::truncate();
        $report_info_id = 145;
        for ($j = 1; $j <= 12; $j++) {
            ThanaDawat5Jonoshadharon::create([
                'report_info_id' => $report_info_id,
                'total_population' => rand(1, 10),
                'target' => rand(1, 20),

                'creator' => 5,
                'status' => 1,
            ]);
            $report_info_id++;
        
        }
    }
}
