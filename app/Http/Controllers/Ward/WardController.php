<?php

namespace App\Http\Controllers\Ward;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Actions\BmReport;
use App\Http\Controllers\Actions\CalculatePreviousPresent;
use App\Http\Controllers\Actions\CheckInfo;
use App\Http\Controllers\Actions\DateWiseReportSum;
use App\Http\Controllers\Actions\ReportHeader;
use App\Http\Controllers\Controller;
use App\Models\Bm\Expense\BmExpense;
use App\Models\Bm\Expense\BmExpenseCategory;
use App\Models\Bm\Income\BmCategory;
use App\Models\Bm\Income\BmPaid;
use App\Models\Bm\Ward\Expense\WardBmExpense;
use App\Models\Bm\Ward\Expense\WardBmExpenseCategory;
use App\Models\Bm\Ward\Income\WardBmIncome;
use App\Models\Bm\Ward\Income\WardBmIncomeCategory;
use App\Models\Organization\OrgCity;
use App\Models\Organization\OrgThana;
use App\Models\Organization\OrgThanaUser;
use App\Models\Organization\OrgType;
use App\Models\Organization\OrgUnit;
use App\Models\Organization\OrgWard;
use App\Models\Organization\OrgWardResponsible;
use App\Models\Organization\OrgWardUser;
use App\Models\Report\DawahAndProkashona\DawahAndProkashona;
use App\Models\Report\Dawat\Dawat1RegularGroupWise;
use App\Models\Report\Dawat\Dawat2PersonalAndTarget;
use App\Models\Report\Dawat\Dawat3GeneralProgramAndOthers;
use App\Models\Report\Dawat\Dawat4GonoSongjogAndDawatOvijan;
use App\Models\Report\Department\Department1TalimulQuran;
use App\Models\Report\Department\Department4DifferentJobHoldersDawat;
use App\Models\Report\Department\Department5ParibarikDawat;
use App\Models\Report\Kormosuci\KormosuciBastobayon;
use App\Models\Report\Montobbo\Montobbo;
use App\Models\Report\Proshikkhon\Proshikkhon1Tarbiat;
use App\Models\Report\Rastrio\Rastrio1BishishtoBekti;
use App\Models\Report\ReportInfo;
use App\Models\Report\ReportManagementControl;
use App\Models\Report\Shomajsheba\Shomajsheba1PersonalSocialWork;
use App\Models\Report\Shomajsheba\Shomajsheba2UnitSocialWork;
use App\Models\Report\Songothon\Songothon1Jonosokti;
use App\Models\Report\Songothon\Songothon2AssociateMember;
use App\Models\Report\Songothon\Songothon4UnitSongothon;
use App\Models\Report\Songothon\Songothon5DawatAndParibarikUnit;
use App\Models\Report\Songothon\Songothon7Sofor;
use App\Models\Report\Songothon\Songothon8IyanotData;
use App\Models\Report\Songothon\Songothon9SangothonikBoithok;
use App\Models\Report\Ward\DawahAndProkashona\WardDawahAndProkashona;
use App\Models\Report\Ward\Dawat\WardDawat1RegularGroupWise;
use App\Models\Report\Ward\Dawat\WardDawat2PersonalAndTarget;
use App\Models\Report\Ward\Dawat\WardDawat3GeneralProgramAndOthers;
use App\Models\Report\Ward\Dawat\WardDawat4GonoSongjogAndDawatOvijan;
use App\Models\Report\Ward\Department\WardDepartment1TalimulQuran;
use App\Models\Report\Ward\Department\WardDepartment2MohollaVittikDawat;
use App\Models\Report\Ward\Department\WardDepartment3JuboSomajDawat;
use App\Models\Report\Ward\Department\WardDepartment4DifferentJobHoldersDawat;
use App\Models\Report\Ward\Department\WardDepartment5ParibarikDawat;
use App\Models\Report\Ward\Department\WardDepartment6MosjidDawahInfomationCenter;
use App\Models\Report\Ward\Department\WardDepartment7DawatInTechnology;
use App\Models\Report\Ward\Kormosuci\WardKormosuciBastobayon;
use App\Models\Report\Ward\Montobbo\WardMontobbo;
use App\Models\Report\Ward\Proshikkhon\WardProshikkhon1Tarbiat;
use App\Models\Report\Ward\Proshikkhon\WardProshikkhon2ManobShompodUnnoyon;
use App\Models\Report\Ward\Rastrio\WardRastrio1PoliticalCommunication;
use App\Models\Report\Ward\Rastrio\WardRastrio2KormoshuchiBastobayon;
use App\Models\Report\Ward\Rastrio\WardRastrio3DiboshPalon;
use App\Models\Report\Ward\Rastrio\WardRastrio4ElectionActivity;
use App\Models\Report\Ward\Shomajsheba\WardShomajsheba1PersonalSocialWork;
use App\Models\Report\Ward\Shomajsheba\WardShomajsheba2GroupSocialWork;
use App\Models\Report\Ward\Shomajsheba\WardShomajsheba3HealthAndFamilyKollan;
use App\Models\Report\Ward\Shomajsheba\WardShomajsheba4InstitutionalSocialWork;
use App\Models\Report\Ward\Songothon\WardSongothon1Jonosokti;
use App\Models\Report\Ward\Songothon\WardSongothon2AssociateMember;
use App\Models\Report\Ward\Songothon\WardSongothon3DepartmentalInformation;
use App\Models\Report\Ward\Songothon\WardSongothon4UnitSongothon;
use App\Models\Report\Ward\Songothon\WardSongothon5DawatAndParibarikUnit;
use App\Models\Report\Ward\Songothon\WardSongothon6BidayiStudentsConnect;
use App\Models\Report\Ward\Songothon\WardSongothon7Sofor;
use App\Models\Report\Ward\Songothon\WardSongothon8IyanotData;
use App\Models\Report\Ward\Songothon\WardSongothon9SangothonikBoithok;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WardController extends Controller
{

    // public function report()
    // {
    //     $validator = Validator::make(request()->all(), [
    //         'month' => ['required', 'date'],
    //         'user_id' => ['required'],
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'err_message' => 'validation error',
    //             'errors' => $validator->errors(),
    //         ], 422);
    //     }
    //     $org_ward_user = OrgWardUser::where('user_id', request()->user_id)->first();

    //     $ward_id = $org_ward_user->ward_id;
    //     $month = Carbon::parse(request()->month);
    //     $ward_info = OrgWard::where('id', $ward_id)->first();
    //     $thana_id = $org_ward_user->thana_id;
    //     $thana_info = OrgThana::where('id', $thana_id)->first();
    //     $org_type = OrgType::where('id', $ward_info['org_type_id'])->first();

    //     $president = null;
    //     $org_ward_responsible = OrgWardResponsible::where('org_ward_id', $ward_id)->where('responsibility_id', 1)->first();
    //     if ($org_ward_responsible) {
    //         $president = User::where('id', $org_ward_responsible->user_id)->first();
    //     }

    //     // dd($president);

    //     $report_info = ReportInfo::where('org_type_id', $ward_id)
    //         ->where('org_type', 'ward')
    //         ->whereYear('month_year', $month->clone()->year)
    //         ->whereMonth('month_year', $month->clone()->month)
    //         ->where('status', 1)
    //         ->first();

    //     if ($report_info) {
    //         $report_info_id = $report_info->id;
    //     } else {
    //         return redirect()->back();
    //     }

    //     // ---------------------  reports all data to show  ---------------------------
    //     $dawat1 = WardDawat1RegularGroupWise::where('report_info_id', $report_info_id)->first();
    //     $dawat2 = WardDawat2PersonalAndTarget::where('report_info_id', $report_info_id)->first();
    //     $dawat3 = WardDawat3GeneralProgramAndOthers::where('report_info_id', $report_info_id)->first();
    //     $dawat4 = WardDawat4GonoSongjogAndDawatOvijan::where('report_info_id', $report_info_id)->first();
    //     $department1 = WardDepartment1TalimulQuran::where('report_info_id', $report_info_id)->first();
    //     $department2 = WardDepartment2MohollaVittikDawat::where('report_info_id', $report_info_id)->first();
    //     $department3 = WardDepartment3JuboSomajDawat::where('report_info_id', $report_info_id)->first();
    //     $department4 = WardDepartment4DifferentJobHoldersDawat::where('report_info_id', $report_info_id)->first();
    //     $department5 = WardDepartment5ParibarikDawat::where('report_info_id', $report_info_id)->first();
    //     $department6 = WardDepartment6MosjidDawahInfomationCenter::where('report_info_id', $report_info_id)->first();
    //     $department7 = WardDepartment7DawatInTechnology::where('report_info_id', $report_info_id)->first();
    //     $dawah_prokashona = WardDawahAndProkashona::where('report_info_id', $report_info_id)->first();
    //     $kormosuci = WardKormosuciBastobayon::where('report_info_id', $report_info_id)->first();
    //     $songothon1 = WardSongothon1Jonosokti::where('report_info_id', $report_info_id)->first();
    //     $songothon2 = WardSongothon2AssociateMember::where('report_info_id', $report_info_id)->first();
    //     $songothon3 = WardSongothon3DepartmentalInformation::where('report_info_id', $report_info_id)->first();
    //     $songothon4 = WardSongothon4UnitSongothon::where('report_info_id', $report_info_id)->first();
    //     $songothon5 = WardSongothon5DawatAndParibarikUnit::where('report_info_id', $report_info_id)->first();
    //     $songothon6 = WardSongothon6BidayiStudentsConnect::where('report_info_id', $report_info_id)->first();
    //     $songothon7 = WardSongothon7Sofor::where('report_info_id', $report_info_id)->first();
    //     $songothon8 = WardSongothon8IyanotData::where('report_info_id', $report_info_id)->first();
    //     $songothon9 = WardSongothon9SangothonikBoithok::where('report_info_id', $report_info_id)->first();
    //     $proshikkhon1 = WardProshikkhon1Tarbiat::where('report_info_id', $report_info_id)->first();
    //     $proshikkhon2 = WardProshikkhon2ManobShompodUnnoyon::where('report_info_id', $report_info_id)->first();
    //     $shomajsheba1 = WardShomajsheba1PersonalSocialWork::where('report_info_id', $report_info_id)->first();
    //     $shomajsheba2 = WardShomajsheba2GroupSocialWork::where('report_info_id', $report_info_id)->first();
    //     $shomajsheba3 = WardShomajsheba3HealthAndFamilyKollan::where('report_info_id', $report_info_id)->first();
    //     $shomajsheba4 = WardShomajsheba4InstitutionalSocialWork::where('report_info_id', $report_info_id)->first();
    //     $rastrio1 = WardRastrio1PoliticalCommunication::where('report_info_id', $report_info_id)->first();
    //     $rastrio2 = WardRastrio2KormoshuchiBastobayon::where('report_info_id', $report_info_id)->first();
    //     $rastrio3 = WardRastrio3DiboshPalon::where('report_info_id', $report_info_id)->first();
    //     $rastrio4 = WardRastrio4ElectionActivity::where('report_info_id', $report_info_id)->first();
    //     $montobbo = WardMontobbo::where('report_info_id', $report_info_id)->first();
    //     // ---------------------  reports all data to show  ---------------------------
    //     // ---------------------  previous and present calculation  ---------------------------
    //     $previous_month = $month->clone()->subMonth()->endOfMonth();
    //     $total_approved_report_info_ids_previous = ReportInfo::where('org_type_id', $ward_id)
    //         ->where('org_type', 'ward')
    //         ->where('report_approved_status', 'approved')
    //         ->whereDate('month_year', '<=', $previous_month)
    //         ->pluck('id');

    //     $total_approved_report_info_ids_present = ReportInfo::where('org_type_id', $ward_id)
    //         ->where('org_type', 'ward')
    //         ->where('report_approved_status', 'approved')
    //         ->whereDate('month_year', '<=', $month->clone()->endOfMonth())
    //         ->pluck('id');
    //     /** ------------songothon1---------- */
    //     /** rokon */
    //     $songothon1_rokon_previous = calculate_previous_present(
    //         WardSongothon1Jonosokti::class,
    //         $total_approved_report_info_ids_previous,
    //         'rokon_briddhi',
    //         'rokon_gatti'
    //     );

    //     $songothon1_rokon_present = calculate_previous_present(
    //         WardSongothon1Jonosokti::class,
    //         $total_approved_report_info_ids_present,
    //         'rokon_briddhi',
    //         'rokon_gatti'
    //     );

    //     /** worker */
    //     $songothon1_worker_previous = calculate_previous_present(
    //         WardSongothon1Jonosokti::class,
    //         $total_approved_report_info_ids_previous,
    //         'worker_briddhi',
    //         'worker_gatti'
    //     );

    //     $songothon1_worker_present = calculate_previous_present(
    //         WardSongothon1Jonosokti::class,
    //         $total_approved_report_info_ids_present,
    //         'worker_briddhi',
    //         'worker_gatti'
    //     );
    //     /** ------------songothon1---------- */

    //     /** ------------songothon2---------- */
    //     /** associate_member_man */
    //     $songothon2_associate_member_man_previous = calculate_increase(
    //         WardSongothon2AssociateMember::class,
    //         $total_approved_report_info_ids_previous,
    //         'associate_member_man_briddhi',
    //     );

    //     $songothon2_associate_member_man_present = calculate_increase(
    //         WardSongothon2AssociateMember::class,
    //         $total_approved_report_info_ids_present,
    //         'associate_member_man_briddhi',
    //     );

    //     /** associate_member_woman */
    //     $songothon2_associate_member_woman_previous = calculate_increase(
    //         WardSongothon2AssociateMember::class,
    //         $total_approved_report_info_ids_previous,
    //         'associate_member_woman_briddhi',
    //     );

    //     $songothon2_associate_member_woman_present = calculate_increase(
    //         WardSongothon2AssociateMember::class,
    //         $total_approved_report_info_ids_present,
    //         'associate_member_woman_briddhi',
    //     );
    //     /** ------------songothon1---------- */

    //     /** ------------songothon3---------- */
    //     /** women */
    //     $songothon3_women_previous = calculate_songothon3_previous_present(
    //         WardSongothon3DepartmentalInformation::class,
    //         $total_approved_report_info_ids_previous,
    //         'women'
    //     );
    //     $songothon3_women_present = calculate_songothon3_previous_present(
    //         WardSongothon3DepartmentalInformation::class,
    //         $total_approved_report_info_ids_present,
    //         'women'
    //     );

    //     /** sromojibi */
    //     $songothon3_sromojibi_previous = calculate_songothon3_previous_present(
    //         WardSongothon3DepartmentalInformation::class,
    //         $total_approved_report_info_ids_previous,
    //         'sromojibi'
    //     );
    //     $songothon3_sromojibi_present = calculate_songothon3_previous_present(
    //         WardSongothon3DepartmentalInformation::class,
    //         $total_approved_report_info_ids_present,
    //         'sromojibi'
    //     );

    //     /** ulama */
    //     $songothon3_ulama_previous = calculate_songothon3_previous_present(
    //         WardSongothon3DepartmentalInformation::class,
    //         $total_approved_report_info_ids_previous,
    //         'ulama'
    //     );
    //     $songothon3_ulama_present = calculate_songothon3_previous_present(
    //         WardSongothon3DepartmentalInformation::class,
    //         $total_approved_report_info_ids_present,
    //         'ulama'
    //     );
    //     /** pesha_jibi */
    //     $songothon3_pesha_jibi_previous = calculate_songothon3_previous_present(
    //         WardSongothon3DepartmentalInformation::class,
    //         $total_approved_report_info_ids_previous,
    //         'pesha_jibi'
    //     );
    //     $songothon3_pesha_jibi_present = calculate_songothon3_previous_present(
    //         WardSongothon3DepartmentalInformation::class,
    //         $total_approved_report_info_ids_present,
    //         'pesha_jibi'
    //     );
    //     /** jubo */
    //     $songothon3_jubo_previous = calculate_songothon3_previous_present(
    //         WardSongothon3DepartmentalInformation::class,
    //         $total_approved_report_info_ids_previous,
    //         'jubo'
    //     );
    //     $songothon3_jubo_present = calculate_songothon3_previous_present(
    //         WardSongothon3DepartmentalInformation::class,
    //         $total_approved_report_info_ids_present,
    //         'jubo'
    //     );
    //     /** vinno_dormalombi */
    //     $songothon3_vinno_dormalombi_previous = calculate_songothon3_previous_present(
    //         WardSongothon3DepartmentalInformation::class,
    //         $total_approved_report_info_ids_previous,
    //         'vinno_dormalombi'
    //     );
    //     $songothon3_vinno_dormalombi_present = calculate_songothon3_previous_present(
    //         WardSongothon3DepartmentalInformation::class,
    //         $total_approved_report_info_ids_present,
    //         'vinno_dormalombi'
    //     );

    //     /** ------------songothon3---------- */

    //     /** ------------songothon4---------- */
    //     /** general_unit_men */
    //     $songothon4_general_unit_men_previous = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_previous,
    //         'general_unit_men_increase',
    //         'general_unit_men_gatti'
    //     );

    //     $songothon4_general_unit_men_present = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_present,
    //         'general_unit_men_increase',
    //         'general_unit_men_gatti'
    //     );
    //     /** general_unit_women */
    //     $songothon4_general_unit_women_previous = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_previous,
    //         'general_unit_women_increase',
    //         'general_unit_women_gatti'
    //     );

    //     $songothon4_general_unit_women_present = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_present,
    //         'general_unit_women_increase',
    //         'general_unit_women_gatti'
    //     );
    //     /** ulama_unit */
    //     $songothon4_ulama_unit_previous = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_previous,
    //         'ulama_unit_increase',
    //         'ulama_unit_gatti'
    //     );

    //     $songothon4_ulama_unit_present = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_present,
    //         'ulama_unit_increase',
    //         'ulama_unit_gatti'
    //     );
    //     /** peshajibi_unit */
    //     $songothon4_peshajibi_unit_previous = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_previous,
    //         'peshajibi_unit_increase',
    //         'peshajibi_unit_gatti'
    //     );

    //     $songothon4_peshajibi_unit_present = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_present,
    //         'peshajibi_unit_increase',
    //         'peshajibi_unit_gatti'
    //     );
    //     /** sromik_kollyan_unit */
    //     $songothon4_sromik_kollyan_unit_previous = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_previous,
    //         'sromik_kollyan_unit_increase',
    //         'sromik_kollyan_unit_gatti'
    //     );

    //     $songothon4_sromik_kollyan_unit_present = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_present,
    //         'sromik_kollyan_unit_increase',
    //         'sromik_kollyan_unit_gatti'
    //     );
    //     /** jubo_unit */
    //     $songothon4_jubo_unit_previous = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_previous,
    //         'jubo_unit_increase',
    //         'jubo_unit_gatti'
    //     );

    //     $songothon4_jubo_unit_present = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_present,
    //         'jubo_unit_increase',
    //         'jubo_unit_gatti'
    //     );
    //     /** media_unit */
    //     $songothon4_media_unit_previous = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_previous,
    //         'media_unit_increase',
    //         'media_unit_gatti'
    //     );

    //     $songothon4_media_unit_present = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_present,
    //         'media_unit_increase',
    //         'media_unit_gatti'
    //     );
    //     /** ------------songothon4---------- */

    //     /** ------------songothon5---------- */
    //     /** dawati_unit */
    //     $songothon5_dawati_unit_previous = calculate_previous_present(
    //         WardSongothon5DawatAndParibarikUnit::class,
    //         $total_approved_report_info_ids_previous,
    //         'dawati_unit_increase',
    //         'dawati_unit_gatti'
    //     );

    //     $songothon5_dawati_unit_present = calculate_previous_present(
    //         WardSongothon5DawatAndParibarikUnit::class,
    //         $total_approved_report_info_ids_present,
    //         'dawati_unit_increase',
    //         'dawati_unit_gatti'
    //     );
    //     /** paribarik_unit */
    //     $songothon5_paribarik_unit_previous = calculate_previous_present(
    //         WardSongothon5DawatAndParibarikUnit::class,
    //         $total_approved_report_info_ids_previous,
    //         'paribarik_unit_increase',
    //         'paribarik_unit_gatti'
    //     );

    //     $songothon5_paribarik_unit_present = calculate_previous_present(
    //         WardSongothon5DawatAndParibarikUnit::class,
    //         $total_approved_report_info_ids_present,
    //         'paribarik_unit_increase',
    //         'paribarik_unit_gatti'
    //     );

    //     // dd($songothon5_paribarik_unit_previous,$songothon5_paribarik_unit_present);
    //     /** ------------songothon5---------- */



    //     // dd( $songothon3_vinno_dormalombi_previous,$songothon3_vinno_dormalombi_present);

    //     // ---------------------  previous and present calculation  ---------------------------

    //     // -------------------------- bm income report ------------------------------------
    //     $query = WardBmIncome::query();
    //     $filter = $query->whereYear('month', $month->clone()->year)
    //         ->whereMonth('month', $month->clone()->month)
    //         ->where('ward_id', $ward_id);
    //     $total_income = $filter->sum('amount');

    //     $category_all_id = WardBmIncomeCategory::pluck('id');
    //     $income_category_wise = [];

    //     foreach ($category_all_id as $index => $item) {
    //         $testQuery = WardBmIncome::query();
    //         $totalAmount = $testQuery->whereYear('month', $month->clone()->year)
    //             ->whereMonth('month', $month->clone()->month)
    //             ->where('ward_bm_income_category_id', $item)
    //             ->where('ward_id', $ward_id)
    //             ->sum('amount');
    //         $WardBmIncomeCategory = WardBmIncomeCategory::find($item);
    //         $income_category_wise[$index]['amount'] = $totalAmount == 0 ? "" : $totalAmount;
    //         $income_category_wise[$index]['category'] = $WardBmIncomeCategory->title;
    //     }

    //     // -------------------------- bm income report ------------------------------------

    //     // -------------------------- bm expense report ------------------------------------
    //     $query = WardBmExpense::query();
    //     $filter = $query->whereYear('date', $month->clone()->year)
    //         ->whereMonth('date', $month->clone()->month)
    //         ->where('ward_id', $ward_id);
    //     $total_expense = $filter->sum('amount');

    //     $category_ids = WardBmExpenseCategory::pluck('id');
    //     $expense_category_wise = [];

    //     foreach ($category_ids as $index => $item) {
    //         $testQuery = WardBmExpense::query();
    //         $totalAmount = $testQuery->whereYear('date', $month->clone()->year)
    //             ->whereMonth('date', $month->clone()->month)
    //             ->where('ward_bm_expense_category_id', $item)
    //             ->where('ward_id', $ward_id)
    //             ->sum('amount');
    //         $WardBmExpenseCategory = WardBmExpenseCategory::find($item);
    //         $expense_category_wise[$index]['amount'] = $totalAmount == 0 ? "" : $totalAmount;
    //         $expense_category_wise[$index]['category'] = $WardBmExpenseCategory->title;
    //     }
    //     // -------------------------- bm expense report ------------------------------------
    //     // -------------------------- bm previous report ------------------------------------
    //     $query = WardBmIncome::query();
    //     $filter = $query->whereDate('month', '<=', $month->clone()->subMonth())
    //         ->where('ward_id', $ward_id);
    //     $total_previous_income = $filter->sum('amount');

    //     $query = WardBmExpense::query();
    //     $filter = $query->whereDate('date', '<=', $month->clone()->subMonth())
    //         ->where('ward_id', $ward_id);
    //     $total_previous_expense = $filter->sum('amount');
    //     $total_previous =  $total_previous_income - $total_previous_expense;
    //     $total_current_income =  $total_previous + $total_income;
    //     $in_total =  $total_current_income - $total_expense;
    //     // -------------------------- bm previous report ------------------------------------

    //     return view('ward.ward_report')->with([
    //         'month' => $month,
    //         'org_type' => $org_type,
    //         'ward_info' => $ward_info,
    //         'thana_info' => $thana_info,
    //         'president' => $president,

    //         'dawat1' => $dawat1,
    //         'dawat2' => $dawat2,
    //         'dawat3' => $dawat3,
    //         'dawat4' => $dawat4,
    //         'department1' => $department1,
    //         'department2' => $department2,
    //         'department3' => $department3,
    //         'department4' => $department4,
    //         'department5' => $department5,
    //         'department6' => $department6,
    //         'department7' => $department7,
    //         'dawah_prokashona' => $dawah_prokashona,
    //         'kormosuci' => $kormosuci,
    //         'songothon1' => $songothon1,
    //         'songothon2' => $songothon2,
    //         'songothon3' => $songothon3,
    //         'songothon4' => $songothon4,
    //         'songothon5' => $songothon5,
    //         'songothon6' => $songothon6,
    //         'songothon7' => $songothon7,
    //         'songothon8' => $songothon8,
    //         'songothon9' => $songothon9,
    //         'proshikkhon1' => $proshikkhon1,
    //         'proshikkhon2' => $proshikkhon2,
    //         'shomajsheba1' => $shomajsheba1,
    //         'shomajsheba2' => $shomajsheba2,
    //         'shomajsheba3' => $shomajsheba3,
    //         'shomajsheba4' => $shomajsheba4,
    //         'rastrio1' => $rastrio1,
    //         'rastrio2' => $rastrio2,
    //         'rastrio3' => $rastrio3,
    //         'rastrio4' => $rastrio4,
    //         'montobbo' => $montobbo,

    //         'previous_present' => (object)[
    //             //songothon1_rokon
    //             'songothon1_rokon_previous' => $songothon1_rokon_previous,
    //             'songothon1_rokon_present' => $songothon1_rokon_present,
    //             //songothon1_worker
    //             'songothon1_worker_previous' => $songothon1_worker_previous,
    //             'songothon1_worker_present' => $songothon1_worker_present,
    //             //songothon2_associate_member_man
    //             'songothon2_associate_member_man_previous' => $songothon2_associate_member_man_previous,
    //             'songothon2_associate_member_man_present' => $songothon2_associate_member_man_present,
    //             //songothon2_associate_member_woman
    //             'songothon2_associate_member_woman_previous' => $songothon2_associate_member_woman_previous,
    //             'songothon2_associate_member_woman_present' => $songothon2_associate_member_woman_present,


    //             //songothon3_women
    //             'songothon3_women_previous' => $songothon3_women_previous,
    //             'songothon3_women_present' => $songothon3_women_present,
    //             //songothon3_sromojibi
    //             'songothon3_sromojibi_previous' => $songothon3_sromojibi_previous,
    //             'songothon3_sromojibi_present' => $songothon3_sromojibi_present,
    //             //songothon3_ulama
    //             'songothon3_ulama_previous' => $songothon3_ulama_previous,
    //             'songothon3_ulama_present' => $songothon3_ulama_present,
    //             //songothon3_pesha_jibi
    //             'songothon3_pesha_jibi_previous' => $songothon3_pesha_jibi_previous,
    //             'songothon3_pesha_jibi_present' => $songothon3_pesha_jibi_present,
    //             //songothon3_jubo
    //             'songothon3_jubo_previous' => $songothon3_jubo_previous,
    //             'songothon3_jubo_present' => $songothon3_jubo_present,
    //             //songothon3_vinno_dormalombi
    //             'songothon3_vinno_dormalombi_previous' => $songothon3_vinno_dormalombi_previous,
    //             'songothon3_vinno_dormalombi_present' => $songothon3_vinno_dormalombi_present,



    //             //songothon4_general_unit_men
    //             'songothon4_general_unit_men_previous' => $songothon4_general_unit_men_previous,
    //             'songothon4_general_unit_men_present' => $songothon4_general_unit_men_present,
    //             //songothon4_general_unit_women
    //             'songothon4_general_unit_women_previous' => $songothon4_general_unit_women_previous,
    //             'songothon4_general_unit_women_present' => $songothon4_general_unit_women_present,
    //             //songothon4_ulama_unit
    //             'songothon4_ulama_unit_previous' => $songothon4_ulama_unit_previous,
    //             'songothon4_ulama_unit_present' => $songothon4_ulama_unit_present,
    //             //songothon4_peshajibi_unit
    //             'songothon4_peshajibi_unit_previous' => $songothon4_peshajibi_unit_previous,
    //             'songothon4_peshajibi_unit_present' => $songothon4_peshajibi_unit_present,
    //             //songothon4_sromik_kollyan_unit
    //             'songothon4_sromik_kollyan_unit_previous' => $songothon4_sromik_kollyan_unit_previous,
    //             'songothon4_sromik_kollyan_unit_present' => $songothon4_sromik_kollyan_unit_present,
    //             //songothon4_jubo_unit
    //             'songothon4_jubo_unit_previous' => $songothon4_jubo_unit_previous,
    //             'songothon4_jubo_unit_present' => $songothon4_jubo_unit_present,
    //             //songothon4_media_unit
    //             'songothon4_media_unit_previous' => $songothon4_media_unit_previous,
    //             'songothon4_media_unit_present' => $songothon4_media_unit_present,


    //             //songothon5_dawati_unit
    //             'songothon5_dawati_unit_previous' => $songothon5_dawati_unit_previous,
    //             'songothon5_dawati_unit_present' => $songothon5_dawati_unit_present,
    //             //songothon5_paribarik_unit
    //             'songothon5_paribarik_unit_previous' => $songothon5_paribarik_unit_previous,
    //             'songothon5_paribarik_unit_present' => $songothon5_paribarik_unit_present,
    //         ],

    //         'income_category_wise' => $income_category_wise,
    //         'total_income' => $total_income,

    //         'expense_category_wise' => $expense_category_wise,
    //         'total_expense' => $total_expense,

    //         'total_previous' => $total_previous,
    //         'total_current_income' => $total_current_income,
    //         'in_total' => $in_total,

    //     ]);
    // }
    // public function report_upload_api()
    // {
    //     $validator = Validator::make(request()->all(), [
    //         'month' => ['required', 'date'],
    //         'user_id' => ['required'],
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'err_message' => 'validation error',
    //             'errors' => $validator->errors(),
    //         ], 422);
    //     }
    //     $org_ward_user = OrgWardUser::where('user_id', request()->user_id)->first();

    //     $ward_id = $org_ward_user->ward_id;
    //     $month = Carbon::parse(request()->month);
    //     $ward_info = OrgWard::where('id', $ward_id)->first();
    //     $thana_id = $org_ward_user->thana_id;
    //     $thana_info = OrgThana::where('id', $thana_id)->first();
    //     $org_type = OrgType::where('id', $ward_info['org_type_id'])->first();

    //     $president = null;
    //     $org_ward_responsible = OrgWardResponsible::where('org_ward_id', $ward_id)->where('responsibility_id', 1)->first();
    //     if ($org_ward_responsible) {
    //         $president = User::where('id', $org_ward_responsible->user_id)->first();
    //     }

    //     // dd($president);

    //     $report_info = ReportInfo::where('org_type_id', $ward_id)
    //         ->where('org_type', 'ward')
    //         ->whereYear('month_year', $month->clone()->year)
    //         ->whereMonth('month_year', $month->clone()->month)
    //         ->where('status', 1)
    //         ->first();

    //     if ($report_info) {
    //         $report_info_id = $report_info->id;
    //     } else {
    //         $org_type = 'ward';
    //         $org_type_id = $ward_id;
    //         $responsibility_id = null;
    //         $responsibility_name = null;
    //         $month_year = $month;
    //         $report_type = null;

    //         $report_info = report_info_create($org_type, $org_type_id, $responsibility_id, $responsibility_name, $month_year, $report_type);
    //         $report_info_id = $report_info->id;
    //     }
    //     // dd($report_info_id );
    //     // ---------------------  reports all data to show  ---------------------------
    //     $dawat1 = WardDawat1RegularGroupWise::where('report_info_id', $report_info_id)->first();
    //     $dawat2 = WardDawat2PersonalAndTarget::where('report_info_id', $report_info_id)->first();
    //     $dawat3 = WardDawat3GeneralProgramAndOthers::where('report_info_id', $report_info_id)->first();
    //     $dawat4 = WardDawat4GonoSongjogAndDawatOvijan::where('report_info_id', $report_info_id)->first();
    //     $department1 = WardDepartment1TalimulQuran::where('report_info_id', $report_info_id)->first();
    //     $department2 = WardDepartment2MohollaVittikDawat::where('report_info_id', $report_info_id)->first();
    //     $department3 = WardDepartment3JuboSomajDawat::where('report_info_id', $report_info_id)->first();
    //     $department4 = WardDepartment4DifferentJobHoldersDawat::where('report_info_id', $report_info_id)->first();
    //     $department5 = WardDepartment5ParibarikDawat::where('report_info_id', $report_info_id)->first();
    //     $department6 = WardDepartment6MosjidDawahInfomationCenter::where('report_info_id', $report_info_id)->first();
    //     $department7 = WardDepartment7DawatInTechnology::where('report_info_id', $report_info_id)->first();
    //     $dawah_prokashona = WardDawahAndProkashona::where('report_info_id', $report_info_id)->first();
    //     $kormosuci = WardKormosuciBastobayon::where('report_info_id', $report_info_id)->first();
    //     $songothon1 = WardSongothon1Jonosokti::where('report_info_id', $report_info_id)->first();
    //     $songothon2 = WardSongothon2AssociateMember::where('report_info_id', $report_info_id)->first();
    //     $songothon3 = WardSongothon3DepartmentalInformation::where('report_info_id', $report_info_id)->first();
    //     $songothon4 = WardSongothon4UnitSongothon::where('report_info_id', $report_info_id)->first();
    //     $songothon5 = WardSongothon5DawatAndParibarikUnit::where('report_info_id', $report_info_id)->first();
    //     $songothon6 = WardSongothon6BidayiStudentsConnect::where('report_info_id', $report_info_id)->first();
    //     $songothon7 = WardSongothon7Sofor::where('report_info_id', $report_info_id)->first();
    //     $songothon8 = WardSongothon8IyanotData::where('report_info_id', $report_info_id)->first();
    //     $songothon9 = WardSongothon9SangothonikBoithok::where('report_info_id', $report_info_id)->first();
    //     $proshikkhon1 = WardProshikkhon1Tarbiat::where('report_info_id', $report_info_id)->first();
    //     $proshikkhon2 = WardProshikkhon2ManobShompodUnnoyon::where('report_info_id', $report_info_id)->first();
    //     $shomajsheba1 = WardShomajsheba1PersonalSocialWork::where('report_info_id', $report_info_id)->first();
    //     $shomajsheba2 = WardShomajsheba2GroupSocialWork::where('report_info_id', $report_info_id)->first();
    //     $shomajsheba3 = WardShomajsheba3HealthAndFamilyKollan::where('report_info_id', $report_info_id)->first();
    //     $shomajsheba4 = WardShomajsheba4InstitutionalSocialWork::where('report_info_id', $report_info_id)->first();
    //     $rastrio1 = WardRastrio1PoliticalCommunication::where('report_info_id', $report_info_id)->first();
    //     $rastrio2 = WardRastrio2KormoshuchiBastobayon::where('report_info_id', $report_info_id)->first();
    //     $rastrio3 = WardRastrio3DiboshPalon::where('report_info_id', $report_info_id)->first();
    //     $rastrio4 = WardRastrio4ElectionActivity::where('report_info_id', $report_info_id)->first();
    //     $montobbo = WardMontobbo::where('report_info_id', $report_info_id)->first();
    //     // ---------------------  reports all data to show  ---------------------------

    //     // ---------------------  previous and present calculation  ---------------------------
    //     $previous_month = $month->clone()->subMonth()->endOfMonth();
    //     $total_approved_report_info_ids_previous = ReportInfo::where('org_type_id', $ward_id)
    //         ->where('org_type', 'ward')
    //         ->where('report_approved_status', 'approved')
    //         ->whereDate('month_year', '<=', $previous_month)
    //         ->pluck('id');

    //     $total_approved_report_info_ids_present = ReportInfo::where('org_type_id', $ward_id)
    //         ->where('org_type', 'ward')
    //         ->where('report_approved_status', 'approved')
    //         ->whereDate('month_year', '<=', $month->clone()->endOfMonth())
    //         ->pluck('id');
    //     /** ------------songothon1---------- */
    //     /** rokon */
    //     $songothon1_rokon_previous = calculate_previous_present(
    //         WardSongothon1Jonosokti::class,
    //         $total_approved_report_info_ids_previous,
    //         'rokon_briddhi',
    //         'rokon_gatti'
    //     );

    //     $songothon1_rokon_present = calculate_previous_present(
    //         WardSongothon1Jonosokti::class,
    //         $total_approved_report_info_ids_present,
    //         'rokon_briddhi',
    //         'rokon_gatti'
    //     );

    //     /** worker */
    //     $songothon1_worker_previous = calculate_previous_present(
    //         WardSongothon1Jonosokti::class,
    //         $total_approved_report_info_ids_previous,
    //         'worker_briddhi',
    //         'worker_gatti'
    //     );

    //     $songothon1_worker_present = calculate_previous_present(
    //         WardSongothon1Jonosokti::class,
    //         $total_approved_report_info_ids_present,
    //         'worker_briddhi',
    //         'worker_gatti'
    //     );
    //     /** ------------songothon1---------- */

    //     /** ------------songothon2---------- */
    //     /** associate_member_man */
    //     $songothon2_associate_member_man_previous = calculate_increase(
    //         WardSongothon2AssociateMember::class,
    //         $total_approved_report_info_ids_previous,
    //         'associate_member_man_briddhi',
    //     );

    //     $songothon2_associate_member_man_present = calculate_increase(
    //         WardSongothon2AssociateMember::class,
    //         $total_approved_report_info_ids_present,
    //         'associate_member_man_briddhi',
    //     );

    //     /** associate_member_woman */
    //     $songothon2_associate_member_woman_previous = calculate_increase(
    //         WardSongothon2AssociateMember::class,
    //         $total_approved_report_info_ids_previous,
    //         'associate_member_woman_briddhi',
    //     );

    //     $songothon2_associate_member_woman_present = calculate_increase(
    //         WardSongothon2AssociateMember::class,
    //         $total_approved_report_info_ids_present,
    //         'associate_member_woman_briddhi',
    //     );
    //     /** ------------songothon1---------- */

    //     /** ------------songothon3---------- */
    //     /** women */
    //     $songothon3_women_previous = calculate_songothon3_previous_present(
    //         WardSongothon3DepartmentalInformation::class,
    //         $total_approved_report_info_ids_previous,
    //         'women'
    //     );
    //     $songothon3_women_present = calculate_songothon3_previous_present(
    //         WardSongothon3DepartmentalInformation::class,
    //         $total_approved_report_info_ids_present,
    //         'women'
    //     );

    //     /** sromojibi */
    //     $songothon3_sromojibi_previous = calculate_songothon3_previous_present(
    //         WardSongothon3DepartmentalInformation::class,
    //         $total_approved_report_info_ids_previous,
    //         'sromojibi'
    //     );
    //     $songothon3_sromojibi_present = calculate_songothon3_previous_present(
    //         WardSongothon3DepartmentalInformation::class,
    //         $total_approved_report_info_ids_present,
    //         'sromojibi'
    //     );

    //     /** ulama */
    //     $songothon3_ulama_previous = calculate_songothon3_previous_present(
    //         WardSongothon3DepartmentalInformation::class,
    //         $total_approved_report_info_ids_previous,
    //         'ulama'
    //     );
    //     $songothon3_ulama_present = calculate_songothon3_previous_present(
    //         WardSongothon3DepartmentalInformation::class,
    //         $total_approved_report_info_ids_present,
    //         'ulama'
    //     );
    //     /** pesha_jibi */
    //     $songothon3_pesha_jibi_previous = calculate_songothon3_previous_present(
    //         WardSongothon3DepartmentalInformation::class,
    //         $total_approved_report_info_ids_previous,
    //         'pesha_jibi'
    //     );
    //     $songothon3_pesha_jibi_present = calculate_songothon3_previous_present(
    //         WardSongothon3DepartmentalInformation::class,
    //         $total_approved_report_info_ids_present,
    //         'pesha_jibi'
    //     );
    //     /** jubo */
    //     $songothon3_jubo_previous = calculate_songothon3_previous_present(
    //         WardSongothon3DepartmentalInformation::class,
    //         $total_approved_report_info_ids_previous,
    //         'jubo'
    //     );
    //     $songothon3_jubo_present = calculate_songothon3_previous_present(
    //         WardSongothon3DepartmentalInformation::class,
    //         $total_approved_report_info_ids_present,
    //         'jubo'
    //     );
    //     /** vinno_dormalombi */
    //     $songothon3_vinno_dormalombi_previous = calculate_songothon3_previous_present(
    //         WardSongothon3DepartmentalInformation::class,
    //         $total_approved_report_info_ids_previous,
    //         'vinno_dormalombi'
    //     );
    //     $songothon3_vinno_dormalombi_present = calculate_songothon3_previous_present(
    //         WardSongothon3DepartmentalInformation::class,
    //         $total_approved_report_info_ids_present,
    //         'vinno_dormalombi'
    //     );

    //     /** ------------songothon3---------- */

    //     /** ------------songothon4---------- */
    //     /** general_unit_men */
    //     $songothon4_general_unit_men_previous = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_previous,
    //         'general_unit_men_increase',
    //         'general_unit_men_gatti'
    //     );

    //     $songothon4_general_unit_men_present = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_present,
    //         'general_unit_men_increase',
    //         'general_unit_men_gatti'
    //     );
    //     /** general_unit_women */
    //     $songothon4_general_unit_women_previous = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_previous,
    //         'general_unit_women_increase',
    //         'general_unit_women_gatti'
    //     );

    //     $songothon4_general_unit_women_present = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_present,
    //         'general_unit_women_increase',
    //         'general_unit_women_gatti'
    //     );
    //     /** ulama_unit */
    //     $songothon4_ulama_unit_previous = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_previous,
    //         'ulama_unit_increase',
    //         'ulama_unit_gatti'
    //     );

    //     $songothon4_ulama_unit_present = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_present,
    //         'ulama_unit_increase',
    //         'ulama_unit_gatti'
    //     );
    //     /** peshajibi_unit */
    //     $songothon4_peshajibi_unit_previous = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_previous,
    //         'peshajibi_unit_increase',
    //         'peshajibi_unit_gatti'
    //     );

    //     $songothon4_peshajibi_unit_present = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_present,
    //         'peshajibi_unit_increase',
    //         'peshajibi_unit_gatti'
    //     );
    //     /** sromik_kollyan_unit */
    //     $songothon4_sromik_kollyan_unit_previous = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_previous,
    //         'sromik_kollyan_unit_increase',
    //         'sromik_kollyan_unit_gatti'
    //     );

    //     $songothon4_sromik_kollyan_unit_present = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_present,
    //         'sromik_kollyan_unit_increase',
    //         'sromik_kollyan_unit_gatti'
    //     );
    //     /** jubo_unit */
    //     $songothon4_jubo_unit_previous = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_previous,
    //         'jubo_unit_increase',
    //         'jubo_unit_gatti'
    //     );

    //     $songothon4_jubo_unit_present = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_present,
    //         'jubo_unit_increase',
    //         'jubo_unit_gatti'
    //     );
    //     /** media_unit */
    //     $songothon4_media_unit_previous = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_previous,
    //         'media_unit_increase',
    //         'media_unit_gatti'
    //     );

    //     $songothon4_media_unit_present = calculate_previous_present(
    //         WardSongothon4UnitSongothon::class,
    //         $total_approved_report_info_ids_present,
    //         'media_unit_increase',
    //         'media_unit_gatti'
    //     );
    //     /** ------------songothon4---------- */

    //     /** ------------songothon5---------- */
    //     /** dawati_unit */
    //     $songothon5_dawati_unit_previous = calculate_previous_present(
    //         WardSongothon5DawatAndParibarikUnit::class,
    //         $total_approved_report_info_ids_previous,
    //         'dawati_unit_increase',
    //         'dawati_unit_gatti'
    //     );

    //     $songothon5_dawati_unit_present = calculate_previous_present(
    //         WardSongothon5DawatAndParibarikUnit::class,
    //         $total_approved_report_info_ids_present,
    //         'dawati_unit_increase',
    //         'dawati_unit_gatti'
    //     );
    //     /** paribarik_unit */
    //     $songothon5_paribarik_unit_previous = calculate_previous_present(
    //         WardSongothon5DawatAndParibarikUnit::class,
    //         $total_approved_report_info_ids_previous,
    //         'paribarik_unit_increase',
    //         'paribarik_unit_gatti'
    //     );

    //     $songothon5_paribarik_unit_present = calculate_previous_present(
    //         WardSongothon5DawatAndParibarikUnit::class,
    //         $total_approved_report_info_ids_present,
    //         'paribarik_unit_increase',
    //         'paribarik_unit_gatti'
    //     );

    //     // dd($songothon5_paribarik_unit_previous,$songothon5_paribarik_unit_present);
    //     /** ------------songothon5---------- */



    //     // dd( $songothon3_vinno_dormalombi_previous,$songothon3_vinno_dormalombi_present);

    //     // ---------------------  previous and present calculation  ---------------------------

    //     // -------------------------- bm income report ------------------------------------
    //     $query = WardBmIncome::query();
    //     $filter = $query->whereYear('month', $month->clone()->year)
    //         ->whereMonth('month', $month->clone()->month)
    //         ->where('ward_id', $ward_id);
    //     $total_income = $filter->sum('amount');

    //     $category = $filter->with('ward_bm_income_category')->pluck('ward_bm_income_category_id')->all();
    //     $category_all_id = array_values(array_unique($category));

    //     $income_category_wise = [];
    //     foreach ($category_all_id as $index => $item) {
    //         $testQuery = WardBmIncome::query();
    //         $totalAmount = $testQuery->whereYear('month', $month->clone()->year)
    //             ->whereMonth('month', $month->clone()->month)
    //             ->where('ward_bm_income_category_id', $item)
    //             ->where('ward_id', $ward_id)
    //             ->sum('amount');
    //         $WardBmIncomeCategory = WardBmIncomeCategory::find($item);
    //         if (!$WardBmIncomeCategory) {
    //             // dd($WardBmIncomeCategory ,$item);
    //         }
    //         $income_category_wise[$index]['amount'] = $totalAmount == 0 ? "" : $totalAmount;
    //         $income_category_wise[$index]['category'] = $WardBmIncomeCategory->title ?? "";
    //     }
    //     // -------------------------- bm income report ------------------------------------

    //     // -------------------------- bm expense report ------------------------------------
    //     $query = WardBmExpense::query();
    //     $filter = $query->whereYear('date', $month->clone()->year)
    //         ->whereMonth('date', $month->clone()->month)
    //         ->where('ward_id', $ward_id);
    //     $total_expense = $filter->sum('amount');

    //     $category_id = $filter->with('ward_bm_expense_category')->pluck('ward_bm_expense_category_id')->all();
    //     $category_unique_id = array_values(array_unique($category_id));

    //     $expense_category_wise = [];
    //     // dd($category_unique_id);
    //     foreach ($category_unique_id as $index => $item) {
    //         $testQuery = WardBmExpense::query();
    //         $totalAmount = $testQuery->whereYear('date', $month->clone()->year)
    //             ->whereMonth('date', $month->clone()->month)
    //             ->where('ward_bm_expense_category_id', $item)
    //             ->where('ward_id', $ward_id)
    //             ->sum('amount');
    //         // dd($item);
    //         $WardBmExpenseCategory = WardBmExpenseCategory::find($item);
    //         $expense_category_wise[$index]['amount'] = $totalAmount;
    //         $expense_category_wise[$index]['category'] = $WardBmExpenseCategory->title;
    //     }
    //     // -------------------------- bm expense report ------------------------------------
    //     // -------------------------- bm previous report ------------------------------------
    //     $query = WardBmIncome::query();
    //     $filter = $query->whereDate('month', '<=', $month->clone()->subMonth())
    //         ->where('ward_id', $ward_id);
    //     $total_previous_income = $filter->sum('amount');
    //     // dd($total_previous_income);

    //     $query = WardBmExpense::query();
    //     $filter = $query->whereDate('date', '<=', $month->clone()->subMonth())
    //         ->where('ward_id', $ward_id);
    //     $total_previous_expense = $filter->sum('amount');
    //     $total_previous =  $total_previous_income - $total_previous_expense;
    //     $total_current_income =  $total_previous + $total_income;
    //     $in_total =  $total_current_income - $total_expense;
    //     // dd($total_previous_income,$total_previous_expense,$total_previous);
    //     // -------------------------- bm previous report ------------------------------------
    //     // dd(
    //     //     'status',"success",
    //     //     'month',$month->toArray(),
    //     //     'org_type',$org_type->toArray(),
    //     //     'ward_info',$ward_info->toArray(),
    //     //     'ward_info',$ward_info->toArray(),
    //     //     'thana_info',$thana_info->toArray(),
    //     //     'president',$president->toArray(),

    //     //     'dawat1',$dawat1,
    //     //     'dawat2',$dawat2,
    //     //     'dawat3',$dawat3,
    //     //     'dawat4',$dawat4,
    //     //     'department1',$department1,
    //     //     'department2',$department2,
    //     //     'department3',$department3,
    //     //     'department4',$department4,
    //     //     'department5',$department5,
    //     //     'department6',$department6,
    //     //     'department7',$department7,
    //     //     'dawah_prokashona',$dawah_prokashona,
    //     //     'kormosuci',$kormosuci,
    //     //     'songothon1',$songothon1,
    //     //     'songothon2',$songothon2,
    //     //     'songothon3',$songothon3,
    //     //     'songothon4',$songothon4,
    //     //     'songothon5',$songothon5,
    //     //     'songothon6',$songothon6,
    //     //     'songothon7',$songothon7,
    //     //     'songothon8',$songothon8,
    //     //     'songothon9',$songothon9,
    //     //     'proshikkhon1',$proshikkhon1,
    //     //     'proshikkhon2',$proshikkhon2,
    //     //     'shomajsheba1',$shomajsheba1,
    //     //     'shomajsheba2',$shomajsheba2,
    //     //     'shomajsheba3',$shomajsheba3,
    //     //     'shomajsheba4',$shomajsheba4,
    //     //     'rastrio1',$rastrio1,
    //     //     'rastrio2',$rastrio2,
    //     //     'rastrio3',$rastrio3,
    //     //     'rastrio4',$rastrio4,
    //     //     'montobbo',$montobbo,

    //     //     'income_category_wise',$income_category_wise,
    //     //     'total_income',$total_income,

    //     //     'expense_category_wise',$expense_category_wise,
    //     //     'total_expense',$total_expense,
    //     // );

    //     return response()->json([
    //         'status' => "success",
    //         'month' => $month,
    //         'org_type' => $org_type,
    //         'ward_info' => $ward_info,
    //         'thana_info' => $thana_info,
    //         'president' => $president,

    //         'dawat1' => $dawat1,
    //         'dawat2' => $dawat2,
    //         'dawat3' => $dawat3,
    //         'dawat4' => $dawat4,
    //         'department1' => $department1,
    //         'department2' => $department2,
    //         'department3' => $department3,
    //         'department4' => $department4,
    //         'department5' => $department5,
    //         'department6' => $department6,
    //         'department7' => $department7,
    //         'dawah_prokashona' => $dawah_prokashona,
    //         'kormosuci' => $kormosuci,
    //         'songothon1' => $songothon1,
    //         'songothon2' => $songothon2,
    //         'songothon3' => $songothon3,
    //         'songothon4' => $songothon4,
    //         'songothon5' => $songothon5,
    //         'songothon6' => $songothon6,
    //         'songothon7' => $songothon7,
    //         'songothon8' => $songothon8,
    //         'songothon9' => $songothon9,
    //         'proshikkhon1' => $proshikkhon1,
    //         'proshikkhon2' => $proshikkhon2,
    //         'shomajsheba1' => $shomajsheba1,
    //         'shomajsheba2' => $shomajsheba2,
    //         'shomajsheba3' => $shomajsheba3,
    //         'shomajsheba4' => $shomajsheba4,
    //         'rastrio1' => $rastrio1,
    //         'rastrio2' => $rastrio2,
    //         'rastrio3' => $rastrio3,
    //         'rastrio4' => $rastrio4,
    //         'montobbo' => $montobbo,

    //         'previous_present' => (object)[
    //             //songothon1_rokon
    //             'songothon1_rokon_previous' => $songothon1_rokon_previous,
    //             'songothon1_rokon_present' => $songothon1_rokon_present,
    //             //songothon1_worker
    //             'songothon1_worker_previous' => $songothon1_worker_previous,
    //             'songothon1_worker_present' => $songothon1_worker_present,
    //             //songothon2_associate_member_man
    //             'songothon2_associate_member_man_previous' => $songothon2_associate_member_man_previous,
    //             'songothon2_associate_member_man_present' => $songothon2_associate_member_man_present,
    //             //songothon2_associate_member_woman
    //             'songothon2_associate_member_woman_previous' => $songothon2_associate_member_woman_previous,
    //             'songothon2_associate_member_woman_present' => $songothon2_associate_member_woman_present,


    //             //songothon3_women
    //             'songothon3_women_previous' => $songothon3_women_previous,
    //             'songothon3_women_present' => $songothon3_women_present,
    //             //songothon3_sromojibi
    //             'songothon3_sromojibi_previous' => $songothon3_sromojibi_previous,
    //             'songothon3_sromojibi_present' => $songothon3_sromojibi_present,
    //             //songothon3_ulama
    //             'songothon3_ulama_previous' => $songothon3_ulama_previous,
    //             'songothon3_ulama_present' => $songothon3_ulama_present,
    //             //songothon3_pesha_jibi
    //             'songothon3_pesha_jibi_previous' => $songothon3_pesha_jibi_previous,
    //             'songothon3_pesha_jibi_present' => $songothon3_pesha_jibi_present,
    //             //songothon3_jubo
    //             'songothon3_jubo_previous' => $songothon3_jubo_previous,
    //             'songothon3_jubo_present' => $songothon3_jubo_present,
    //             //songothon3_vinno_dormalombi
    //             'songothon3_vinno_dormalombi_previous' => $songothon3_vinno_dormalombi_previous,
    //             'songothon3_vinno_dormalombi_present' => $songothon3_vinno_dormalombi_present,



    //             //songothon4_general_unit_men
    //             'songothon4_general_unit_men_previous' => $songothon4_general_unit_men_previous,
    //             'songothon4_general_unit_men_present' => $songothon4_general_unit_men_present,
    //             //songothon4_general_unit_women
    //             'songothon4_general_unit_women_previous' => $songothon4_general_unit_women_previous,
    //             'songothon4_general_unit_women_present' => $songothon4_general_unit_women_present,
    //             //songothon4_ulama_unit
    //             'songothon4_ulama_unit_previous' => $songothon4_ulama_unit_previous,
    //             'songothon4_ulama_unit_present' => $songothon4_ulama_unit_present,
    //             //songothon4_peshajibi_unit
    //             'songothon4_peshajibi_unit_previous' => $songothon4_peshajibi_unit_previous,
    //             'songothon4_peshajibi_unit_present' => $songothon4_peshajibi_unit_present,
    //             //songothon4_sromik_kollyan_unit
    //             'songothon4_sromik_kollyan_unit_previous' => $songothon4_sromik_kollyan_unit_previous,
    //             'songothon4_sromik_kollyan_unit_present' => $songothon4_sromik_kollyan_unit_present,
    //             //songothon4_jubo_unit
    //             'songothon4_jubo_unit_previous' => $songothon4_jubo_unit_previous,
    //             'songothon4_jubo_unit_present' => $songothon4_jubo_unit_present,
    //             //songothon4_media_unit
    //             'songothon4_media_unit_previous' => $songothon4_media_unit_previous,
    //             'songothon4_media_unit_present' => $songothon4_media_unit_present,


    //             //songothon5_dawati_unit
    //             'songothon5_dawati_unit_previous' => $songothon5_dawati_unit_previous,
    //             'songothon5_dawati_unit_present' => $songothon5_dawati_unit_present,
    //             //songothon5_paribarik_unit
    //             'songothon5_paribarik_unit_previous' => $songothon5_paribarik_unit_previous,
    //             'songothon5_paribarik_unit_present' => $songothon5_paribarik_unit_present,
    //         ],

    //         'income_category_wise' => $income_category_wise,
    //         'total_income' => $total_income,

    //         'expense_category_wise' => $expense_category_wise,
    //         'total_expense' => $total_expense,

    //         'total_previous' => $total_previous,
    //         'total_current_income' => $total_current_income,
    //         'in_total' => $in_total,
    //     ], 200);
    // }


    // public function submitted_units_data_add()
    // {
    //     $validator = Validator::make(request()->all(), [
    //         'month' => ['required', 'date'],
    //         'user_id' => ['required'],
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'err_message' => 'validation error',
    //             'errors' => $validator->errors(),
    //         ], 422);
    //     }

    //     // dd(request()->all());
    //     $ward_user = User::where('id', request()->user_id)->with('org_ward_user')->get()->first();

    //     $ward_id = $ward_user->org_ward_user['ward_id'];
    //     $month = Carbon::parse(request()->month);
    //     $units = OrgUnit::where('org_ward_id', $ward_id)->get();

    //     $report_info_ids = [];
    //     $ward_ids = [];
    //     $approved_ward_ids = [];
    //     foreach ($units as $index => $unit) {
    //         $unit_id = $unit->id;
    //         $ward_ids[] = $unit_id;
    //         $report_info = ReportInfo::where('org_type_id', $unit_id)
    //             ->where('org_type', 'unit')
    //             ->whereYear('month_year', $month->clone()->year)
    //             ->whereMonth('month_year', $month->clone()->month)
    //             ->where('report_approved_status', 'approved')
    //             ->where('status', 1)
    //             ->get()
    //             ->first();

    //         if ($report_info) {
    //             $report_info_id = $report_info->id;
    //             $report_info_ids[] = $report_info_id;
    //             $approved_ward_ids[] = $report_info->org_type_id;
    //         }
    //     }
    //     // dd($ward_ids,$report_info_ids,$approved_ward_ids,$month);

    //     $all_dawat1 = [
    //         'how_many_groups_are_out' => 0,
    //         'number_of_participants' => 0,
    //         'how_many_have_been_invited' => 0,
    //         'how_many_associate_members_created' => 0,
    //     ];
    //     $all_dawat2 = [
    //         'total_rokon' => 0,
    //         'total_worker' => 0,
    //         'how_many_were_give_dawat_rokon' => 0,
    //         'how_many_were_give_dawat_worker' => 0,
    //         'how_many_have_been_invited' => 0,
    //         'how_many_associate_members_created' => 0,
    //     ];
    //     $all_dawat3 = [
    //         'how_many_were_give_dawat' => 0,
    //         'how_many_associate_members_created' => 0,
    //     ];
    //     $all_dawat4 = [
    //         'total_gono_songjog_group' => 0,
    //         'total_attended' => 0,
    //         'how_many_have_been_invited' => 0,
    //         'how_many_associate_members_created' => 0,

    //         'jela_mohanogor_declared_gonosonjog_group' => 0,
    //         'jela_mohanogor_declared_gonosonjog_attended' => 0,
    //         'jela_mohanogor_declared_gonosonjog_invited' => 0,
    //         'jela_mohanogor_declared_gonosonjog_associated_created' => 0,
    //     ];
    //     $all_department1 = [
    //         'teacher_rokon' => 0,
    //         'teacher_worker' => 0,
    //         'student_rokon' => 0,
    //         'student_worker' => 0,

    //         'how_much_learned_quran' => 0,
    //         'how_much_invited' => 0,
    //         'how_much_been_associated' => 0,
    //     ];
    //     $all_department4 = [
    //         'political_and_special_invited' => 0,
    //         'political_and_special_been_associated' => 0,
    //         'political_and_special_target' => 0,

    //         'prantik_jonogosti_invited' => 0,
    //         'prantik_jonogosti_been_associated' => 0,
    //         'prantik_jonogosti_target' => 0,

    //         'vinno_dormalombi_invited' => 0,
    //         'vinno_dormalombi_been_associated' => 0,
    //         'vinno_dormalombi_target' => 0,
    //     ];
    //     $all_department5 = [
    //         'total_attended_family' => 0,
    //         'how_many_new_family_invited' => 0,
    //     ];
    //     $all_dawah_prokashona = [
    //         'books_in_pathagar' => 0,
    //         'books_in_pathagar_increase' => 0,

    //         'unit_book_distribution_center' => 0,
    //         'unit_book_distribution_center_increase' => 0,

    //         'unit_book_distribution' => 0,
    //         'unit_book_distribution_increase' => 0,

    //         'soft_copy_book_distribution' => 0,
    //         'soft_copy_book_distribution_increase' => 0,

    //         'dawat_link_distribution' => 0,
    //         'dawat_link_distribution_increase' => 0,

    //         'sonar_bangla' => 0,
    //         'sonar_bangla_increase' => 0,

    //         'songram' => 0,
    //         'songram_increase' => 0,

    //         'prithibi' => 0,
    //         'prithibi_increase' => 0,
    //     ];
    //     $all_kormosuci = [
    //         'unit_masik_sadaron_sova_total' => 0,
    //         'unit_masik_sadaron_sova_target' => 0,
    //         'unit_masik_sadaron_sova_uposthiti' => 0,

    //         'iftar_mahfil_personal_total' => 0,
    //         'iftar_mahfil_personal_target' => 0,
    //         'iftar_mahfil_personal_uposthiti' => 0,

    //         'iftar_mahfil_samostic_total' => 0,
    //         'iftar_mahfil_samostic_target' => 0,
    //         'iftar_mahfil_samostic_uposthiti' => 0,

    //         'cha_chakra_total' => 0,
    //         'cha_chakra_target' => 0,
    //         'cha_chakra_uposthiti' => 0,

    //         'samostic_khawa_total' => 0,
    //         'samostic_khawa_target' => 0,
    //         'samostic_khawa_uposthiti' => 0,

    //         'sikkha_sofor_total' => 0,
    //         'sikkha_sofor_target' => 0,
    //         'sikkha_sofor_uposthiti' => 0,

    //     ];
    //     $all_songothon1 = [
    //         'rokon_previous' => 0,
    //         'rokon_present' => 0,
    //         'rokon_briddhi' => 0,
    //         'rokon_gatti' => 0,
    //         'rokon_target' => 0,
    //         'worker_previous' => 0,
    //         'worker_present' => 0,
    //         'worker_briddhi' => 0,
    //         'worker_gatti' => 0,
    //         'worker_target' => 0,
    //     ];
    //     $all_songothon2 = [
    //         'associate_member_previous' => 0,
    //         'associate_member_present' => 0,
    //         'associate_member_briddhi' => 0,
    //         'associate_member_target' => 0,
    //         'vinno_dormalombi_worker_previous' => 0,
    //         'vinno_dormalombi_worker_present' => 0,
    //         'vinno_dormalombi_worker_briddhi' => 0,
    //         'vinno_dormalombi_worker_target' => 0,
    //         'vinno_dormalombi_associate_member_previous' => 0,
    //         'vinno_dormalombi_associate_member_present' => 0,
    //         'vinno_dormalombi_associate_member_briddhi' => 0,
    //         'vinno_dormalombi_associate_member_target' => 0,
    //     ];
    //     $all_songothon9 = [
    //         'unit_kormi_boithok_total' => 0,
    //         'unit_kormi_boithok_uposthiti' => 0,
    //     ];
    //     $all_songothon5 = [
    //         'paribarik_unit_total' => 0,
    //         'paribarik_unit_increase' => 0,
    //         'paribarik_unit_target' => 0,
    //     ];
    //     $all_songothon7 = [
    //         'upper_leader_sofor' => 0,
    //     ];
    //     $all_songothon8 = [
    //         'associate_member_total' => 0,
    //         'associate_member_total_iyanot_amounts' => 0,
    //         'sudhi_total' => 0,
    //         'sudi_total_iyanot_amounts' => 0,
    //     ];
    //     $all_proshikkhon = [
    //         'sohi_quran_onushilon' => 0,
    //         'sohi_quran_onushilon_target' => 0,
    //         'sohi_quran_onushilon_uposthiti' => 0,

    //         'masala_masayel' => 0,
    //         'masala_masayel_target' => 0,
    //         'masala_masayel_uposthiti' => 0,

    //         'darsul_quran' => 0,
    //         'darsul_quran_target' => 0,
    //         'darsul_quran_uposthiti' => 0,

    //         'darsul_hadis' => 0,
    //         'darsul_hadis_target' => 0,
    //         'darsul_hadis_uposthiti' => 0,

    //         'samostik_path' => 0,
    //         'samostik_path_target' => 0,
    //         'samostik_path_uposthiti' => 0,

    //         'bishoy_vittik_onushilon' => 0,
    //         'bishoy_vittik_onushilon_target' => 0,
    //         'bishoy_vittik_onushilon_uposthiti' => 0,
    //     ];
    //     $all_shomajsheba1 = [
    //         'how_many_people_did' => 0,
    //         'service_received_total' => 0,
    //     ];
    //     $all_shomajsheba2 = [
    //         'shamajik_onusthane_ongshogrohon' => 0,
    //         'shamajik_onusthane_shohayota_prodan' => 0,
    //         'shamajik_birodh_mimangsha' => 0,
    //         'manobik_shohayota_prodan' => 0,
    //         'korje_hasana_prodan' => 0,
    //         'rogir_poricorja' => 0,
    //         'medical_shohayota_prodan' => 0,
    //         'nobojatokke_gift_prodan' => 0,
    //         'voluntarily_blood_donation_kotojon' => 0,
    //         'voluntarily_blood_donation_kotojonke' => 0,
    //         'matrikalin_sheba_prodan_kotojon' => 0,
    //         'matrikalin_sheba_prodan_kotojonke' => 0,
    //         'mayeter_gosol' => 0,
    //         'others' => 0,

    //     ];
    //     $all_rastrio = [
    //         'bishishto_bekti_jogajog' => 0,
    //     ];
    //     $all_montobbo = [
    //         'montobbo' => [],
    //     ];

    //     $all_income_category_wise = [];
    //     $all_total_income = "";

    //     $all_expense_category_wise = [];
    //     $all_total_expense = [];

    //     foreach ($report_info_ids as $index => $report_info_id) {

    //         // ---------------------  reports all data to show  ---------------------------
    //         $dawat1 = Dawat1RegularGroupWise::where('report_info_id', $report_info_id)->get()->first();
    //         $dawat2 = Dawat2PersonalAndTarget::where('report_info_id', $report_info_id)->get()->first();
    //         $dawat3 = Dawat3GeneralProgramAndOthers::where('report_info_id', $report_info_id)->get()->first();
    //         $dawat4 = Dawat4GonoSongjogAndDawatOvijan::where('report_info_id', $report_info_id)->get()->first();
    //         $department1 = Department1TalimulQuran::where('report_info_id', $report_info_id)->get()->first();
    //         $department4 = Department4DifferentJobHoldersDawat::where('report_info_id', $report_info_id)->get()->first();
    //         $department5 = Department5ParibarikDawat::where('report_info_id', $report_info_id)->get()->first();
    //         $dawah_prokashona = DawahAndProkashona::where('report_info_id', $report_info_id)->get()->first();
    //         $kormosuci = KormosuciBastobayon::where('report_info_id', $report_info_id)->get()->first();
    //         $songothon1 = Songothon1Jonosokti::where('report_info_id', $report_info_id)->get()->first();
    //         $songothon2 = Songothon2AssociateMember::where('report_info_id', $report_info_id)->get()->first();
    //         $songothon9 = Songothon9SangothonikBoithok::where('report_info_id', $report_info_id)->get()->first();
    //         $songothon5 = Songothon5DawatAndParibarikUnit::where('report_info_id', $report_info_id)->get()->first();
    //         $songothon7 = Songothon7Sofor::where('report_info_id', $report_info_id)->get()->first();
    //         $songothon8 = Songothon8IyanotData::where('report_info_id', $report_info_id)->get()->first();
    //         $proshikkhon = Proshikkhon1Tarbiat::where('report_info_id', $report_info_id)->get()->first();
    //         $shomajsheba1 = Shomajsheba1PersonalSocialWork::where('report_info_id', $report_info_id)->get()->first();
    //         $shomajsheba2 = Shomajsheba2UnitSocialWork::where('report_info_id', $report_info_id)->get()->first();
    //         $rastrio = Rastrio1BishishtoBekti::where('report_info_id', $report_info_id)->get()->first();
    //         $montobbo = Montobbo::where('report_info_id', $report_info_id)->get()->first();
    //         // ---------------------  reports all data to show  ---------------------------

    //         $all_dawat1['how_many_groups_are_out'] += $dawat1->how_many_groups_are_out;
    //         $all_dawat1['number_of_participants'] += $dawat1->number_of_participants;
    //         $all_dawat1['how_many_have_been_invited'] += $dawat1->how_many_have_been_invited;
    //         $all_dawat1['how_many_associate_members_created'] += $dawat1->how_many_associate_members_created;

    //         $all_dawat2['total_rokon'] += $dawat2->total_rokon;
    //         $all_dawat2['total_worker'] += $dawat2->total_worker;
    //         $all_dawat2['how_many_were_give_dawat_rokon'] += $dawat2->how_many_were_give_dawat_rokon;
    //         $all_dawat2['how_many_were_give_dawat_worker'] += $dawat2->how_many_were_give_dawat_worker;
    //         $all_dawat2['how_many_have_been_invited'] += $dawat2->how_many_have_been_invited;
    //         $all_dawat2['how_many_associate_members_created'] += $dawat2->how_many_associate_members_created;

    //         $all_dawat3['how_many_were_give_dawat'] += $dawat3->how_many_were_give_dawat;
    //         $all_dawat3['how_many_associate_members_created'] += $dawat3->how_many_associate_members_created;

    //         $all_dawat4['total_gono_songjog_group'] += $dawat4->total_gono_songjog_group;
    //         $all_dawat4['total_attended'] += $dawat4->total_attended;
    //         $all_dawat4['how_many_have_been_invited'] += $dawat4->how_many_have_been_invited;
    //         $all_dawat4['how_many_associate_members_created'] += $dawat4->how_many_associate_members_created;
    //         $all_dawat4['jela_mohanogor_declared_gonosonjog_group'] += $dawat4->jela_mohanogor_declared_gonosonjog_group;
    //         $all_dawat4['jela_mohanogor_declared_gonosonjog_attended'] += $dawat4->jela_mohanogor_declared_gonosonjog_attended;
    //         $all_dawat4['jela_mohanogor_declared_gonosonjog_invited'] += $dawat4->jela_mohanogor_declared_gonosonjog_invited;
    //         $all_dawat4['jela_mohanogor_declared_gonosonjog_associated_created'] += $dawat4->jela_mohanogor_declared_gonosonjog_associated_created;

    //         $all_department1['teacher_rokon'] += $department1->teacher_rokon;
    //         $all_department1['teacher_worker'] += $department1->teacher_worker;
    //         $all_department1['student_rokon'] += $department1->student_rokon;
    //         $all_department1['student_worker'] += $department1->student_worker;
    //         $all_department1['how_much_learned_quran'] += $department1->how_much_learned_quran;
    //         $all_department1['how_much_invited'] += $department1->how_much_invited;
    //         $all_department1['how_much_been_associated'] += $department1->how_much_been_associated;

    //         $all_department4['political_and_special_invited'] += $department4->political_and_special_invited;
    //         $all_department4['political_and_special_been_associated'] += $department4->political_and_special_been_associated;
    //         $all_department4['political_and_special_target'] += $department4->political_and_special_target;
    //         $all_department4['prantik_jonogosti_invited'] += $department4->prantik_jonogosti_invited;
    //         $all_department4['prantik_jonogosti_been_associated'] += $department4->prantik_jonogosti_been_associated;
    //         $all_department4['prantik_jonogosti_target'] += $department4->prantik_jonogosti_target;
    //         $all_department4['vinno_dormalombi_invited'] += $department4->vinno_dormalombi_invited;
    //         $all_department4['vinno_dormalombi_been_associated'] += $department4->vinno_dormalombi_been_associated;
    //         $all_department4['vinno_dormalombi_target'] += $department4->vinno_dormalombi_target;

    //         $all_department5['total_attended_family'] += $department5->total_attended_family;
    //         $all_department5['how_many_new_family_invited'] += $department5->how_many_new_family_invited;

    //         $all_dawah_prokashona['books_in_pathagar'] += $dawah_prokashona->books_in_pathagar;
    //         $all_dawah_prokashona['books_in_pathagar_increase'] += $dawah_prokashona->books_in_pathagar_increase;
    //         $all_dawah_prokashona['unit_book_distribution_center'] += $dawah_prokashona->unit_book_distribution_center;
    //         $all_dawah_prokashona['unit_book_distribution_center_increase'] += $dawah_prokashona->unit_book_distribution_center_increase;
    //         $all_dawah_prokashona['unit_book_distribution'] += $dawah_prokashona->unit_book_distribution;
    //         $all_dawah_prokashona['unit_book_distribution_increase'] += $dawah_prokashona->unit_book_distribution_increase;
    //         $all_dawah_prokashona['soft_copy_book_distribution'] += $dawah_prokashona->soft_copy_book_distribution;
    //         $all_dawah_prokashona['soft_copy_book_distribution_increase'] += $dawah_prokashona->soft_copy_book_distribution_increase;
    //         $all_dawah_prokashona['dawat_link_distribution'] += $dawah_prokashona->dawat_link_distribution;
    //         $all_dawah_prokashona['dawat_link_distribution_increase'] += $dawah_prokashona->dawat_link_distribution_increase;
    //         $all_dawah_prokashona['sonar_bangla'] += $dawah_prokashona->sonar_bangla;
    //         $all_dawah_prokashona['sonar_bangla_increase'] += $dawah_prokashona->sonar_bangla_increase;
    //         $all_dawah_prokashona['songram'] += $dawah_prokashona->songram;
    //         $all_dawah_prokashona['songram_increase'] += $dawah_prokashona->songram_increase;
    //         $all_dawah_prokashona['prithibi'] += $dawah_prokashona->prithibi;
    //         $all_dawah_prokashona['prithibi_increase'] += $dawah_prokashona->prithibi_increase;

    //         $all_kormosuci['unit_masik_sadaron_sova_total'] += $kormosuci->unit_masik_sadaron_sova_total;
    //         $all_kormosuci['unit_masik_sadaron_sova_target'] += $kormosuci->unit_masik_sadaron_sova_target;
    //         $all_kormosuci['unit_masik_sadaron_sova_uposthiti'] += $kormosuci->unit_masik_sadaron_sova_uposthiti;

    //         $all_kormosuci['iftar_mahfil_personal_total'] += $kormosuci->iftar_mahfil_personal_total;
    //         $all_kormosuci['iftar_mahfil_personal_target'] += $kormosuci->iftar_mahfil_personal_target;
    //         $all_kormosuci['iftar_mahfil_personal_uposthiti'] += $kormosuci->iftar_mahfil_personal_uposthiti;

    //         $all_kormosuci['iftar_mahfil_samostic_total'] += $kormosuci->iftar_mahfil_samostic_total;
    //         $all_kormosuci['iftar_mahfil_samostic_target'] += $kormosuci->iftar_mahfil_samostic_target;
    //         $all_kormosuci['iftar_mahfil_samostic_uposthiti'] += $kormosuci->iftar_mahfil_samostic_uposthiti;

    //         $all_kormosuci['cha_chakra_total'] += $kormosuci->cha_chakra_total;
    //         $all_kormosuci['cha_chakra_target'] += $kormosuci->cha_chakra_target;
    //         $all_kormosuci['cha_chakra_uposthiti'] += $kormosuci->cha_chakra_uposthiti;

    //         $all_kormosuci['samostic_khawa_total'] += $kormosuci->samostic_khawa_total;
    //         $all_kormosuci['samostic_khawa_target'] += $kormosuci->samostic_khawa_target;
    //         $all_kormosuci['samostic_khawa_uposthiti'] += $kormosuci->samostic_khawa_uposthiti;

    //         $all_kormosuci['sikkha_sofor_total'] += $kormosuci->sikkha_sofor_total;
    //         $all_kormosuci['sikkha_sofor_target'] += $kormosuci->sikkha_sofor_target;
    //         $all_kormosuci['sikkha_sofor_uposthiti'] += $kormosuci->sikkha_sofor_uposthiti;

    //         $all_songothon1['rokon_previous'] += $songothon1->rokon_previous;
    //         $all_songothon1['rokon_present'] += $songothon1->rokon_present;
    //         $all_songothon1['rokon_briddhi'] += $songothon1->rokon_briddhi;
    //         $all_songothon1['rokon_gatti'] += $songothon1->rokon_gatti;
    //         $all_songothon1['rokon_target'] += $songothon1->rokon_target;
    //         $all_songothon1['worker_previous'] += $songothon1->worker_previous;
    //         $all_songothon1['worker_present'] += $songothon1->worker_present;
    //         $all_songothon1['worker_briddhi'] += $songothon1->worker_briddhi;
    //         $all_songothon1['worker_gatti'] += $songothon1->worker_gatti;
    //         $all_songothon1['worker_target'] += $songothon1->worker_target;

    //         $all_songothon2['associate_member_previous'] += $songothon2->associate_member_previous;
    //         $all_songothon2['associate_member_present'] += $songothon2->associate_member_present;
    //         $all_songothon2['associate_member_briddhi'] += $songothon2->associate_member_briddhi;
    //         $all_songothon2['associate_member_target'] += $songothon2->associate_member_target;
    //         $all_songothon2['vinno_dormalombi_worker_previous'] += $songothon2->vinno_dormalombi_worker_previous;
    //         $all_songothon2['vinno_dormalombi_worker_present'] += $songothon2->vinno_dormalombi_worker_present;
    //         $all_songothon2['vinno_dormalombi_worker_briddhi'] += $songothon2->vinno_dormalombi_worker_briddhi;
    //         $all_songothon2['vinno_dormalombi_worker_target'] += $songothon2->vinno_dormalombi_worker_target;
    //         $all_songothon2['vinno_dormalombi_associate_member_previous'] += $songothon2->vinno_dormalombi_associate_member_previous;
    //         $all_songothon2['vinno_dormalombi_associate_member_present'] += $songothon2->vinno_dormalombi_associate_member_present;
    //         $all_songothon2['vinno_dormalombi_associate_member_briddhi'] += $songothon2->vinno_dormalombi_associate_member_briddhi;
    //         $all_songothon2['vinno_dormalombi_associate_member_target'] += $songothon2->vinno_dormalombi_associate_member_target;

    //         $all_songothon9['unit_kormi_boithok_total'] += $songothon9->unit_kormi_boithok_total;
    //         $all_songothon9['unit_kormi_boithok_uposthiti'] += $songothon9->unit_kormi_boithok_uposthiti;

    //         $all_songothon5['paribarik_unit_total'] += $songothon5->paribarik_unit_total;
    //         $all_songothon5['paribarik_unit_increase'] += $songothon5->paribarik_unit_increase;
    //         $all_songothon5['paribarik_unit_target'] += $songothon5->paribarik_unit_target;

    //         $all_songothon7['upper_leader_sofor'] += $songothon7->upper_leader_sofor;

    //         $all_songothon8['associate_member_total'] += $songothon8->associate_member_total;
    //         $all_songothon8['associate_member_total_iyanot_amounts'] += $songothon8->associate_member_total_iyanot_amounts;
    //         $all_songothon8['sudhi_total'] += $songothon8->sudhi_total;
    //         $all_songothon8['sudi_total_iyanot_amounts'] += $songothon8->sudi_total_iyanot_amounts;

    //         $all_proshikkhon['sohi_quran_onushilon'] += $proshikkhon->sohi_quran_onushilon;
    //         $all_proshikkhon['sohi_quran_onushilon_target'] += $proshikkhon->sohi_quran_onushilon_target;
    //         $all_proshikkhon['sohi_quran_onushilon_uposthiti'] += $proshikkhon->sohi_quran_onushilon_uposthiti;

    //         $all_proshikkhon['masala_masayel'] += $proshikkhon->masala_masayel;
    //         $all_proshikkhon['masala_masayel_target'] += $proshikkhon->masala_masayel_target;
    //         $all_proshikkhon['masala_masayel_uposthiti'] += $proshikkhon->masala_masayel_uposthiti;

    //         $all_proshikkhon['darsul_quran'] += $proshikkhon->darsul_quran;
    //         $all_proshikkhon['darsul_quran_target'] += $proshikkhon->darsul_quran_target;
    //         $all_proshikkhon['darsul_quran_uposthiti'] += $proshikkhon->darsul_quran_uposthiti;

    //         $all_proshikkhon['darsul_hadis'] += $proshikkhon->darsul_hadis;
    //         $all_proshikkhon['darsul_hadis_target'] += $proshikkhon->darsul_hadis_target;
    //         $all_proshikkhon['darsul_hadis_uposthiti'] += $proshikkhon->darsul_hadis_uposthiti;

    //         $all_proshikkhon['samostik_path'] += $proshikkhon->samostik_path;
    //         $all_proshikkhon['samostik_path_target'] += $proshikkhon->samostik_path_target;
    //         $all_proshikkhon['samostik_path_uposthiti'] += $proshikkhon->samostik_path_uposthiti;

    //         $all_proshikkhon['bishoy_vittik_onushilon'] += $proshikkhon->bishoy_vittik_onushilon;
    //         $all_proshikkhon['bishoy_vittik_onushilon_target'] += $proshikkhon->bishoy_vittik_onushilon_target;
    //         $all_proshikkhon['bishoy_vittik_onushilon_uposthiti'] += $proshikkhon->bishoy_vittik_onushilon_uposthiti;

    //         $all_shomajsheba1['how_many_people_did'] += $shomajsheba1->how_many_people_did;
    //         $all_shomajsheba1['service_received_total'] += $shomajsheba1->service_received_total;

    //         $all_shomajsheba2['shamajik_onusthane_ongshogrohon'] += $shomajsheba2->shamajik_onusthane_ongshogrohon;
    //         $all_shomajsheba2['shamajik_onusthane_shohayota_prodan'] += $shomajsheba2->shamajik_onusthane_shohayota_prodan;
    //         $all_shomajsheba2['shamajik_birodh_mimangsha'] += $shomajsheba2->shamajik_birodh_mimangsha;
    //         $all_shomajsheba2['manobik_shohayota_prodan'] += $shomajsheba2->manobik_shohayota_prodan;
    //         $all_shomajsheba2['korje_hasana_prodan'] += $shomajsheba2->korje_hasana_prodan;
    //         $all_shomajsheba2['rogir_poricorja'] += $shomajsheba2->rogir_poricorja;
    //         $all_shomajsheba2['medical_shohayota_prodan'] += $shomajsheba2->medical_shohayota_prodan;
    //         $all_shomajsheba2['nobojatokke_gift_prodan'] += $shomajsheba2->nobojatokke_gift_prodan;
    //         $all_shomajsheba2['voluntarily_blood_donation_kotojon'] += $shomajsheba2->voluntarily_blood_donation_kotojon;
    //         $all_shomajsheba2['voluntarily_blood_donation_kotojonke'] += $shomajsheba2->voluntarily_blood_donation_kotojonke;
    //         $all_shomajsheba2['matrikalin_sheba_prodan_kotojon'] += $shomajsheba2->matrikalin_sheba_prodan_kotojon;
    //         $all_shomajsheba2['matrikalin_sheba_prodan_kotojonke'] += $shomajsheba2->matrikalin_sheba_prodan_kotojonke;
    //         $all_shomajsheba2['mayeter_gosol'] += $shomajsheba2->mayeter_gosol;
    //         $all_shomajsheba2['others'] += $shomajsheba2->others;

    //         $all_rastrio['bishishto_bekti_jogajog'] += $rastrio->bishishto_bekti_jogajog;

    //         $all_montobbo['montobbo'][] = $montobbo->montobbo;
    //     }

    //     // -------------------------- bm income report ------------------------------------
    //     $query = BmPaid::query();
    //     $filter = $query->whereYear('month', $month->clone()->year)
    //         ->whereMonth('month', $month->clone()->month)
    //         ->where('ward_id', $ward_id)
    //         ->whereIn('unit_id', $approved_ward_ids)
    //         ->where('status', 1);
    //     // dd($approved_ward_ids,$filter->get()->all(),$filter->sum('amount'));

    //     $category = $filter->with('bm_category')->pluck('bm_category_id')->all();
    //     $category_all_id = array_values(array_unique($category));
    //     $total_income = $filter->sum('amount');

    //     // $all_income_category_wise = [];
    //     foreach ($category_all_id as $index => $item) {
    //         $testQuery = BmPaid::query();
    //         $totalAmount = $testQuery->whereYear('month', $month->clone()->year)
    //             ->whereMonth('month', $month->clone()->month)
    //             ->where('bm_category_id', $item)
    //             ->where('ward_id', $ward_id)
    //             ->whereIn('unit_id', $approved_ward_ids)
    //             ->sum('amount');
    //         $bmCategory = BmCategory::find($item);
    //         $all_income_category_wise[$index]['amount'] = $totalAmount;
    //         $all_income_category_wise[$index]['category'] = $bmCategory->title;
    //     }
    //     // -------------------------- bm income report ------------------------------------

    //     // -------------------------- bm expense report ------------------------------------
    //     $query = BmExpense::query();
    //     $filter = $query->whereYear('date', $month->clone()->year)
    //         ->whereMonth('date', $month->clone()->month)
    //         ->where('ward_id', $ward_id)
    //         ->whereIn('unit_id', $approved_ward_ids)
    //         ->where('status', 1);
    //     $total_expense = $filter->sum('amount');
    //     $category_id = $filter->with('bm_expense_category')->pluck('bm_expense_category_id')->all();
    //     $category_unique_id = array_values(array_unique($category_id));

    //     $all_expense_category_wise = [];
    //     foreach ($category_unique_id as $index => $item) {
    //         $testQuery = BmExpense::query();
    //         $totalAmount = $testQuery->whereYear('date', $month->clone()->year)
    //             ->whereMonth('date', $month->clone()->month)
    //             ->where('bm_expense_category_id', $item)
    //             ->where('ward_id', $ward_id)
    //             ->whereIn('unit_id', $approved_ward_ids)
    //             ->sum('amount');
    //         $bmCategory = BmExpenseCategory::find($item);
    //         $all_expense_category_wise[$index]['amount'] = $totalAmount;
    //         $all_expense_category_wise[$index]['category'] = $bmCategory->title;
    //     }
    //     // -------------------------- bm expense report ------------------------------------

    //     dd(
    //         $report_info_ids,
    //         $all_dawat1,
    //         $all_dawat2,
    //         $all_dawat3,
    //         $all_dawat4,
    //         $all_department1,
    //         $all_department4,
    //         $all_department5,
    //         $all_dawah_prokashona,
    //         $all_kormosuci,
    //         $all_songothon1,
    //         $all_songothon2,
    //         $all_songothon9,
    //         $all_songothon5,
    //         $all_songothon7,
    //         $all_songothon8,
    //         $all_proshikkhon,
    //         $all_shomajsheba1,
    //         $all_shomajsheba2,
    //         $all_rastrio,
    //         $all_montobbo,
    //         $all_income_category_wise,
    //         $total_income,
    //         $all_expense_category_wise,
    //         $total_expense,
    //     );
    //     return view('ward.ward_report_upload')->with([
    //         'month' => $month,
    //         'org_type' => $org_type,
    //         'unit_info' => $unit_info,
    //         'ward_info' => $ward_info,
    //         'thana_info' => $thana_info,
    //         'president' => $president,

    //         'dawat1' => $dawat1,
    //         'dawat2' => $dawat2,
    //         'dawat3' => $dawat3,
    //         'dawat4' => $dawat4,
    //         'department1' => $department1,
    //         'department4' => $department4,
    //         'department5' => $department5,
    //         'dawah_prokashona' => $dawah_prokashona,
    //         'kormosuci' => $kormosuci,
    //         'songothon1' => $songothon1,
    //         'songothon2' => $songothon2,
    //         'songothon9' => $songothon9,
    //         'songothon5' => $songothon5,
    //         'songothon7' => $songothon7,
    //         'songothon8' => $songothon8,
    //         'proshikkhon' => $proshikkhon,
    //         'shomajsheba1' => $shomajsheba1,
    //         'shomajsheba2' => $shomajsheba2,
    //         'rastrio' => $rastrio,
    //         'montobbo' => $montobbo,

    //         'all_income_category_wise' => $all_income_category_wise,
    //         'total_income' => $total_income,

    //         'all_expense_category_wise' => $all_expense_category_wise,
    //         'total_expense' => $total_expense,

    //     ]);
    // }

    public function is_parent_ward(){
        $ward_info = (object) auth()->user()->org_ward_user;
        $ward_id = $ward_info->ward_id;
        $is_thana_parent = OrgWard::where('id', $ward_id)->where('is_thana_parent', 1)
                                    ->exists();

        return response()->json([
            'status' => 'success',
            'is_parent_ward' => $is_thana_parent,
            // 'is_parent_ward' => true,
            'message' => $is_thana_parent ? 'This is a parent ward' : 'This is a general ward',
        ]);

    }

    public function expense_category_wise()
    {
        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        $ward_info = (object) auth()->user()->org_ward_user;
        $month = Carbon::parse(request()->month);

        $query = WardBmExpense::query();
        $filter = $query->whereYear('date', $month->clone()->year)->whereMonth('date', $month->clone()->month)->where('ward_id', $ward_info->ward_id);
        $data = $filter->with('ward_bm_expense_category')->get();

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200);
    }

    public function income_category_wise()
    {
        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        $ward_info = (object) auth()->user()->org_ward_user;
        $month = Carbon::parse(request()->month);

        $query = WardBmIncome::query();
        $filter = $query->whereYear('month', $month->clone()->year)->whereMonth('month', $month->clone()->month)->where('ward_id', $ward_info->ward_id);
        $data = $filter->with('ward_bm_income_category')->get();
        // dd("income_category_wise", $data->toArray());
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200);
    }

    public function report_status()
    {
        $month = request()->month;
        if ($month) {
            $org_ward_user = OrgWardUser::where('user_id', auth()->id())->first();
            $ward_id = $org_ward_user->ward_id;
            $ward = OrgWard::where('id',$ward_id)->first();
            $month = Carbon::parse(request()->month);
            $bangla_month = $month->clone()->locale('bn')->isoFormat('MMMM');

            $report_info = ReportInfo::where('org_type_id', $ward_id)
                ->where('org_type', 'ward')
                ->whereYear('month_year', $month->clone()->year)
                ->whereMonth('month_year', $month->clone()->month)
                ->get()
                ->first();

            $report_submit_status = $report_info->report_submit_status ?? 'unsubmitted';
            $report_approved_status = $report_info->report_approved_status ?? 'pending';

            if ($report_submit_status == 'unsubmitted') {
                return response()->json([
                    'status' => 'success',
                    'report_status' => "unsubmitted",
                    "message" => "{$bangla_month} মাসের রিপোর্ট জমা দেওয়া হয়নি এখনো।"
                ], 200);
            } else if ($report_submit_status == 'submitted' &&  $report_approved_status == 'pending') {
                return response()->json([
                    'status' => 'success',
                    'report_status' => "pending",
                    "message" => "{$bangla_month} মাসের রিপোর্ট জমা হয়েছে । ওয়ার্ডের আপ্রুভের জন্য অপেক্ষমাণ।"
                ], 200);
            } else if ($report_submit_status == 'submitted' &&  $report_approved_status == 'rejected') {
                return response()->json([
                    'status' => 'success',
                    'report_status' => "rejected",
                    "message" => "{$bangla_month} মাসের রিপোর্ট রিজেক্ট করা হয়েছে । ভুলগুলি ঠিক করে আবার জমা দিন ।"
                ], 200);
            } else if ($report_submit_status == 'submitted' &&  $report_approved_status == 'approved') {
                return response()->json([
                    'status' => 'success',
                    'report_status' => "approved",
                    "message" =>"{$bangla_month} মাসের রিপোর্ট ওয়ার্ড গ্রহন করেছে।"
                ], 200);
            }
        }
    }

    public function report_joma()
    {

        $month = Carbon::parse(request()->month);
        $org_ward_user = OrgWardUser::where('user_id', auth()->id())->first();

        if (!$org_ward_user) {
            return response()->json([
                'err_message' => 'Ward information not found for this user.',
            ], 404);
        }

        $ward_id = $org_ward_user->ward_id;
        $thana_id = $org_ward_user->thana_id;

        $permission  = ReportManagementControl::where('report_type', 'ward')
            ->whereYear('month_year', $month->clone()->year)
            ->whereMonth('month_year', $month->clone()->month)
            ->where('is_active', 1)
            ->latest()
            ->first();
        if (!$permission) {
            return response()->json([
                'err_message' => 'Permission denied',
                'errors' => [['You do not have the necessary permissions']],
            ], 403);
        }

        $is_thana_report_submitted = ReportInfo::where('org_type_id', $thana_id)
            ->where('org_type', 'thana')
            ->whereYear('month_year', $month->year)
            ->whereMonth('month_year', $month->month)
            ->where('report_submit_status', 'submitted')
            ->where(function ($query){
                $query->where('report_approved_status', 'approved')
                    ->orWhere('report_approved_status', 'pending');
            })  
            ->exists();

        if ($is_thana_report_submitted) {
            return response()->json([
                'err_message' => 'Permission denied',
                'errors' => [['You are to late .Thana already submited there report.Now thana can not accept your report .']],
            ], 403);
        }

        // Fetch ReportInfo
        $report_info = ReportInfo::where('org_type_id', $ward_id)
            ->where('org_type', 'ward')
            ->whereYear('month_year', $month->year)
            ->whereMonth('month_year', $month->month)
            ->first();

        if (!$report_info) {
            return response()->json([
                'err_message' => 'Report information not found.',
            ], 404);
        }
        // dd($report_info->report_submit_status,$report_info->report_approved_status);
        if ($report_info->report_submit_status == 'unsubmitted' && $report_info->report_approved_status == 'pending') {
            $report_info->report_submit_status = 'submitted';
            $report_info->report_approved_status = 'pending';
            $report_info->save();
            // Update related BmPaid records
            WardBmIncome::where('ward_id', $ward_id)
                    ->whereYear('month', $month->year)
                    ->whereMonth('month', $month->month)
                    ->update(['report_submit_status' => 'submitted','report_approved_status' => 'pending']);

            // Update related BmExpense records
            WardBmExpense::where('ward_id', $ward_id)
                ->whereYear('date', $month->year)
                ->whereMonth('date', $month->month)
                ->update(['report_submit_status' => 'submitted','report_approved_status' => 'pending']);

            return response()->json([
                'status' => 'success',
                'report_status' => "submitted",
                "message" => "রিপোর্ট জমা করা হয়েছে ।"
            ], 200);
        } else if ($report_info->report_submit_status == 'submitted' && $report_info->report_approved_status == 'rejected') {
            $report_info->report_approved_status = 'pending';
            $report_info->save();

            // Update related BmPaid records
            WardBmIncome::where('ward_id', $ward_id)
                    ->whereYear('month', $month->year)
                    ->whereMonth('month', $month->month)
                    ->update(['report_approved_status' => 'pending']);

            // Update related BmExpense records
            WardBmExpense::where('ward_id', $ward_id)
                ->whereYear('date', $month->year)
                ->whereMonth('date', $month->month)
                ->update(['report_approved_status' => 'pending']);

            return response()->json([
                'status' => 'success',
                'report_status' => "resubmitted",
                "message" => "রিপোর্ট পুনরায় জমা সম্পন্ন হয়েছে ।"
            ], 200);
        } else {
            return response()->json([
                'err_message' => 'No Content',
                'errors' => ['name' => ['Report has no data']],
            ], 204);
        }
    }
    public function self_report_return()
    {

        $month = Carbon::parse(request()->month);
        $org_ward_user = OrgWardUser::where('user_id', auth()->id())->first();

        if (!$org_ward_user) {
            return response()->json([
                'err_message' => 'Ward information not found for this user.',
            ], 404);
        }

        $ward_id = $org_ward_user->ward_id;
        
        // Fetch ReportInfo
        $report_info = ReportInfo::where('org_type_id', $ward_id)
            ->where('org_type', 'ward')
            ->whereYear('month_year', $month->year)
            ->whereMonth('month_year', $month->month)
            ->first();

        if (!$report_info) {
            return response()->json([
                'err_message' => 'Report information not found.',
            ], 404);
        }
        // dd($report_info->report_submit_status,$report_info->report_approved_status);
        if ($report_info->report_submit_status == 'submitted' && $report_info->report_approved_status == 'pending') {
            $report_info->report_submit_status = 'unsubmitted';
            $report_info->report_approved_status = 'pending';
            $report_info->save();
            // Update related BmPaid records
            WardBmIncome::where('ward_id', $ward_id)
                    ->whereYear('month', $month->year)
                    ->whereMonth('month', $month->month)
                    ->update(['report_submit_status' => 'unsubmitted','report_approved_status' => 'pending']);

            // Update related BmExpense records
            WardBmExpense::where('ward_id', $ward_id)
                ->whereYear('date', $month->year)
                ->whereMonth('date', $month->month)
                ->update(['report_submit_status' => 'unsubmitted','report_approved_status' => 'pending']);

            return response()->json([
                'status' => 'success',
                'report_status' => "unsubmitted",
                "message" => "রিপোর্ট ফিরিয়ে আনা হয়েছে ।"
            ], 200);
        } else if ($report_info->report_submit_status == 'submitted' && $report_info->report_approved_status == 'approved') {
            return response()->json([
                'err_message' => 'Permission denied',
                'errors' => [['You can not return your report .Thana already approved your report. Now thana can not accept your report .']],
            ], 403);

        } else {
            return response()->json([
                'err_message' => 'No Content',
                'errors' => ['name' => ['Report has no data']],
            ], 204);
        }
    }

    public function ward_report_sum()
    {
        $validator = Validator::make(request()->all(), [
            'start_month' => ['required', 'date'],
            'end_month' => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        
        $ward_id = OrgWardUser::where('user_id', request()->user_id)->first()->ward_id;
        // dd($ward_id);
        // $ward_id = auth()->user()->org_ward_user->ward_id;

        $start_month = request()->start_month;
        $end_month = request()->end_month;
        $org_type = 'ward';
        $org_type_id = $ward_id;
        // $report_approved_status = ['pending', 'approved', 'rejected'];   //enum('pending','approved','rejected')

        $datas = $this->report_summation($start_month, $end_month, $org_type, $org_type_id);
        // dd($datas);


        // -------------------------- bm previous report ------------------------------------
        $carbon_start_month = Carbon::parse($start_month);
        $query = WardBmIncome::query();
        $filter = $query->whereDate('month', '<=', $carbon_start_month->clone()->subMonth())
            ->where('ward_id', $ward_id)
            ->where('report_approved_status', 'approved');
        $total_previous_income = $filter->sum('amount');

        $query = WardBmExpense::query();
        $filter = $query->whereDate('date', '<=', $carbon_start_month->clone()->subMonth())
            ->where('ward_id', $ward_id)
            ->where('report_approved_status', 'approved');
        $total_previous_expense = $filter->sum('amount');
        $total_previous =  $total_previous_income - $total_previous_expense;
        $total_current_income =  $total_previous + $datas->income_report->total_amount;
        $in_total =  $total_current_income - $datas->expense_report->total_amount;
        // -------------------------- bm previous report ------------------------------------
        // dd($datas->start_month,$datas->end_month,);
        return view('ward.ward_report_sum')->with([
            'start_month' => $datas->start_month,
            'end_month' => $datas->end_month,
            'report_header' => $datas->report_header,

            'report_sum_data' => $datas->report_sum_data,
            'previous_present' => $datas->previous_present,
            'income_report' => $datas->income_report,
            'expense_report' => $datas->expense_report,

            'total_previous' => $total_previous,
            'total_current_income' => $total_current_income,
            'in_total' => $in_total,
        ]);
    }

    public function check_report_info()
    {
        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $month = request()->month;
        $org_type = 'ward';
        $org_type_id = auth()->user()->org_ward_user->ward_id;

        $check_info = new CheckInfo();
        $check_info_status = $check_info->execute($month, $org_type, $org_type_id);
        // dd($check_info_status);
        return response()->json([
            'status' => 'success',
            'data' => $check_info_status,
        ], 200);
    }
    public function check_report_info_in_range()
    {
        $validator = Validator::make(request()->all(), [
            'start_month' => ['required', 'date'],
            'end_month' => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $start_month = Carbon::parse(request()->start_month);
        $end_month = Carbon::parse(request()->end_month);

        $org_type = 'ward';
        $org_type_id = auth()->user()->org_ward_user->ward_id;
        $report_approved_status = ['approved'];

        $report_info_ids = ReportInfo::whereBetween('month_year', [$start_month->startOfMonth(), $end_month->endOfMonth()])
            ->where('org_type', $org_type)
            ->where('org_type_id', $org_type_id)
            ->whereIn('report_approved_status', $report_approved_status)
            ->pluck('id');
        // dd($report_info_ids->isNotEmpty() ? $report_info_ids : null);
        return response()->json([
            'status' => 'success',
            'data' => $report_info_ids->isNotEmpty() ? $report_info_ids : null,
        ], 200);
    }

    public function ward_report_monthly()
    {
        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        // dd(auth()->user());
        $user_id =  request()->user_id;
        $user = User::where('id', $user_id)->first();
        if (!$user || !$user->org_ward_user) {
            return response()->json([
                'err_message' => 'User or ward user not found',
            ], 404);
        }
        $ward_id = $user->org_ward_user->ward_id;
        // $ward_id = User::where('id',$user_id)->first()->org_ward_user->ward_id;
        // dd($ward_id);
        $start_month = request()->month;
        $end_month = request()->month;
        $org_type = 'ward';
        $org_type_id = $ward_id;
        $report_approved_status = ['pending', 'approved', 'rejected'];   //enum('pending','approved','rejected')

        $datas = $this->report_summation($start_month, $end_month, $org_type, $org_type_id, $report_approved_status);
        // dd($datas);


        // -------------------------- bm previous report ------------------------------------
        $carbon_start_month = Carbon::parse($start_month);
        $query = WardBmIncome::query();
        $filter = $query->whereDate('month', '<=', $carbon_start_month->clone()->subMonth())
            ->where('ward_id', $ward_id)
            ->where('report_approved_status', 'approved');
        $total_previous_income = $filter->sum('amount');

        $query = WardBmExpense::query();
        $filter = $query->whereDate('date', '<=', $carbon_start_month->clone()->subMonth())
            ->where('ward_id', $ward_id)
            ->where('report_approved_status', 'approved');
        $total_previous_expense = $filter->sum('amount');
        $total_previous =  $total_previous_income - $total_previous_expense;
        $total_current_income =  $total_previous + $datas->income_report->total_amount;
        $in_total =  $total_current_income - $datas->expense_report->total_amount;
        // -------------------------- bm previous report ------------------------------------

        return view('ward.ward_report_monthly')->with([
            'start_month' => $datas->start_month,
            'end_month' => $datas->end_month,
            'report_header' => $datas->report_header,

            'report_sum_data' => $datas->report_sum_data,
            'previous_present' => $datas->previous_present,
            'income_report' => $datas->income_report,
            'expense_report' => $datas->expense_report,

            'total_previous' => $total_previous,
            'total_current_income' => $total_current_income,
            'in_total' => $in_total,
        ]);
    }

    public function report_upload_monthly()
    {
        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $ward_id = auth()->user()->org_ward_user->ward_id;

        $start_month = request()->month;
        $end_month = request()->month;
        $org_type = 'ward';
        $org_type_id = $ward_id;
        $report_approved_status = ['pending', 'approved', 'rejected'];   //enum('pending','approved','rejected')
        $is_need_sum = false;
        $datas = $this->report_summation($start_month, $end_month, $org_type, $org_type_id, $report_approved_status, $is_need_sum);
        // dd($datas);

               // -------------------------- bm previous report ------------------------------------
               $carbon_start_month = Carbon::parse($start_month);
               $query = WardBmIncome::query();
               $filter = $query->whereDate('month', '<=', $carbon_start_month->clone()->subMonth())
                   ->where('ward_id', $ward_id)
                   ->where('report_approved_status', 'approved');
               $total_previous_income = $filter->sum('amount');

               $query = WardBmExpense::query();
               $filter = $query->whereDate('date', '<=', $carbon_start_month->clone()->subMonth())
                   ->where('ward_id', $ward_id)
                   ->where('report_approved_status', 'approved');
               $total_previous_expense = $filter->sum('amount');
               $total_previous =  $total_previous_income - $total_previous_expense;
               $total_current_income =  $total_previous + $datas->income_report->total_amount;
               $in_total =  $total_current_income - $datas->expense_report->total_amount;
               // -------------------------- bm previous report ------------------------------------

        return response()->json([
            'status' => 'success',
            'data' => $datas,

            'total_previous' => $total_previous,
            'total_current_income' => $total_current_income,
            'in_total' => $in_total,
        ], 200);
    }
    public function report_check()
    {
        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
            'ward_id' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }
        $ward_id = request()->ward_id;

        $start_month = request()->month;
        $end_month = request()->month;
        $org_type = 'ward';
        $org_type_id = $ward_id;
        $report_approved_status = ['pending', 'approved', 'rejected'];   //enum('pending','approved','rejected')
        $is_need_sum = false;
        $datas = $this->report_summation($start_month, $end_month, $org_type, $org_type_id, $report_approved_status, $is_need_sum);
        // dd($datas);

        // -------------------------- bm previous report ------------------------------------
        $carbon_start_month = Carbon::parse($start_month);
        $query = WardBmIncome::query();
        $filter = $query->whereDate('month', '<=', $carbon_start_month->clone()->subMonth())
            ->where('ward_id', $ward_id)
            ->where('report_approved_status', 'approved');
        $total_previous_income = $filter->sum('amount');

        $query = WardBmExpense::query();
        $filter = $query->whereDate('date', '<=', $carbon_start_month->clone()->subMonth())
            ->where('ward_id', $ward_id)
            ->where('report_approved_status', 'approved');
        $total_previous_expense = $filter->sum('amount');
        $total_previous =  $total_previous_income - $total_previous_expense;
        $total_current_income =  $total_previous + $datas->income_report->total_amount;
        $in_total =  $total_current_income - $datas->expense_report->total_amount;
        // -------------------------- bm previous report ------------------------------------

        return response()->json([
            'status' => 'success',
            'data' => $datas,

            'total_previous' => $total_previous,
            'total_current_income' => $total_current_income,
            'in_total' => $in_total,
        ], 200);
    }

    public function total_approved_ward_report()
    {
        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
            'user_id' => ['required', 'exists:org_thana_users,user_id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $month = Carbon::parse(request()->month);
        $thana_id = OrgThanaUser::where('user_id', request()->user_id)->value('thana_id');
        $thana_info = OrgThana::find($thana_id);
        $city_info = $thana_info ? OrgCity::find($thana_info->org_city_id) : null;
        $wards = OrgWard::where('org_thana_id', $thana_id)->get();

        $report_info_ids = [];
        $ward_ids = [];
        $approved_ward_ids = [];
        foreach ($wards as $ward) {
            $ward_id = $ward->id;
            $ward_ids[] = $ward_id;
            $report_info = ReportInfo::where('org_type_id', $ward_id)
                ->where('org_type', 'ward')
                ->whereYear('month_year', $month->clone()->year)
                ->whereMonth('month_year', $month->clone()->month)
                ->where('report_approved_status', 'approved')
                ->where('status', 1)
                ->get()
                ->first();

            if ($report_info) {
                $report_info_id = $report_info->id;
                $report_info_ids[] = $report_info_id;
                $approved_ward_ids[] = $report_info->org_type_id;
            }
        }
        $ward_count = count($approved_ward_ids);
        $ward_titles = [];
        foreach ($approved_ward_ids as $ward_id) {
            $ward_info = OrgWard::find($ward_id);
            if ($ward_info) {
                $ward_titles[] = $ward_info->title;
            }
        }

        $start_month = request()->month;
        $end_month = request()->month;
        $org_type = 'ward';
        $org_type_id = $approved_ward_ids;
        $report_approved_status = ['approved'];   //enum('pending','approved','rejected')
        $is_need_sum = false;
        $reportInfoIds = $report_info_ids;
        $datas = $this->report_summation($start_month, $end_month, $org_type, $org_type_id, $report_approved_status, $is_need_sum, $reportInfoIds);


        // -------------------------- bm previous report ------------------------------------
        $carbon_start_month = Carbon::parse($start_month);
        $query = WardBmIncome::query();
        $filter = $query->whereDate('month', '<=', $carbon_start_month->clone()->subMonth())
            ->whereIn('ward_id', $approved_ward_ids)
            ->where('report_approved_status', 'approved');
        $total_previous_income = $filter->sum('amount');

        $query = WardBmExpense::query();
        $filter = $query->whereDate('date', '<=', $carbon_start_month->clone()->subMonth())
            ->whereIn('ward_id', $approved_ward_ids)
            ->where('report_approved_status', 'approved');
        $total_previous_expense = $filter->sum('amount');
        $total_previous =  $total_previous_income - $total_previous_expense;
        $total_current_income =  $total_previous + $datas->income_report->total_amount;
        $in_total =  $total_current_income - $datas->expense_report->total_amount;
        // -------------------------- bm previous report ------------------------------------

        $report_header = (object) [
            'ward_count' => $ward_count,
            'ward_titles' => $ward_titles,
            'thana_info' => $thana_info,
            'city_info' => $city_info,
        ];

        return view('ward.total_approved_ward_report')->with([
            'start_month' => $datas->start_month,
            'end_month' => $datas->end_month,
            'report_header' => $report_header,

            'report_sum_data' => $datas->report_sum_data,
            'previous_present' => $datas->previous_present,
            'income_report' => $datas->income_report,
            'expense_report' => $datas->expense_report,

            'total_previous' => $total_previous,
            'total_current_income' => $total_current_income,
            'in_total' => $in_total,
        ]);
    }
    public function total_approved_ward_report_data()
    {
        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
            'user_id' => ['required', 'exists:org_thana_users,user_id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $month = Carbon::parse(request()->month);
        $thana_id = OrgThanaUser::where('user_id', request()->user_id)->value('thana_id');
        $thana_info = OrgThana::find($thana_id);
        $city_info = $thana_info ? OrgCity::find($thana_info->org_city_id) : null;
        $wards = OrgWard::where('org_thana_id', $thana_id)->get();

        $report_info_ids = [];
        $ward_ids = [];
        $approved_ward_ids = [];
        foreach ($wards as $ward) {
            $ward_id = $ward->id;
            $ward_ids[] = $ward_id;
            $report_info = ReportInfo::where('org_type_id', $ward_id)
                ->where('org_type', 'ward')
                ->whereYear('month_year', $month->clone()->year)
                ->whereMonth('month_year', $month->clone()->month)
                ->where('report_approved_status', 'approved')
                ->where('status', 1)
                ->get()
                ->first();

            if ($report_info) {
                $report_info_id = $report_info->id;
                $report_info_ids[] = $report_info_id;
                $approved_ward_ids[] = $report_info->org_type_id;
            }
        }
        $ward_count = count($approved_ward_ids);
        $ward_titles = [];
        foreach ($approved_ward_ids as $ward_id) {
            $ward_info = OrgWard::find($ward_id);
            if ($ward_info) {
                $ward_titles[] = $ward_info->title;
            }
        }

        $start_month = request()->month;
        $end_month = request()->month;
        $org_type = 'ward';
        $org_type_id = $approved_ward_ids;
        $report_approved_status = ['approved'];   //enum('pending','approved','rejected')
        $is_need_sum = false;
        $reportInfoIds = $report_info_ids;
        $dateWiseReportSum = new DateWiseReportSum();
        $report_sum_data = $dateWiseReportSum->execute($start_month, $end_month, $org_type, $org_type_id, $report_approved_status, $report_info_ids);

        $thana_report_info = ReportInfo::where('org_type_id', $thana_id)
                ->where('org_type', 'thana')
                ->whereYear('month_year', $month->clone()->year)
                ->whereMonth('month_year', $month->clone()->month)
                ->where('status', 1)
                ->get()
                ->first();
        $thana_report_info_id = $thana_report_info->id;



        // gender wide data push. ward data push to thana monthly report report 
        $thana_gender = $thana_info->org_gender;
        if ($thana_gender == "men") {
            $table_column_value = [
                [
                    'table' => 'thana_dawat1_regular_group_wises', 
                    'column' => 'how_many_groups_are_out_man', 
                    'value' => $report_sum_data?->ward_dawat1_regular_group_wises?->how_many_groups_are_out
                ],
                [
                    'table' => 'thana_dawat1_regular_group_wises', 
                    'column' => 'number_of_participants_man', 
                    'value' => $report_sum_data?->ward_dawat1_regular_group_wises?->number_of_participants
                ],
                [
                    'table' => 'thana_dawat1_regular_group_wises', 
                    'column' => 'how_many_have_been_invited_man', 
                    'value' => $report_sum_data?->ward_dawat1_regular_group_wises?->how_many_have_been_invited
                ],
                [
                    'table' => 'thana_dawat1_regular_group_wises', 
                    'column' => 'how_many_associate_members_created_man', 
                    'value' => $report_sum_data?->ward_dawat1_regular_group_wises?->how_many_associate_members_created
                ],


                [
                    'table' => 'thana_dawat2_personal_and_targets', 
                    'column' => 'total_rokon_man', 
                    'value' => $report_sum_data?->ward_dawat2_personal_and_targets?->total_rokon
                ],
                [
                    'table' => 'thana_dawat2_personal_and_targets', 
                    'column' => 'total_worker_man', 
                    'value' => $report_sum_data?->ward_dawat2_personal_and_targets?->total_worker
                ],
                [
                    'table' => 'thana_dawat2_personal_and_targets', 
                    'column' => 'how_many_were_give_dawat_rokon_man', 
                    'value' => $report_sum_data?->ward_dawat2_personal_and_targets?->how_many_were_give_dawat_rokon
                ],
                [
                    'table' => 'thana_dawat2_personal_and_targets', 
                    'column' => 'how_many_were_give_dawat_worker_man', 
                    'value' => $report_sum_data?->ward_dawat2_personal_and_targets?->how_many_were_give_dawat_worker
                ],
                [
                    'table' => 'thana_dawat2_personal_and_targets', 
                    'column' => 'how_many_have_been_invited_man', 
                    'value' => $report_sum_data?->ward_dawat2_personal_and_targets?->how_many_have_been_invited
                ],
                [
                    'table' => 'thana_dawat2_personal_and_targets', 
                    'column' => 'how_many_associate_members_created_man', 
                    'value' => $report_sum_data?->ward_dawat2_personal_and_targets?->how_many_associate_members_created
                ],

                [
                    'table' => 'thana_dawat3_general_program_and_others', 
                    'column' => 'how_many_were_give_dawat_man', 
                    'value' => $report_sum_data?->ward_dawat3_general_program_and_others?->how_many_were_give_dawat
                ],
                [
                    'table' => 'thana_dawat3_general_program_and_others', 
                    'column' => 'how_many_associate_members_created_man', 
                    'value' => $report_sum_data?->ward_dawat3_general_program_and_others?->how_many_associate_members_created
                ],


                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'gono_songjog_doshok_group_man', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->total_gono_songjog_group
                ],
                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'gono_songjog_doshok_attended_man', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->total_attended
                ],
                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'gono_songjog_doshok_invited_man', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->how_many_have_been_invited
                ],
                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'gono_songjog_doshok_associate_members_created_man', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->how_many_associate_members_created
                ],


                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'mohanogor_declared_gonosonjog_dawati_ovi_group', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->jela_mohanogor_declared_gonosonjog_group
                ],
                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'mohanogor_declared_gonosonjog_dawati_ovi_attended', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->jela_mohanogor_declared_gonosonjog_attended
                ],
                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'mohanogor_declared_gonosonjog_dawati_ovi_invited', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->jela_mohanogor_declared_gonosonjog_invited
                ],
                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'mohanogor_declared_gonosonjog_dawati_ovi_associate_members_created', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->jela_mohanogor_declared_gonosonjog_associated_created
                ],


                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'election_gono_songjog_group_man', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->election_gono_songjog_group
                ],
                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'election_gono_songjog_attended_man', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->election_attended
                ],
                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'election_gono_songjog_invited_man', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->election_how_many_have_been_invited
                ],
                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'election_gono_songjog_associate_members_created_man', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->election_how_many_associate_members_created
                ],



                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'other_gono_songjog_group', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->other_gono_songjog_group
                ],
                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'other_gono_songjog_attended', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->other_attended
                ],
                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'other_gono_songjog_invited', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->other_how_many_have_been_invited
                ],
                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'other_gono_songjog_associate_members_created', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->other_how_many_associate_members_created
                ],



                [
                    'table' => 'thana_department1_talimul_qurans', 
                    'column' => 'teacher_rokon_man', 
                    'value' => $report_sum_data?->ward_department1_talimul_qurans?->teacher_rokon
                ],
                [
                    'table' => 'thana_department1_talimul_qurans', 
                    'column' => 'teacher_worker_man', 
                    'value' => $report_sum_data?->ward_department1_talimul_qurans?->teacher_worker
                ],

                [
                    'table' => 'thana_department1_talimul_qurans', 
                    'column' => 'student_rokon_man', 
                    'value' => $report_sum_data?->ward_department1_talimul_qurans?->student_rokon
                ],
                [
                    'table' => 'thana_department1_talimul_qurans', 
                    'column' => 'student_worker_man', 
                    'value' => $report_sum_data?->ward_department1_talimul_qurans?->student_worker
                ],

                
                [
                    'table' => 'thana_department1_talimul_qurans', 
                    'column' => 'quran_learning_total_group', 
                    'value' => $report_sum_data?->ward_department1_talimul_qurans?->quran_learning_total_group
                ],
                [
                    'table' => 'thana_department1_talimul_qurans', 
                    'column' => 'quran_learning_total_students', 
                    'value' => $report_sum_data?->ward_department1_talimul_qurans?->quran_learning_total_students
                ],
                [
                    'table' => 'thana_department1_talimul_qurans', 
                    'column' => 'total_moktob', 
                    'value' => $report_sum_data?->ward_department1_talimul_qurans?->total_moktob
                ],
                [
                    'table' => 'thana_department1_talimul_qurans', 
                    'column' => 'total_moktob_students', 
                    'value' => $report_sum_data?->ward_department1_talimul_qurans?->total_moktob_students
                ],
                [
                    'table' => 'thana_department1_talimul_qurans', 
                    'column' => 'how_much_learned_sohih_tilawat', 
                    'value' => $report_sum_data?->ward_department1_talimul_qurans?->how_much_learned_sohih_tilawat
                ],
                [
                    'table' => 'thana_department1_talimul_qurans', 
                    'column' => 'how_much_invited_man', 
                    'value' => $report_sum_data?->ward_department1_talimul_qurans?->how_much_invited_man
                ],
                [
                    'table' => 'thana_department1_talimul_qurans', 
                    'column' => 'how_much_been_associated_man', 
                    'value' => $report_sum_data?->ward_department1_talimul_qurans?->how_much_been_associated_man
                ],
                [
                    'table' => 'thana_department1_talimul_qurans', 
                    'column' => 'total_muallim_increased_man', 
                    'value' => $report_sum_data?->ward_department1_talimul_qurans?->total_muallim_increased_man
                ],



                [
                    'table' => 'ward_department2_moholla_vittik_dawats', 
                    'column' => 'govment_calculated_village_amount', 
                    'value' => $report_sum_data?->ward_department2_moholla_vittik_dawats?->govment_calculated_village_amount
                ],
                [
                    'table' => 'ward_department2_moholla_vittik_dawats', 
                    'column' => 'govment_calculated_moholla_amount', 
                    'value' => $report_sum_data?->ward_department2_moholla_vittik_dawats?->govment_calculated_moholla_amount
                ],
                [
                    'table' => 'ward_department2_moholla_vittik_dawats', 
                    'column' => 'total_village_committee_increased', 
                    'value' => $report_sum_data?->ward_department2_moholla_vittik_dawats?->total_village_committee_increased
                ],
                [
                    'table' => 'ward_department2_moholla_vittik_dawats', 
                    'column' => 'total_village_committee_increased', 
                    'value' => $report_sum_data?->ward_department2_moholla_vittik_dawats?->total_moholla_committee_increased
                ],
                [
                    'table' => 'ward_department2_moholla_vittik_dawats', 
                    'column' => 'special_dawat_included_village_increased', 
                    'value' => $report_sum_data?->ward_department2_moholla_vittik_dawats?->special_dawat_included_village_increased
                ],
                [
                    'table' => 'ward_department2_moholla_vittik_dawats', 
                    'column' => 'special_dawat_included_moholla_increased', 
                    'value' => $report_sum_data?->ward_department2_moholla_vittik_dawats?->special_dawat_included_moholla_increased
                ],
                [
                    'table' => 'ward_department2_moholla_vittik_dawats', 
                    'column' => 'how_many_been_invited', 
                    'value' => $report_sum_data?->ward_department2_moholla_vittik_dawats?->how_many_been_invited
                ],
                [
                    'table' => 'ward_department2_moholla_vittik_dawats', 
                    'column' => 'how_many_associated_created', 
                    'value' => $report_sum_data?->ward_department2_moholla_vittik_dawats?->how_many_associated_created
                ],


                [
                    'table' => 'thana_department3_jubo_somaj_dawats', 
                    'column' => 'how_many_young_been_invited', 
                    'value' => $report_sum_data?->ward_department3_jubo_somaj_dawats?->how_many_young_been_invited
                ],
                [
                    'table' => 'thana_department3_jubo_somaj_dawats', 
                    'column' => 'how_many_young_been_associated', 
                    'value' => $report_sum_data?->ward_department3_jubo_somaj_dawats?->how_many_young_been_associated
                ],
                [
                    'table' => 'thana_department3_jubo_somaj_dawats', 
                    'column' => 'total_young_committee_increased', 
                    'value' => $report_sum_data?->ward_department3_jubo_somaj_dawats?->total_young_committee_increased
                ],
                [
                    'table' => 'thana_department3_jubo_somaj_dawats', 
                    'column' => 'total_new_club_increased', 
                    'value' => $report_sum_data?->ward_department3_jubo_somaj_dawats?->total_new_club_increased
                ],
                [
                    'table' => 'thana_department3_jubo_somaj_dawats', 
                    'column' => 'stablished_club_total_increased', 
                    'value' => $report_sum_data?->ward_department3_jubo_somaj_dawats?->stablished_club_total_increased
                ],



                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'political_and_special_invited_man', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->political_and_special_invited
                ],
                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'political_and_special_been_associated_man', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->political_and_special_been_associated
                ],
                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'political_and_special_target_man', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->political_and_special_target
                ],


                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'pesha_jibi_invited_man', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->pesha_jibi_invited
                ],
                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'pesha_jibi_been_associated_man', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->pesha_jibi_been_associated
                ],
                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'pesha_jibi_target_man', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->pesha_jibi_target
                ],

                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'olama_masayekh_invited', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->olama_masayekh_invited
                ],
                
                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'olama_masayekh_been_associated', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->olama_masayekh_been_associated
                ],
                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'olama_masayekh_target', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->olama_masayekh_target
                ],

                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'sromo_jibi_invited_man', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->sromo_jibi_invited
                ],
                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'sromo_jibi_been_associated_man', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->sromo_jibi_been_associated
                ],
                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'sromo_jibi_target_man', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->sromo_jibi_target
                ],


                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'prantik_jonogosti_invited', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->prantik_jonogosti_invited
                ],
                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'prantik_jonogosti_been_associated', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->prantik_jonogosti_been_associated
                ],
                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'prantik_jonogosti_target', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->prantik_jonogosti_target
                ],


                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'vinno_dormalombi_invited', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->vinno_dormalombi_invited
                ],
                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'vinno_dormalombi_been_associated', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->vinno_dormalombi_been_associated
                ],
                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'vinno_dormalombi_target', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->vinno_dormalombi_target
                ],





                [
                    'table' => 'thana_department5_paribarik_dawats', 
                    'column' => 'total_attended_family', 
                    'value' => $report_sum_data?->ward_department5_paribarik_dawats?->total_attended_family
                ],
                [
                    'table' => 'thana_department5_paribarik_dawats', 
                    'column' => 'how_many_new_family_invited', 
                    'value' => $report_sum_data?->ward_department5_paribarik_dawats?->how_many_new_family_invited
                ],


                [
                    'table' => 'thana_department6_mosjid_dawah_infomation_centers', 
                    'column' => 'total_mosjid_increase', 
                    'value' => $report_sum_data?->ward_department6_mosjid_dawah_infomation_centers?->total_mosjid_increase
                ],
                [
                    'table' => 'thana_department6_mosjid_dawah_infomation_centers', 
                    'column' => 'general_dawah_center_increase', 
                    'value' => $report_sum_data?->ward_department6_mosjid_dawah_infomation_centers?->general_dawah_center_increase
                ],
                [
                    'table' => 'thana_department6_mosjid_dawah_infomation_centers', 
                    'column' => 'dawat_included_mosjid_increase', 
                    'value' => $report_sum_data?->ward_department6_mosjid_dawah_infomation_centers?->dawat_included_mosjid_increase
                ],
                [
                    'table' => 'thana_department6_mosjid_dawah_infomation_centers', 
                    'column' => 'mosjid_wise_information_center_increase', 
                    'value' => $report_sum_data?->ward_department6_mosjid_dawah_infomation_centers?->mosjid_wise_information_center_increase
                ],
                [
                    'table' => 'thana_department6_mosjid_dawah_infomation_centers', 
                    'column' => 'general_information_center_increase', 
                    'value' => $report_sum_data?->ward_department6_mosjid_dawah_infomation_centers?->general_information_center_increase
                ],
                [
                    'table' => 'thana_department6_mosjid_dawah_infomation_centers', 
                    'column' => 'mosjid_wise_dawah_center_increase', 
                    'value' => $report_sum_data?->ward_department6_mosjid_dawah_infomation_centers?->mosjid_wise_dawah_center_increase
                ],



                [
                    'table' => 'thana_department7_dawat_in_technologies', 
                    'column' => 'total_well_known_man', 
                    'value' => $report_sum_data?->ward_department7_dawat_in_technologies?->total_well_known
                ],
                [
                    'table' => 'thana_department7_dawat_in_technologies', 
                    'column' => 'total_attended_man', 
                    'value' => $report_sum_data?->ward_department7_dawat_in_technologies?->total_attended
                ],


                [
                    'table' => 'thana_dawah_and_prokashonas', 
                    'column' => 'total_pathagar_increase', 
                    'value' => $report_sum_data?->ward_dawah_and_prokashonas?->total_pathagar_increase
                ],
                [
                    'table' => 'thana_dawah_and_prokashonas', 
                    'column' => 'ward_book_sales_center_increase', 
                    'value' => $report_sum_data?->ward_dawah_and_prokashonas?->ward_book_sales_center_increase
                ],
                [
                    'table' => 'thana_dawah_and_prokashonas', 
                    'column' => 'books_in_pathagar_increase', 
                    'value' => $report_sum_data?->ward_dawah_and_prokashonas?->books_in_pathagar_increase
                ],
                [
                    'table' => 'thana_dawah_and_prokashonas', 
                    'column' => 'ward_book_sales', 
                    'value' => $report_sum_data?->ward_dawah_and_prokashonas?->ward_book_sales
                ],
                [
                    'table' => 'thana_dawah_and_prokashonas', 
                    'column' => 'book_distribution', 
                    'value' => $report_sum_data?->ward_dawah_and_prokashonas?->book_distribution
                ],

                [
                    'table' => 'thana_dawah_and_prokashonas', 
                    'column' => 'soft_copy_book_distribution', 
                    'value' => $report_sum_data?->ward_dawah_and_prokashonas?->soft_copy_book_distribution
                ],
                [
                    'table' => 'thana_dawah_and_prokashonas', 
                    'column' => 'unit_book_distribution_center_increase', 
                    'value' => $report_sum_data?->ward_dawah_and_prokashonas?->unit_book_distribution_center_increase
                ],
                [
                    'table' => 'thana_dawah_and_prokashonas', 
                    'column' => 'dawat_link_distribution', 
                    'value' => $report_sum_data?->ward_dawah_and_prokashonas?->dawat_link_distribution
                ],
                [
                    'table' => 'thana_dawah_and_prokashonas', 
                    'column' => 'unit_book_distribution', 
                    'value' => $report_sum_data?->ward_dawah_and_prokashonas?->unit_book_distribution
                ],
                [
                    'table' => 'thana_dawah_and_prokashonas', 
                    'column' => 'sonar_bangla_increase', 
                    'value' => $report_sum_data?->ward_dawah_and_prokashonas?->sonar_bangla_increase
                ],
                [
                    'table' => 'thana_dawah_and_prokashonas', 
                    'column' => 'songram_increase', 
                    'value' => $report_sum_data?->ward_dawah_and_prokashonas?->songram_increase
                ],
                [
                    'table' => 'thana_dawah_and_prokashonas', 
                    'column' => 'prithibi_increase', 
                    'value' => $report_sum_data?->ward_dawah_and_prokashonas?->prithibi_increase
                ],



                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'unit_masik_sadaron_sova_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->unit_masik_sadaron_sova_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'unit_masik_sadaron_sova_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->unit_masik_sadaron_sova_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'unit_masik_sadaron_sova_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->unit_masik_sadaron_sova_uposthiti
                ],


                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'alochona_sova_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->alochona_sova_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'alochona_sova_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->alochona_sova_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'alochona_sova_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->alochona_sova_uposthiti
                ],


                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'sudhi_somabesh_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->sudhi_somabesh_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'sudhi_somabesh_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->sudhi_somabesh_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'sudhi_somabesh_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->sudhi_somabesh_uposthiti
                ],


                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'siratunnabi_mahfil_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->siratunnabi_mahfil_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'siratunnabi_mahfil_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->siratunnabi_mahfil_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'siratunnabi_mahfil_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->siratunnabi_mahfil_uposthiti
                ],


                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'eid_reunion_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->eid_reunion_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'eid_reunion_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->eid_reunion_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'eid_reunion_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->eid_reunion_uposthiti
                ],
                
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'dars_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->dars_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'dars_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->dars_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'dars_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->dars_uposthiti
                ],
                
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'tafsir_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->tafsir_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'tafsir_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->tafsir_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'tafsir_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->tafsir_uposthiti
                ],
                
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'dawati_jonosova_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->dawati_jonosova_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'dawati_jonosova_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->dawati_jonosova_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'dawati_jonosova_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->dawati_jonosova_uposthiti
                ],
                
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'iftar_mahfil_personal_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->iftar_mahfil_personal_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'iftar_mahfil_personal_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->iftar_mahfil_personal_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'iftar_mahfil_personal_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->iftar_mahfil_personal_uposthiti
                ],
                
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'iftar_mahfil_samostic_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->iftar_mahfil_samostic_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'iftar_mahfil_samostic_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->iftar_mahfil_samostic_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'iftar_mahfil_samostic_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->iftar_mahfil_samostic_uposthiti
                ],
                
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'cha_chakra_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->cha_chakra_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'cha_chakra_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->cha_chakra_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'cha_chakra_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->cha_chakra_uposthiti
                ],
                
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'samostic_khawa_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->samostic_khawa_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'samostic_khawa_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->samostic_khawa_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'samostic_khawa_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->samostic_khawa_uposthiti
                ],
                
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'sikkha_sofor_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->sikkha_sofor_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'sikkha_sofor_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->sikkha_sofor_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'sikkha_sofor_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->sikkha_sofor_uposthiti
                ],
                
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'kirat_protijogita_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->kirat_protijogita_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'kirat_protijogita_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->kirat_protijogita_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'kirat_protijogita_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->kirat_protijogita_uposthiti
                ],
                
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'hamd_nat_protijogita_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->hamd_nat_protijogita_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'hamd_nat_protijogita_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->hamd_nat_protijogita_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'hamd_nat_protijogita_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->hamd_nat_protijogita_uposthiti
                ],
                
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'others_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->others_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'others_target',
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->others_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'others_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->others_uposthiti
                ],
                





                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'general_unit_men_increase', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->general_unit_men_increase
                ],
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'general_unit_men_gatti', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->general_unit_men_gatti
                ],
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'general_unit_men_target', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->general_unit_men_target
                ],
                
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'ulama_unit_increase', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->ulama_unit_increase
                ],
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'ulama_unit_gatti', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->ulama_unit_gatti
                ],
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'ulama_unit_target', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->ulama_unit_target
                ],
                
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'peshajibi_unit_men_increase', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->peshajibi_unit_increase
                ],
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'peshajibi_unit_men_gatti', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->peshajibi_unit_gatti
                ],
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'peshajibi_unit_men_target', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->peshajibi_unit_target
                ],
                
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'jubo_unit_increase', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->jubo_unit_increase
                ],
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'jubo_unit_gatti', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->jubo_unit_gatti
                ],
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'jubo_unit_target', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->jubo_unit_target
                ],
                
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'media_unit_increase', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->media_unit_increase
                ],
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'media_unit_gatti', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->media_unit_gatti
                ],
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'media_unit_target', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->media_unit_target
                ],
                





                [
                    'table' => 'thana_songothon5_dawat_and_paribarik_units', 
                    'column' => 'dawati_unit_increase', 
                    'value' => $report_sum_data?->ward_songothon5_dawat_and_paribarik_units?->dawati_unit_increase
                ],
                [
                    'table' => 'thana_songothon5_dawat_and_paribarik_units', 
                    'column' => 'dawati_unit_gatti', 
                    'value' => $report_sum_data?->ward_songothon5_dawat_and_paribarik_units?->dawati_unit_gatti
                ],
                [
                    'table' => 'thana_songothon5_dawat_and_paribarik_units', 
                    'column' => 'dawati_unit_target', 
                    'value' => $report_sum_data?->ward_songothon5_dawat_and_paribarik_units?->dawati_unit_target
                ],
                
                [
                    'table' => 'thana_songothon5_dawat_and_paribarik_units', 
                    'column' => 'paribarik_unit_increase', 
                    'value' => $report_sum_data?->ward_songothon5_dawat_and_paribarik_units?->paribarik_unit_increase
                ],
                [
                    'table' => 'thana_songothon5_dawat_and_paribarik_units', 
                    'column' => 'paribarik_unit_gatti', 
                    'value' => $report_sum_data?->ward_songothon5_dawat_and_paribarik_units?->paribarik_unit_gatti
                ],
                [
                    'table' => 'thana_songothon5_dawat_and_paribarik_units', 
                    'column' => 'paribarik_unit_target', 
                    'value' => $report_sum_data?->ward_songothon5_dawat_and_paribarik_units?->paribarik_unit_target
                ],
                


                [
                    'table' => 'thana_songothon6_bidayi_students_connects', 
                    'column' => 'Joined_student_man_member', 
                    'value' => $report_sum_data?->ward_songothon6_bidayi_students_connects?->Joined_student_man_member
                ],
                [
                    'table' => 'thana_songothon6_bidayi_students_connects', 
                    'column' => 'Joined_student_man_associate', 
                    'value' => $report_sum_data?->ward_songothon6_bidayi_students_connects?->Joined_student_man_associate
                ],
                [
                    'table' => 'thana_songothon6_bidayi_students_connects', 
                    'column' => 'Joined_student_man_worker', 
                    'value' => $report_sum_data?->ward_songothon6_bidayi_students_connects?->Joined_student_man_worker
                ],


                [
                    'table' => 'thana_songothon10_iyanot_data', 
                    'column' => 'associate_member_total', 
                    'value' => $report_sum_data?->ward_songothon8_iyanot_data?->associate_member_total
                ],
                [
                    'table' => 'thana_songothon10_iyanot_data', 
                    'column' => 'sudhi_total', 
                    'value' => $report_sum_data?->ward_songothon8_iyanot_data?->sudhi_total
                ],
                [
                    'table' => 'thana_songothon10_iyanot_data', 
                    'column' => 'associate_member_total_iyanot_amounts', 
                    'value' => $report_sum_data?->ward_songothon8_iyanot_data?->associate_member_total_iyanot_amounts
                ],
                [
                    'table' => 'thana_songothon10_iyanot_data', 
                    'column' => 'sudi_total_iyanot_amounts', 
                    'value' => $report_sum_data?->ward_songothon8_iyanot_data?->sudi_total_iyanot_amounts
                ],


                
                [
                    'table' => 'thana_songothon11_sangothonik_boithoks', 
                    'column' => 'ward_boithok_man_total', 
                    'value' => $report_sum_data?->ward_songothon9_sangothonik_boithoks?->word_boithok_total
                ],
                [
                    'table' => 'thana_songothon11_sangothonik_boithoks', 
                    'column' => 'ward_boithok_man_target', 
                    'value' => $report_sum_data?->ward_songothon9_sangothonik_boithoks?->word_boithok_target
                ],
                [
                    'table' => 'thana_songothon11_sangothonik_boithoks', 
                    'column' => 'ward_boithok_man_uposthiti', 
                    'value' => $report_sum_data?->ward_songothon9_sangothonik_boithoks?->word_boithok_uposthiti
                ],
                
                [
                    'table' => 'thana_songothon11_sangothonik_boithoks', 
                    'column' => 'unit_kormi_boithok_man_total', 
                    'value' => $report_sum_data?->ward_songothon9_sangothonik_boithoks?->unit_kormi_boithok_total
                ],
                [
                    'table' => 'thana_songothon11_sangothonik_boithoks', 
                    'column' => 'unit_kormi_boithok_man_target', 
                    'value' => $report_sum_data?->ward_songothon9_sangothonik_boithoks?->unit_kormi_boithok_target
                ],
                [
                    'table' => 'thana_songothon11_sangothonik_boithoks', 
                    'column' => 'unit_kormi_boithok_man_uposthiti', 
                    'value' => $report_sum_data?->ward_songothon9_sangothonik_boithoks?->unit_kormi_boithok_uposthiti
                ],
                
                [
                    'table' => 'thana_songothon11_sangothonik_boithoks', 
                    'column' => 'ulama_somabesh_man_total', 
                    'value' => $report_sum_data?->ward_songothon9_sangothonik_boithoks?->ulama_somabesh_total
                ],
                [
                    'table' => 'thana_songothon11_sangothonik_boithoks', 
                    'column' => 'ulama_somabesh_man_target', 
                    'value' => $report_sum_data?->ward_songothon9_sangothonik_boithoks?->ulama_somabesh_target
                ],
                [
                    'table' => 'thana_songothon11_sangothonik_boithoks', 
                    'column' => 'ulama_somabesh_man_uposthiti', 
                    'value' => $report_sum_data?->ward_songothon9_sangothonik_boithoks?->ulama_somabesh_uposthiti
                ],
                
                [
                    'table' => 'thana_songothon11_sangothonik_boithoks', 
                    'column' => 'sromik_somabesh_man_total', 
                    'value' => $report_sum_data?->ward_songothon9_sangothonik_boithoks?->sromik_somabesh_total
                ],
                [
                    'table' => 'thana_songothon11_sangothonik_boithoks', 
                    'column' => 'sromik_somabesh_man_target', 
                    'value' => $report_sum_data?->ward_songothon9_sangothonik_boithoks?->sromik_somabesh_target
                ],
                [
                    'table' => 'thana_songothon11_sangothonik_boithoks', 
                    'column' => 'sromik_somabesh_man_uposthiti', 
                    'value' => $report_sum_data?->ward_songothon9_sangothonik_boithoks?->sromik_somabesh_uposthiti
                ],
                




                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'unit_tarbiati_boithok_man_total', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->unit_tarbiati_boithok
                ],
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'unit_tarbiati_boithok_man_target', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->unit_tarbiati_boithok_target
                ],
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'unit_tarbiati_boithok_man_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->unit_tarbiati_boithok_uposthiti
                ],
                
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'ward_kormi_shikkha_boithok_man_total', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->ward_kormi_sikkha_boithok
                ],
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'ward_kormi_shikkha_boithok_man_target', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->ward_kormi_sikkha_boithok_target
                ],
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'ward_kormi_shikkha_boithok_man_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->ward_kormi_sikkha_boithok_uposthiti
                ],
                
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'gono_sikkha_boithok_man_total', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->gono_sikkha_boithok
                ],
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'gono_sikkha_boithok_man_target', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->gono_sikkha_boithok_target
                ],
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'gono_sikkha_boithok_man_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->gono_sikkha_boithoksthiti
                ],
                
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'gono_noisho_ibadot_man_total', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->gono_noisho_ibadot
                ],
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'gono_noisho_ibadot_man_target', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->gono_noisho_ibadot_target
                ],
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'gono_noisho_ibadot_man_uposthiti',
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->gono_noisho_ibadot_uposthiti
                ],
                
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'kormi_alochona_cokro_man_total_group', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->alochona_chokro_group
                ],
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'kormi_alochona_cokro_man_total_odhibeshon', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->alochona_chokro_program
                ],
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'kormi_alochona_cokro_man_total_man_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->alochona_chokro_uposthiti
                ],
                
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'darsul_quran_man_program', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->darsul_quran_program
                ],
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'darsul_quran_man_man_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->darsul_quran_uposthiti
                ],
                


                [
                    'table' => 'thana_proshikkhon3_manob_shompod_training_courses', 
                    'column' => 'dawah_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon2_manob_shompod_unnoyons?->dawah_uposthiti
                ],
                [
                    'table' => 'thana_proshikkhon3_manob_shompod_training_courses', 
                    'column' => 'shomajkormo_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon2_manob_shompod_unnoyons?->shomajkormo_uposthiti
                ],
                [
                    'table' => 'thana_proshikkhon3_manob_shompod_training_courses', 
                    'column' => 'media_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon2_manob_shompod_unnoyons?->media_uposthiti
                ],
                [
                    'table' => 'thana_proshikkhon3_manob_shompod_training_courses', 
                    'column' => 'ict_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon2_manob_shompod_unnoyons?->ict_uposthiti
                ],
                [
                    'table' => 'thana_proshikkhon3_manob_shompod_training_courses', 
                    'column' => 'office_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon2_manob_shompod_unnoyons?->office_uposthiti
                ],
                [
                    'table' => 'thana_proshikkhon3_manob_shompod_training_courses', 
                    'column' => 'financial_management_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon2_manob_shompod_unnoyons?->financial_management_uposthiti
                ],
                [
                    'table' => 'thana_proshikkhon3_manob_shompod_training_courses', 
                    'column' => 'english_language_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon2_manob_shompod_unnoyons?->english_language_uposthiti
                ],
                [
                    'table' => 'thana_proshikkhon3_manob_shompod_training_courses', 
                    'column' => 'arabic_language_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon2_manob_shompod_unnoyons?->arabic_language_uposthiti
                ],
                [
                    'table' => 'thana_proshikkhon3_manob_shompod_training_courses', 
                    'column' => 'trade_oriented_technical_training_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon2_manob_shompod_unnoyons?->trade_oriented_technical_training_uposthiti
                ],
                


                [
                    'table' => 'thana_shomajsheba2_personal_social_works', 
                    'column' => 'how_many_people_did', 
                    'value' => $report_sum_data?->ward_shomajsheba1_personal_social_works?->how_many_people_did
                ],
                [
                    'table' => 'thana_shomajsheba2_personal_social_works', 
                    'column' => 'service_received_total', 
                    'value' => $report_sum_data?->ward_shomajsheba1_personal_social_works?->service_received_total
                ],


                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'minor_unnoyonmulok_kaj',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->minor_unnoyonmulok_kaj
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'shamajik_onusthane_ongshogrohon',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->shamajik_onusthane_ongshogrohon
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'shamajik_onusthane_shohayota_prodan',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->shamajik_onusthane_shohayota_prodan
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'shamajik_birodh_mimangsha',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->shamajik_birodh_mimangsha
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'manobik_shohayota_prodan',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->manobik_shohayota_prodan
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'korje_hasana_prodan',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->korje_hasana_prodan
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'porishkar_poricchonnota_ovijan',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->porishkar_poricchonnota_ovijan
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'moshok_nidhon_ovijan',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->moshok_nidhon_ovijan
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'rogir_poricorja',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->rogir_poricorja
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'medical_shohayota_prodan',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->medical_shohayota_prodan
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'voluntarily_blood_donation_kotojon',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->voluntarily_blood_donation_kotojon
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'voluntarily_blood_donation_kotojonke',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->voluntarily_blood_donation_kotojonke
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'nobojatokke_gift_prodan',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->nobojatokke_gift_prodan
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'vrammoman_school_calu',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->vrammoman_school_calu
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'vrammoman_moktob_calu',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->vrammoman_moktob_calu
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'technical_services_kotojon',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->technical_services_kotojon
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'technical_services_prodan_kotojonke',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->technical_services_prodan_kotojonke
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'online_services_prodan_kotojonke',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->online_services_prodan_kotojonke
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'brikkho_ropon',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->brikkho_ropon
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'public_awareness_programs',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->public_awareness_programs
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'tran_bitoron',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->tran_bitoron
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'vinnodhormabolombider_service_prodan_kotojon',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->vinnodhormabolombider_service_prodan_kotojon
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'vinnodhormabolombider_service_prodan_kotojonke',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->vinnodhormabolombider_service_prodan_kotojonke
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'mayeter_gosol_kotojonke',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->mayeter_gosol_kotojonke
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'janajay_ongshogrohon',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->janajay_ongshogrohon
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'low_capital_employment_kotojonke',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->low_capital_employment_kotojonke
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'others',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->others
                ],
                

                [
                    'table' => 'thana_shomajsheba4_institutional_social_works', 
                    'column' => 'social_institution_in_ward', 
                    'value' => $report_sum_data?->ward_shomajsheba4_institutional_social_works?->shamajik_protishthan_kototi
                ],
                [
                    'table' => 'thana_shomajsheba4_institutional_social_works', 
                    'column' => 'institutional_social_work_in_ward', 
                    'value' => $report_sum_data?->ward_shomajsheba4_institutional_social_works?->shamajik_protishthan_kototite_kaj_hoyeche
                ],
                [
                    'table' => 'thana_shomajsheba4_institutional_social_works', 
                    'column' => 'new_social_institutions_in_ward', 
                    'value' => $report_sum_data?->ward_shomajsheba4_institutional_social_works?->new_shamajik_protishthan
                ],

                [
                    'table' => 'thana_shomajsheba5_health_and_family_kollans', 
                    'column' => 'health_education_training_programs_attendance', 
                    'value' => $report_sum_data?->ward_shomajsheba3_health_and_family_kollans?->health_worker_training_programs_attendance
                ],
                [
                    'table' => 'thana_shomajsheba5_health_and_family_kollans', 
                    'column' => 'participated_in_health_care_work', 
                    'value' => $report_sum_data?->ward_shomajsheba3_health_and_family_kollans?->participated_in_health_care_work
                ],
                [
                    'table' => 'thana_shomajsheba5_health_and_family_kollans', 
                    'column' => 'served_people', 
                    'value' => $report_sum_data?->ward_shomajsheba3_health_and_family_kollans?->served_people
                ],


                [
                    'table' => 'thana_rastrio1_political_communications', 
                    'column' => 'rajnoitik_bekti_jogajog_koreche_kotojon', 
                    'value' => $report_sum_data?->ward_rastrio1_political_communications?->rajnoitik_bekti_jogajog_koreche_kotojon
                ],
                [
                    'table' => 'thana_rastrio1_political_communications', 
                    'column' => 'rajnoitik_bekti_jogajog_koreche_kotojonke', 
                    'value' => $report_sum_data?->ward_rastrio1_political_communications?->rajnoitik_bekti_jogajog_koreche_kotojonke
                ],
                [
                    'table' => 'thana_rastrio1_political_communications', 
                    'column' => 'proshoshonik_bekti_jogajog_koreche_kotojon', 
                    'value' => $report_sum_data?->ward_rastrio1_political_communications?->proshoshonik_bekti_jogajog_koreche_kotojon
                ],
                [
                    'table' => 'thana_rastrio1_political_communications', 
                    'column' => 'proshoshonik_bekti_jogajog_koreche_kotojonke', 
                    'value' => $report_sum_data?->ward_rastrio1_political_communications?->proshoshonik_bekti_jogajog_koreche_kotojonke
                ],


                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'centrally_announced_political_program', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->centrally_announced_political_program
                ],
                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'centrally_announced_political_program_attend', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->centrally_announced_political_program_attend
                ],

                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'locally_announced_jonoshova', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->locally_announced_jonoshova
                ],
                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'locally_announced_jonoshova_attend', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->locally_announced_jonoshova_attend
                ],
                
                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'locally_announced_shomabesh', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->locally_announced_shomabesh
                ],
                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'locally_announced_shomabesh_attend', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->locally_announced_shomabesh_attend
                ],
                
                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'locally_announced_michil', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->locally_announced_michil
                ],
                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'locally_announced_michil_attend', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->locally_announced_michil_attend
                ],
                
                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'poster_bitoron', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->poster_bitoron
                ],
                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'leaflet_bitoron', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->leaflet_bitoron
                ],
                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'booklet_bitoron', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->booklet_bitoron
                ],
                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'sharoklipi_bitoron', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->sharoklipi_bitoron
                ],
                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'others', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->others
                ],
                



                [
                    'table' => 'thana_rastrio3_dibosh_palons', 
                    'column' => 'shadhinota_o_jatio_dibosh_total_programs', 
                    'value' => $report_sum_data?->ward_rastrio3_dibosh_palons?->shadhinota_o_jatio_dibosh_total_programs
                ],
                [
                    'table' => 'thana_rastrio3_dibosh_palons', 
                    'column' => 'shadhinota_o_jatio_dibosh_attend', 
                    'value' => $report_sum_data?->ward_rastrio3_dibosh_palons?->shadhinota_o_jatio_dibosh_attend
                ],

                
                [
                    'table' => 'thana_rastrio3_dibosh_palons', 
                    'column' => 'bijoy_dibosh_total_programs', 
                    'value' => $report_sum_data?->ward_rastrio3_dibosh_palons?->bijoy_dibosh_total_programs
                ],
                [
                    'table' => 'thana_rastrio3_dibosh_palons', 
                    'column' => 'bijoy_dibosh_attend', 
                    'value' => $report_sum_data?->ward_rastrio3_dibosh_palons?->bijoy_dibosh_attend
                ],

                [
                    'table' => 'thana_rastrio3_dibosh_palons', 
                    'column' => 'others_total_programs', 
                    'value' => $report_sum_data?->ward_rastrio3_dibosh_palons?->others_total_programs
                ],
                [
                    'table' => 'thana_rastrio3_dibosh_palons', 
                    'column' => 'others_attend', 
                    'value' => $report_sum_data?->ward_rastrio3_dibosh_palons?->others_attend
                ],

                [
                    'table' => 'thana_rastrio3_dibosh_palons', 
                    'column' => 'mattrivasha_dibosh_total_programs', 
                    'value' => $report_sum_data?->ward_rastrio3_dibosh_palons?->mattrivasha_dibosh_total_programs
                ],
                [
                    'table' => 'thana_rastrio3_dibosh_palons', 
                    'column' => 'mattrivasha_dibosh_attend', 
                    'value' => $report_sum_data?->ward_rastrio3_dibosh_palons?->mattrivasha_dibosh_attend
                ],


                [
                    'table' => 'thana_rastrio4_election_activities', 
                    'column' => 'city_corporation_councilor_candidate_man_elected', 
                    'value' => $report_sum_data?->ward_rastrio4_election_activities?->councilor_candidate_elected
                ],
                [
                    'table' => 'thana_rastrio4_election_activities', 
                    'column' => 'city_corporation_councilor_candidate_man_second_position', 
                    'value' => $report_sum_data?->ward_rastrio4_election_activities?->councilor_candidate_second_position
                ],
                
                [
                    'table' => 'thana_rastrio4_election_activities', 
                    'column' => 'national_vote_kendro_increase', 
                    'value' => $report_sum_data?->ward_rastrio4_election_activities?->national_vote_kendro_increase
                ],
                [
                    'table' => 'thana_rastrio4_election_activities', 
                    'column' => 'local_vote_kendro_increase', 
                    'value' => $report_sum_data?->ward_rastrio4_election_activities?->local_vote_kendro_increase
                ],
                [
                    'table' => 'thana_rastrio4_election_activities', 
                    'column' => 'vote_kendro_committee_increase', 
                    'value' => $report_sum_data?->ward_rastrio4_election_activities?->vote_kendro_committee_increase
                ],
                [
                    'table' => 'thana_rastrio4_election_activities', 
                    'column' => 'vote_kendro_committee_target', 
                    'value' => $report_sum_data?->ward_rastrio4_election_activities?->vote_kendro_committee_target
                ],
                [
                    'table' => 'thana_rastrio4_election_activities', 
                    'column' => 'vote_kendro_vittik_unit_increase', 
                    'value' => $report_sum_data?->ward_rastrio4_election_activities?->vote_kendro_vittik_unit_increase
                ],
                [
                    'table' => 'thana_rastrio4_election_activities', 
                    'column' => 'vote_kendro_vittik_unit_target', 
                    'value' => $report_sum_data?->ward_rastrio4_election_activities?->vote_kendro_vittik_unit_target
                ],
                
                
            ];
        }else if ($thana_gender == "women"){
            $table_column_value = [
                [
                    'table' => 'thana_dawat1_regular_group_wises', 
                    'column' => 'how_many_groups_are_out_woman', 
                    'value' => $report_sum_data?->ward_dawat1_regular_group_wises?->how_many_groups_are_out
                ],
                [
                    'table' => 'thana_dawat1_regular_group_wises', 
                    'column' => 'number_of_participants_woman', 
                    'value' => $report_sum_data?->ward_dawat1_regular_group_wises?->number_of_participants
                ],
                [
                    'table' => 'thana_dawat1_regular_group_wises', 
                    'column' => 'how_many_have_been_invited_woman', 
                    'value' => $report_sum_data?->ward_dawat1_regular_group_wises?->how_many_have_been_invited
                ],
                [
                    'table' => 'thana_dawat1_regular_group_wises', 
                    'column' => 'how_many_associate_members_created_woman', 
                    'value' => $report_sum_data?->ward_dawat1_regular_group_wises?->how_many_associate_members_created
                ],


                [
                    'table' => 'thana_dawat2_personal_and_targets', 
                    'column' => 'total_rokon_woman', 
                    'value' => $report_sum_data?->ward_dawat2_personal_and_targets?->total_rokon
                ],
                [
                    'table' => 'thana_dawat2_personal_and_targets', 
                    'column' => 'total_worker_woman', 
                    'value' => $report_sum_data?->ward_dawat2_personal_and_targets?->total_worker
                ],
                [
                    'table' => 'thana_dawat2_personal_and_targets', 
                    'column' => 'how_many_were_give_dawat_rokon_woman', 
                    'value' => $report_sum_data?->ward_dawat2_personal_and_targets?->how_many_were_give_dawat_rokon
                ],
                [
                    'table' => 'thana_dawat2_personal_and_targets', 
                    'column' => 'how_many_were_give_dawat_worker_woman', 
                    'value' => $report_sum_data?->ward_dawat2_personal_and_targets?->how_many_were_give_dawat_worker
                ],
                [
                    'table' => 'thana_dawat2_personal_and_targets', 
                    'column' => 'how_many_have_been_invited_woman', 
                    'value' => $report_sum_data?->ward_dawat2_personal_and_targets?->how_many_have_been_invited
                ],
                [
                    'table' => 'thana_dawat2_personal_and_targets', 
                    'column' => 'how_many_associate_members_created_woman', 
                    'value' => $report_sum_data?->ward_dawat2_personal_and_targets?->how_many_associate_members_created
                ],

                [
                    'table' => 'thana_dawat3_general_program_and_others', 
                    'column' => 'how_many_were_give_dawat_woman', 
                    'value' => $report_sum_data?->ward_dawat3_general_program_and_others?->how_many_were_give_dawat
                ],
                [
                    'table' => 'thana_dawat3_general_program_and_others', 
                    'column' => 'how_many_associate_members_created_woman', 
                    'value' => $report_sum_data?->ward_dawat3_general_program_and_others?->how_many_associate_members_created
                ],


                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'gono_songjog_doshok_group_woman', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->total_gono_songjog_group
                ],
                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'gono_songjog_doshok_attended_woman', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->total_attended
                ],
                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'gono_songjog_doshok_invited_woman',
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->how_many_have_been_invited
                ],
                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'gono_songjog_doshok_associate_members_created_woman', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->how_many_associate_members_created
                ],


                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'mohanogor_declared_gonosonjog_dawati_ovi_group', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->jela_mohanogor_declared_gonosonjog_group
                ],
                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'mohanogor_declared_gonosonjog_dawati_ovi_attended', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->jela_mohanogor_declared_gonosonjog_attended
                ],
                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'mohanogor_declared_gonosonjog_dawati_ovi_invited', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->jela_mohanogor_declared_gonosonjog_invited
                ],
                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'mohanogor_declared_gonosonjog_dawati_ovi_associate_members_created', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->jela_mohanogor_declared_gonosonjog_associated_created
                ],


                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'election_gono_songjog_group_woman', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->election_gono_songjog_group
                ],
                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'election_gono_songjog_attended_woman', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->election_attended
                ],
                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'election_gono_songjog_invited_woman', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->election_how_many_have_been_invited
                ],
                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'election_gono_songjog_associate_members_created_woman', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->election_how_many_associate_members_created
                ],



                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'other_gono_songjog_group', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->other_gono_songjog_group
                ],
                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'other_gono_songjog_attended', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->other_attended
                ],
                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'other_gono_songjog_invited', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->other_how_many_have_been_invited
                ],
                [
                    'table' => 'thana_dawat4_gono_songjog_and_dawat_ovijans', 
                    'column' => 'other_gono_songjog_associate_members_created', 
                    'value' => $report_sum_data?->ward_dawat4_gono_songjog_and_dawat_ovijans?->other_how_many_associate_members_created
                ],



                [
                    'table' => 'thana_department1_talimul_qurans', 
                    'column' => 'teacher_rokon_woman', 
                    'value' => $report_sum_data?->ward_department1_talimul_qurans?->teacher_rokon
                ],
                [
                    'table' => 'thana_department1_talimul_qurans', 
                    'column' => 'teacher_worker_woman', 
                    'value' => $report_sum_data?->ward_department1_talimul_qurans?->teacher_worker
                ],

                [
                    'table' => 'thana_department1_talimul_qurans', 
                    'column' => 'student_rokon_woman', 
                    'value' => $report_sum_data?->ward_department1_talimul_qurans?->student_rokon
                ],
                [
                    'table' => 'thana_department1_talimul_qurans', 
                    'column' => 'student_worker_woman', 
                    'value' => $report_sum_data?->ward_department1_talimul_qurans?->student_worker
                ],

                
                [
                    'table' => 'thana_department1_talimul_qurans', 
                    'column' => 'quran_learning_total_group', 
                    'value' => $report_sum_data?->ward_department1_talimul_qurans?->quran_learning_total_group
                ],
                [
                    'table' => 'thana_department1_talimul_qurans', 
                    'column' => 'quran_learning_total_students', 
                    'value' => $report_sum_data?->ward_department1_talimul_qurans?->quran_learning_total_students
                ],
                [
                    'table' => 'thana_department1_talimul_qurans', 
                    'column' => 'total_moktob', 
                    'value' => $report_sum_data?->ward_department1_talimul_qurans?->total_moktob
                ],
                [
                    'table' => 'thana_department1_talimul_qurans', 
                    'column' => 'total_moktob_students', 
                    'value' => $report_sum_data?->ward_department1_talimul_qurans?->total_moktob_students
                ],
                [
                    'table' => 'thana_department1_talimul_qurans', 
                    'column' => 'how_much_learned_sohih_tilawat', 
                    'value' => $report_sum_data?->ward_department1_talimul_qurans?->how_much_learned_sohih_tilawat
                ],
                [
                    'table' => 'thana_department1_talimul_qurans', 
                    'column' => 'how_much_invited_woman', 
                    'value' => $report_sum_data?->ward_department1_talimul_qurans?->how_much_invited_woman
                ],
                [
                    'table' => 'thana_department1_talimul_qurans', 
                    'column' => 'how_much_been_associated_woman', 
                    'value' => $report_sum_data?->ward_department1_talimul_qurans?->how_much_been_associated_woman
                ],
                [
                    'table' => 'thana_department1_talimul_qurans', 
                    'column' => 'total_muallim_increased_woman', 
                    'value' => $report_sum_data?->ward_department1_talimul_qurans?->total_muallim_increased_woman
                ],



                [
                    'table' => 'ward_department2_moholla_vittik_dawats', 
                    'column' => 'govment_calculated_village_amount', 
                    'value' => $report_sum_data?->ward_department2_moholla_vittik_dawats?->govment_calculated_village_amount
                ],
                [
                    'table' => 'ward_department2_moholla_vittik_dawats', 
                    'column' => 'govment_calculated_moholla_amount', 
                    'value' => $report_sum_data?->ward_department2_moholla_vittik_dawats?->govment_calculated_moholla_amount
                ],
                [
                    'table' => 'ward_department2_moholla_vittik_dawats', 
                    'column' => 'total_village_committee_increased', 
                    'value' => $report_sum_data?->ward_department2_moholla_vittik_dawats?->total_village_committee_increased
                ],
                [
                    'table' => 'ward_department2_moholla_vittik_dawats', 
                    'column' => 'total_village_committee_increased', 
                    'value' => $report_sum_data?->ward_department2_moholla_vittik_dawats?->total_moholla_committee_increased
                ],
                [
                    'table' => 'ward_department2_moholla_vittik_dawats', 
                    'column' => 'special_dawat_included_village_increased', 
                    'value' => $report_sum_data?->ward_department2_moholla_vittik_dawats?->special_dawat_included_village_increased
                ],
                [
                    'table' => 'ward_department2_moholla_vittik_dawats', 
                    'column' => 'special_dawat_included_moholla_increased', 
                    'value' => $report_sum_data?->ward_department2_moholla_vittik_dawats?->special_dawat_included_moholla_increased
                ],
                [
                    'table' => 'ward_department2_moholla_vittik_dawats', 
                    'column' => 'how_many_been_invited', 
                    'value' => $report_sum_data?->ward_department2_moholla_vittik_dawats?->how_many_been_invited
                ],
                [
                    'table' => 'ward_department2_moholla_vittik_dawats', 
                    'column' => 'how_many_associated_created', 
                    'value' => $report_sum_data?->ward_department2_moholla_vittik_dawats?->how_many_associated_created
                ],


                [
                    'table' => 'thana_department3_jubo_somaj_dawats', 
                    'column' => 'how_many_young_been_invited', 
                    'value' => $report_sum_data?->ward_department3_jubo_somaj_dawats?->how_many_young_been_invited
                ],
                [
                    'table' => 'thana_department3_jubo_somaj_dawats', 
                    'column' => 'how_many_young_been_associated', 
                    'value' => $report_sum_data?->ward_department3_jubo_somaj_dawats?->how_many_young_been_associated
                ],
                [
                    'table' => 'thana_department3_jubo_somaj_dawats', 
                    'column' => 'total_young_committee_increased', 
                    'value' => $report_sum_data?->ward_department3_jubo_somaj_dawats?->total_young_committee_increased
                ],
                [
                    'table' => 'thana_department3_jubo_somaj_dawats', 
                    'column' => 'total_new_club_increased', 
                    'value' => $report_sum_data?->ward_department3_jubo_somaj_dawats?->total_new_club_increased
                ],
                [
                    'table' => 'thana_department3_jubo_somaj_dawats', 
                    'column' => 'stablished_club_total_increased', 
                    'value' => $report_sum_data?->ward_department3_jubo_somaj_dawats?->stablished_club_total_increased
                ],



                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'political_and_special_invited_woman', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->political_and_special_invited
                ],
                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'political_and_special_been_associated_woman', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->political_and_special_been_associated
                ],
                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'political_and_special_target_woman', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->political_and_special_target
                ],


                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'pesha_jibi_invited_woman', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->pesha_jibi_invited
                ],
                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'pesha_jibi_been_associated_woman', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->pesha_jibi_been_associated
                ],
                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'pesha_jibi_target_woman', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->pesha_jibi_target
                ],

                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'olama_masayekh_invited', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->olama_masayekh_invited
                ],
                
                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'olama_masayekh_been_associated', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->olama_masayekh_been_associated
                ],
                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'olama_masayekh_target', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->olama_masayekh_target
                ],

                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'sromo_jibi_invited_woman', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->sromo_jibi_invited
                ],
                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'sromo_jibi_been_associated_woman', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->sromo_jibi_been_associated
                ],
                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'sromo_jibi_target_woman', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->sromo_jibi_target
                ],


                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'prantik_jonogosti_invited', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->prantik_jonogosti_invited
                ],
                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'prantik_jonogosti_been_associated', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->prantik_jonogosti_been_associated
                ],
                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'prantik_jonogosti_target', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->prantik_jonogosti_target
                ],


                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'vinno_dormalombi_invited', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->vinno_dormalombi_invited
                ],
                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'vinno_dormalombi_been_associated', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->vinno_dormalombi_been_associated
                ],
                [
                    'table' => 'thana_department4_different_job_holders_dawats', 
                    'column' => 'vinno_dormalombi_target', 
                    'value' => $report_sum_data?->ward_department4_different_job_holders_dawats?->vinno_dormalombi_target
                ],





                [
                    'table' => 'thana_department5_paribarik_dawats', 
                    'column' => 'total_attended_family', 
                    'value' => $report_sum_data?->ward_department5_paribarik_dawats?->total_attended_family
                ],
                [
                    'table' => 'thana_department5_paribarik_dawats', 
                    'column' => 'how_many_new_family_invited', 
                    'value' => $report_sum_data?->ward_department5_paribarik_dawats?->how_many_new_family_invited
                ],


                [
                    'table' => 'thana_department6_mosjid_dawah_infomation_centers', 
                    'column' => 'total_mosjid_increase', 
                    'value' => $report_sum_data?->ward_department6_mosjid_dawah_infomation_centers?->total_mosjid_increase
                ],
                [
                    'table' => 'thana_department6_mosjid_dawah_infomation_centers', 
                    'column' => 'general_dawah_center_increase', 
                    'value' => $report_sum_data?->ward_department6_mosjid_dawah_infomation_centers?->general_dawah_center_increase
                ],
                [
                    'table' => 'thana_department6_mosjid_dawah_infomation_centers', 
                    'column' => 'dawat_included_mosjid_increase', 
                    'value' => $report_sum_data?->ward_department6_mosjid_dawah_infomation_centers?->dawat_included_mosjid_increase
                ],
                [
                    'table' => 'thana_department6_mosjid_dawah_infomation_centers', 
                    'column' => 'mosjid_wise_information_center_increase', 
                    'value' => $report_sum_data?->ward_department6_mosjid_dawah_infomation_centers?->mosjid_wise_information_center_increase
                ],
                [
                    'table' => 'thana_department6_mosjid_dawah_infomation_centers', 
                    'column' => 'general_information_center_increase', 
                    'value' => $report_sum_data?->ward_department6_mosjid_dawah_infomation_centers?->general_information_center_increase
                ],
                [
                    'table' => 'thana_department6_mosjid_dawah_infomation_centers', 
                    'column' => 'mosjid_wise_dawah_center_increase', 
                    'value' => $report_sum_data?->ward_department6_mosjid_dawah_infomation_centers?->mosjid_wise_dawah_center_increase
                ],



                [
                    'table' => 'thana_department7_dawat_in_technologies', 
                    'column' => 'total_well_known_woman', 
                    'value' => $report_sum_data?->ward_department7_dawat_in_technologies?->total_well_known
                ],
                [
                    'table' => 'thana_department7_dawat_in_technologies', 
                    'column' => 'total_attended_woman', 
                    'value' => $report_sum_data?->ward_department7_dawat_in_technologies?->total_attended
                ],


                [
                    'table' => 'thana_dawah_and_prokashonas', 
                    'column' => 'total_pathagar_increase', 
                    'value' => $report_sum_data?->ward_dawah_and_prokashonas?->total_pathagar_increase
                ],
                [
                    'table' => 'thana_dawah_and_prokashonas', 
                    'column' => 'ward_book_sales_center_increase', 
                    'value' => $report_sum_data?->ward_dawah_and_prokashonas?->ward_book_sales_center_increase
                ],
                [
                    'table' => 'thana_dawah_and_prokashonas', 
                    'column' => 'books_in_pathagar_increase', 
                    'value' => $report_sum_data?->ward_dawah_and_prokashonas?->books_in_pathagar_increase
                ],
                [
                    'table' => 'thana_dawah_and_prokashonas', 
                    'column' => 'ward_book_sales', 
                    'value' => $report_sum_data?->ward_dawah_and_prokashonas?->ward_book_sales
                ],
                [
                    'table' => 'thana_dawah_and_prokashonas', 
                    'column' => 'book_distribution', 
                    'value' => $report_sum_data?->ward_dawah_and_prokashonas?->book_distribution
                ],

                [
                    'table' => 'thana_dawah_and_prokashonas', 
                    'column' => 'soft_copy_book_distribution', 
                    'value' => $report_sum_data?->ward_dawah_and_prokashonas?->soft_copy_book_distribution
                ],
                [
                    'table' => 'thana_dawah_and_prokashonas', 
                    'column' => 'unit_book_distribution_center_increase', 
                    'value' => $report_sum_data?->ward_dawah_and_prokashonas?->unit_book_distribution_center_increase
                ],
                [
                    'table' => 'thana_dawah_and_prokashonas', 
                    'column' => 'dawat_link_distribution', 
                    'value' => $report_sum_data?->ward_dawah_and_prokashonas?->dawat_link_distribution
                ],
                [
                    'table' => 'thana_dawah_and_prokashonas', 
                    'column' => 'unit_book_distribution', 
                    'value' => $report_sum_data?->ward_dawah_and_prokashonas?->unit_book_distribution
                ],
                [
                    'table' => 'thana_dawah_and_prokashonas', 
                    'column' => 'sonar_bangla_increase', 
                    'value' => $report_sum_data?->ward_dawah_and_prokashonas?->sonar_bangla_increase
                ],
                [
                    'table' => 'thana_dawah_and_prokashonas', 
                    'column' => 'songram_increase', 
                    'value' => $report_sum_data?->ward_dawah_and_prokashonas?->songram_increase
                ],
                [
                    'table' => 'thana_dawah_and_prokashonas', 
                    'column' => 'prithibi_increase', 
                    'value' => $report_sum_data?->ward_dawah_and_prokashonas?->prithibi_increase
                ],



                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'unit_masik_sadaron_sova_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->unit_masik_sadaron_sova_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'unit_masik_sadaron_sova_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->unit_masik_sadaron_sova_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'unit_masik_sadaron_sova_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->unit_masik_sadaron_sova_uposthiti
                ],


                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'alochona_sova_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->alochona_sova_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'alochona_sova_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->alochona_sova_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'alochona_sova_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->alochona_sova_uposthiti
                ],


                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'sudhi_somabesh_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->sudhi_somabesh_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'sudhi_somabesh_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->sudhi_somabesh_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'sudhi_somabesh_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->sudhi_somabesh_uposthiti
                ],


                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'siratunnabi_mahfil_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->siratunnabi_mahfil_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'siratunnabi_mahfil_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->siratunnabi_mahfil_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'siratunnabi_mahfil_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->siratunnabi_mahfil_uposthiti
                ],


                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'eid_reunion_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->eid_reunion_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'eid_reunion_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->eid_reunion_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'eid_reunion_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->eid_reunion_uposthiti
                ],
                
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'dars_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->dars_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'dars_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->dars_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'dars_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->dars_uposthiti
                ],
                
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'tafsir_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->tafsir_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'tafsir_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->tafsir_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'tafsir_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->tafsir_uposthiti
                ],
                
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'dawati_jonosova_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->dawati_jonosova_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'dawati_jonosova_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->dawati_jonosova_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'dawati_jonosova_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->dawati_jonosova_uposthiti
                ],
                
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'iftar_mahfil_personal_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->iftar_mahfil_personal_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'iftar_mahfil_personal_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->iftar_mahfil_personal_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'iftar_mahfil_personal_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->iftar_mahfil_personal_uposthiti
                ],
                
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'iftar_mahfil_samostic_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->iftar_mahfil_samostic_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'iftar_mahfil_samostic_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->iftar_mahfil_samostic_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'iftar_mahfil_samostic_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->iftar_mahfil_samostic_uposthiti
                ],
                
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'cha_chakra_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->cha_chakra_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'cha_chakra_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->cha_chakra_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'cha_chakra_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->cha_chakra_uposthiti
                ],
                
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'samostic_khawa_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->samostic_khawa_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'samostic_khawa_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->samostic_khawa_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'samostic_khawa_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->samostic_khawa_uposthiti
                ],
                
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'sikkha_sofor_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->sikkha_sofor_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'sikkha_sofor_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->sikkha_sofor_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'sikkha_sofor_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->sikkha_sofor_uposthiti
                ],
                
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'kirat_protijogita_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->kirat_protijogita_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'kirat_protijogita_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->kirat_protijogita_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'kirat_protijogita_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->kirat_protijogita_uposthiti
                ],
                
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'hamd_nat_protijogita_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->hamd_nat_protijogita_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'hamd_nat_protijogita_target', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->hamd_nat_protijogita_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'hamd_nat_protijogita_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->hamd_nat_protijogita_uposthiti
                ],
                
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'others_total', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->others_total
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'others_target',
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->others_target
                ],
                [
                    'table' => 'thana_kormosuci_bastobayons', 
                    'column' => 'others_uposthiti', 
                    'value' => $report_sum_data?->ward_kormosuci_bastobayons?->others_uposthiti
                ],
                





                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'general_unit_women_increase', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->general_unit_women_increase
                ],
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'general_unit_women_gatti', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->general_unit_women_gatti
                ],
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'general_unit_women_target', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->general_unit_women_target
                ],
                
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'ulama_unit_increase', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->ulama_unit_increase
                ],
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'ulama_unit_gatti', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->ulama_unit_gatti
                ],
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'ulama_unit_target', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->ulama_unit_target
                ],
                
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'peshajibi_unit_women_increase', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->peshajibi_unit_increase
                ],
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'peshajibi_unit_women_gatti', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->peshajibi_unit_gatti
                ],
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'peshajibi_unit_women_target', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->peshajibi_unit_target
                ],
                
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'jubo_unit_increase', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->jubo_unit_increase
                ],
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'jubo_unit_gatti', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->jubo_unit_gatti
                ],
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'jubo_unit_target', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->jubo_unit_target
                ],
                
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'media_unit_increase', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->media_unit_increase
                ],
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'media_unit_gatti', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->media_unit_gatti
                ],
                [
                    'table' => 'thana_songothon4_organizational_structures', 
                    'column' => 'media_unit_target', 
                    'value' => $report_sum_data?->ward_songothon4_unit_songothons?->media_unit_target
                ],
                





                [
                    'table' => 'thana_songothon5_dawat_and_paribarik_units', 
                    'column' => 'dawati_unit_increase', 
                    'value' => $report_sum_data?->ward_songothon5_dawat_and_paribarik_units?->dawati_unit_increase
                ],
                [
                    'table' => 'thana_songothon5_dawat_and_paribarik_units', 
                    'column' => 'dawati_unit_gatti', 
                    'value' => $report_sum_data?->ward_songothon5_dawat_and_paribarik_units?->dawati_unit_gatti
                ],
                [
                    'table' => 'thana_songothon5_dawat_and_paribarik_units', 
                    'column' => 'dawati_unit_target', 
                    'value' => $report_sum_data?->ward_songothon5_dawat_and_paribarik_units?->dawati_unit_target
                ],
                
                [
                    'table' => 'thana_songothon5_dawat_and_paribarik_units', 
                    'column' => 'paribarik_unit_increase', 
                    'value' => $report_sum_data?->ward_songothon5_dawat_and_paribarik_units?->paribarik_unit_increase
                ],
                [
                    'table' => 'thana_songothon5_dawat_and_paribarik_units', 
                    'column' => 'paribarik_unit_gatti', 
                    'value' => $report_sum_data?->ward_songothon5_dawat_and_paribarik_units?->paribarik_unit_gatti
                ],
                [
                    'table' => 'thana_songothon5_dawat_and_paribarik_units', 
                    'column' => 'paribarik_unit_target', 
                    'value' => $report_sum_data?->ward_songothon5_dawat_and_paribarik_units?->paribarik_unit_target
                ],
                


                [
                    'table' => 'thana_songothon7_bidayi_students_connects', 
                    'column' => 'Joined_student_women_member', 
                    'value' => $report_sum_data?->ward_songothon6_bidayi_students_connects?->Joined_student_women_member
                ],
                [
                    'table' => 'thana_songothon7_bidayi_students_connects', 
                    'column' => 'Joined_student_women_associate', 
                    'value' => $report_sum_data?->ward_songothon6_bidayi_students_connects?->Joined_student_women_associate
                ],
                [
                    'table' => 'thana_songothon7_bidayi_students_connects', 
                    'column' => 'Joined_student_women_worker', 
                    'value' => $report_sum_data?->ward_songothon6_bidayi_students_connects?->Joined_student_women_worker
                ],


                [
                    'table' => 'thana_songothon10_iyanot_data', 
                    'column' => 'associate_member_total', 
                    'value' => $report_sum_data?->ward_songothon8_iyanot_data?->associate_member_total
                ],
                [
                    'table' => 'thana_songothon10_iyanot_data', 
                    'column' => 'sudhi_total', 
                    'value' => $report_sum_data?->ward_songothon8_iyanot_data?->sudhi_total
                ],
                [
                    'table' => 'thana_songothon10_iyanot_data', 
                    'column' => 'associate_member_total_iyanot_amounts', 
                    'value' => $report_sum_data?->ward_songothon8_iyanot_data?->associate_member_total_iyanot_amounts
                ],
                [
                    'table' => 'thana_songothon10_iyanot_data', 
                    'column' => 'sudi_total_iyanot_amounts', 
                    'value' => $report_sum_data?->ward_songothon8_iyanot_data?->sudi_total_iyanot_amounts
                ],


                
                [
                    'table' => 'thana_songothon11_sangothonik_boithoks', 
                    'column' => 'ward_boithok_women_total', 
                    'value' => $report_sum_data?->ward_songothon9_sangothonik_boithoks?->word_boithok_total
                ],
                [
                    'table' => 'thana_songothon11_sangothonik_boithoks', 
                    'column' => 'ward_boithok_women_target', 
                    'value' => $report_sum_data?->ward_songothon9_sangothonik_boithoks?->word_boithok_target
                ],
                [
                    'table' => 'thana_songothon11_sangothonik_boithoks', 
                    'column' => 'ward_boithok_women_uposthiti', 
                    'value' => $report_sum_data?->ward_songothon9_sangothonik_boithoks?->word_boithok_uposthiti
                ],
                
                [
                    'table' => 'thana_songothon11_sangothonik_boithoks', 
                    'column' => 'unit_kormi_boithok_women_total', 
                    'value' => $report_sum_data?->ward_songothon9_sangothonik_boithoks?->unit_kormi_boithok_total
                ],
                [
                    'table' => 'thana_songothon11_sangothonik_boithoks', 
                    'column' => 'unit_kormi_boithok_women_target', 
                    'value' => $report_sum_data?->ward_songothon9_sangothonik_boithoks?->unit_kormi_boithok_target
                ],
                [
                    'table' => 'thana_songothon11_sangothonik_boithoks', 
                    'column' => 'unit_kormi_boithok_women_uposthiti', 
                    'value' => $report_sum_data?->ward_songothon9_sangothonik_boithoks?->unit_kormi_boithok_uposthiti
                ],
                
                [
                    'table' => 'thana_songothon11_sangothonik_boithoks', 
                    'column' => 'ulama_somabesh_women_total', 
                    'value' => $report_sum_data?->ward_songothon9_sangothonik_boithoks?->ulama_somabesh_total
                ],
                [
                    'table' => 'thana_songothon11_sangothonik_boithoks', 
                    'column' => 'ulama_somabesh_women_target', 
                    'value' => $report_sum_data?->ward_songothon9_sangothonik_boithoks?->ulama_somabesh_target
                ],
                [
                    'table' => 'thana_songothon11_sangothonik_boithoks', 
                    'column' => 'ulama_somabesh_women_uposthiti', 
                    'value' => $report_sum_data?->ward_songothon9_sangothonik_boithoks?->ulama_somabesh_uposthiti
                ],
                
                [
                    'table' => 'thana_songothon11_sangothonik_boithoks', 
                    'column' => 'sromik_somabesh_women_total', 
                    'value' => $report_sum_data?->ward_songothon9_sangothonik_boithoks?->sromik_somabesh_total
                ],
                [
                    'table' => 'thana_songothon11_sangothonik_boithoks', 
                    'column' => 'sromik_somabesh_women_target', 
                    'value' => $report_sum_data?->ward_songothon9_sangothonik_boithoks?->sromik_somabesh_target
                ],
                [
                    'table' => 'thana_songothon11_sangothonik_boithoks', 
                    'column' => 'sromik_somabesh_women_uposthiti', 
                    'value' => $report_sum_data?->ward_songothon9_sangothonik_boithoks?->sromik_somabesh_uposthiti
                ],
                




                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'unit_tarbiati_boithok_women_total', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->unit_tarbiati_boithok
                ],
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'unit_tarbiati_boithok_women_target', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->unit_tarbiati_boithok_target
                ],
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'unit_tarbiati_boithok_women_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->unit_tarbiati_boithok_uposthiti
                ],
                
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'ward_kormi_shikkha_boithok_women_total', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->ward_kormi_sikkha_boithok
                ],
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'ward_kormi_shikkha_boithok_women_target', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->ward_kormi_sikkha_boithok_target
                ],
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'ward_kormi_shikkha_boithok_women_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->ward_kormi_sikkha_boithok_uposthiti
                ],
                
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'gono_sikkha_boithok_women_total', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->gono_sikkha_boithok
                ],
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'gono_sikkha_boithok_women_target', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->gono_sikkha_boithok_target
                ],
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'gono_sikkha_boithok_women_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->gono_sikkha_boithoksthiti
                ],
                
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'gono_noisho_ibadot_women_total', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->gono_noisho_ibadot
                ],
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'gono_noisho_ibadot_women_target', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->gono_noisho_ibadot_target
                ],
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'gono_noisho_ibadot_women_uposthiti',
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->gono_noisho_ibadot_uposthiti
                ],
                
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'kormi_alochona_cokro_woman_total_group', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->alochona_chokro_group
                ],
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'kormi_alochona_cokro_woman_total_odhibeshon', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->alochona_chokro_program
                ],
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'kormi_alochona_cokro_woman_total_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->alochona_chokro_uposthiti
                ],
                
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'darsul_quran_woman_program', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->darsul_quran_program
                ],
                [
                    'table' => 'thana_proshikkhon1_tarbiats', 
                    'column' => 'darsul_quran_woman_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon1_tarbiats?->darsul_quran_uposthiti
                ],
                


                [
                    'table' => 'thana_proshikkhon3_manob_shompod_training_courses', 
                    'column' => 'dawah_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon2_manob_shompod_unnoyons?->dawah_uposthiti
                ],
                [
                    'table' => 'thana_proshikkhon3_manob_shompod_training_courses', 
                    'column' => 'shomajkormo_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon2_manob_shompod_unnoyons?->shomajkormo_uposthiti
                ],
                [
                    'table' => 'thana_proshikkhon3_manob_shompod_training_courses', 
                    'column' => 'media_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon2_manob_shompod_unnoyons?->media_uposthiti
                ],
                [
                    'table' => 'thana_proshikkhon3_manob_shompod_training_courses', 
                    'column' => 'ict_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon2_manob_shompod_unnoyons?->ict_uposthiti
                ],
                [
                    'table' => 'thana_proshikkhon3_manob_shompod_training_courses', 
                    'column' => 'office_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon2_manob_shompod_unnoyons?->office_uposthiti
                ],
                [
                    'table' => 'thana_proshikkhon3_manob_shompod_training_courses', 
                    'column' => 'financial_management_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon2_manob_shompod_unnoyons?->financial_management_uposthiti
                ],
                [
                    'table' => 'thana_proshikkhon3_manob_shompod_training_courses', 
                    'column' => 'english_language_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon2_manob_shompod_unnoyons?->english_language_uposthiti
                ],
                [
                    'table' => 'thana_proshikkhon3_manob_shompod_training_courses', 
                    'column' => 'arabic_language_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon2_manob_shompod_unnoyons?->arabic_language_uposthiti
                ],
                [
                    'table' => 'thana_proshikkhon3_manob_shompod_training_courses', 
                    'column' => 'trade_oriented_technical_training_uposthiti', 
                    'value' => $report_sum_data?->ward_proshikkhon2_manob_shompod_unnoyons?->trade_oriented_technical_training_uposthiti
                ],
                


                [
                    'table' => 'thana_shomajsheba2_personal_social_works', 
                    'column' => 'how_many_people_did', 
                    'value' => $report_sum_data?->ward_shomajsheba1_personal_social_works?->how_many_people_did
                ],
                [
                    'table' => 'thana_shomajsheba2_personal_social_works', 
                    'column' => 'service_received_total', 
                    'value' => $report_sum_data?->ward_shomajsheba1_personal_social_works?->service_received_total
                ],


                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'minor_unnoyonmulok_kaj',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->minor_unnoyonmulok_kaj
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'shamajik_onusthane_ongshogrohon',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->shamajik_onusthane_ongshogrohon
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'shamajik_onusthane_shohayota_prodan',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->shamajik_onusthane_shohayota_prodan
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'shamajik_birodh_mimangsha',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->shamajik_birodh_mimangsha
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'manobik_shohayota_prodan',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->manobik_shohayota_prodan
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'korje_hasana_prodan',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->korje_hasana_prodan
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'porishkar_poricchonnota_ovijan',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->porishkar_poricchonnota_ovijan
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'moshok_nidhon_ovijan',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->moshok_nidhon_ovijan
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'rogir_poricorja',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->rogir_poricorja
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'medical_shohayota_prodan',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->medical_shohayota_prodan
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'voluntarily_blood_donation_kotojon',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->voluntarily_blood_donation_kotojon
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'voluntarily_blood_donation_kotojonke',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->voluntarily_blood_donation_kotojonke
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'nobojatokke_gift_prodan',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->nobojatokke_gift_prodan
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'vrammoman_school_calu',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->vrammoman_school_calu
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'vrammoman_moktob_calu',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->vrammoman_moktob_calu
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'technical_services_kotojon',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->technical_services_kotojon
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'technical_services_prodan_kotojonke',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->technical_services_prodan_kotojonke
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'online_services_prodan_kotojonke',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->online_services_prodan_kotojonke
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'brikkho_ropon',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->brikkho_ropon
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'public_awareness_programs',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->public_awareness_programs
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'tran_bitoron',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->tran_bitoron
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'vinnodhormabolombider_service_prodan_kotojon',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->vinnodhormabolombider_service_prodan_kotojon
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'vinnodhormabolombider_service_prodan_kotojonke',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->vinnodhormabolombider_service_prodan_kotojonke
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'mayeter_gosol_kotojonke',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->mayeter_gosol_kotojonke
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'janajay_ongshogrohon',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->janajay_ongshogrohon
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'low_capital_employment_kotojonke',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->low_capital_employment_kotojonke
                ],
                [
                    'table' => 'thana_shomajsheba3_group_social_works',
                    'column' => 'others',
                    'value' => $report_sum_data?->ward_shomajsheba2_group_social_works?->others
                ],
                

                [
                    'table' => 'thana_shomajsheba4_institutional_social_works', 
                    'column' => 'social_institution_in_ward', 
                    'value' => $report_sum_data?->ward_shomajsheba4_institutional_social_works?->shamajik_protishthan_kototi
                ],
                [
                    'table' => 'thana_shomajsheba4_institutional_social_works', 
                    'column' => 'institutional_social_work_in_ward', 
                    'value' => $report_sum_data?->ward_shomajsheba4_institutional_social_works?->shamajik_protishthan_kototite_kaj_hoyeche
                ],
                [
                    'table' => 'thana_shomajsheba4_institutional_social_works', 
                    'column' => 'new_social_institutions_in_ward', 
                    'value' => $report_sum_data?->ward_shomajsheba4_institutional_social_works?->new_shamajik_protishthan
                ],

                [
                    'table' => 'thana_shomajsheba5_health_and_family_kollans', 
                    'column' => 'health_education_training_programs_attendance', 
                    'value' => $report_sum_data?->ward_shomajsheba3_health_and_family_kollans?->health_worker_training_programs_attendance
                ],
                [
                    'table' => 'thana_shomajsheba5_health_and_family_kollans', 
                    'column' => 'participated_in_health_care_work', 
                    'value' => $report_sum_data?->ward_shomajsheba3_health_and_family_kollans?->participated_in_health_care_work
                ],
                [
                    'table' => 'thana_shomajsheba5_health_and_family_kollans', 
                    'column' => 'served_people', 
                    'value' => $report_sum_data?->ward_shomajsheba3_health_and_family_kollans?->served_people
                ],


                [
                    'table' => 'thana_rastrio1_political_communications', 
                    'column' => 'rajnoitik_bekti_jogajog_koreche_kotojon', 
                    'value' => $report_sum_data?->ward_rastrio1_political_communications?->rajnoitik_bekti_jogajog_koreche_kotojon
                ],
                [
                    'table' => 'thana_rastrio1_political_communications', 
                    'column' => 'rajnoitik_bekti_jogajog_koreche_kotojonke', 
                    'value' => $report_sum_data?->ward_rastrio1_political_communications?->rajnoitik_bekti_jogajog_koreche_kotojonke
                ],
                [
                    'table' => 'thana_rastrio1_political_communications', 
                    'column' => 'proshoshonik_bekti_jogajog_koreche_kotojon', 
                    'value' => $report_sum_data?->ward_rastrio1_political_communications?->proshoshonik_bekti_jogajog_koreche_kotojon
                ],
                [
                    'table' => 'thana_rastrio1_political_communications', 
                    'column' => 'proshoshonik_bekti_jogajog_koreche_kotojonke', 
                    'value' => $report_sum_data?->ward_rastrio1_political_communications?->proshoshonik_bekti_jogajog_koreche_kotojonke
                ],


                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'centrally_announced_political_program', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->centrally_announced_political_program
                ],
                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'centrally_announced_political_program_attend', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->centrally_announced_political_program_attend
                ],

                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'locally_announced_jonoshova', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->locally_announced_jonoshova
                ],
                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'locally_announced_jonoshova_attend', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->locally_announced_jonoshova_attend
                ],
                
                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'locally_announced_shomabesh', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->locally_announced_shomabesh
                ],
                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'locally_announced_shomabesh_attend', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->locally_announced_shomabesh_attend
                ],
                
                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'locally_announced_michil', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->locally_announced_michil
                ],
                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'locally_announced_michil_attend', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->locally_announced_michil_attend
                ],
                
                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'poster_bitoron', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->poster_bitoron
                ],
                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'leaflet_bitoron', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->leaflet_bitoron
                ],
                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'booklet_bitoron', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->booklet_bitoron
                ],
                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'sharoklipi_bitoron', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->sharoklipi_bitoron
                ],
                [
                    'table' => 'thana_rastrio2_kormoshuchi_bastobayons', 
                    'column' => 'others', 
                    'value' => $report_sum_data?->ward_rastrio2_kormoshuchi_bastobayons?->others
                ],
                



                [
                    'table' => 'thana_rastrio3_dibosh_palons', 
                    'column' => 'shadhinota_o_jatio_dibosh_total_programs', 
                    'value' => $report_sum_data?->ward_rastrio3_dibosh_palons?->shadhinota_o_jatio_dibosh_total_programs
                ],
                [
                    'table' => 'thana_rastrio3_dibosh_palons', 
                    'column' => 'shadhinota_o_jatio_dibosh_attend', 
                    'value' => $report_sum_data?->ward_rastrio3_dibosh_palons?->shadhinota_o_jatio_dibosh_attend
                ],

                
                [
                    'table' => 'thana_rastrio3_dibosh_palons', 
                    'column' => 'bijoy_dibosh_total_programs', 
                    'value' => $report_sum_data?->ward_rastrio3_dibosh_palons?->bijoy_dibosh_total_programs
                ],
                [
                    'table' => 'thana_rastrio3_dibosh_palons', 
                    'column' => 'bijoy_dibosh_attend', 
                    'value' => $report_sum_data?->ward_rastrio3_dibosh_palons?->bijoy_dibosh_attend
                ],

                [
                    'table' => 'thana_rastrio3_dibosh_palons', 
                    'column' => 'others_total_programs', 
                    'value' => $report_sum_data?->ward_rastrio3_dibosh_palons?->others_total_programs
                ],
                [
                    'table' => 'thana_rastrio3_dibosh_palons', 
                    'column' => 'others_attend', 
                    'value' => $report_sum_data?->ward_rastrio3_dibosh_palons?->others_attend
                ],

                [
                    'table' => 'thana_rastrio3_dibosh_palons', 
                    'column' => 'mattrivasha_dibosh_total_programs', 
                    'value' => $report_sum_data?->ward_rastrio3_dibosh_palons?->mattrivasha_dibosh_total_programs
                ],
                [
                    'table' => 'thana_rastrio3_dibosh_palons', 
                    'column' => 'mattrivasha_dibosh_attend', 
                    'value' => $report_sum_data?->ward_rastrio3_dibosh_palons?->mattrivasha_dibosh_attend
                ],


                [
                    'table' => 'thana_rastrio4_election_activities', 
                    'column' => 'city_corporation_councilor_candidate_woman_elected', 
                    'value' => $report_sum_data?->ward_rastrio4_election_activities?->councilor_candidate_elected
                ],
                [
                    'table' => 'thana_rastrio4_election_activities', 
                    'column' => 'city_corporation_councilor_candidate_woman_second_position', 
                    'value' => $report_sum_data?->ward_rastrio4_election_activities?->councilor_candidate_second_position
                ],
                
                [
                    'table' => 'thana_rastrio4_election_activities', 
                    'column' => 'national_vote_kendro_increase', 
                    'value' => $report_sum_data?->ward_rastrio4_election_activities?->national_vote_kendro_increase
                ],
                [
                    'table' => 'thana_rastrio4_election_activities', 
                    'column' => 'local_vote_kendro_increase', 
                    'value' => $report_sum_data?->ward_rastrio4_election_activities?->local_vote_kendro_increase
                ],
                [
                    'table' => 'thana_rastrio4_election_activities', 
                    'column' => 'vote_kendro_committee_increase', 
                    'value' => $report_sum_data?->ward_rastrio4_election_activities?->vote_kendro_committee_increase
                ],
                [
                    'table' => 'thana_rastrio4_election_activities', 
                    'column' => 'vote_kendro_committee_target', 
                    'value' => $report_sum_data?->ward_rastrio4_election_activities?->vote_kendro_committee_target
                ],
                [
                    'table' => 'thana_rastrio4_election_activities', 
                    'column' => 'vote_kendro_vittik_unit_increase', 
                    'value' => $report_sum_data?->ward_rastrio4_election_activities?->vote_kendro_vittik_unit_increase
                ],
                [
                    'table' => 'thana_rastrio4_election_activities', 
                    'column' => 'vote_kendro_vittik_unit_target', 
                    'value' => $report_sum_data?->ward_rastrio4_election_activities?->vote_kendro_vittik_unit_target
                ],
                
            ];
        }
    
        $grouped_by_table = [];
    
        // Group by table and collect column => value
        foreach ($table_column_value as $item) {
            $grouped_by_table[$item['table']][$item['column']] = $item['value'];
        }
    
        // Insert one row per table
        foreach ($grouped_by_table as $item) {
            DB::table($item['table'])
                ->where('report_info_id', $thana_report_info_id) // report_info_id 
                ->update([
                    $item['column'] => $item['value']
                ]);
        }

    
        return response()->json([
            'status' => 'success',
            'data' => $report_sum_data,
        ], 200);
    }

    public function report_summation($start_month, $end_month, $org_type, $org_type_id, $report_approved_status = ['approved'], $is_need_sum = true, $report_info_ids = null)
    {
        if (!is_array($org_type_id)) {
            $report_header_instance = new ReportHeader();
            $report_header = $report_header_instance->execute($org_type, $org_type_id);
        } else {
            $report_header = null;
        }

        // ---------------------  reports all data to show  ---------------------------
        $dateWiseReportSum = new DateWiseReportSum();
        $report_sum_data = $dateWiseReportSum->execute($start_month, $end_month, $org_type, $org_type_id, $report_approved_status, $report_info_ids);
        // dd($report_sum_data );
        // ---------------------  reports all data to show  ---------------------------

        // ---------------------  previous and present calculation  ---------------------------
        $calculatePreviousPresent = new CalculatePreviousPresent();
        $previous_present = $calculatePreviousPresent->execute($start_month, $end_month, $org_type, $org_type_id);
        // dd($previous_present);
        // ---------------------  previous and present calculation  ---------------------------


        // -------------------------- bm income report ------------------------------------
        $bm_income_report = new BmReport();
        $transaction_type = 'income';
        $income_report = $bm_income_report->execute($start_month, $end_month, $org_type, $org_type_id, $transaction_type, $report_approved_status, $is_need_sum);
        // -------------------------- bm income report ------------------------------------

        // -------------------------- bm expense report ------------------------------------
        $bm_expense_report = new BmReport();
        $transaction_type = 'expense';
        $expense_report = $bm_expense_report->execute($start_month, $end_month, $org_type, $org_type_id, $transaction_type, $report_approved_status, $is_need_sum);
        // -------------------------- bm expense report ------------------------------------

        if (empty($report_sum_data)) {
            return [];
        } else {
            return (object) [
                'start_month' => $start_month,
                'end_month' => $end_month,
                'report_header' => $report_header,

                'report_sum_data' => $report_sum_data,
                'previous_present' => $previous_present,
                'income_report' => $income_report,
                'expense_report' => $expense_report,
            ];
        }
    }
}
