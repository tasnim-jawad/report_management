<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Actions\BmReport;
use App\Http\Controllers\Actions\DateWiseReportSum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Actions\CalculatePreviousPresent;
use App\Http\Controllers\Actions\CheckInfo;
use App\Http\Controllers\Actions\ReportHeader;
use App\Models\Bm\Expense\BmExpense;
use App\Models\Bm\Expense\BmExpenseCategory;
use App\Models\Bm\Expense\UnitExpenseTarget;
use App\Models\Bm\Income\BmCategory;
use App\Models\Bm\Income\BmPaid;
use App\Models\Organization\OrgThana;
use App\Models\Organization\OrgType;
use App\Models\Organization\OrgUnit;
use App\Models\Organization\OrgUnitResponsible;
use App\Models\Organization\OrgUnitUser;
use App\Models\Organization\OrgWard;
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
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{
    public function report_upload()
    {
        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
            'user_id' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $unit_user = User::where('id', request()->user_id)->with('org_unit_user')->get()->first();

        $unit_id = $unit_user->org_unit_user['unit_id'];
        $month = Carbon::parse(request()->month);
        $unit_info = OrgUnit::where('id', $unit_id)->get()->first();
        $ward_id = $unit_user->org_unit_user['ward_id'];
        $ward_info = OrgWard::where('id', $ward_id)->get()->first();
        $thana_id = $unit_user->org_unit_user['thana_id'];
        $thana_info = OrgThana::where('id', $thana_id)->get()->first();
        $org_type = OrgType::where('id', $unit_info['org_type_id'])->get()->first();

        $unit_user_list = User::with('org_unit_responsible.responsibility')->whereExists(function ($query) use ($unit_id) {
            $query->select("*")
                ->from('org_unit_users')
                ->whereRaw('org_unit_users.user_id = users.id')
                ->where('org_unit_users.unit_id', $unit_id);
        })->get();
        $president = null;
        foreach ($unit_user_list as $unit_user_single) {
            foreach ($unit_user_single['org_unit_responsible'] as $responcibility) {
                if ($responcibility['responsibility_id'] === 1) {
                    $president = $unit_user_single;
                }
            }
        }

        $report_info = ReportInfo::where('org_type_id', $unit_id)
            ->where('org_type', 'unit')
            ->whereYear('month_year', $month->clone()->year)
            ->whereMonth('month_year', $month->clone()->month)
            ->get()
            ->first();

        if ($report_info) {
            $report_info_id = $report_info->id;
        } else {
            return redirect()->back();
        }

        // ---------------------  reports all data to show  ---------------------------
        $dawat1 = Dawat1RegularGroupWise::where('report_info_id', $report_info_id)->get()->first();
        $dawat2 = Dawat2PersonalAndTarget::where('report_info_id', $report_info_id)->get()->first();
        $dawat3 = Dawat3GeneralProgramAndOthers::where('report_info_id', $report_info_id)->get()->first();
        $dawat4 = Dawat4GonoSongjogAndDawatOvijan::where('report_info_id', $report_info_id)->get()->first();
        $department1 = Department1TalimulQuran::where('report_info_id', $report_info_id)->get()->first();
        $department4 = Department4DifferentJobHoldersDawat::where('report_info_id', $report_info_id)->get()->first();
        $department5 = Department5ParibarikDawat::where('report_info_id', $report_info_id)->get()->first();
        $dawah_prokashona = DawahAndProkashona::where('report_info_id', $report_info_id)->get()->first();
        $kormosuci = KormosuciBastobayon::where('report_info_id', $report_info_id)->get()->first();
        $songothon1 = Songothon1Jonosokti::where('report_info_id', $report_info_id)->get()->first();
        $songothon2 = Songothon2AssociateMember::where('report_info_id', $report_info_id)->get()->first();
        $songothon9 = Songothon9SangothonikBoithok::where('report_info_id', $report_info_id)->get()->first();
        $songothon5 = Songothon5DawatAndParibarikUnit::where('report_info_id', $report_info_id)->get()->first();
        $songothon7 = Songothon7Sofor::where('report_info_id', $report_info_id)->get()->first();
        $songothon8 = Songothon8IyanotData::where('report_info_id', $report_info_id)->get()->first();
        $proshikkhon = Proshikkhon1Tarbiat::where('report_info_id', $report_info_id)->get()->first();
        $shomajsheba1 = Shomajsheba1PersonalSocialWork::where('report_info_id', $report_info_id)->get()->first();
        $shomajsheba2 = Shomajsheba2UnitSocialWork::where('report_info_id', $report_info_id)->get()->first();
        $rastrio = Rastrio1BishishtoBekti::where('report_info_id', $report_info_id)->get()->first();
        $montobbo = Montobbo::where('report_info_id', $report_info_id)->get()->first();
        // ---------------------  reports all data to show  ---------------------------

        // ---------------------  previous and present calculation  ---------------------------
        $previous_month = $month->clone()->subMonth()->endOfMonth();
        $total_approved_report_info_ids_previous = ReportInfo::where('org_type_id', $unit_id)
            ->where('org_type', 'unit')
            ->where('report_approved_status', 'approved')
            ->whereDate('month_year', '<=', $previous_month)
            ->pluck('id');

        $total_approved_report_info_ids_present = ReportInfo::where('org_type_id', $unit_id)
            ->where('org_type', 'unit')
            ->where('report_approved_status', 'approved')
            ->whereDate('month_year', '<=', $month->clone()->endOfMonth())
            ->pluck('id');

        /** rokon */
        $rokon_previous = calculate_previous_present(
            Songothon1Jonosokti::class,
            $total_approved_report_info_ids_previous,
            'rokon_briddhi',
            'rokon_gatti'
        );

        $rokon_present = calculate_previous_present(
            Songothon1Jonosokti::class,
            $total_approved_report_info_ids_present,
            'rokon_briddhi',
            'rokon_gatti'
        );

        /** worker */
        $worker_previous = calculate_previous_present(
            Songothon1Jonosokti::class,
            $total_approved_report_info_ids_previous,
            'worker_briddhi',
            'worker_gatti'
        );

        $worker_present = calculate_previous_present(
            Songothon1Jonosokti::class,
            $total_approved_report_info_ids_present,
            'worker_briddhi',
            'worker_gatti'
        );

        /** associate_member */
        $associate_member_previous = calculate_increase(
            Songothon2AssociateMember::class,
            $total_approved_report_info_ids_previous,
            'associate_member_briddhi',
        );

        $associate_member_present = calculate_increase(
            Songothon2AssociateMember::class,
            $total_approved_report_info_ids_present,
            'associate_member_briddhi',
        );

        /** vinno_dormalombi_worker */
        $vinno_dormalombi_worker_previous = calculate_increase(
            Songothon2AssociateMember::class,
            $total_approved_report_info_ids_previous,
            'vinno_dormalombi_worker_briddhi',
        );

        $vinno_dormalombi_worker_present = calculate_increase(
            Songothon2AssociateMember::class,
            $total_approved_report_info_ids_present,
            'vinno_dormalombi_worker_briddhi',
        );

        /** vinno_dormalombi_associate_member */
        $vinno_dormalombi_associate_member_previous = calculate_increase(
            Songothon2AssociateMember::class,
            $total_approved_report_info_ids_previous,
            'vinno_dormalombi_associate_member_briddhi',
        );

        $vinno_dormalombi_associate_member_present = calculate_increase(
            Songothon2AssociateMember::class,
            $total_approved_report_info_ids_present,
            'vinno_dormalombi_associate_member_briddhi',
        );

        // ---------------------  previous and present calculation  ---------------------------

        // -------------------------- bm income report ------------------------------------
        $query = BmPaid::query();
        $filter = $query->whereYear('month', $month->clone()->year)->whereMonth('month', $month->clone()->month)->where('unit_id', $unit_id);
        $category = $filter->with('bm_category')->pluck('bm_category_id')->all();
        $category_all_id = array_values(array_unique($category));
        $total_income = $filter->sum('amount');

        $income_category_wise = [];
        foreach ($category_all_id as $index => $item) {
            $testQuery = BmPaid::query();
            $totalAmount = $testQuery->whereYear('month', $month->clone()->year)
                ->whereMonth('month', $month->clone()->month)
                ->where('bm_category_id', $item)
                ->where('unit_id', $unit_id)
                ->sum('amount');
            $bmCategory = BmCategory::find($item);
            $income_category_wise[$index]['amount'] = $totalAmount == 0 ? "" : $totalAmount;
            $income_category_wise[$index]['category'] = $bmCategory->title;
        }
        // -------------------------- bm income report ------------------------------------

        // -------------------------- bm expense report ------------------------------------
        $query = BmExpense::query();
        $filter = $query->whereYear('date', $month->clone()->year)->whereMonth('date', $month->clone()->month)->where('unit_id', $unit_id);
        $total_expense = $filter->sum('amount');
        $category_id = $filter->with('bm_expense_category')->pluck('bm_expense_category_id')->all();
        $category_unique_id = array_values(array_unique($category_id));

        $expense_category_wise = [];
        foreach ($category_unique_id as $index => $item) {
            $testQuery = BmExpense::query();
            $totalAmount = $testQuery->whereYear('date', $month->clone()->year)
                ->whereMonth('date', $month->clone()->month)
                ->where('bm_expense_category_id', $item)
                ->where('unit_id', $unit_id)
                ->sum('amount');
            $bmCategory = BmExpenseCategory::find($item);
            $expense_category_wise[$index]['amount'] = $totalAmount;
            $expense_category_wise[$index]['category'] = $bmCategory->title;
        }
        // -------------------------- bm expense report ------------------------------------


        // dd($report_info_id );
        // return view('unit.unit_report_upload');
        return view('unit.unit_report_upload')->with([
            'month' => $month,
            'org_type' => $org_type,
            'unit_info' => $unit_info,
            'ward_info' => $ward_info,
            'thana_info' => $thana_info,
            'president' => $president,

            'dawat1' => $dawat1,
            'dawat2' => $dawat2,
            'dawat3' => $dawat3,
            'dawat4' => $dawat4,
            'department1' => $department1,
            'department4' => $department4,
            'department5' => $department5,
            'dawah_prokashona' => $dawah_prokashona,
            'kormosuci' => $kormosuci,
            'songothon1' => $songothon1,
            'songothon2' => $songothon2,
            'songothon9' => $songothon9,
            'songothon5' => $songothon5,
            'songothon7' => $songothon7,
            'songothon8' => $songothon8,
            'proshikkhon' => $proshikkhon,
            'shomajsheba1' => $shomajsheba1,
            'shomajsheba2' => $shomajsheba2,
            'rastrio' => $rastrio,
            'montobbo' => $montobbo,

            'previous_present' => (object)[
                //rokon
                'rokon_previous' => $rokon_previous,
                'rokon_present' => $rokon_present,
                //worker
                'worker_previous' => $worker_previous,
                'worker_present' => $worker_present,
                //associate_member
                'associate_member_previous' => $associate_member_previous,
                'associate_member_present' => $associate_member_present,
                //vinno_dormalombi_worker
                'vinno_dormalombi_worker_previous' => $vinno_dormalombi_worker_previous,
                'vinno_dormalombi_worker_present' => $vinno_dormalombi_worker_present,
                //vinno_dormalombi_associate_member
                'vinno_dormalombi_associate_member_previous' => $vinno_dormalombi_associate_member_previous,
                'vinno_dormalombi_associate_member_present' => $vinno_dormalombi_associate_member_present,
            ],

            'income_category_wise' => $income_category_wise,
            'total_income' => $total_income,

            'expense_category_wise' => $expense_category_wise,
            'total_expense' => $total_expense,

        ]);
    }
    public function report_upload_api()
    {
        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
            'user_id' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $unit_user = User::where('id', request()->user_id)->with('org_unit_user')->get()->first();

        $unit_id = $unit_user->org_unit_user['unit_id'];
        $month = Carbon::parse(request()->month);
        $unit_info = OrgUnit::where('id', $unit_id)->get()->first();
        $ward_id = $unit_user->org_unit_user['ward_id'];
        $ward_info = OrgWard::where('id', $ward_id)->get()->first();
        $thana_id = $unit_user->org_unit_user['thana_id'];
        $thana_info = OrgThana::where('id', $thana_id)->get()->first();
        $org_type = OrgType::where('id', $unit_info['org_type_id'])->get()->first();

        $unit_user_list = User::with('org_unit_responsible.responsibility')->whereExists(function ($query) use ($unit_id) {
            $query->select("*")
                ->from('org_unit_users')
                ->whereRaw('org_unit_users.user_id = users.id')
                ->where('org_unit_users.unit_id', $unit_id);
        })->get();
        $president = null;
        foreach ($unit_user_list as $unit_user_single) {
            foreach ($unit_user_single['org_unit_responsible'] as $responcibility) {
                if ($responcibility['responsibility_id'] === 1) {
                    $president = $unit_user_single;
                }
            }
        }

        $report_info = ReportInfo::where('org_type_id', $unit_id)
            ->where('org_type', 'unit')
            ->whereYear('month_year', $month->clone()->year)
            ->whereMonth('month_year', $month->clone()->month)
            ->get()
            ->first();

        if ($report_info) {
            $report_info_id = $report_info->id;
        } else {
            $report_info = report_info_create('unit', $unit_id, 1, 'সভাপতি', $month, 'monthly');
            $report_info_id = $report_info->id;
        }

        // ---------------------  reports all data to show  ---------------------------
        $dawat1 = Dawat1RegularGroupWise::where('report_info_id', $report_info_id)->latest()->first();
        $dawat2 = Dawat2PersonalAndTarget::where('report_info_id', $report_info_id)->latest()->first();
        $dawat3 = Dawat3GeneralProgramAndOthers::where('report_info_id', $report_info_id)->latest()->first();
        $dawat4 = Dawat4GonoSongjogAndDawatOvijan::where('report_info_id', $report_info_id)->latest()->first();
        $department1 = Department1TalimulQuran::where('report_info_id', $report_info_id)->latest()->first();
        $department4 = Department4DifferentJobHoldersDawat::where('report_info_id', $report_info_id)->latest()->first();
        $department5 = Department5ParibarikDawat::where('report_info_id', $report_info_id)->latest()->first();
        $dawah_prokashona = DawahAndProkashona::where('report_info_id', $report_info_id)->latest()->first();
        $kormosuci = KormosuciBastobayon::where('report_info_id', $report_info_id)->latest()->first();
        $songothon1 = Songothon1Jonosokti::where('report_info_id', $report_info_id)->latest()->first();
        $songothon2 = Songothon2AssociateMember::where('report_info_id', $report_info_id)->latest()->first();
        $songothon9 = Songothon9SangothonikBoithok::where('report_info_id', $report_info_id)->latest()->first();
        $songothon5 = Songothon5DawatAndParibarikUnit::where('report_info_id', $report_info_id)->latest()->first();
        $songothon7 = Songothon7Sofor::where('report_info_id', $report_info_id)->latest()->first();
        $songothon8 = Songothon8IyanotData::where('report_info_id', $report_info_id)->latest()->first();
        $proshikkhon = Proshikkhon1Tarbiat::where('report_info_id', $report_info_id)->latest()->first();
        $shomajsheba1 = Shomajsheba1PersonalSocialWork::where('report_info_id', $report_info_id)->latest()->first();
        $shomajsheba2 = Shomajsheba2UnitSocialWork::where('report_info_id', $report_info_id)->latest()->first();
        $rastrio = Rastrio1BishishtoBekti::where('report_info_id', $report_info_id)->latest()->first();
        $montobbo = Montobbo::where('report_info_id', $report_info_id)->latest()->first();
        // ---------------------  reports all data to show  ---------------------------

        // ---------------------  previous and present calculation  ---------------------------
        $previous_month = $month->clone()->subMonth()->endOfMonth();
        $total_approved_report_info_ids_previous = ReportInfo::where('org_type_id', $unit_id)
            ->where('org_type', 'unit')
            ->where('report_approved_status', 'approved')
            ->whereDate('month_year', '<=', $previous_month)
            ->pluck('id');

        $total_approved_report_info_ids_present = ReportInfo::where('org_type_id', $unit_id)
            ->where('org_type', 'unit')
            ->where('report_approved_status', 'approved')
            ->whereDate('month_year', '<=', $month->clone()->endOfMonth())
            ->pluck('id');

        /** rokon */
        $rokon_previous = calculate_previous_present(
            Songothon1Jonosokti::class,
            $total_approved_report_info_ids_previous,
            'rokon_briddhi',
            'rokon_gatti'
        );

        $rokon_present = calculate_previous_present(
            Songothon1Jonosokti::class,
            $total_approved_report_info_ids_present,
            'rokon_briddhi',
            'rokon_gatti'
        );

        /** worker */
        $worker_previous = calculate_previous_present(
            Songothon1Jonosokti::class,
            $total_approved_report_info_ids_previous,
            'worker_briddhi',
            'worker_gatti'
        );

        $worker_present = calculate_previous_present(
            Songothon1Jonosokti::class,
            $total_approved_report_info_ids_present,
            'worker_briddhi',
            'worker_gatti'
        );

        /** associate_member */
        $associate_member_previous = calculate_increase(
            Songothon2AssociateMember::class,
            $total_approved_report_info_ids_previous,
            'associate_member_briddhi',
        );

        $associate_member_present = calculate_increase(
            Songothon2AssociateMember::class,
            $total_approved_report_info_ids_present,
            'associate_member_briddhi',
        );

        /** vinno_dormalombi_worker */
        $vinno_dormalombi_worker_previous = calculate_increase(
            Songothon2AssociateMember::class,
            $total_approved_report_info_ids_previous,
            'vinno_dormalombi_worker_briddhi',
        );

        $vinno_dormalombi_worker_present = calculate_increase(
            Songothon2AssociateMember::class,
            $total_approved_report_info_ids_present,
            'vinno_dormalombi_worker_briddhi',
        );

        /** vinno_dormalombi_associate_member */
        $vinno_dormalombi_associate_member_previous = calculate_increase(
            Songothon2AssociateMember::class,
            $total_approved_report_info_ids_previous,
            'vinno_dormalombi_associate_member_briddhi',
        );

        $vinno_dormalombi_associate_member_present = calculate_increase(
            Songothon2AssociateMember::class,
            $total_approved_report_info_ids_present,
            'vinno_dormalombi_associate_member_briddhi',
        );

        // ---------------------  previous and present calculation  ---------------------------

        // -------------------------- bm income report ------------------------------------
        $query = BmPaid::query();
        $filter = $query->whereYear('month', $month->clone()->year)->whereMonth('month', $month->clone()->month)->where('unit_id', $unit_id);
        $category = $filter->with('bm_category')->pluck('bm_category_id')->all();
        $category_all_id = array_values(array_unique($category));
        $total_income = $filter->sum('amount');

        $income_category_wise = [];
        foreach ($category_all_id as $index => $item) {
            $testQuery = BmPaid::query();
            $totalAmount = $testQuery->whereYear('month', $month->clone()->year)
                ->whereMonth('month', $month->clone()->month)
                ->where('bm_category_id', $item)
                ->where('unit_id', $unit_id)
                ->sum('amount');
            $bmCategory = BmCategory::find($item);
            $income_category_wise[$index]['amount'] = $totalAmount == 0 ? "" : $totalAmount;
            $income_category_wise[$index]['category'] = $bmCategory->title;
        }
        // -------------------------- bm income report ------------------------------------

        // -------------------------- bm expense report ------------------------------------
        $query = BmExpense::query();
        $filter = $query->whereYear('date', $month->clone()->year)->whereMonth('date', $month->clone()->month)->where('unit_id', $unit_id);
        $total_expense = $filter->sum('amount');
        $category_id = $filter->with('bm_expense_category')->pluck('bm_expense_category_id')->all();
        $category_unique_id = array_values(array_unique($category_id));

        $expense_category_wise = [];
        foreach ($category_unique_id as $index => $item) {
            $testQuery = BmExpense::query();
            $totalAmount = $testQuery->whereYear('date', $month->clone()->year)
                ->whereMonth('date', $month->clone()->month)
                ->where('bm_expense_category_id', $item)
                ->where('unit_id', $unit_id)
                ->sum('amount');
            $bmCategory = BmExpenseCategory::find($item);
            $expense_category_wise[$index]['amount'] = $totalAmount;
            $expense_category_wise[$index]['category'] = $bmCategory->title;
        }
        // -------------------------- bm expense report ------------------------------------

        return response()->json([
            'status' => "success",
            'month' => $month,
            'org_type' => $org_type,
            'unit_info' => $unit_info,
            'ward_info' => $ward_info,
            'thana_info' => $thana_info,
            'president' => $president,

            'dawat1' => $dawat1,
            'dawat2' => $dawat2,
            'dawat3' => $dawat3,
            'dawat4' => $dawat4,
            'department1' => $department1,
            'department4' => $department4,
            'department5' => $department5,
            'dawah_prokashona' => $dawah_prokashona,
            'kormosuci' => $kormosuci,
            'songothon1' => $songothon1,
            'songothon2' => $songothon2,
            'songothon9' => $songothon9,
            'songothon5' => $songothon5,
            'songothon7' => $songothon7,
            'songothon8' => $songothon8,
            'proshikkhon' => $proshikkhon,
            'shomajsheba1' => $shomajsheba1,
            'shomajsheba2' => $shomajsheba2,
            'rastrio' => $rastrio,
            'montobbo' => $montobbo,

            'previous_present' => (object)[
                //rokon
                'rokon_previous' => $rokon_previous,
                'rokon_present' => $rokon_present,
                //worker
                'worker_previous' => $worker_previous,
                'worker_present' => $worker_present,
                //associate_member
                'associate_member_previous' => $associate_member_previous,
                'associate_member_present' => $associate_member_present,
                //vinno_dormalombi_worker
                'vinno_dormalombi_worker_previous' => $vinno_dormalombi_worker_previous,
                'vinno_dormalombi_worker_present' => $vinno_dormalombi_worker_present,
                //vinno_dormalombi_associate_member
                'vinno_dormalombi_associate_member_previous' => $vinno_dormalombi_associate_member_previous,
                'vinno_dormalombi_associate_member_present' => $vinno_dormalombi_associate_member_present,
            ],

            'income_category_wise' => $income_category_wise,
            'total_income' => $total_income,

            'expense_category_wise' => $expense_category_wise,
            'total_expense' => $total_expense,
        ], 200);
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
        $unit_info = (object) auth()->user()->org_unit_user;
        $month = Carbon::parse(request()->month);

        $query = BmExpense::query();
        $filter = $query->whereYear('date', $month->clone()->year)->whereMonth('date', $month->clone()->month)->where('unit_id', $unit_info->unit_id);
        $data = $filter->with('bm_expense_category')->get();

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200);
    }

    public function bm_category_wise()
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
        $unit_info = (object) auth()->user()->org_unit_user;
        $month = Carbon::parse(request()->month);

        $query = BmPaid::query();
        $filter = $query->whereYear('month', $month->clone()->year)->whereMonth('month', $month->clone()->month)->where('unit_id', $unit_info->unit_id);
        $data = $filter->with('bm_category')->get();

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200);
    }


    public function report_status()
    {
        $month = request()->month;
        if ($month) {
            $org_unit_user = OrgUnitUser::where('user_id', auth()->id())->first();
            $unit_id = $org_unit_user->unit_id;
            $month = Carbon::parse(request()->month);
            $bangla_month = $month->clone()->locale('bn')->isoFormat('MMMM');
            // dd($bangla_month );
            $report_info = ReportInfo::where('org_type_id', $unit_id)
                ->where('org_type', 'unit')
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
                    "message" => "{$bangla_month} মাসের রিপোর্ট ওয়ার্ড গ্রহন করেছে।"
                ], 200);
            }
        }
    }
    public function report_joma()
    {

        $month = Carbon::parse(request()->month);
        $org_unit_user = OrgUnitUser::where('user_id', auth()->id())->first();

        if (!$org_unit_user) {
            return response()->json([
                'err_message' => 'Unit information not found for this user.',
            ], 404);
        }

        $unit_id = $org_unit_user->unit_id;

        $permission  = ReportManagementControl::where('report_type', 'unit')
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

        $report_info = ReportInfo::where('org_type_id', $unit_id)
            ->where('org_type', 'unit')
            ->whereYear('month_year', $month->year)
            ->whereMonth('month_year', $month->month)
            ->first();

        if (!$report_info) {
            return response()->json([
                'err_message' => 'Report information not found.',
                'errors' => [['You do not have any data']],
            ], 404);
        }

        switch (true) {
            case $report_info->report_submit_status === 'unsubmitted' &&
                $report_info->report_approved_status === 'pending':
                $report_info->report_submit_status = 'submitted';
                $report_info->save();
                // Update related BmPaid records
                BmPaid::where('unit_id', $unit_id)
                    ->whereYear('month', $month->year)
                    ->whereMonth('month', $month->month)
                    ->update(['report_submit_status' => 'submitted']);

                // Update related BmExpense records
                BmExpense::where('unit_id', $unit_id)
                    ->whereYear('date', $month->year)
                    ->whereMonth('date', $month->month)
                    ->update(['report_submit_status' => 'submitted']);

                return response()->json([
                    'status' => 'success',
                    'report_status' => 'submitted',
                    'message' => 'রিপোর্ট জমা করা হয়েছে ।',
                ], 200);

            case $report_info->report_submit_status === 'submitted' &&
                $report_info->report_approved_status === 'rejected':
                $report_info->report_approved_status = 'pending';
                $report_info->save();

                // Update related BmPaid records
                BmPaid::where('unit_id', $unit_id)
                    ->whereYear('month', $month->year)
                    ->whereMonth('month', $month->month)
                    ->update(['report_approved_status' => 'pending']);

                // Update related BmPaid records
                BmExpense::where('unit_id', $unit_id)
                    ->whereYear('date', $month->year)
                    ->whereMonth('date', $month->month)
                    ->update(['report_approved_status' => 'pending']);

                return response()->json([
                    'status' => 'success',
                    'report_status' => 'resubmitted',
                    'message' => 'রিপোর্ট পুনরায় জমা সম্পন্ন হয়েছে ।',
                ], 200);

            case $report_info->report_submit_status === 'submitted' &&
                $report_info->report_approved_status === 'approved':
                return response()->json([
                    'err_message' => 'Report is already approved and cannot be resubmitted.',
                    'errors' => [['already approved and cannot be resubmitted.']],
                ], 400);

            default:
                return response()->json([
                    'err_message' => 'No valid action for the current report status.',
                    'errors' => [['No valid action ']],
                ], 422);
        }
    }

    public function unit_report_sum()
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
        $unit_id = auth()->user()->org_unit_user->unit_id;

        $start_month = request()->start_month;
        $end_month = request()->end_month;
        $org_type = 'unit';
        $org_type_id = $unit_id;

        $datas = $this->report_summation($start_month, $end_month, $org_type, $org_type_id);
        // dd($datas->report_sum_data );
        $nisab_dharjo = UnitExpenseTarget::where('unit_id',$unit_id)->select('amount')->latest()->first();
        // dd($nisab_dharjo->amount);

        return view('unit.unit_report_sum')->with([
            'start_month' => $datas->start_month,
            'end_month' => $datas->end_month,
            'report_header' => $datas->report_header,

            'report_sum_data' => $datas->report_sum_data,
            'previous_present' => $datas->previous_present,

            'nisab_dharjo' => $nisab_dharjo,
            'income_report' => $datas->income_report,
            'expense_report' => $datas->expense_report,
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
        $org_type = 'unit';
        $org_type_id = auth()->user()->org_unit_user->unit_id;

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

        $org_type = 'unit';
        $org_type_id = auth()->user()->org_unit_user->unit_id;
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

    public function unit_report_monthly()
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

        $unit_id = auth()->user()->org_unit_user->unit_id;

        $start_month = request()->month;
        $end_month = request()->month;
        $org_type = 'unit';
        $org_type_id = $unit_id;
        $report_approved_status = ['pending', 'approved', 'rejected'];   //enum('pending','approved','rejected')

        $datas = $this->report_summation($start_month, $end_month, $org_type, $org_type_id, $report_approved_status);
        $nisab_dharjo = UnitExpenseTarget::where('unit_id',$unit_id)->select('amount')->latest()->first();
        // dd($nisab_dharjo->amount);
        // dd($datas->report_sum_data );

        return view('unit.unit_report_monthly')->with([
            'start_month' => $datas->start_month,
            'end_month' => $datas->end_month,
            'report_header' => $datas->report_header,

            'report_sum_data' => $datas->report_sum_data,
            'previous_present' => $datas->previous_present,

            'nisab_dharjo' => $nisab_dharjo,
            'income_report' => $datas->income_report,
            'expense_report' => $datas->expense_report,
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

        $unit_id = auth()->user()->org_unit_user->unit_id;

        $start_month = request()->month;
        $end_month = request()->month;
        $org_type = 'unit';
        $org_type_id = $unit_id;
        $report_approved_status = ['pending', 'approved', 'rejected'];   //enum('pending','approved','rejected')
        $is_need_sum = false;
        $datas = $this->report_summation($start_month, $end_month, $org_type, $org_type_id, $report_approved_status, $is_need_sum);
        // dd($datas->report_sum_data );
        $nisab_dharjo = UnitExpenseTarget::where('unit_id',$unit_id)->select('amount')->latest()->first();
        // dd($nisab_dharjo->amount);


        return response()->json([
            'status' => 'success',
            'data' => $datas,
            'nisab_dharjo' => $nisab_dharjo,
        ], 200);
    }

    public function report_check()
    {
        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
            'unit_id' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $unit_id = request()->unit_id;

        $start_month = request()->month;
        $end_month = request()->month;
        $org_type = 'unit';
        $org_type_id = $unit_id;
        $report_approved_status = ['pending', 'approved', 'rejected'];   //enum('pending','approved','rejected')
        $is_need_sum = false;
        $datas = $this->report_summation($start_month, $end_month, $org_type, $org_type_id, $report_approved_status, $is_need_sum);
        $nisab_dharjo = UnitExpenseTarget::where('unit_id',$unit_id)->select('amount')->latest()->first();
        // dd($nisab_dharjo->amount);
        // dd($datas->report_sum_data );
        // if(empty($datas){
        //     return
        // }
        // return view('unit.unit_report_check')->with([
        //     'start_month' => $datas->start_month,
        //     'end_month' => $datas->end_month,
        //     'report_header' => $datas->report_header,

        //     'report_sum_data' => $datas->report_sum_data,
        //     'previous_present' => $datas->previous_present,
        //     'income_report' => $datas->income_report,
        //     'expense_report' => $datas->expense_report,
        // ]);.

        $data = (object) [
            'start_month' => $datas->start_month,
            'end_month' => $datas->end_month,
            'report_header' => $datas->report_header,

            'report_sum_data' => $datas->report_sum_data,
            'previous_present' => $datas->previous_present,

            'nisab_dharjo' => $nisab_dharjo,
            'income_report' => $datas->income_report,
            'expense_report' => $datas->expense_report,
        ];

        return response()->json([
            'status' => 'success',
            'data' => $data,
        ], 200);
    }

    public function total_approved_unit_report()
    {
        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
            'user_id' => ['required', 'exists:org_ward_users,user_id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $month = Carbon::parse(request()->month);
        $ward_id = OrgWardUser::where('user_id', request()->user_id)->value('ward_id');
        $ward_info = OrgWard::find($ward_id);
        $thana_info = $ward_info ? OrgThana::find($ward_info->org_thana_id) : null;
        $units = OrgUnit::where('org_ward_id', $ward_id)->get();

        $report_info_ids = [];
        $unit_ids = [];
        $approved_unit_ids = [];
        foreach ($units as $unit) {
            $unit_id = $unit->id;
            $unit_ids[] = $unit_id;
            $report_info = ReportInfo::where('org_type_id', $unit_id)
                ->where('org_type', 'unit')
                ->whereYear('month_year', $month->clone()->year)
                ->whereMonth('month_year', $month->clone()->month)
                ->where('report_approved_status', 'approved')
                ->where('status', 1)
                ->get()
                ->first();

            if ($report_info) {
                $report_info_id = $report_info->id;
                $report_info_ids[] = $report_info_id;
                $approved_unit_ids[] = $report_info->org_type_id;
            }
        }
        $unit_count = count($approved_unit_ids);
        $unit_titles = [];
        foreach ($approved_unit_ids as $unit_id) {
            $unit_info = OrgUnit::find($unit_id);
            if ($unit_info) {
                $unit_titles[] = $unit_info->title;
            }
        }

        $start_month = request()->month;
        $end_month = request()->month;
        $org_type = 'unit';
        $org_type_id = $approved_unit_ids;
        $report_approved_status = ['approved'];   //enum('pending','approved','rejected')
        $is_need_sum = false;
        $reportInfoIds = $report_info_ids;
        $datas = $this->report_summation($start_month, $end_month, $org_type, $org_type_id, $report_approved_status, $is_need_sum, $reportInfoIds);

        $report_header = (object) [
            'unit_count' => $unit_count,
            'unit_titles' => $unit_titles,
            'ward_info' => $ward_info,
            'thana_info' => $thana_info,
        ];

        return view('unit.total_approved_unit_report')->with([
            'start_month' => $datas->start_month,
            'end_month' => $datas->end_month,
            'report_header' => $report_header,

            'report_sum_data' => $datas->report_sum_data,
            'previous_present' => $datas->previous_present,
            'income_report' => $datas->income_report,
            'expense_report' => $datas->expense_report,
        ]);
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

        if(empty($report_sum_data)){
            // dd("sum data is empty");
            return [];
        }else{
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
