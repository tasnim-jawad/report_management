<?php

namespace Database\Seeders\Report\Ward\Department;

use App\Models\Report\Ward\Department\WardDepartment5ParibarikDawat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardDepartment5ParibarikDawatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardDepartment5ParibarikDawat::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardDepartment5ParibarikDawat::create([
                    'report_info_id' => $report_info_id,
                    'total_attended_family' => rand(1, 10),
                    'how_many_new_family_invited' => rand(1, 10),

                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
