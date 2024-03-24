<?php

namespace Database\Seeders\Report\Dawat;

use App\Models\Report\Dawat\Dawat4GonoSongjogAndDawatOvijan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Dawat4GonoSongjogAndDawatOvijansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dawat4GonoSongjogAndDawatOvijan::truncate();
        Dawat4GonoSongjogAndDawatOvijan::create([
            'total_gono_songjog_group' => 20,
            'total_attended' => 24,
            'how_many_have_been_invited' => 52,
            'how_many_associate_members_created' => 20,

            'jela_mohanogor_delared_gonosonjog_group' => 32,
            'jela_mohanogor_delared_gonosonjog_attended' => 42,
            'jela_mohanogor_delared_gonosonjog_invited' => 82,
            'jela_mohanogor_delared_gonosonjog_associated_created' => 102,

            'election_gono_songjog_group' => 25,
            'election_attended' => 52,
            'election_how_many_have_been_invited' => 32,
            'election_how_many_associate_members_created' => 62,

            'olama_gono_songjog_group' => 42,
            'olama_attended' => 52,
            'olama_how_many_have_been_invited' => 72,
            'olama_how_many_associate_members_created' => 32,

            'other_gono_songjog_group' => 27,
            'other_attended' => 24,
            'other_how_many_have_been_invited' => 23,
            'other_how_many_associate_members_created' => 13,

            'creator' => 'ahid',
            'status' => 1,
        ]);
        Dawat4GonoSongjogAndDawatOvijan::create([
            'total_gono_songjog_group' => 30,
            'total_attended' => 14,
            'how_many_have_been_invited' => 51,
            'how_many_associate_members_created' => 10,

            'jela_mohanogor_delared_gonosonjog_group' => 31,
            'jela_mohanogor_delared_gonosonjog_attended' => 41,
            'jela_mohanogor_delared_gonosonjog_invited' => 81,
            'jela_mohanogor_delared_gonosonjog_associated_created' => 101,

            'election_gono_songjog_group' => 15,
            'election_attended' => 51,
            'election_how_many_have_been_invited' => 31,
            'election_how_many_associate_members_created' => 61,

            'olama_gono_songjog_group' => 41,
            'olama_attended' => 51,
            'olama_how_many_have_been_invited' => 71,
            'olama_how_many_associate_members_created' => 31,

            'other_gono_songjog_group' => 17,
            'other_attended' => 14,
            'other_how_many_have_been_invited' => 13,
            'other_how_many_associate_members_created' => 13,

            'creator' => 'ajmol',
            'status' => 1,
        ]);
        Dawat4GonoSongjogAndDawatOvijan::create([
            'total_gono_songjog_group' => 10,
            'total_attended' => 54,
            'how_many_have_been_invited' => 55,
            'how_many_associate_members_created' => 50,

            'jela_mohanogor_delared_gonosonjog_group' => 35,
            'jela_mohanogor_delared_gonosonjog_attended' => 45,
            'jela_mohanogor_delared_gonosonjog_invited' => 85,
            'jela_mohanogor_delared_gonosonjog_associated_created' => 105,

            'election_gono_songjog_group' => 55,
            'election_attended' => 55,
            'election_how_many_have_been_invited' => 35,
            'election_how_many_associate_members_created' => 65,

            'olama_gono_songjog_group' => 45,
            'olama_attended' => 55,
            'olama_how_many_have_been_invited' => 75,
            'olama_how_many_associate_members_created' => 35,

            'other_gono_songjog_group' => 57,
            'other_attended' => 54,
            'other_how_many_have_been_invited' => 53,
            'other_how_many_associate_members_created' => 33,

            'creator' => 'jamil',
            'status' => 1,
        ]);
        Dawat4GonoSongjogAndDawatOvijan::create([
            'total_gono_songjog_group' => 50,
            'total_attended' => 94,
            'how_many_have_been_invited' => 59,
            'how_many_associate_members_created' => 90,

            'jela_mohanogor_delared_gonosonjog_group' => 39,
            'jela_mohanogor_delared_gonosonjog_attended' => 49,
            'jela_mohanogor_delared_gonosonjog_invited' => 89,
            'jela_mohanogor_delared_gonosonjog_associated_created' => 109,

            'election_gono_songjog_group' => 95,
            'election_attended' => 59,
            'election_how_many_have_been_invited' => 39,
            'election_how_many_associate_members_created' => 69,

            'olama_gono_songjog_group' => 49,
            'olama_attended' => 59,
            'olama_how_many_have_been_invited' => 79,
            'olama_how_many_associate_members_created' => 39,

            'other_gono_songjog_group' => 97,
            'other_attended' => 94,
            'other_how_many_have_been_invited' => 93,
            'other_how_many_associate_members_created' => 43,

            'creator' => 'tasnim hasan',
            'status' => 1,
        ]);
    }
}
