<?php

namespace Database\Seeders;

use App\Models\Bm\BmExpenseCategory;
use Database\Seeders\Bm\Income\BmCategoriesTableSeeder;
use Database\Seeders\Bm\Expense\BmExpenseCategoriesTableSeeder;
use Database\Seeders\Bm\Expense\BmExpensesTableSeeder;
use Database\Seeders\Bm\Income\BmCategoryUsersTableSeeder;
use Database\Seeders\Bm\Income\BmPaidsTableSeeder;
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
use Database\Seeders\Report\DawahAndProkashona\DawahAndProkashonasTableSeeder;
use Database\Seeders\Report\Dawat\Dawat1RegularGroupWisesTableSeeder;
use Database\Seeders\Report\Dawat\Dawat2PersonalAndTargetsTableSeeder;
use Database\Seeders\Report\Dawat\Dawat3GeneralProgramAndOthersTableSeeder;
use Database\Seeders\Report\Dawat\Dawat4GonoSongjogAndDawatOvijansTableSeeder;
use Database\Seeders\Report\Department\Department1TalimulQuransTableSeeder;
use Database\Seeders\Report\Department\Department2MohollaVittikDawatsTableSeeder;
use Database\Seeders\Report\Department\Department3JuboSomajDawatsTableSeeder;
use Database\Seeders\Report\Department\Department4DifferentJobHoldersDawatsTableSeeder;
use Database\Seeders\Report\Department\Department5ParibarikDawatsTableSeeder;
use Database\Seeders\Report\Department\Department6MosjidDawahInfomationCentersTableSeeder;
use Database\Seeders\Report\Department\Department7DawatInTechnologiesTableSeeder;
use Database\Seeders\Report\Department\Department8DawatInCulturalProgramsTableSeeder;
use Database\Seeders\Report\Kormosuci\KormosuciBastobayonsTableSeeder;
use Database\Seeders\Report\Montobbo\MontobbosTableSeeder;
use Database\Seeders\Report\Proshikkhon\Proshikkhon1TarbiatsTableSeeder;
use Database\Seeders\Report\Rastrio\Rastrio1BishishtoBektisTableSeeder;
use Database\Seeders\Report\ReportInfosTableSeeder;
use Database\Seeders\Report\ReportManagementControlsTableSeeder;
use Database\Seeders\Report\Shomajsheba\Shomajsheba1PersonalSocialWorksTableSeeder;
use Database\Seeders\Report\Shomajsheba\Shomajsheba2UnitSocialWorksTableSeeder;
use Database\Seeders\Report\Songothon\Songothon1JonosoktisTableSeeder;
use Database\Seeders\Report\Songothon\Songothon2AssociateMembersTableSeeder;
use Database\Seeders\Report\Songothon\Songothon3DepartmentalInformationTableSeeder;
use Database\Seeders\Report\Songothon\Songothon4UnitSongothonsTableSeeder;
use Database\Seeders\Report\Songothon\Songothon5DawatAndParibarikUnitsTableSeeder;
use Database\Seeders\Report\Songothon\Songothon6BidayiStudentsConnectsTableSeeder;
use Database\Seeders\Report\Songothon\Songothon7SoforsTableSeeder;
use Database\Seeders\Report\Songothon\Songothon8IyanotDataTableSeeder;
use Database\Seeders\Report\Songothon\Songothon9SangothonikBoithoksTableSeeder;
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
            //report table
            ReportInfosTableSeeder::class,
            ReportManagementControlsTableSeeder::class,
            // dawat
            Dawat1RegularGroupWisesTableSeeder::class,
            Dawat2PersonalAndTargetsTableSeeder::class,
            Dawat3GeneralProgramAndOthersTableSeeder::class,
            Dawat4GonoSongjogAndDawatOvijansTableSeeder::class,
            // department
            Department1TalimulQuransTableSeeder::class,
            Department2MohollaVittikDawatsTableSeeder::class,
            Department3JuboSomajDawatsTableSeeder::class,
            Department4DifferentJobHoldersDawatsTableSeeder::class,
            Department5ParibarikDawatsTableSeeder::class,
            Department6MosjidDawahInfomationCentersTableSeeder::class,
            Department7DawatInTechnologiesTableSeeder::class,
            Department8DawatInCulturalProgramsTableSeeder::class,
            // DawahAndProkashona
            DawahAndProkashonasTableSeeder::class,
            // kormosuci
            KormosuciBastobayonsTableSeeder::class,
            //songothon
            Songothon1JonosoktisTableSeeder::class,
            Songothon2AssociateMembersTableSeeder::class,
            Songothon3DepartmentalInformationTableSeeder::class,
            Songothon4UnitSongothonsTableSeeder::class,
            Songothon5DawatAndParibarikUnitsTableSeeder::class,
            Songothon6BidayiStudentsConnectsTableSeeder::class,
            Songothon7SoforsTableSeeder::class,
            Songothon8IyanotDataTableSeeder::class,
            Songothon9SangothonikBoithoksTableSeeder::class,
            // proshikkhon
            Proshikkhon1TarbiatsTableSeeder::class,
            // shomajsheba
            Shomajsheba1PersonalSocialWorksTableSeeder::class,
            Shomajsheba2UnitSocialWorksTableSeeder::class,
            // rastrio
            Rastrio1BishishtoBektisTableSeeder::class,
            // montobbo
            MontobbosTableSeeder::class,
            // bm
            BmExpenseCategoriesTableSeeder::class,
            BmCategoriesTableSeeder::class,
            BmCategoryUsersTableSeeder::class,
            BmPaidsTableSeeder::class,
            BmExpensesTableSeeder::class,
        ]);
    }
}
