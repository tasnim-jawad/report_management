<?php

namespace Database\Seeders\Report\Ward\Rastrio;

use App\Models\Report\Ward\Rastrio\WardRastrio4ElectionActivity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardRastrio4ElectionActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardRastrio4ElectionActivity::truncate();
                $report_info_id = 121;
                for ($i = 1; $i <= 2; $i++) {
                    for ($j = 1; $j <= 12; $j++) {
                        WardRastrio4ElectionActivity::create([
                            'report_info_id' => $report_info_id,

                            'councilor_candidate' =>  rand(1, 10),
                            'councilor_candidate_elected' =>  rand(1, 10),
                            'councilor_candidate_second_position' =>  rand(1, 10),

                            'member_candidate' =>  rand(1, 10),
                            'member_candidate_elected' =>  rand(1, 10),
                            'member_candidate_second_position' =>  rand(1, 10),

                            'national_vote_kendro' =>  rand(1, 10),
                            'national_vote_kendro_increase' =>  rand(1, 10),
                            'national_vote_kendro_target' =>  rand(1, 10),

                            'local_vote_kendro' =>  rand(1, 10),
                            'local_vote_kendro_increase' =>  rand(1, 10),
                            'local_vote_kendro_target' =>  rand(1, 10),

                            'vote_kendro_committee' =>  rand(1, 10),
                            'vote_kendro_committee_increase' =>  rand(1, 10),
                            'vote_kendro_committee_target' =>  rand(1, 10),

                            'vote_kendro_vittik_unit' =>  rand(1, 10),
                            'vote_kendro_vittik_unit_increase' =>  rand(1, 10),
                            'vote_kendro_vittik_unit_target' =>  rand(1, 10),

                            'election_management_committee_meeting' =>  rand(1, 10),

                            'creator' => 6 + $i,
                            'status' => 1,
                        ]);
                        $report_info_id++;
                    }
                }
    }
}
