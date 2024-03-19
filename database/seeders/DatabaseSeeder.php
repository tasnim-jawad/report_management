<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Organization\OrgAreasTableSeeder;
use Database\Seeders\Organization\OrgCitiesTableSeeder;
use Database\Seeders\Organization\OrgCityResponsiblesTableSeeder;
use Database\Seeders\Organization\OrgCityUsersTableSeeder;
use Database\Seeders\Organization\OrgThanaResponsiblesTableSeeder;
use Database\Seeders\Organization\OrgThanasTableSeeder;
use Database\Seeders\Organization\OrgThanaUsersTableSeeder;
use Database\Seeders\Organization\OrgTypesTableSeeder;
use Database\Seeders\Organization\OrgUnitResponsiblesTableSeeder;
use Database\Seeders\Organization\OrgUnitsTableSeeder;
use Database\Seeders\Organization\OrgUnitUsersTableSeeder;
use Database\Seeders\Organization\OrgWardResponsiblesTableSeeder;
use Database\Seeders\Organization\OrgWardsTableSeeder;
use Database\Seeders\Organization\OrgWardUsersTableSeeder;
use Database\Seeders\Organization\ResponsibilitiesTableSeeder;
use Database\Seeders\User\ReportUploadersTableSeeder;
use Database\Seeders\User\UserClassesTableSeeder;
use Database\Seeders\User\UserContactsTableSeeder;
use Database\Seeders\User\UserRolesTableSeeder;
use Database\Seeders\User\UsersTableSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            // users table
            UsersTableSeeder::class,
            UserRolesTableSeeder::class,
            UserContactsTableSeeder::class,
            UserClassesTableSeeder::class,
            ReportUploadersTableSeeder::class,
            // organizations table
            OrgTypesTableSeeder::class,
            OrgAreasTableSeeder::class,

            OrgCitiesTableSeeder::class,
            OrgThanasTableSeeder::class,
            OrgWardsTableSeeder::class,
            OrgUnitsTableSeeder::class,

            OrgCityUsersTableSeeder::class,
            OrgThanaUsersTableSeeder::class,
            OrgWardUsersTableSeeder::class,
            OrgUnitUsersTableSeeder::class,

            ResponsibilitiesTableSeeder::class,
            OrgCityResponsiblesTableSeeder::class,
            OrgThanaResponsiblesTableSeeder::class,
            OrgWardResponsiblesTableSeeder::class,
            OrgUnitResponsiblesTableSeeder::class,

        ]);
    }
}
