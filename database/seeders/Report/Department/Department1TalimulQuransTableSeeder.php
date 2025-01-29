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
        $report_info_id = 1;
        for ($i = 1; $i <= 10; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                Department1TalimulQuran::create([
                    'report_info_id' => $report_info_id,
                    'teacher_rokon' => rand(1, 10),
                    'teacher_worker' => rand(1, 10),

                    'student_rokon' => rand(1, 10),
                    'student_worker' => rand(1, 10),

                    'how_much_learned_quran' => rand(1, 10),
                    'how_much_invited' => rand(1, 10),
                    'how_much_been_associated' => rand(1, 10),
                    'creator' => 8 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
        // Department1TalimulQuran::create([
        //     'teacher_rokon' => rand(1, 10),
        //     'teacher_worker' => rand(1, 10),

        //     'student_rokon' => rand(1, 10),
        //     'student_worker' => rand(1, 10),

        //     'how_much_learned_quran' => rand(1, 10),
        //     'how_much_invited' => rand(1, 10),
        //     'how_much_been_associated' => rand(1, 10),

        //     // 'total_muallim' => 12,
        //     // 'total_muallim_increased' => 2,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Department1TalimulQuran::create([
        //     'teacher_rokon' => 13,
        //     'teacher_worker' => 33,

        //     'student_rokon' => 12,
        //     'student_worker' => 32,

        //     // 'samostic_quran_learning_total_group' => 33,
        //     // 'samostic_quran_learning_total_students' => 33,
        //     // 'samostic_total_forkania_madrasah' => 43,
        //     // 'samostic_total_forkania_madrasah_students' => 33,

        //     'how_much_learned_quran' => 35,
        //     'how_much_invited' => 35,
        //     'how_much_been_associated' => 13,

        //     // 'total_muallim' => 13,
        //     // 'total_muallim_increased' => 3,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Department1TalimulQuran::create([
        //     'teacher_rokon' => 14,
        //     'teacher_worker' => 44,

        //     'student_rokon' => 12,
        //     'student_worker' => 32,

        //     // 'samostic_quran_learning_total_group' => 43,
        //     // 'samostic_quran_learning_total_students' => 34,
        //     // 'samostic_total_forkania_madrasah' => 44,
        //     // 'samostic_total_forkania_madrasah_students' => 34,

        //     'how_much_learned_quran' => 45,
        //     'how_much_invited' => 45,
        //     'how_much_been_associated' => 14,

        //     // 'total_muallim' => 14,
        //     // 'total_muallim_increased' => 4,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
        // Department1TalimulQuran::create([
        //     'teacher_rokon' => 15,
        //     'teacher_worker' => 55,

        //     'student_rokon' => 12,
        //     'student_worker' => 32,

        //     // 'samostic_quran_learning_total_group' => 53,
        //     // 'samostic_quran_learning_total_students' => 35,
        //     // 'samostic_total_forkania_madrasah' => 45,
        //     // 'samostic_total_forkania_madrasah_students' => 35,

        //     'how_much_learned_quran' => 55,
        //     'how_much_invited' => 55,
        //     'how_much_been_associated' => 15,

        //     // 'total_muallim' => 15,
        //     // 'total_muallim_increased' => 5,

        //     'creator' => 3,
        //     'status' => 1,
        // ]);
    }
}
