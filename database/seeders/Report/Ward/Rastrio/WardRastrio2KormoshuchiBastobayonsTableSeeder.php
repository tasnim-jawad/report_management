<?php

namespace Database\Seeders\Report\Ward\Rastrio;

use App\Models\Report\Ward\Rastrio\WardRastrio2KormoshuchiBastobayon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardRastrio2KormoshuchiBastobayonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardRastrio2KormoshuchiBastobayon::truncate();
                $report_info_id = 121;
                for ($i = 1; $i <= 2; $i++) {
                    for ($j = 1; $j <= 12; $j++) {
                        WardRastrio2KormoshuchiBastobayon::create([
                            'report_info_id' => $report_info_id,

                            'centrally_announced_political_program' =>  rand(1, 10),
                            'centrally_announced_political_program_attend' =>  rand(1, 10),

                            'locally_announced_jonoshova' =>  rand(1, 10),
                            'locally_announced_jonoshova_attend' =>  rand(1, 10),

                            'locally_announced_shomabesh' =>  rand(1, 10),
                            'locally_announced_shomabesh_attend' =>  rand(1, 10),

                            'locally_announced_michil' =>  rand(1, 10),
                            'locally_announced_michil_attend' =>  rand(1, 10),

                            'poster_bitoron' =>  rand(1, 10),
                            'leaflet_bitoron' =>  rand(1, 10),
                            'booklet_bitoron' =>  rand(1, 10),
                            'sharoklipi_bitoron' =>  rand(1, 10),
                            'others' =>  rand(1, 10),

                            'creator' => 6 + $i,
                            'status' => 1,
                        ]);
                        $report_info_id++;
                    }
                }
    }
}
