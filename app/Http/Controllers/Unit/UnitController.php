<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use App\Models\Report\DawahAndProkashona\DawahAndProkashona;
use App\Models\Report\Dawat\Dawat1RegularGroupWise;
use App\Models\Report\Dawat\Dawat2PersonalAndTarget;
use App\Models\Report\Dawat\Dawat3GeneralProgramAndOthers;
use App\Models\Report\Dawat\Dawat4GonoSongjogAndDawatOvijan;
use App\Models\Report\Department\Department1TalimulQuran;
use App\Models\Report\Department\Department4DifferentJobHoldersDawat;
use App\Models\Report\Department\Department5ParibarikDawat;
use App\Models\Report\Kormosuci\KormosuciBastobayon;
use App\Models\Report\Proshikkhon\Proshikkhon1Tarbiat;
use App\Models\Report\Rastrio\Rastrio1BishishtoBekti;
use App\Models\Report\ReportInfo;
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

class UnitController extends Controller
{
    public function report(){
        // $user = auth()->id();
        $form_data = request()->query();
        // dd($form_data,$form_data['user_id']);

        $unit_id = User::where('id',$form_data['user_id'])->with('org_unit_user')->get()->first()->org_unit_user['unit_id'];
        $month = Carbon::parse($form_data['month']);

        $report_info_id = ReportInfo::where('org_type_id' , $unit_id)
                                ->whereYear('month_year',$month->clone()->year)
                                ->whereMonth('month_year',$month->clone()->month)
                                ->get()
                                ->first()->id;
        // dd($report_info_id);
        $dawat1 = Dawat1RegularGroupWise::where('report_info_id' , $report_info_id)->get()->first();
        $dawat2 = Dawat2PersonalAndTarget::where('report_info_id' , $report_info_id)->get()->first();
        $dawat3 = Dawat3GeneralProgramAndOthers::where('report_info_id' , $report_info_id)->get()->first();
        $dawat4 = Dawat4GonoSongjogAndDawatOvijan::where('report_info_id' , $report_info_id)->get()->first();

        $department1 = Department1TalimulQuran::where('report_info_id' , $report_info_id)->get()->first();
        $department4 = Department4DifferentJobHoldersDawat::where('report_info_id' , $report_info_id)->get()->first();
        $department5 = Department5ParibarikDawat::where('report_info_id' , $report_info_id)->get()->first();

        $dawah_prokashona = DawahAndProkashona::where('report_info_id' , $report_info_id)->get()->first();
        $kormosuci = KormosuciBastobayon::where('report_info_id' , $report_info_id)->get()->first();

        $songothon1 = Songothon1Jonosokti::where('report_info_id' , $report_info_id)->get()->first();
        $songothon2 = Songothon2AssociateMember::where('report_info_id' , $report_info_id)->get()->first();
        $songothon9 = Songothon9SangothonikBoithok::where('report_info_id' , $report_info_id)->get()->first();
        $songothon5 = Songothon5DawatAndParibarikUnit::where('report_info_id' , $report_info_id)->get()->first();
        $songothon7 = Songothon7Sofor::where('report_info_id' , $report_info_id)->get()->first();
        $songothon8 = Songothon8IyanotData::where('report_info_id' , $report_info_id)->get()->first();

        $proshikkhon = Proshikkhon1Tarbiat::where('report_info_id' , $report_info_id)->get()->first();

        $shomajsheba1 = Shomajsheba1PersonalSocialWork::where('report_info_id' , $report_info_id)->get()->first();
        $shomajsheba2 = Shomajsheba2UnitSocialWork::where('report_info_id' , $report_info_id)->get()->first();

        $rastrio = Rastrio1BishishtoBekti::where('report_info_id' , $report_info_id)->get()->first();

        // dd($dawat1,$dawat2,$dawat3,$dawat4);

        return view('unit.unit_report')->with([
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
        ]);
    }

    public function report_upload(){
        return view('unit.unit_report_upload');
    }
}
