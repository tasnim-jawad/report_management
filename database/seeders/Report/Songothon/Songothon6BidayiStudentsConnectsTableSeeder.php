<?php

namespace Database\Seeders\Report\Songothon;

use App\Models\Report\Songothon\Songothon6BidayiStudentsConnect;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Songothon6BidayiStudentsConnectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Songothon6BidayiStudentsConnect::truncate();
        Songothon6BidayiStudentsConnect::create([
            'Joined_student_man_member' => 23,
            'Joined_student_man_associate' => 23,
            'Joined_student_man_worker' => 23,

            'Joined_student_women_member' => 23,
            'Joined_student_women_associate' => 23,
            'Joined_student_women_worker' => 23,

            'creator' => 3,
            'status' => 1,
        ]);
        Songothon6BidayiStudentsConnect::create([
            'Joined_student_man_member' => 21,
            'Joined_student_man_associate' => 21,
            'Joined_student_man_worker' => 21,

            'Joined_student_women_member' => 21,
            'Joined_student_women_associate' => 21,
            'Joined_student_women_worker' => 21,

            'creator' => 3,
            'status' => 1,
        ]);
        Songothon6BidayiStudentsConnect::create([
            'Joined_student_man_member' => 31,
            'Joined_student_man_associate' => 31,
            'Joined_student_man_worker' => 31,

            'Joined_student_women_member' => 31,
            'Joined_student_women_associate' => 31,
            'Joined_student_women_worker' => 31,

            'creator' => 3,
            'status' => 1,
        ]);
        Songothon6BidayiStudentsConnect::create([
            'Joined_student_man_member' => 123,
            'Joined_student_man_associate' => 123,
            'Joined_student_man_worker' => 123,

            'Joined_student_women_member' => 123,
            'Joined_student_women_associate' => 123,
            'Joined_student_women_worker' => 123,

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
