<?php

namespace Database\Seeders\User;

use App\Models\User\UserClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserClass::truncate();
        UserClass::insert([
            [
                'type' => 'rokon',
                'user_id' => 3,
                'added_type' => 'agomon',
            ],
            [
                'type' => 'rokon',
                'user_id' => 4,
                'added_type' => 'manonnoyon',
            ],
            [
                'type' => 'rokon',
                'user_id' => 5,
                'added_type' => 'manonnoyon',
            ],
            [
                'type' => 'rokon',
                'user_id' => 6,
                'added_type' => 'agomon',
            ],
            [
                'type' => 'worker',
                'user_id' => 7,
                'added_type' => 'agomon',
            ],
            [
                'type' => 'worker',
                'user_id' => 8,
                'added_type' => 'manonnoyon',
            ],
            [
                'type' => 'worker',
                'user_id' => 9,
                'added_type' => 'agomon',
            ],
            [
                'type' => 'supporter',
                'user_id' => 10,
                'added_type' => 'manonnoyon',
            ],
            [
                'type' => 'supporter',
                'user_id' => 11,
                'added_type' => 'agomon',
            ],
            [
                'type' => 'supporter',
                'user_id' => 12,
                'added_type' => 'manonnoyon',
            ],
        ]);
    }
}
