<?php

namespace Database\Seeders\Report\Ward\Montobbo;

use App\Models\Report\Ward\Montobbo\WardMontobbo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardMontobbosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardMontobbo::truncate();
                $report_info_id = 121;
                for ($i = 1; $i <= 2; $i++) {
                    for ($j = 1; $j <= 12; $j++) {
                        WardMontobbo::create([
                            'report_info_id' => $report_info_id,
                            'montobbo' => "montobbo from ward number ". $i ." and montobbo number ".$report_info_id,

                            'creator' => 6 + $i,
                            'status' => 1,
                        ]);
                        $report_info_id++;
                    }
                }
    }
}
