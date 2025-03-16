<?php

namespace Database\Seeders\Report\Department;

use App\Models\Report\Department\Department5ParibarikDawat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Department5ParibarikDawatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department5ParibarikDawat::truncate();
        $report_info_id = 1;
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                Department5ParibarikDawat::create([
                    'report_info_id' => $report_info_id,
                    'total_attended_family' => rand(1, 10),
                    'how_many_new_family_invited' => rand(1, 10),
                    'creator' => 8 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
        // Department5ParibarikDawat::create([
        //     'total_attended_family' => rand(1, 10),
        //     'how_many_new_family_invited' => rand(1, 10),

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Department5ParibarikDawat::create([
        //     'total_attended_family' => 14,
        //     'how_many_new_family_invited' => 4,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Department5ParibarikDawat::create([
        //     'total_attended_family' => 15,
        //     'how_many_new_family_invited' => 5,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Department5ParibarikDawat::create([
        //     'total_attended_family' => 13,
        //     'how_many_new_family_invited' => 3,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
    }
}
