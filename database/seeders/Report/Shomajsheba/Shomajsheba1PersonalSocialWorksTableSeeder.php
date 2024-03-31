<?php

namespace Database\Seeders\Report\Shomajsheba;

use App\Models\Report\Shomajsheba\Shomajsheba1PersonalSocialWork;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Shomajsheba1PersonalSocialWorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shomajsheba1PersonalSocialWork::truncate();
        Shomajsheba1PersonalSocialWork::create([
            'how_many_people_did' => 12,
            'service_received_total' => 20,

            'creator' => 3,
            'status' => 1,
        ]);
        Shomajsheba1PersonalSocialWork::create([
            'how_many_people_did' => 13,
            'service_received_total' => 30,

            'creator' => 3,
            'status' => 1,
        ]);
        Shomajsheba1PersonalSocialWork::create([
            'how_many_people_did' => 14,
            'service_received_total' => 40,

            'creator' => 3,
            'status' => 1,
        ]);
        Shomajsheba1PersonalSocialWork::create([
            'how_many_people_did' => 15,
            'service_received_total' => 50,

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
