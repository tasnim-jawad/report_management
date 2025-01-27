<?php

namespace Database\Seeders\Report\Thana\Dawat;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThanaDawat4GonoSongjogAndDawatOvijansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardDawat4GonoSongjogAndDawatOvijan::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardDawat4GonoSongjogAndDawatOvijan::create([
                    'report_info_id' => $report_info_id,
                    
                    'total_gono_songjog_group_man' => rand(1, 10),
                    'total_attended_man' => rand(1, 10),
                    'how_many_have_been_invited_man' => rand(1, 10),
                    'how_many_associate_members_created_man' => rand(1, 10),

                    'total_gono_songjog_group_woman' => rand(1, 10),
                    'total_attended_woman' => rand(1, 10),
                    'how_many_have_been_invited_woman' => rand(1, 10),
                    'how_many_associate_members_created_woman' => rand(1, 10),

                    'jela_mohanogor_declared_gonosonjog_group' => rand(1, 10),
                    'jela_mohanogor_declared_gonosonjog_attended' => rand(1, 10),
                    'jela_mohanogor_declared_gonosonjog_invited' => rand(1, 10),
                    'jela_mohanogor_declared_gonosonjog_associated_created' => rand(1, 10),

                    'election_gono_songjog_group_man' => rand(1, 10),
                    'election_attended_man' => rand(1, 10),
                    'election_how_many_have_been_invited_man' => rand(1, 10),
                    'election_how_many_associate_members_created_man' => rand(1, 10),
                    
                    'election_gono_songjog_group_woman' => rand(1, 10),
                    'election_attended_woman' => rand(1, 10),
                    'election_how_many_have_been_invited_woman' => rand(1, 10),
                    'election_how_many_associate_members_created_woman' => rand(1, 10),

                    'ulama_peshajibi_gono_songjog_group_man' => rand(1, 10),
                    'ulama_peshajibi_attended_man' => rand(1, 10),
                    'ulama_peshajibi_how_many_have_been_invited_man' => rand(1, 10),
                    'ulama_peshajibi_how_many_associate_members_created_man' => rand(1, 10),

                    'ulama_peshajibi_gono_songjog_group_woman' => rand(1, 10),
                    'ulama_peshajibi_attended_woman' => rand(1, 10),
                    'ulama_peshajibi_how_many_have_been_invited_woman' => rand(1, 10),
                    'ulama_peshajibi_how_many_associate_members_created_woman' => rand(1, 10),

                    'other_gono_songjog_group' => rand(1, 10),
                    'other_attended' => rand(1, 10),
                    'other_how_many_have_been_invited' => rand(1, 10),
                    'other_how_many_associate_members_created' => rand(1, 10),

                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
