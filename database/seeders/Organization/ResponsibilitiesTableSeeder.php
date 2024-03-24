<?php

namespace Database\Seeders\Organization;

use App\Models\Organization\Responsibility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResponsibilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Responsibility::truncate();
        Responsibility::insert([
            [
                'title' =>"president",
                'description' => "head of a organization",
            ],
            [
                'title' =>"secretary",
                'description' => "secretary of a organization",
            ],
            [
                'title' =>"Organizing Secretary",
                'description' => "Organizing Secretary of a organization",
            ],
            [
                'title' =>"bm",
                'description' => "bm of a organization",
            ],
            [
                'title' =>"publication secretary",
                'description' => "publication secretary of a organization",
            ],
            [
                'title' =>"HRD",
                'description' => "HRD of a organization",
            ],
        ]);
    }
}
