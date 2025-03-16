<?php

namespace Database\Seeders\Report\Dawat;

use App\Models\Report\Dawat\Dawat3GeneralProgramAndOthers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Dawat3GeneralProgramAndOthersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dawat3GeneralProgramAndOthers::truncate();
        $report_info_id = 1;
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                Dawat3GeneralProgramAndOthers::create([
                    'report_info_id' => $report_info_id,
                    'how_many_were_give_dawat' => rand(1, 10),
                    'how_many_associate_members_created' => rand(1, 10),
                    'creator' => 8 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
        // Dawat3GeneralProgramAndOthers::create([
        //     'how_many_were_give_dawat' => rand(1, 10),
        //     'how_many_associate_members_created' => rand(1, 10),
        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Dawat3GeneralProgramAndOthers::create([
        //     'how_many_were_give_dawat' => 30,
        //     // 'how_many_have_been_invited' => 65,
        //     'how_many_associate_members_created' => 35,
        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Dawat3GeneralProgramAndOthers::create([
        //     'how_many_were_give_dawat' => 30,
        //     // 'how_many_have_been_invited' => 40,
        //     'how_many_associate_members_created' => 12,
        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Dawat3GeneralProgramAndOthers::create([
        //     'how_many_were_give_dawat' => 20,
        //     // 'how_many_have_been_invited' => 15,
        //     'how_many_associate_members_created' => 5,
        //     'creator' => 3,
        //     'status' => 1,
        // ]);
    }
}
