<?php

namespace Database\Seeders\Report\Montobbo;

use App\Models\Report\Montobbo\Montobbo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MontobbosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Montobbo::truncate();
        $report_info_id = 1;
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                Montobbo::create([
                    'report_info_id' => $report_info_id,
                    'montobbo' => "montobbo from unit number ". $i ." and montobbo number ".$report_info_id,

                    'creator' => 8 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
