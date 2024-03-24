<?php

namespace Database\Seeders\Report\Department;

use App\Models\Report\Department\Department1TalimulQuran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Department1TalimulQuransTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department1TalimulQuran::truncate();
        Department1TalimulQuran::create([
            'teacher_rokon' => 12,
            'teacher_worker' => 22,

            'samostic_quran_learning_total_group' => 23,
            'samostic_quran_learning_total_students' => 32,
            'samostic_total_forkania_madrasah' => 42,
            'samostic_total_forkania_madrasah_students' => 32,

            'how_much_learned_quran' => 25,
            'how_much_invited' => 25,
            'how_much_been_associated' => 12,

            'total_muallim' => 12,
            'total_muallim_increased' => 2,

            'creator' => 3,
            'status' => 1,
        ]);
        Department1TalimulQuran::create([
            'teacher_rokon' => 13,
            'teacher_worker' => 33,

            'samostic_quran_learning_total_group' => 33,
            'samostic_quran_learning_total_students' => 33,
            'samostic_total_forkania_madrasah' => 43,
            'samostic_total_forkania_madrasah_students' => 33,

            'how_much_learned_quran' => 35,
            'how_much_invited' => 35,
            'how_much_been_associated' => 13,

            'total_muallim' => 13,
            'total_muallim_increased' => 3,

            'creator' => 3,
            'status' => 1,
        ]);
        Department1TalimulQuran::create([
            'teacher_rokon' => 14,
            'teacher_worker' => 44,

            'samostic_quran_learning_total_group' => 43,
            'samostic_quran_learning_total_students' => 34,
            'samostic_total_forkania_madrasah' => 44,
            'samostic_total_forkania_madrasah_students' => 34,

            'how_much_learned_quran' => 45,
            'how_much_invited' => 45,
            'how_much_been_associated' => 14,

            'total_muallim' => 14,
            'total_muallim_increased' => 4,

            'creator' => 3,
            'status' => 1,
        ]);
        Department1TalimulQuran::create([
            'teacher_rokon' => 15,
            'teacher_worker' => 55,

            'samostic_quran_learning_total_group' => 53,
            'samostic_quran_learning_total_students' => 35,
            'samostic_total_forkania_madrasah' => 45,
            'samostic_total_forkania_madrasah_students' => 35,

            'how_much_learned_quran' => 55,
            'how_much_invited' => 55,
            'how_much_been_associated' => 15,

            'total_muallim' => 15,
            'total_muallim_increased' => 5,

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
