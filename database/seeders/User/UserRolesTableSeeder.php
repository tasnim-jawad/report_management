<?php

namespace Database\Seeders\User;

use App\Models\User\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserRole::truncate();
        UserRole::insert([
            [
                'serial' =>"1",
                'title' => "super_admin",
            ],
            [
                'serial' =>"2",
                'title' => "admin",
            ],
            [
                'serial' =>"3",
                'title' => "city",
            ],
            [
                'serial' =>"4",
                'title' => "thana",
            ],
            [
                'serial' =>"5",
                'title' => "ward",
            ],
            [
                'serial' =>"6",
                'title' => "unit",
            ],
        ]);
    }
}
