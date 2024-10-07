<?php

namespace Database\Seeders\Report\Ward\Department;

use App\Models\Report\Ward\Department\WardDepartment3JuboSomajDawat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardDepartment3JuboSomajDawatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardDepartment3JuboSomajDawat::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardDepartment3JuboSomajDawat::create([
                    'report_info_id' => $report_info_id,
                    'how_many_young_been_invited' => rand(1, 10),
                    'how_many_young_been_associated' => rand(1, 10),

                    'total_young_committee' => rand(1, 10),
                    'total_young_committee_increased' => rand(1, 10),

                    'total_new_club' => rand(1, 10),
                    'total_new_club_increased' => rand(1, 10),

                    'stablished_club_total_invited' => rand(1, 10),
                    'stablished_club_total_increased' => rand(1, 10),

                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
