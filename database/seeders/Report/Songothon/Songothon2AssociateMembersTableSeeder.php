<?php

namespace Database\Seeders\Report\Songothon;

use App\Models\Report\Songothon\Songothon2AssociateMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Songothon2AssociateMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Songothon2AssociateMember::truncate();
        $report_info_id = 1;
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                Songothon2AssociateMember::create([
                    'report_info_id' => $report_info_id,
                    'associate_member_previous' => rand(1, 10),
                    'associate_member_present' => rand(1, 10),
                    'associate_member_briddhi' => rand(1, 10),
                    'associate_member_target' => rand(1, 10),

                    'vinno_dormalombi_worker_previous' => rand(1, 10),
                    'vinno_dormalombi_worker_present' => rand(1, 10),
                    'vinno_dormalombi_worker_briddhi' => rand(1, 10),
                    'vinno_dormalombi_worker_target' => rand(1, 10),

                    'vinno_dormalombi_associate_member_previous' => rand(1, 10),
                    'vinno_dormalombi_associate_member_present' => rand(1, 10),
                    'vinno_dormalombi_associate_member_briddhi' => rand(1, 10),
                    'vinno_dormalombi_associate_member_target' => rand(1, 10),
                    'creator' => 8 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
        // Songothon2AssociateMember::create([
        //     'associate_member_previous' => rand(1, 10),
        //     'associate_member_present' => rand(1, 10),
        //     'associate_member_briddhi' => rand(1, 10),
        //     'associate_member_target' => rand(1, 10),

        //     'vinno_dormalombi_worker_previous' => rand(1, 10),
        //     'vinno_dormalombi_worker_present' => rand(1, 10),
        //     'vinno_dormalombi_worker_briddhi' => rand(1, 10),
        //     'vinno_dormalombi_worker_target' => rand(1, 10),

        //     'vinno_dormalombi_associate_member_previous' => rand(1, 10),
        //     'vinno_dormalombi_associate_member_present' => rand(1, 10),
        //     'vinno_dormalombi_associate_member_briddhi' => rand(1, 10),
        //     'vinno_dormalombi_associate_member_target' => rand(1, 10),

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Songothon2AssociateMember::create([
        //     'associate_member_previous' => 14,
        //     'associate_member_present' => 44,
        //     'associate_member_briddhi' => 14,
        //     'associate_member_target' => 4,

        //     'vinno_dormalombi_worker_previous' => 44,
        //     'vinno_dormalombi_worker_present' => 44,
        //     'vinno_dormalombi_worker_briddhi' => 45,
        //     'vinno_dormalombi_worker_target' => 44,

        //     'vinno_dormalombi_associate_member_previous' => 43,
        //     'vinno_dormalombi_associate_member_present' => 43,
        //     'vinno_dormalombi_associate_member_briddhi' => 45,
        //     'vinno_dormalombi_associate_member_target' => 47,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Songothon2AssociateMember::create([
        //     'associate_member_previous' => 13,
        //     'associate_member_present' => 34,
        //     'associate_member_briddhi' => 13,
        //     'associate_member_target' => 3,

        //     'vinno_dormalombi_worker_previous' => 33,
        //     'vinno_dormalombi_worker_present' => 34,
        //     'vinno_dormalombi_worker_briddhi' => 35,
        //     'vinno_dormalombi_worker_target' => 34,

        //     'vinno_dormalombi_associate_member_previous' => 33,
        //     'vinno_dormalombi_associate_member_present' => 33,
        //     'vinno_dormalombi_associate_member_briddhi' => 35,
        //     'vinno_dormalombi_associate_member_target' => 37,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Songothon2AssociateMember::create([
        //     'associate_member_previous' => 15,
        //     'associate_member_present' => 54,
        //     'associate_member_briddhi' => 15,
        //     'associate_member_target' => 5,

        //     'vinno_dormalombi_worker_previous' => 55,
        //     'vinno_dormalombi_worker_present' => 54,
        //     'vinno_dormalombi_worker_briddhi' => 55,
        //     'vinno_dormalombi_worker_target' => 54,

        //     'vinno_dormalombi_associate_member_previous' => 53,
        //     'vinno_dormalombi_associate_member_present' => 53,
        //     'vinno_dormalombi_associate_member_briddhi' => 55,
        //     'vinno_dormalombi_associate_member_target' => 57,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
    }
}
