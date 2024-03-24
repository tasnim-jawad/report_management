<?php

namespace Database\Seeders\Organization;

use App\Models\Organization\OrgUnitResponsible;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrgUnitResponsiblesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrgUnitResponsible::truncate();
        OrgUnitResponsible::insert([

            [
                'user_id' => 9,
                'responsibility_id' => 3,
                'org_unit_id' => 1,
            ],
            [
                'user_id' => 10,
                'responsibility_id' => 4,
                'org_unit_id' => 1,
            ],
            [
                'user_id' => 11,
                'responsibility_id' => 1,
                'org_unit_id' => 1,
            ],
            [
                'user_id' => 12,
                'responsibility_id' => 2,
                'org_unit_id' => 1,
            ],
        ]);
    }
}
