<?php

namespace Database\Seeders\Report\Ward\Proshikkhon;

use App\Models\Report\Ward\Proshikkhon\WardProshikkhon2ManobShompodUnnoyon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardProshikkhon2ManobShompodUnnoyonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardProshikkhon2ManobShompodUnnoyon::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardProshikkhon2ManobShompodUnnoyon::create([
                    'report_info_id' => $report_info_id,

                    'dawah_uposthiti' =>  rand(1, 10),
                    'shomajkormo_uposthiti' =>  rand(1, 10),
                    'media_uposthiti' =>  rand(1, 10),

                    'ict_uposthiti' =>  rand(1, 10),
                    'office_uposthiti' =>  rand(1, 10),
                    'financial_management_uposthiti' =>  rand(1, 10),
                    'english_language_uposthiti' =>  rand(1, 10),
                    'arabic_language_uposthiti' =>  rand(1, 10),

                    'trade_oriented_technical_training_uposthiti' =>  rand(1, 10),

                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
