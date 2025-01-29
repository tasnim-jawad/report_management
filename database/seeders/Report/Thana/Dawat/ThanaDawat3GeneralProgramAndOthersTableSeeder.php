<?php

namespace Database\Seeders\Report\Thana\Dawat;

use App\Models\Report\Thana\Dawat\ThanaDawat3GeneralProgramAndOthers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThanaDawat3GeneralProgramAndOthersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ThanaDawat3GeneralProgramAndOthers::truncate();
        $report_info_id = 145;
        
        for ($j = 1; $j <= 12; $j++) {
            ThanaDawat3GeneralProgramAndOthers::create([
                'report_info_id' => $report_info_id,
                'how_many_were_give_dawat_woman' => rand(1, 10),
                'how_many_were_give_dawat_woman' => rand(1, 10),
                'how_many_associate_members_created_woman' => rand(1, 10),
                'how_many_associate_members_created_woman' => rand(1, 10),
                'creator' => 5,
                'status' => 1,
            ]);
            $report_info_id++;
            
        }
    }
}
