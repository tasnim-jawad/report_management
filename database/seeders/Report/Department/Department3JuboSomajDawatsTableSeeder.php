<?php

namespace Database\Seeders\Report\Department;

use App\Models\Report\Department\Department3JuboSomajDawat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Department3JuboSomajDawatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department3JuboSomajDawat::truncate();
        Department3JuboSomajDawat::create([
            'how_many_young_been_invited' => 23,
            'how_many_young_been_associated' => 12,

            'total_young_committee' => 12,
            'total_young_committee_increased' => 2,

            'total_new_club' => 21,
            'total_new_club_increased' => 12,

            'stablished_club_total_invited' => 29,
            'stablished_club_total_increased' => 21,

            'creator' => 'tasnim',
            'status' => 1,
        ]);
        Department3JuboSomajDawat::create([
            'how_many_young_been_invited' => 33,
            'how_many_young_been_associated' => 13,

            'total_young_committee' => 13,
            'total_young_committee_increased' => 3,

            'total_new_club' => 31,
            'total_new_club_increased' => 13,

            'stablished_club_total_invited' => 39,
            'stablished_club_total_increased' => 31,

            'creator' => 'tasnim',
            'status' => 1,
        ]);
        Department3JuboSomajDawat::create([
            'how_many_young_been_invited' => 43,
            'how_many_young_been_associated' => 14,

            'total_young_committee' => 14,
            'total_young_committee_increased' => 4,

            'total_new_club' => 41,
            'total_new_club_increased' => 14,

            'stablished_club_total_invited' => 49,
            'stablished_club_total_increased' => 41,

            'creator' => 'tasnim',
            'status' => 1,
        ]);
        Department3JuboSomajDawat::create([
            'how_many_young_been_invited' => 53,
            'how_many_young_been_associated' => 15,

            'total_young_committee' => 15,
            'total_young_committee_increased' => 5,

            'total_new_club' => 51,
            'total_new_club_increased' => 15,

            'stablished_club_total_invited' => 59,
            'stablished_club_total_increased' => 51,

            'creator' => 'tasnim',
            'status' => 1,
        ]);
    }
}
