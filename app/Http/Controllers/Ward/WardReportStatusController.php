<?php

namespace App\Http\Controllers\Ward;

use App\Http\Controllers\Controller;
use App\Models\Bm\Expense\BmExpense;
use App\Models\Bm\Expense\BmExpenseCategory;
use App\Models\Bm\Income\BmCategory;
use App\Models\Bm\Income\BmPaid;
use App\Models\Organization\OrgThana;
use App\Models\Organization\OrgType;
use App\Models\Organization\OrgUnit;
use App\Models\Organization\OrgUnitResponsible;
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
use App\Models\Report\Shomajsheba\Shomajsheba1PersonalSocialWork;
use App\Models\Report\Shomajsheba\Shomajsheba2UnitSocialWork;
use App\Models\Report\Songothon\Songothon1Jonosokti;
use App\Models\Report\Songothon\Songothon2AssociateMember;
use App\Models\Report\Songothon\Songothon5DawatAndParibarikUnit;
use App\Models\Report\Songothon\Songothon7Sofor;
use App\Models\Report\Songothon\Songothon8IyanotData;
use App\Models\Report\Songothon\Songothon9SangothonikBoithok;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WardReportStatusController extends Controller
{
    public function report_status(){
        $ward_id = auth()->user()->org_ward_user["ward_id"];
        $units = OrgUnit::where('org_ward_id', $ward_id)->get();

        $month = request()->month;
        // dd($ward_id,$units->toArray(),$month);
        if($month){
            $carbon_month = Carbon::parse(request()->month);

            $unsubmitted_unit = [];
            $pending_unit = [];
            $rejected_unit = [];
            $approved_unit = [];
            foreach($units as $unit) {
                $report_info = ReportInfo::where('org_type_id', $unit->id)
                            ->where('org_type','unit')
                            ->whereYear('month_year', $carbon_month->clone()->year)
                            ->whereMonth('month_year', $carbon_month->clone()->month)
                            ->get()
                            ->first();

                $report_submit_status = $report_info->report_submit_status ?? 'unsubmitted';
                $report_approved_status = $report_info->report_approved_status ?? 'pending' ;


                if($report_submit_status == 'unsubmitted'){
                    $unsubmitted_unit[] = [
                        'unit_id' => $unit->id,
                        'unit_title' => $unit->title,
                        'report_status' => "unsubmitted",
                    ];

                }else if( $report_submit_status == 'submitted' &&  $report_approved_status == 'pending'){
                    $pending_unit[] = [
                        'unit_id' => $unit->id,
                        'unit_title' => $unit->title,
                        'report_status' => "pending",
                    ];

                }else if( $report_submit_status == 'submitted' &&  $report_approved_status == 'rejected'){
                    $rejected_unit[] = [
                        'unit_id' => $unit->id,
                        'unit_title' => $unit->title,
                        'report_status' => "rejected",
                    ];

                }else if( $report_submit_status == 'submitted' &&  $report_approved_status == 'approved'){
                    // dd($report_info);
                    $approved_unit[] = [
                        'unit_id' => $unit->id,
                        'unit_title' => $unit->title,
                        'report_status' => "approved",
                    ];
                }
            }
            // dd($approved_unit);
            return response()->json([
                'status' => 'success',
                "unsubmitted_unit" => $unsubmitted_unit,
                "pending_unit" => $pending_unit,
                "rejected_unit" => $rejected_unit,
                "approved_unit" => $approved_unit,
                "report_month" => $month,
            ], 200);

        }

    }
    public function change_status(){
        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
            'unit_id' => ['required'],
            'new_status' => ['required', 'in:approved,rejected'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $unit_id = request()->unit_id;
        $new_status = request()->new_status;
        $carbon_month = Carbon::parse(request()->month);

        $report_info = ReportInfo::where('org_type_id', $unit_id)
                    ->where('org_type','unit')
                    ->whereYear('month_year', $carbon_month->clone()->year)
                    ->whereMonth('month_year', $carbon_month->clone()->month)
                    ->first();

        if ($report_info) {
            $report_info->report_approved_status = $new_status;
            $report_info->save();
        }

        // Bulk update for BmPaid
        BmPaid::where('unit_id', $unit_id)
                ->whereYear('month', $carbon_month->year)
                ->whereMonth('month', $carbon_month->month)
                ->update(['report_approved_status' => $new_status]);

        // Bulk update for BmExpense
        BmExpense::where('unit_id', $unit_id)
                ->whereYear('date', $carbon_month->year)
                ->whereMonth('date', $carbon_month->month)
                ->update(['report_approved_status' => $new_status]);

        return response()->json([
            'status' => 'success',
            "message" => "change status pending to $new_status",
        ], 200);

    }

    // public function report_check()
    // {
    //     $validator = Validator::make(request()->all(), [
    //         'month' => ['required', 'date'],
    //         'unit_id' => ['required'],
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'err_message' => 'validation error',
    //             'errors' => $validator->errors(),
    //         ], 422);
    //     }
    //     // $form_data = request()->query();

    //     // $unit_user = User::where('id', $form_data['user_id'])->with('org_unit_user')->get()->first();

    //     $month = Carbon::parse(request()->month);
    //     $unit_id = request()->unit_id;

    //     $unit_info = OrgUnit::where('id', $unit_id)->first();
    //     $ward_id = $unit_info->org_ward_id;
    //     $ward_info = OrgWard::where('id', $ward_id)->first();
    //     $thana_id = $unit_info->org_thana_id;
    //     $thana_info = OrgThana::where('id', $thana_id)->first();
    //     $org_type = OrgType::where('id', $unit_info->org_type_id)->first();

    //     $unit_president = OrgUnitResponsible::where('org_unit_id', $unit_id)->where('responsibility_id',1)->first();
    //     $president = null;
    //     if($unit_president){
    //         $president_id = $unit_president->user_id;
    //         $president = User::find($president_id);
    //     }

    //     $report_info = ReportInfo::where('org_type_id', $unit_id)
    //         ->where('org_type','unit')
    //         ->whereYear('month_year', $month->clone()->year)
    //         ->whereMonth('month_year', $month->clone()->month)
    //         ->get()
    //         ->first();

    //     if ($report_info) {
    //         $report_info_id = $report_info->id;
    //     }else{
    //         return redirect()->back();
    //     }

    //     // ---------------------  reports all data to show  ---------------------------
    //     $dawat1 = Dawat1RegularGroupWise::where('report_info_id', $report_info_id)->get()->first();
    //     $dawat2 = Dawat2PersonalAndTarget::where('report_info_id', $report_info_id)->get()->first();
    //     $dawat3 = Dawat3GeneralProgramAndOthers::where('report_info_id', $report_info_id)->get()->first();
    //     $dawat4 = Dawat4GonoSongjogAndDawatOvijan::where('report_info_id', $report_info_id)->get()->first();
    //     $department1 = Department1TalimulQuran::where('report_info_id', $report_info_id)->get()->first();
    //     $department4 = Department4DifferentJobHoldersDawat::where('report_info_id', $report_info_id)->get()->first();
    //     $department5 = Department5ParibarikDawat::where('report_info_id', $report_info_id)->get()->first();
    //     $dawah_prokashona = DawahAndProkashona::where('report_info_id', $report_info_id)->get()->first();
    //     $kormosuci = KormosuciBastobayon::where('report_info_id', $report_info_id)->get()->first();
    //     $songothon1 = Songothon1Jonosokti::where('report_info_id', $report_info_id)->get()->first();
    //     $songothon2 = Songothon2AssociateMember::where('report_info_id', $report_info_id)->get()->first();
    //     $songothon9 = Songothon9SangothonikBoithok::where('report_info_id', $report_info_id)->get()->first();
    //     $songothon5 = Songothon5DawatAndParibarikUnit::where('report_info_id', $report_info_id)->get()->first();
    //     $songothon7 = Songothon7Sofor::where('report_info_id', $report_info_id)->get()->first();
    //     $songothon8 = Songothon8IyanotData::where('report_info_id', $report_info_id)->get()->first();
    //     $proshikkhon = Proshikkhon1Tarbiat::where('report_info_id', $report_info_id)->get()->first();
    //     $shomajsheba1 = Shomajsheba1PersonalSocialWork::where('report_info_id', $report_info_id)->get()->first();
    //     $shomajsheba2 = Shomajsheba2UnitSocialWork::where('report_info_id', $report_info_id)->get()->first();
    //     $rastrio = Rastrio1BishishtoBekti::where('report_info_id', $report_info_id)->get()->first();
    //     $montobbo = Montobbo::where('report_info_id', $report_info_id)->get()->first();
    //     // ---------------------  reports all data to show  ---------------------------


    //     // -------------------------- bm income report ------------------------------------
    //     $query = BmPaid::query();
    //     $filter = $query->whereYear('month', $month->clone()->year)->whereMonth('month', $month->clone()->month)->where('unit_id', $unit_id);
    //     $category = $filter->with('bm_category')->pluck('bm_category_id')->all();
    //     $category_all_id = array_values(array_unique($category));
    //     $total_income = $filter->sum('amount');

    //     $income_category_wise = [];
    //     foreach ($category_all_id as $index => $item) {
    //         $testQuery = BmPaid::query();
    //         $totalAmount = $testQuery->whereYear('month', $month->clone()->year)
    //             ->whereMonth('month', $month->clone()->month)
    //             ->where('bm_category_id', $item)
    //             ->where('unit_id', $unit_id)
    //             ->sum('amount');
    //         $bmCategory = BmCategory::find($item);
    //         $income_category_wise[$index]['amount'] = $totalAmount == 0 ? "" : $totalAmount;
    //         $income_category_wise[$index]['category'] = $bmCategory->title;
    //     }
    //     // -------------------------- bm income report ------------------------------------

    //     // -------------------------- bm expense report ------------------------------------
    //     $query = BmExpense::query();
    //     $filter = $query->whereYear('date', $month->clone()->year)->whereMonth('date', $month->clone()->month)->where('unit_id', $unit_id);
    //     $total_expense = $filter->sum('amount');
    //     $category_id = $filter->with('bm_expense_category')->pluck('bm_expense_category_id')->all();
    //     $category_unique_id = array_values(array_unique($category_id));

    //     $expense_category_wise = [];
    //     foreach ($category_unique_id as $index => $item) {
    //         $testQuery = BmExpense::query();
    //         $totalAmount = $testQuery->whereYear('date', $month->clone()->year)
    //             ->whereMonth('date', $month->clone()->month)
    //             ->where('bm_expense_category_id', $item)
    //             ->where('unit_id', $unit_id)
    //             ->sum('amount');
    //         $bmCategory = BmExpenseCategory::find($item);
    //         $expense_category_wise[$index]['amount'] = $totalAmount;
    //         $expense_category_wise[$index]['category'] = $bmCategory->title;
    //     }
    //     // -------------------------- bm expense report ------------------------------------





    //     return view('ward.unit_report_check')->with([
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

    //         'income_category_wise' => $income_category_wise,
    //         'total_income' => $total_income,

    //         'expense_category_wise' => $expense_category_wise,
    //         'total_expense' => $total_expense,

    //     ]);
    // }
}
