<?php

namespace Database\Seeders\Organization;

use App\Models\Organization\OrgThanaResponsible;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrgThanaResponsiblesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrgThanaResponsible::truncate();
        OrgThanaResponsible::insert([
            [
                'user_id' => 6,
                'responsibility_id' => 1,
                'org_thana_id' => 1,
            ],
        ]);
    }
}
