<?php

namespace Database\Seeders\Report\Department;

use App\Models\Report\Department\Department5ParibarikDawat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Department5ParibarikDawatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department5ParibarikDawat::truncate();
        Department5ParibarikDawat::create([
            'total_attended_family' => 12,
            'how_many_new_family_invited' => 2,

            'creator' => 3,
            'status' => 1,
        ]);
        Department5ParibarikDawat::create([
            'total_attended_family' => 14,
            'how_many_new_family_invited' => 4,

            'creator' => 3,
            'status' => 1,
        ]);
        Department5ParibarikDawat::create([
            'total_attended_family' => 15,
            'how_many_new_family_invited' => 5,

            'creator' => 3,
            'status' => 1,
        ]);
        Department5ParibarikDawat::create([
            'total_attended_family' => 13,
            'how_many_new_family_invited' => 3,

            'creator' => 3,
            'status' => 1,
        ]);
    }
}
