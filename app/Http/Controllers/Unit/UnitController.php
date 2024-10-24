<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use App\Models\Bm\Expense\BmExpense;
use App\Models\Bm\Expense\BmExpenseCategory;
use App\Models\Bm\Income\BmCategory;
use App\Models\Bm\Income\BmPaid;
use App\Models\Organization\OrgThana;
use App\Models\Organization\OrgType;
use App\Models\Organization\OrgUnit;
use App\Models\Organization\OrgUnitUser;
use App\Models\Organization\OrgWard;
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
    public function report()
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
        $form_data = request()->query();

        $unit_user = User::where('id', $form_data['user_id'])->with('org_unit_user')->get()->first();

        $unit_id = $unit_user->org_unit_user['unit_id'];
        $month = Carbon::parse($form_data['month']);
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
        // dd($result);
        $precedent = null;
        foreach ($unit_user_list as $unit_user_single) {
            foreach ($unit_user_single['org_unit_responsible'] as $responcibility) {
                if ($responcibility['responsibility_id'] === 1) {
                    $precedent = $unit_user_single;
                }
            }
        }

        $report_info = ReportInfo::where('org_type_id', $unit_id)
            ->where('org_type','unit')
            ->whereYear('month_year', $month->clone()->year)
            ->whereMonth('month_year', $month->clone()->month)
            ->get()
            ->first();

        if ($report_info) {
            $report_info_id = $report_info->id;
        }else{
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
            $income_category_wise[$index]['amount'] = $totalAmount;
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





        return view('unit.unit_report')->with([
            'month' => $month,
            'org_type' => $org_type,
            'unit_info' => $unit_info,
            'ward_info' => $ward_info,
            'thana_info' => $thana_info,
            'precedent' => $precedent,

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

            'income_category_wise' => $income_category_wise,
            'total_income' => $total_income,

            'expense_category_wise' => $expense_category_wise,
            'total_expense' => $total_expense,

        ]);
    }

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
        $precedent = null;
        foreach ($unit_user_list as $unit_user_single) {
            foreach ($unit_user_single['org_unit_responsible'] as $responcibility) {
                if ($responcibility['responsibility_id'] === 1) {
                    $precedent = $unit_user_single;
                }
            }
        }

        $report_info = ReportInfo::where('org_type_id', $unit_id)
            ->where('org_type','unit')
            ->whereYear('month_year', $month->clone()->year)
            ->whereMonth('month_year', $month->clone()->month)
            ->get()
            ->first();

        if ($report_info) {
            $report_info_id = $report_info->id;
        }else{
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
            $income_category_wise[$index]['amount'] = $totalAmount;
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
            'precedent' => $precedent,

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
        $precedent = null;
        foreach ($unit_user_list as $unit_user_single) {
            foreach ($unit_user_single['org_unit_responsible'] as $responcibility) {
                if ($responcibility['responsibility_id'] === 1) {
                    $precedent = $unit_user_single;
                }
            }
        }

        $report_info = ReportInfo::where('org_type_id', $unit_id)
            ->where('org_type','unit')
            ->whereYear('month_year', $month->clone()->year)
            ->whereMonth('month_year', $month->clone()->month)
            ->get()
            ->first();

        if ($report_info) {
            $report_info_id = $report_info->id;
        }else{
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
            $income_category_wise[$index]['amount'] = $totalAmount;
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
            'precedent' => $precedent,

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

            'income_category_wise' => $income_category_wise,
            'total_income' => $total_income,

            'expense_category_wise' => $expense_category_wise,
            'total_expense' => $total_expense,
        ], 200);
    }

    public function expense_category_wise(){
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

    public function bm_category_wise(){
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
    public function report_status(){
        $month = request()->month;
        if($month){
            $org_unit_user = OrgUnitUser::where('user_id',auth()->id())->first();
            $unit_id = $org_unit_user->unit_id;
            $month = Carbon::parse(request()->month);

            $report_info = ReportInfo::where('org_type_id', $unit_id)
                        ->where('org_type','unit')
                        ->whereYear('month_year', $month->clone()->year)
                        ->whereMonth('month_year', $month->clone()->month)
                        ->get()
                        ->first();

            $report_submit_status = $report_info->report_submit_status;
            $report_approved_status = $report_info->report_approved_status;

            if($report_submit_status == 'unsubmitted'){
                return response()->json([
                    'status' => 'success',
                    'report_status' => "unsubmitted",
                    "message" => "রিপোর্ট জমা দেওয়া হয়নি এখনো ।"
                ], 200);

            }else if( $report_submit_status == 'submitted' &&  $report_approved_status == 'pending'){
                return response()->json([
                    'status' => 'success',
                    'report_status' => "pending",
                    "message" => "রিপোর্ট জমা হয়েছে । ওয়ার্ডের আপ্রুভের জন্য অপেক্ষমাণ।"
                ], 200);

            }else if( $report_submit_status == 'submitted' &&  $report_approved_status == 'rejected'){
                return response()->json([
                    'status' => 'success',
                    'report_status' => "rejected",
                    "message" => "রিপোর্ট রিজেক্ট করা হয়েছে । ভুলগুলি ঠিক করে আবার জমা দিন ।"
                ], 200);

            }else if( $report_submit_status == 'submitted' &&  $report_approved_status == 'approved'){
                return response()->json([
                    'status' => 'success',
                    'report_status' => "approved",
                    "message" => "এ মাসের রিপোর্ট ওয়ার্ড গ্রহন করেছে।"
                ], 200);
            }

        }

    }
    public function report_joma(){

        $month = Carbon::parse(request()->month);
        $org_unit_user = OrgUnitUser::where('user_id',auth()->id())->first();
        $unit_id = $org_unit_user->unit_id;

        $permission  = ReportManagementControl::where('report_type', 'unit')
                                            ->whereYear('month_year', $month->clone()->year)
                                            ->whereMonth('month_year', $month->clone()->month)
                                            ->where('is_active', 1)
                                            ->latest()
                                            ->first();
        // dd($permission);
        if( $permission ){
            $report_info = ReportInfo::where('org_type_id', $unit_id)
                        ->where('org_type','unit')
                        ->whereYear('month_year', $month->clone()->year)
                        ->whereMonth('month_year', $month->clone()->month)
                        ->get()
                        ->first();


            if($report_info->report_submit_status == 'unsubmitted' && $report_info->report_approved_status == 'pending'){
                $report_info->report_submit_status = 'submitted';
                $report_info->save();

                return response()->json([
                    'status' => 'success',
                    'report_status' => "rejected",
                    "message" => "রিপোর্ট জমা করা হয়েছে ।"
                ], 200);

            }else if($report_info->report_submit_status == 'submitted' && $report_info->report_approved_status == 'rejected'){
                $report_info->report_approved_status = 'pending';
                $report_info->save();

                return response()->json([
                    'status' => 'success',
                    'report_status' => "rejected",
                    "message" => "রিপোর্ট পুনরায় জমা সম্পন্ন হয়েছে ।"
                ], 200);
            }else{
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => ['name' => ['Report has no data']],
                ], 422);
            }
        }else{
            return response()->json([
                'err_message' => 'Permission denied',
                'errors' => [['You do not have the necessary permissions']],
            ], 403);
        }
    }

}
