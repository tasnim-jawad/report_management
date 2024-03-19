<?php

namespace Database\Seeders\Organization;

use App\Models\User\OrgThanaResponsible;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrgThanaResponsiblesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrgThanaResponsible::insert([
            [
                'user_id' => 3,
                'responsibility_id' => 1,
                'org_thana_id' => 1,
            ],
            [
                'user_id' => 4,
                'responsibility_id' => 2,
                'org_thana_id' => 1,
            ],
        ]);
    }
}
