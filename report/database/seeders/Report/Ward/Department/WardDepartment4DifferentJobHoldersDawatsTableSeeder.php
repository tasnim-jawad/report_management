<?php

namespace Database\Seeders\Report\Ward\Department;

use App\Models\Report\Ward\Department\WardDepartment4DifferentJobHoldersDawat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardDepartment4DifferentJobHoldersDawatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardDepartment4DifferentJobHoldersDawat::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardDepartment4DifferentJobHoldersDawat::create([
                    'report_info_id' => $report_info_id,
                    'political_and_special_invited' => rand(1, 10),
                    'political_and_special_been_associated' => rand(1, 10),
                    'political_and_special_target' => rand(1, 10),

                    'pesha_jibi_invited' => rand(1, 10),
                    'pesha_jibi_been_associated' => rand(1, 10),
                    'pesha_jibi_target' => rand(1, 10),

                    'olama_masayekh_invited' => rand(1, 10),
                    'olama_masayekh_been_associated' => rand(1, 10),
                    'olama_masayekh_target' => rand(1, 10),

                    'sromo_jibi_invited' => rand(1, 10),
                    'sromo_jibi_been_associated' => rand(1, 10),
                    'sromo_jibi_target' => rand(1, 10),

                    'prantik_jonogosti_invited' => rand(1, 10),
                    'prantik_jonogosti_been_associated' => rand(1, 10),
                    'prantik_jonogosti_target' => rand(1, 10),

                    'vinno_dormalombi_invited' => rand(1, 10),
                    'vinno_dormalombi_been_associated' => rand(1, 10),
                    'vinno_dormalombi_target' => rand(1, 10),

                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
