<?php

namespace Database\Seeders\Report\Ward\Department;

use App\Models\Report\Ward\Department\WardDepartment1TalimulQuran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WardDepartment1TalimulQuransTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WardDepartment1TalimulQuran::truncate();
        $report_info_id = 121;
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 1; $j <= 12; $j++) {
                WardDepartment1TalimulQuran::create([
                    'report_info_id' => $report_info_id,
                    'teacher_rokon' => rand(1, 10),
                    'teacher_worker' => rand(1, 10),

                    'student_rokon' => rand(1, 10),
                    'student_worker' => rand(1, 10),

                    'quran_learning_total_group' => rand(1, 10),
                    'quran_learning_total_students' => rand(1, 10),

                    'total_moktob' => rand(1, 10),
                    'total_moktob_students' => rand(1, 10),

                    'total_forkania_madrasah' => rand(1, 10),
                    'total_forkania_madrasah_students' => rand(1, 10),

                    'how_much_learned_sohih_tilawat' => rand(1, 10),

                    'how_much_invited_man' => rand(1, 10),
                    'how_much_invited_woman' => rand(1, 10),

                    'how_much_been_associated_man' => rand(1, 10),
                    'how_much_been_associated_woman' => rand(1, 10),

                    'total_muallim_man' => rand(1, 10),
                    'total_muallim_woman' => rand(1, 10),

                    'total_muallim_increased_man' => rand(1, 10),
                    'total_muallim_increased_woman' => rand(1, 10),

                    'creator' => 6 + $i,
                    'status' => 1,
                ]);
                $report_info_id++;
            }
        }
    }
}
