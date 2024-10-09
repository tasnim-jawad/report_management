<?php

namespace Database\Seeders\Report\Ward\Shomajsheba;

use App\Models\Report\Ward\Shomajsheba\WardShomajsheba4InstitutionalSocialWork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardShomajsheba4InstitutionalSocialWorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardShomajsheba4InstitutionalSocialWork::truncate();
                $report_info_id = 121;
                for ($i = 1; $i <= 2; $i++) {
                    for ($j = 1; $j <= 12; $j++) {
                        WardShomajsheba4InstitutionalSocialWork::create([
                            'report_info_id' => $report_info_id,

                            'shamajik_protishthan_kototi' =>  rand(1, 10),
                            'shamajik_protishthan_kototite_kaj_hoyeche' =>  rand(1, 10),
                            'new_shamajik_protishthan' =>  rand(1, 10),

                            'creator' => 6 + $i,
                            'status' => 1,
                        ]);
                        $report_info_id++;
                    }
                }
    }
}
