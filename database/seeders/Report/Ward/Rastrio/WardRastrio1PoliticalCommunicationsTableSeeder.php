<?php

namespace Database\Seeders\Report\Ward\Rastrio;

use App\Models\Report\Ward\Rastrio\WardRastrio1PoliticalCommunication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardRastrio1PoliticalCommunicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardRastrio1PoliticalCommunication::truncate();
                $report_info_id = 121;
                for ($i = 1; $i <= 2; $i++) {
                    for ($j = 1; $j <= 12; $j++) {
                        WardRastrio1PoliticalCommunication::create([
                            'report_info_id' => $report_info_id,

                            'rajnoitik_bekti_jogajog_koreche_kotojon' =>  rand(1, 10),
                            'rajnoitik_bekti_jogajog_koreche_kotojonke' =>  rand(1, 10),

                            'proshoshonik_bekti_jogajog_koreche_kotojon' =>  rand(1, 10),
                            'proshoshonik_bekti_jogajog_koreche_kotojonke' =>  rand(1, 10),

                            'creator' => 6 + $i,
                            'status' => 1,
                        ]);
                        $report_info_id++;
                    }
                }
    }
}
