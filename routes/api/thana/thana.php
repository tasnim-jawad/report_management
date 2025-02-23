   <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Middleware\ThanaStatusChack;


    Route::group(['prefix' => 'thana/user'], function () {
        Route::get('/show', [App\Http\Controllers\Thana\ThanaUserController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Thana\ThanaUserController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Thana\ThanaUserController::class, 'update']);
        Route::post('/destroy', [App\Http\Controllers\Thana\ThanaUserController::class, 'destroy']);
    });

    Route::group(['prefix' => 'thana/ward'], function () {
        Route::get('/all', [App\Http\Controllers\Thana\ThanaWardController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Thana\ThanaWardController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Thana\ThanaWardController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Thana\ThanaWardController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Thana\ThanaWardController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Thana\ThanaWardController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Thana\ThanaWardController::class, 'restore']);
    });

    Route::group(['prefix' => 'thana/ward'], function () {
        Route::get('/report-status', [App\Http\Controllers\Thana\ThanaReportStatusController::class, 'report_status']);
        Route::post('/change-status', [App\Http\Controllers\Thana\ThanaReportStatusController::class, 'change_status']);
        Route::post('/report-status-single-ward', [App\Http\Controllers\Thana\ThanaReportStatusController::class, 'report_status_single_ward']);
    });

    Route::group(['prefix' => 'thana/ward-jonoshokti'], function () {
        Route::post('/set-responsibility', [App\Http\Controllers\Thana\ThanaWardJonoshoktiController::class, 'set_responsibility']);

        Route::get('/all', [App\Http\Controllers\Thana\ThanaWardJonoshoktiController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Thana\ThanaWardJonoshoktiController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Thana\ThanaWardJonoshoktiController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Thana\ThanaWardJonoshoktiController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Thana\ThanaWardJonoshoktiController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Thana\ThanaWardJonoshoktiController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Thana\ThanaWardJonoshoktiController::class, 'restore']);
    });

    Route::group(['prefix' => 'thana-dawat5-jonoshadharon'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat5JonoshadharonController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat5JonoshadharonController::class, 'store_single'])->middleware(ThanaStatusChack::class);

        // Route::get('/all', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat1RegularGroupWiseController::class, 'all']);
        // Route::get('/show/{id}', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat1RegularGroupWiseController::class, 'show']);
        // Route::post('/store', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat1RegularGroupWiseController::class, 'store']);
        // Route::post('/update', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat1RegularGroupWiseController::class, 'update']);
        // Route::post('/soft_delete', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat1RegularGroupWiseController::class, 'soft_delete']);
        // Route::post('/destroy', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat1RegularGroupWiseController::class, 'destroy']);
        // Route::post('/restore', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat1RegularGroupWiseController::class, 'restore']);
        // Route::post('/bulk_import', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat1RegularGroupWiseController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'thana-dawat1-regular-group-wise'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat1RegularGroupWiseController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat1RegularGroupWiseController::class, 'store_single'])->middleware(ThanaStatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat1RegularGroupWiseController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat1RegularGroupWiseController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat1RegularGroupWiseController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat1RegularGroupWiseController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat1RegularGroupWiseController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat1RegularGroupWiseController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat1RegularGroupWiseController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat1RegularGroupWiseController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'thana-dawat2-personal-and-target'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat2PersonalAndTargetController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat2PersonalAndTargetController::class, 'store_single'])->middleware(ThanaStatusChack::class);
        Route::get('/all', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat2PersonalAndTargetController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat2PersonalAndTargetController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat2PersonalAndTargetController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat2PersonalAndTargetController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat2PersonalAndTargetController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat2PersonalAndTargetController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat2PersonalAndTargetController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat2PersonalAndTargetController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'thana-dawat3-general-program-and-others'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat3GeneralProgramAndOthersController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat3GeneralProgramAndOthersController::class, 'store_single'])->middleware(ThanaStatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat3GeneralProgramAndOthersController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat3GeneralProgramAndOthersController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat3GeneralProgramAndOthersController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat3GeneralProgramAndOthersController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat3GeneralProgramAndOthersController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat3GeneralProgramAndOthersController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat3GeneralProgramAndOthersController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat3GeneralProgramAndOthersController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'thana-dawat4-gono-songjog-and-dawat-ovijan'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat4GonoSongjogAndDawatOvijanController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat4GonoSongjogAndDawatOvijanController::class, 'store_single'])->middleware(ThanaStatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat4GonoSongjogAndDawatOvijanController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat4GonoSongjogAndDawatOvijanController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat4GonoSongjogAndDawatOvijanController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat4GonoSongjogAndDawatOvijanController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat4GonoSongjogAndDawatOvijanController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat4GonoSongjogAndDawatOvijanController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat4GonoSongjogAndDawatOvijanController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Thana\Dawat\ThanaDawat4GonoSongjogAndDawatOvijanController::class, 'bulk_import']);
    });





    Route::group(['prefix' => 'thana-department1-talimul-quran'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Department\ThanaDepartment1TalimulQuranController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Department\ThanaDepartment1TalimulQuranController::class, 'store_single'])->middleware(ThanaStatusChack::class);

        Route::get('/all', [App\Http\Controllers\Report\Thana\Department\ThanaDepartment1TalimulQuranController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Report\Thana\Department\ThanaDepartment1TalimulQuranController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Report\Thana\Department\ThanaDepartment1TalimulQuranController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Report\Thana\Department\ThanaDepartment1TalimulQuranController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Report\Thana\Department\ThanaDepartment1TalimulQuranController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Report\Thana\Department\ThanaDepartment1TalimulQuranController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Report\Thana\Department\ThanaDepartment1TalimulQuranController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Report\Thana\Department\ThanaDepartment1TalimulQuranController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'thana-department2-moholla-vittik-dawat'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Department\ThanaDepartment2MohollaVittikDawatController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Department\ThanaDepartment2MohollaVittikDawatController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana-department3-jubo-somaj-dawat'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Department\ThanaDepartment3JuboSomajDawatController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Department\ThanaDepartment3JuboSomajDawatController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana-department4-different-job-holders-dawat'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Department\ThanaDepartment4DifferentJobHoldersDawatController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Department\ThanaDepartment4DifferentJobHoldersDawatController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana-department5-paribarik-dawat'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Department\ThanaDepartment5ParibarikDawatController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Department\ThanaDepartment5ParibarikDawatController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana-department6-mosjid-dawah-infomation-centers'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Department\ThanaDepartment6MosjidDawahInfomationCenterController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Department\ThanaDepartment6MosjidDawahInfomationCenterController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana-department7-dawat-in-technology'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Department\ThanaDepartment7DawatInTechnologyController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Department\ThanaDepartment7DawatInTechnologyController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana-department8-dawat-in-cultural-activity'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Department\ThanaDepartment8DawatInCulturalActivityController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Department\ThanaDepartment8DawatInCulturalActivityController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });





    Route::group(['prefix' => 'thana-dawah-and-prokashona'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\DawahAndProkashona\ThanaDawahAndProkashonaController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\DawahAndProkashona\ThanaDawahAndProkashonaController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });




    Route::group(['prefix' => 'thana-kormosuci-bastobayon'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Kormosuci\ThanaKormosuciBastobayonController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Kormosuci\ThanaKormosuciBastobayonController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });



    Route::group(['prefix' => 'thana-songothon1-jonosokti'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Songothon\ThanaSongothon1JonosoktiController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Songothon\ThanaSongothon1JonosoktiController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana-songothon2-associate-member'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Songothon\ThanaSongothon2AssociateMemberController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Songothon\ThanaSongothon2AssociateMemberController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana-songothon3-departmental-information'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Songothon\ThanaSongothon3DepartmentalInformationController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Songothon\ThanaSongothon3DepartmentalInformationController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana-songothon4-organizational-structure'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Songothon\ThanaSongothon4OrganizationalStructureController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Songothon\ThanaSongothon4OrganizationalStructureController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana-songothon5-dawat-and-paribarik-unit'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Songothon\ThanaSongothon5DawatAndParibarikUnitController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Songothon\ThanaSongothon5DawatAndParibarikUnitController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana-songothon6-bidayi-students-connect'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Songothon\ThanaSongothon7BidayiStudentsConnectController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Songothon\ThanaSongothon7BidayiStudentsConnectController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana-songothon7-sofor'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Songothon\ThanaSongothon7BidayiStudentsConnectController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Songothon\ThanaSongothon7BidayiStudentsConnectController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana-songothon8-iyanot-data'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Songothon\ThanaSongothon8AssociateAndSideOrganizationController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Songothon\ThanaSongothon8AssociateAndSideOrganizationController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana-songothon9-sangothonik-boithok'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Songothon\ThanaSongothon9SoforController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Songothon\ThanaSongothon9SoforController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });


    Route::group(['prefix' => 'thana-proshikkhon1-tarbiat'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Proshikkhon\ThanaProshikkhon1TarbiatController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Proshikkhon\ThanaProshikkhon1TarbiatController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana-proshikkhon2-manob-shompod-organizational-activitie'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Proshikkhon\ThanaProshikkhon2ManobShompodOrganizationalActivitieController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Proshikkhon\ThanaProshikkhon2ManobShompodOrganizationalActivitieController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });
    Route::group(['prefix' => 'thana-proshikkhon2-manob-shompod-traning-course'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Proshikkhon\ThanaProshikkhon2ManobShompodTrainingCourseController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Proshikkhon\ThanaProshikkhon2ManobShompodTrainingCourseController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });


    Route::group(['prefix' => 'thana-shomajsheba1-personal-preparing-trained-social-work'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Shomajsheba\ThanaShomajsheba1PreparingTrainedSocialWorkerController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Shomajsheba\ThanaShomajsheba1PreparingTrainedSocialWorkerController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana-shomajsheba2-personal-group-social-work'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Shomajsheba\ThanaShomajsheba2PersonalSocialWorkController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Shomajsheba\ThanaShomajsheba2PersonalSocialWorkController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });
    Route::group(['prefix' => 'thana-shomajsheba3-group-social-work'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Shomajsheba\ThanaShomajsheba2PersonalSocialWorkController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Shomajsheba\ThanaShomajsheba2PersonalSocialWorkController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana-shomajsheba3-health-and-family-kollan'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Shomajsheba\ThanaShomajsheba3GroupSocialWorkController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Shomajsheba\ThanaShomajsheba3GroupSocialWorkController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana-shomajsheba4-institutional-social-work'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Shomajsheba\ThanaShomajsheba4InstitutionalSocialWorkController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Shomajsheba\ThanaShomajsheba4InstitutionalSocialWorkController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });
    Route::group(['prefix' => 'thana-shomajsheba5-helth-and-family-kollan'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Shomajsheba\ThanaShomajsheba5HealthAndFamilyKollanController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Shomajsheba\ThanaShomajsheba5HealthAndFamilyKollanController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });
    Route::group(['prefix' => 'thana-shomajsheba6-education-and-research-activitie'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Shomajsheba\ThanaShomajsheba6EducationAndResearchActivityController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Shomajsheba\ThanaShomajsheba6EducationAndResearchActivityController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });
    Route::group(['prefix' => 'thana-shomajsheba7-expense'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Shomajsheba\ThanaShomajsheba7ExpenseController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Shomajsheba\ThanaShomajsheba7ExpenseController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });





    Route::group(['prefix' => 'thana-rastrio1-political-communication'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Rastrio\ThanaRastrio1PoliticalCommunicationController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Rastrio\ThanaRastrio1PoliticalCommunicationController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana-rastrio2-kormoshuchi-bastobayon'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Rastrio\ThanaRastrio2KormoshuchiBastobayonController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Rastrio\ThanaRastrio2KormoshuchiBastobayonController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana-rastrio3-dibosh-palon'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Rastrio\ThanaRastrio3DiboshPalonController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Rastrio\ThanaRastrio3DiboshPalonController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana-rastrio4-election-activitie'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Rastrio\ThanaRastrio4ElectionActivityController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Rastrio\ThanaRastrio4ElectionActivityController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana-montobbo'], function () {
        Route::get('/data', [App\Http\Controllers\Report\Thana\Montobbo\ThanaMontobboController::class, 'get_data']);
        Route::post('/store-single', [App\Http\Controllers\Report\Thana\Montobbo\ThanaMontobboController::class, 'store_single'])->middleware(ThanaStatusChack::class);
    });


    Route::group(['prefix' => 'thana-bm-expense-category'], function () {
        Route::get('', [App\Http\Controllers\Bm\Thana\Expense\ThanaBmExpenseCategoryController::class, 'index']);
        Route::get('/parent-category', [App\Http\Controllers\Bm\Thana\Expense\ThanaBmExpenseCategoryController::class, 'parent_category']);

        Route::get('/all', [App\Http\Controllers\Bm\Thana\Expense\ThanaBmExpenseCategoryController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Bm\Thana\Expense\ThanaBmExpenseCategoryController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Bm\Thana\Expense\ThanaBmExpenseCategoryController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Bm\Thana\Expense\ThanaBmExpenseCategoryController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Bm\Thana\Expense\ThanaBmExpenseCategoryController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Bm\Thana\Expense\ThanaBmExpenseCategoryController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Bm\Thana\Expense\ThanaBmExpenseCategoryController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Bm\Thana\Expense\ThanaBmExpenseCategoryController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'thana-bm-expense'], function () {
        Route::get('/single-ward', [App\Http\Controllers\Bm\Thana\Expense\ThanaBmExpenseController::class, 'single_ward']);
        Route::get('/bm-total-expense/{month}', [App\Http\Controllers\Bm\Thana\Expense\ThanaBmExpenseController::class, 'bm_total_expense']);
        Route::get('/existing-data', [App\Http\Controllers\Bm\Thana\Expense\ThanaBmExpenseController::class, 'existing_data']);

        Route::get('/all', [App\Http\Controllers\Bm\Thana\Expense\ThanaBmExpenseController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Bm\Thana\Expense\ThanaBmExpenseController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Bm\Thana\Expense\ThanaBmExpenseController::class, 'store'])->middleware(ThanaStatusChack::class);
        Route::post('/update', [App\Http\Controllers\Bm\Thana\Expense\ThanaBmExpenseController::class, 'update'])->middleware(ThanaStatusChack::class);
        Route::post('/soft_delete', [App\Http\Controllers\Bm\Thana\Expense\ThanaBmExpenseController::class, 'soft_delete'])->middleware(ThanaStatusChack::class);
        Route::post('/destroy', [App\Http\Controllers\Bm\Thana\Expense\ThanaBmExpenseController::class, 'destroy'])->middleware(ThanaStatusChack::class);
        Route::post('/restore', [App\Http\Controllers\Bm\Thana\Expense\ThanaBmExpenseController::class, 'restore'])->middleware(ThanaStatusChack::class);
        Route::post('/bulk_import', [App\Http\Controllers\Bm\Thana\Expense\ThanaBmExpenseController::class, 'bulk_import'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana-bm-income-category'], function () {
        Route::get('/parent-category', [App\Http\Controllers\Bm\Thana\Income\ThanaBmIncomeCategoryController::class, 'parent_category']);


        Route::get('/all', [App\Http\Controllers\Bm\Thana\Income\ThanaBmIncomeCategoryController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Bm\Thana\Income\ThanaBmIncomeCategoryController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Bm\Thana\Income\ThanaBmIncomeCategoryController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Bm\Thana\Income\ThanaBmIncomeCategoryController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Bm\Thana\Income\ThanaBmIncomeCategoryController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Bm\Thana\Income\ThanaBmIncomeCategoryController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Bm\Thana\Income\ThanaBmIncomeCategoryController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Bm\Thana\Income\ThanaBmIncomeCategoryController::class, 'bulk_import']);
    });

    Route::group(['prefix' => 'thana-bm-income'], function () {
        Route::get('/single-ward', [App\Http\Controllers\Bm\Thana\Income\ThanaBmIncomeController::class, 'single_ward']);
        Route::get('/bm-income-report/{user_id}/{ward_bm_income_category_id}', [App\Http\Controllers\Bm\Thana\Income\ThanaBmIncomeController::class, 'bm_income_report']);
        Route::get('/bm-total/{month}', [App\Http\Controllers\Bm\Thana\Income\ThanaBmIncomeController::class, 'bm_income_total']);
        Route::get('/existing-data', [App\Http\Controllers\Bm\Thana\Income\ThanaBmIncomeController::class, 'existing_data']);

        Route::get('/all', [App\Http\Controllers\Bm\Thana\Income\ThanaBmIncomeController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Bm\Thana\Income\ThanaBmIncomeController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Bm\Thana\Income\ThanaBmIncomeController::class, 'store'])->middleware(ThanaStatusChack::class);
        Route::post('/update', [App\Http\Controllers\Bm\Thana\Income\ThanaBmIncomeController::class, 'update'])->middleware(ThanaStatusChack::class);
        Route::post('/soft_delete', [App\Http\Controllers\Bm\Thana\Income\ThanaBmIncomeController::class, 'soft_delete'])->middleware(ThanaStatusChack::class);
        Route::post('/destroy', [App\Http\Controllers\Bm\Thana\Income\ThanaBmIncomeController::class, 'destroy'])->middleware(ThanaStatusChack::class);
        Route::post('/restore', [App\Http\Controllers\Bm\Thana\Income\ThanaBmIncomeController::class, 'restore'])->middleware(ThanaStatusChack::class);
        Route::post('/bulk_import', [App\Http\Controllers\Bm\Thana\Income\ThanaBmIncomeController::class, 'bulk_import'])->middleware(ThanaStatusChack::class);
    });

    Route::group(['prefix' => 'thana'], function () {

        Route::get('/uploaded-data', [App\Http\Controllers\Thana\ThanaController::class, 'report_upload_api']);
        Route::get('/income-category-wise', [App\Http\Controllers\Thana\ThanaController::class, 'income_category_wise']);
        Route::get('/expense-category-wise', [App\Http\Controllers\Thana\ThanaController::class, 'expense_category_wise']);

        Route::get('/check-report-info', [App\Http\Controllers\Thana\ThanaController::class, 'check_report_info']);
        Route::get('/check-report-info-in-range', [App\Http\Controllers\Thana\ThanaController::class, 'check_report_info_in_range']);
        Route::get('/uploaded-data-monthly', [App\Http\Controllers\Thana\ThanaController::class, 'report_upload_monthly']);
        Route::get('/report-status', [App\Http\Controllers\Thana\ThanaController::class, 'report_status']);
        Route::get('/report-joma', [App\Http\Controllers\Thana\ThanaController::class, 'report_joma']);


        Route::get('/get-all-ward-data', [App\Http\Controllers\Thana\ThanaTotalWartSubmittedDataController::class, 'get_all_ward_data']);
        Route::get('/count-approved-ward', [App\Http\Controllers\Thana\ThanaTotalWartSubmittedDataController::class, 'count_approved_ward']);
    });


    Route::group(['prefix' => 'thana'], function () {
        Route::post('/ward-report-joma-permitted-month', [App\Http\Controllers\Thana\PermissionController::class, 'ward_report_joma_permitted_month']);
        Route::post('/set-ward-report-joma-permission', [App\Http\Controllers\Thana\PermissionController::class, 'set_ward_report_joma_permission']);
        Route::post('/remove-ward-report-joma-permission', [App\Http\Controllers\Thana\PermissionController::class, 'remove_ward_report_joma_permission']);
        // Route::post('/toggle-dashboard-permission', [App\Http\Controllers\Thana\PermissionController::class,'toggle_dashboard_permission']);
    });


    Route::group(['prefix' => 'comment'], function () {
        Route::get('/parent-category', [App\Http\Controllers\Comment\CommentController::class, 'parent_category']);
        Route::get('/index', [App\Http\Controllers\Comment\CommentController::class, 'index']);
        Route::get('/column-comment-all', [App\Http\Controllers\Comment\CommentController::class, 'column_comment_all']);
        Route::get('/count-comment', [App\Http\Controllers\Comment\CommentController::class, 'count_comment']);

        Route::get('/all', [App\Http\Controllers\Comment\CommentController::class, 'all']);
        Route::get('/show/{id}', [App\Http\Controllers\Comment\CommentController::class, 'show']);
        Route::post('/store', [App\Http\Controllers\Comment\CommentController::class, 'store']);
        Route::post('/update', [App\Http\Controllers\Comment\CommentController::class, 'update']);
        Route::post('/soft_delete', [App\Http\Controllers\Comment\CommentController::class, 'soft_delete']);
        Route::post('/destroy', [App\Http\Controllers\Comment\CommentController::class, 'destroy']);
        Route::post('/restore', [App\Http\Controllers\Comment\CommentController::class, 'restore']);
        Route::post('/bulk_import', [App\Http\Controllers\Comment\CommentController::class, 'bulk_import']);
    });
