<?php

namespace Database\Seeders\Report\Ward\Songothon;

use App\Models\Report\Ward\Songothon\WardSongothon3DepartmentalInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardSongothon3DepartmentalInformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardSongothon3DepartmentalInformation::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardSongothon3DepartmentalInformation::create([
                    'report_info_id' => $report_info_id,
                    'women_rokon_previous' => rand(1, 10),
                    'women_rokon_present' => rand(1, 10),
                    'women_rokon_increase' => rand(1, 10),
                    'women_rokon_gatti' => rand(1, 10),
                    'women_rokon_target' => rand(1, 10),

                    'women_kormi_previous' => rand(1, 10),
                    'women_kormi_present' => rand(1, 10),
                    'women_kormi_increase' => rand(1, 10),
                    'women_kormi_gatti' => rand(1, 10),
                    'women_kormi_target' => rand(1, 10),

                    'women_associate_member_previous' => rand(1, 10),
                    'women_associate_member_present' => rand(1, 10),
                    'women_associate_member_increase' => rand(1, 10),
                    'women_associate_member_gatti' => rand(1, 10),
                    'women_associate_member_target' => rand(1, 10),

                    'sromojibi_rokon_previous' => rand(1, 10),
                    'sromojibi_rokon_present' => rand(1, 10),
                    'sromojibi_rokon_increase' => rand(1, 10),
                    'sromojibi_rokon_gatti' => rand(1, 10),
                    'sromojibi_rokon_target' => rand(1, 10),

                    'sromojibi_kormi_previous' => rand(1, 10),
                    'sromojibi_kormi_present' => rand(1, 10),
                    'sromojibi_kormi_increase' => rand(1, 10),
                    'sromojibi_kormi_gatti' => rand(1, 10),
                    'sromojibi_kormi_target' => rand(1, 10),

                    'sromojibi_associate_member_previous' => rand(1, 10),
                    'sromojibi_associate_member_present' => rand(1, 10),
                    'sromojibi_associate_member_increase' => rand(1, 10),
                    'sromojibi_associate_member_gatti' => rand(1, 10),
                    'sromojibi_associate_member_target' => rand(1, 10),

                    'ulama_rokon_previous' => rand(1, 10),
                    'ulama_rokon_present' => rand(1, 10),
                    'ulama_rokon_increase' => rand(1, 10),
                    'ulama_rokon_gatti' => rand(1, 10),
                    'ulama_rokon_target' => rand(1, 10),

                    'ulama_kormi_previous' => rand(1, 10),
                    'ulama_kormi_present' => rand(1, 10),
                    'ulama_kormi_increase' => rand(1, 10),
                    'ulama_kormi_gatti' => rand(1, 10),
                    'ulama_kormi_target' => rand(1, 10),

                    'ulama_associate_member_previous' => rand(1, 10),
                    'ulama_associate_member_present' => rand(1, 10),
                    'ulama_associate_member_increase' => rand(1, 10),
                    'ulama_associate_member_gatti' => rand(1, 10),
                    'ulama_associate_member_target' => rand(1, 10),

                    'pesha_jibi_rokon_previous' => rand(1, 10),
                    'pesha_jibi_rokon_present' => rand(1, 10),
                    'pesha_jibi_rokon_increase' => rand(1, 10),
                    'pesha_jibi_rokon_gatti' => rand(1, 10),
                    'pesha_jibi_rokon_target' => rand(1, 10),

                    'pesha_jibi_kormi_previous' => rand(1, 10),
                    'pesha_jibi_kormi_present' => rand(1, 10),
                    'pesha_jibi_kormi_increase' => rand(1, 10),
                    'pesha_jibi_kormi_gatti' => rand(1, 10),
                    'pesha_jibi_kormi_target' => rand(1, 10),

                    'pesha_jibi_associate_member_previous' => rand(1, 10),
                    'pesha_jibi_associate_member_present' => rand(1, 10),
                    'pesha_jibi_associate_member_increase' => rand(1, 10),
                    'pesha_jibi_associate_member_gatti' => rand(1, 10),
                    'pesha_jibi_associate_member_target' => rand(1, 10),

                    'jubo_rokon_previous' => rand(1, 10),
                    'jubo_rokon_present' => rand(1, 10),
                    'jubo_rokon_increase' => rand(1, 10),
                    'jubo_rokon_gatti' => rand(1, 10),
                    'jubo_rokon_target' => rand(1, 10),

                    'jubo_kormi_previous' => rand(1, 10),
                    'jubo_kormi_present' => rand(1, 10),
                    'jubo_kormi_increase' => rand(1, 10),
                    'jubo_kormi_gatti' => rand(1, 10),
                    'jubo_kormi_target' => rand(1, 10),

                    'jubo_associate_member_previous' => rand(1, 10),
                    'jubo_associate_member_present' => rand(1, 10),
                    'jubo_associate_member_increase' => rand(1, 10),
                    'jubo_associate_member_gatti' => rand(1, 10),
                    'jubo_associate_member_target' => rand(1, 10),

                    'vinno_dormalombi_kormi_previous' => rand(1, 10),
                    'vinno_dormalombi_kormi_present' => rand(1, 10),
                    'vinno_dormalombi_kormi_increase' => rand(1, 10),
                    'vinno_dormalombi_kormi_gatti' => rand(1, 10),
                    'vinno_dormalombi_kormi_target' => rand(1, 10),

                    'vinno_dormalombi_associate_member_previous' => rand(1, 10),
                    'vinno_dormalombi_associate_member_present' => rand(1, 10),
                    'vinno_dormalombi_associate_member_increase' => rand(1, 10),
                    'vinno_dormalombi_associate_member_gatti' => rand(1, 10),
                    'vinno_dormalombi_associate_member_target' => rand(1, 10),

                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
