<?php

namespace Database\Seeders\Organization;

use App\Models\User\OrgWardResponsible;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrgWardResponsiblesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrgWardResponsible::insert([
            [
                'user_id' => 5,
                'responsibility_id' => 1,
                'org_ward_id' => 1,
            ],
            [
                'user_id' => 6,
                'responsibility_id' => 2,
                'org_ward_id' => 1,
            ],
        ]);
    }
}
