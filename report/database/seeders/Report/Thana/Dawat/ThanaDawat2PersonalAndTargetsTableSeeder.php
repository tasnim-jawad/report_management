<?php

namespace Database\Seeders\Report\Thana\Dawat;

use App\Models\Report\Thana\Dawat\ThanaDawat2PersonalAndTarget;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThanaDawat2PersonalAndTargetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ThanaDawat2PersonalAndTarget::truncate();
        $report_info_id = 145;
        for ($j = 1; $j <= 12; $j++) {
            ThanaDawat2PersonalAndTarget::create([
                'report_info_id' => $report_info_id,
                'total_rokon_man' => rand(1, 10),
                'total_worker_man' => rand(1, 10),
                'total_rokon_woman' => rand(1, 10),
                'total_worker_woman' => rand(1, 10),

                'how_many_were_give_dawat_rokon_man' => rand(1, 10),
                'how_many_were_give_dawat_worker_man' => rand(1, 10),
                'how_many_were_give_dawat_rokon_woman' => rand(1, 10),
                'how_many_were_give_dawat_worker_woman' => rand(1, 10),

                'how_many_have_been_invited_man' => rand(1, 10),
                'how_many_have_been_invited_woman' => rand(1, 10),
                'how_many_associate_members_created_man' => rand(1, 10),
                'how_many_associate_members_created_woman' => rand(1, 10),
                'creator' => 5,
                'status' => 1,
            ]);
            $report_info_id++;
            
        }
    }
}
