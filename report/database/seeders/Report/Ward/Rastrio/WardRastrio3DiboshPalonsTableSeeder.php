<?php

namespace Database\Seeders\Report\Ward\Rastrio;

use App\Models\Report\Ward\Rastrio\WardRastrio3DiboshPalon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardRastrio3DiboshPalonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardRastrio3DiboshPalon::truncate();
                $report_info_id = 121;
                for ($i = 1; $i <= 2; $i++) {
                    for ($j = 1; $j <= 12; $j++) {
                        WardRastrio3DiboshPalon::create([
                            'report_info_id' => $report_info_id,

                            'shadhinota_o_jatio_dibosh_total_programs' =>  rand(1, 10),
                            'shadhinota_o_jatio_dibosh_attend' =>  rand(1, 10),

                            'bijoy_dibosh_total_programs' =>  rand(1, 10),
                            'bijoy_dibosh_attend' =>  rand(1, 10),

                            'mattrivasha_dibosh_total_programs' =>  rand(1, 10),
                            'mattrivasha_dibosh_attend' =>  rand(1, 10),

                            'others_total_programs' =>  rand(1, 10),
                            'others_attend' =>  rand(1, 10),

                            'creator' => 6 + $i,
                            'status' => 1,
                        ]);
                        $report_info_id++;
                    }
                }
    }
}
