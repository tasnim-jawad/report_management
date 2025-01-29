<?php

namespace Database\Seeders\Report\Dawat;

use App\Models\Report\Dawat\Dawat2PersonalAndTarget;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Dawat2PersonalAndTargetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dawat2PersonalAndTarget::truncate();
        $report_info_id = 1;
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                Dawat2PersonalAndTarget::create([
                    'report_info_id' => $report_info_id,
                    'total_rokon' => rand(1, 10),
                    'total_worker' => rand(1, 10),
                    'how_many_were_give_dawat_rokon' => rand(1, 10),
                    'how_many_were_give_dawat_worker' => rand(1, 10),
                    'how_many_have_been_invited' => rand(1, 10),
                    'how_many_associate_members_created' => rand(1, 10),
                    'creator' => 8 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
        // Dawat2PersonalAndTarget::create([
        //     'total_rokon' => rand(1, 10),
        //     'total_worker' => rand(1, 10),
        //     'how_many_were_give_dawat_rokon' => rand(1, 10),
        //     'how_many_were_give_dawat_worker' => rand(1, 10),
        //     'how_many_have_been_invited' => rand(1, 10),
        //     'how_many_associate_members_created' => rand(1, 10),
        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Dawat2PersonalAndTarget::create([
        //     'total_rokon' => 3,
        //     'total_worker' => 40,
        //     'how_many_were_give_dawat_rokon' => 7,
        //     'how_many_were_give_dawat_worker' => 17,
        //     'how_many_have_been_invited' => 65,
        //     'how_many_associate_members_created' => 35,
        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Dawat2PersonalAndTarget::create([
        //     'total_rokon' => 4,
        //     'total_worker' => 30,
        //     'how_many_were_give_dawat_rokon' => 4,
        //     'how_many_were_give_dawat_worker' => 14,
        //     'how_many_have_been_invited' => 40,
        //     'how_many_associate_members_created' => 12,
        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Dawat2PersonalAndTarget::create([
        //     'total_rokon' => 2,
        //     'total_worker' => 24,
        //     'how_many_were_give_dawat_rokon' => 4,
        //     'how_many_were_give_dawat_worker' => 14,
        //     'how_many_have_been_invited' => 15,
        //     'how_many_associate_members_created' => 5,
        //     'creator' => 3,
        //     'status' => 1,
        // ]);
    }
}
