<?php

namespace Database\Seeders\Report\Proshikkhon;

use App\Models\Report\Proshikkhon\Proshikkhon1Tarbiat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Proshikkhon1TarbiatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proshikkhon1Tarbiat::truncate();
        Proshikkhon1Tarbiat::create([
            'tarbiati_boithok_total' => 12,
            'tarbiati_boithok_target' => 22,
            'tarbiati_boithok_uposthiti' => 42,

            'creator' => 3,
            'status' => 1,
        ]);
        Proshikkhon1Tarbiat::create([
            'tarbiati_boithok_total' => 13,
            'tarbiati_boithok_target' => 33,
            'tarbiati_boithok_uposthiti' => 43,

            'creator' => 3,
            'status' => 1,
        ]);
        Proshikkhon1Tarbiat::create([
            'tarbiati_boithok_total' => 14,
            'tarbiati_boithok_target' => 44,
            'tarbiati_boithok_uposthiti' => 44,

            'creator' => 3,
            'status' => 1,
        ]);
        Proshikkhon1Tarbiat::create([
            'tarbiati_boithok_total' => 15,
            'tarbiati_boithok_target' => 55,
            'tarbiati_boithok_uposthiti' => 45,

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
