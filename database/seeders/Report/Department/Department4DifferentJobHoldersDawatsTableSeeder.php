<?php

namespace Database\Seeders\Report\Department;

use App\Models\Report\Department\Department4DifferentJobHoldersDawat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Department4DifferentJobHoldersDawatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department4DifferentJobHoldersDawat::truncate();
        $report_info_id = 1;
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                Department4DifferentJobHoldersDawat::create([
                    'report_info_id' => $report_info_id,
                    'political_and_special_invited' => rand(1, 10),
                    'political_and_special_been_associated' => rand(1, 10),
                    'political_and_special_target' => rand(1, 10),

                    'prantik_jonogosti_invited' => rand(1, 10),
                    'prantik_jonogosti_been_associated' => rand(1, 10),
                    'prantik_jonogosti_target' => rand(1, 10),

                    'vinno_dormalombi_invited' => rand(1, 10),
                    'vinno_dormalombi_been_associated' => rand(1, 10),
                    'vinno_dormalombi_target' => rand(1, 10),
                    'creator' => 8 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
        // Department4DifferentJobHoldersDawat::create([
        //     'political_and_special_invited' => rand(1, 10),
        //     'political_and_special_been_associated' => rand(1, 10),
        //     'political_and_special_target' => rand(1, 10),

        //     'prantik_jonogosti_invited' => rand(1, 10),
        //     'prantik_jonogosti_been_associated' => rand(1, 10),
        //     'prantik_jonogosti_target' => rand(1, 10),

        //     'vinno_dormalombi_invited' => rand(1, 10),
        //     'vinno_dormalombi_been_associated' => rand(1, 10),
        //     'vinno_dormalombi_target' => rand(1, 10),

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Department4DifferentJobHoldersDawat::create([
        //     'political_and_special_invited' => 33,
        //     'political_and_special_been_associated' => 13,
        //     'political_and_special_target' => 33,

        //     // 'pesha_jibi_invited' => 35,
        //     // 'pesha_jibi_been_associated' => 30,
        //     // 'pesha_jibi_target' => 43,

        //     // 'olama_masayekh_invited' => 39,
        //     // 'olama_masayekh_been_associated' => 31,
        //     // 'olama_masayekh_target' => 53,

        //     // 'kormo_jibi_mohila_invited' => 38,
        //     // 'kormo_jibi_mohila_been_associated' => 33,
        //     // 'kormo_jibi_mohila_target' => 33,

        //     // 'sromo_jibi_invited' => 37,
        //     // 'sromo_jibi_been_associated' => 13,
        //     // 'sromo_jibi_target' => 63,

        //     // 'media_kormi_invited' => 36,
        //     // 'media_kormi_been_associated' => 33,
        //     // 'media_kormi_target' => 53,

        //     'prantik_jonogosti_invited' => 35,
        //     'prantik_jonogosti_been_associated' => 31,
        //     'prantik_jonogosti_target' => 43,

        //     'vinno_dormalombi_invited' => 34,
        //     'vinno_dormalombi_been_associated' => 30,
        //     'vinno_dormalombi_target' => 53,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Department4DifferentJobHoldersDawat::create([
        //     'political_and_special_invited' => 43,
        //     'political_and_special_been_associated' => 14,
        //     'political_and_special_target' => 34,

        //     // 'pesha_jibi_invited' => 45,
        //     // 'pesha_jibi_been_associated' => 40,
        //     // 'pesha_jibi_target' => 44,

        //     // 'olama_masayekh_invited' => 49,
        //     // 'olama_masayekh_been_associated' => 41,
        //     // 'olama_masayekh_target' => 54,

        //     // 'kormo_jibi_mohila_invited' => 48,
        //     // 'kormo_jibi_mohila_been_associated' => 44,
        //     // 'kormo_jibi_mohila_target' => 44,

        //     // 'sromo_jibi_invited' => 47,
        //     // 'sromo_jibi_been_associated' => 14,
        //     // 'sromo_jibi_target' => 64,

        //     // 'media_kormi_invited' => 46,
        //     // 'media_kormi_been_associated' => 43,
        //     // 'media_kormi_target' => 54,

        //     'prantik_jonogosti_invited' => 45,
        //     'prantik_jonogosti_been_associated' => 41,
        //     'prantik_jonogosti_target' => 44,

        //     'vinno_dormalombi_invited' => 44,
        //     'vinno_dormalombi_been_associated' => 40,
        //     'vinno_dormalombi_target' => 54,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Department4DifferentJobHoldersDawat::create([
        //     'political_and_special_invited' => 53,
        //     'political_and_special_been_associated' => 15,
        //     'political_and_special_target' => 35,

        //     // 'pesha_jibi_invited' => 55,
        //     // 'pesha_jibi_been_associated' => 50,
        //     // 'pesha_jibi_target' => 45,

        //     // 'olama_masayekh_invited' => 59,
        //     // 'olama_masayekh_been_associated' => 51,
        //     // 'olama_masayekh_target' => 55,

        //     // 'kormo_jibi_mohila_invited' => 58,
        //     // 'kormo_jibi_mohila_been_associated' => 55,
        //     // 'kormo_jibi_mohila_target' => 55,

        //     // 'sromo_jibi_invited' => 57,
        //     // 'sromo_jibi_been_associated' => 15,
        //     // 'sromo_jibi_target' => 65,

        //     // 'media_kormi_invited' => 56,
        //     // 'media_kormi_been_associated' => 53,
        //     // 'media_kormi_target' => 55,

        //     'prantik_jonogosti_invited' => 55,
        //     'prantik_jonogosti_been_associated' => 51,
        //     'prantik_jonogosti_target' => 45,

        //     'vinno_dormalombi_invited' => 54,
        //     'vinno_dormalombi_been_associated' => 50,
        //     'vinno_dormalombi_target' => 55,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
    }
}
