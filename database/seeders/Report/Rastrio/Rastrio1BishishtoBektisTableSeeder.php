<?php

namespace Database\Seeders\Report\Rastrio;

use App\Models\Report\Rastrio\Rastrio1BishishtoBekti;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Rastrio1BishishtoBektisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rastrio1BishishtoBekti::truncate();
        Rastrio1BishishtoBekti::create([
            'bishishto_bekti_jogajog' => 12,

            'creator' => 3,
            'status' => 1,
        ]);
        Rastrio1BishishtoBekti::create([
            'bishishto_bekti_jogajog' => 13,

            'creator' => 3,
            'status' => 1,
        ]);
        Rastrio1BishishtoBekti::create([
            'bishishto_bekti_jogajog' => 14,

            'creator' => 3,
            'status' => 1,
        ]);
        Rastrio1BishishtoBekti::create([
            'bishishto_bekti_jogajog' => 15,

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
