<?php

namespace Database\Seeders\Organization;

use App\Models\Organization\OrgWardResponsible;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrgWardResponsiblesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrgWardResponsible::truncate();
        OrgWardResponsible::insert([
            [
                'user_id' => 7,
                'responsibility_id' => 1,
                'org_ward_id' => 1,
            ],
            [
                'user_id' => 8,
                'responsibility_id' => 2,
                'org_ward_id' => 1,
            ],
        ]);
    }
}
