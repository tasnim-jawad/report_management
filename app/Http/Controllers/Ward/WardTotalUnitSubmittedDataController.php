<?php

namespace App\Http\Controllers\Ward;

use App\Http\Controllers\Controller;
use App\Models\Bm\Expense\BmExpense;
use App\Models\Bm\Expense\BmExpenseCategory;
use App\Models\Bm\Income\BmCategory;
use App\Models\Bm\Income\BmPaid;
use App\Models\Organization\OrgUnit;
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
use App\Models\Ward\WardTotalUnitSubmittedData;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WardTotalUnitSubmittedDataController extends Controller
{
    public function submitted_units_data_add()
    {
        // dd(request()->all());
        $validator = Validator::make(request()->all(), [
            'month' => ['required', 'date'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $permission = is_ward_report_upload_permitted(request()->month,auth()->user()->id);
        if(!$permission){
            return response()->json([
                'err_message' => 'Permission denied',
                'errors' => [['মুরব্বী মুরব্বী উমহু হু হু হু']],
            ], 403);
        }

        $ward_user = User::where('id', auth()->user()->id)->with('org_ward_user')->get()->first();
        $ward_id = $ward_user->org_ward_user->ward_id;
        $month = Carbon::parse(request()->month);
        $units = OrgUnit::where('org_ward_id',$ward_id)->get();

        $report_info_ids = [];
        $unit_ids = [];
        $approved_unit_ids = [];
        foreach ($units as $index => $unit) {
            $unit_id = $unit->id;
            $unit_ids[] = $unit_id;
            $report_info = ReportInfo::where('org_type_id', $unit_id)
                    ->where('org_type', 'unit')
                    ->whereYear('month_year', $month->clone()->year)
                    ->whereMonth('month_year', $month->clone()->month)
                    ->where('report_approved_status','approved')
                    ->where('status', 1)
                    ->get()
                    ->first();

            if($report_info){
                $report_info_id = $report_info->id;
                $report_info_ids[] = $report_info_id;
                $approved_unit_ids[] = $report_info->org_type_id;
            }
        }
        // dd($unit_ids,$report_info_ids,$approved_unit_ids,$month);

        $all_dawat1 = [
            'how_many_groups_are_out' => 0,
            'number_of_participants' => 0,
            'how_many_have_been_invited' => 0,
            'how_many_associate_members_created' => 0,
        ];
        $all_dawat2 = [
            'total_rokon' => 0,
            'total_worker' => 0,
            'how_many_were_give_dawat_rokon' => 0,
            'how_many_were_give_dawat_worker' => 0,
            'how_many_have_been_invited' => 0,
            'how_many_associate_members_created' => 0,
        ];
        $all_dawat3 = [
            'how_many_were_give_dawat' => 0,
            'how_many_associate_members_created' => 0,
        ];
        $all_dawat4 = [
            'total_gono_songjog_group' => 0,
            'total_attended' => 0,
            'how_many_have_been_invited' => 0,
            'how_many_associate_members_created' => 0,

            'jela_mohanogor_declared_gonosonjog_group' => 0,
            'jela_mohanogor_declared_gonosonjog_attended' => 0,
            'jela_mohanogor_declared_gonosonjog_invited' => 0,
            'jela_mohanogor_declared_gonosonjog_associated_created' => 0,
        ];
        $all_department1 = [
            'teacher_rokon' => 0,
            'teacher_worker' => 0,
            'student_rokon' => 0,
            'student_worker' => 0,

            'how_much_learned_quran' => 0,
            'how_much_invited' => 0,
            'how_much_been_associated' => 0,
        ];
        $all_department4 = [
            'political_and_special_invited' => 0,
            'political_and_special_been_associated' => 0,
            'political_and_special_target' => 0,

            'prantik_jonogosti_invited' => 0,
            'prantik_jonogosti_been_associated' => 0,
            'prantik_jonogosti_target' => 0,

            'vinno_dormalombi_invited' => 0,
            'vinno_dormalombi_been_associated' => 0,
            'vinno_dormalombi_target' => 0,
        ];
        $all_department5 = [
            'total_attended_family' => 0,
            'how_many_new_family_invited' => 0,
        ];
        $all_dawah_prokashona = [
            'books_in_pathagar' => 0,
            'books_in_pathagar_increase' => 0,

            'unit_book_distribution_center' => 0,
            'unit_book_distribution_center_increase' => 0,

            'unit_book_distribution' => 0,
            'unit_book_distribution_increase' => 0,

            'soft_copy_book_distribution' => 0,
            'soft_copy_book_distribution_increase' => 0,

            'dawat_link_distribution' => 0,
            'dawat_link_distribution_increase' => 0,

            'sonar_bangla' => 0,
            'sonar_bangla_increase' => 0,

            'songram' => 0,
            'songram_increase' => 0,

            'prithibi' => 0,
            'prithibi_increase' => 0,
        ];
        $all_kormosuci = [
            'unit_masik_sadaron_sova_total' => 0,
            'unit_masik_sadaron_sova_target' => 0,
            'unit_masik_sadaron_sova_uposthiti' => 0,

            'iftar_mahfil_personal_total' => 0,
            'iftar_mahfil_personal_target' => 0,
            'iftar_mahfil_personal_uposthiti' => 0,

            'iftar_mahfil_samostic_total' => 0,
            'iftar_mahfil_samostic_target' => 0,
            'iftar_mahfil_samostic_uposthiti' => 0,

            'cha_chakra_total' => 0,
            'cha_chakra_target' => 0,
            'cha_chakra_uposthiti' => 0,

            'samostic_khawa_total' => 0,
            'samostic_khawa_target' => 0,
            'samostic_khawa_uposthiti' => 0,

            'sikkha_sofor_total' => 0,
            'sikkha_sofor_target' => 0,
            'sikkha_sofor_uposthiti' => 0,

        ];
        $all_songothon1 = [
            'rokon_previous' => 0,
            'rokon_present' => 0,
            'rokon_briddhi' => 0,
            'rokon_gatti' => 0,
            'rokon_target' => 0,
            'worker_previous' => 0,
            'worker_present' => 0,
            'worker_briddhi' => 0,
            'worker_gatti' => 0,
            'worker_target' => 0,
        ];
        $all_songothon2 = [
            'associate_member_previous' => 0,
            'associate_member_present' => 0,
            'associate_member_briddhi' => 0,
            'associate_member_target' => 0,
            'vinno_dormalombi_worker_previous' => 0,
            'vinno_dormalombi_worker_present' => 0,
            'vinno_dormalombi_worker_briddhi' => 0,
            'vinno_dormalombi_worker_target' => 0,
            'vinno_dormalombi_associate_member_previous' => 0,
            'vinno_dormalombi_associate_member_present' => 0,
            'vinno_dormalombi_associate_member_briddhi' => 0,
            'vinno_dormalombi_associate_member_target' => 0,
        ];
        $all_songothon9 = [
            'unit_kormi_boithok_total' => 0,
            'unit_kormi_boithok_uposthiti' => 0,
        ];
        $all_songothon5 = [
            'paribarik_unit_total' => 0,
            'paribarik_unit_increase' => 0,
            'paribarik_unit_target' => 0,
        ];
        $all_songothon7 = [
            'upper_leader_sofor' => 0,
        ];
        $all_songothon8 = [
            'associate_member_total' => 0,
            'associate_member_total_iyanot_amounts' => 0,
            'sudhi_total' => 0,
            'sudi_total_iyanot_amounts' => 0,
        ];
        $all_proshikkhon = [
            'sohi_quran_onushilon' => 0,
            'sohi_quran_onushilon_target' => 0,
            'sohi_quran_onushilon_uposthiti' => 0,

            'masala_masayel' => 0,
            'masala_masayel_target' => 0,
            'masala_masayel_uposthiti' => 0,

            'darsul_quran' => 0,
            'darsul_quran_target' => 0,
            'darsul_quran_uposthiti' => 0,

            'darsul_hadis' => 0,
            'darsul_hadis_target' => 0,
            'darsul_hadis_uposthiti' => 0,

            'samostik_path' => 0,
            'samostik_path_target' => 0,
            'samostik_path_uposthiti' => 0,

            'bishoy_vittik_onushilon' => 0,
            'bishoy_vittik_onushilon_target' => 0,
            'bishoy_vittik_onushilon_uposthiti' => 0,
        ];
        $all_shomajsheba1 = [
            'how_many_people_did' => 0,
            'service_received_total' => 0,
        ];
        $all_shomajsheba2 = [
            'shamajik_onusthane_ongshogrohon' => 0,
            'shamajik_onusthane_shohayota_prodan' => 0,
            'shamajik_birodh_mimangsha' => 0,
            'manobik_shohayota_prodan' => 0,
            'korje_hasana_prodan' => 0,
            'rogir_poricorja' => 0,
            'medical_shohayota_prodan' => 0,
            'nobojatokke_gift_prodan' => 0,
            'voluntarily_blood_donation_kotojon' => 0,
            'voluntarily_blood_donation_kotojonke' => 0,
            'matrikalin_sheba_prodan_kotojon' => 0,
            'matrikalin_sheba_prodan_kotojonke' => 0,
            'mayeter_gosol' => 0,
            'others' => 0,

        ];
        $all_rastrio = [
            'bishishto_bekti_jogajog' => 0,
        ];
        $all_montobbo = [
            'montobbo' => null,
        ];

        $all_income_category_wise = [];
        $all_total_income = "";

        $all_expense_category_wise = [];
        $all_total_expense = [];

        foreach ($report_info_ids as $index => $report_info_id) {

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

            $all_dawat1['how_many_groups_are_out'] += $dawat1->how_many_groups_are_out;
            $all_dawat1['number_of_participants'] += $dawat1->number_of_participants;
            $all_dawat1['how_many_have_been_invited'] += $dawat1->how_many_have_been_invited;
            $all_dawat1['how_many_associate_members_created'] += $dawat1->how_many_associate_members_created;

            $all_dawat2['total_rokon'] += $dawat2->total_rokon;
            $all_dawat2['total_worker'] += $dawat2->total_worker;
            $all_dawat2['how_many_were_give_dawat_rokon'] += $dawat2->how_many_were_give_dawat_rokon;
            $all_dawat2['how_many_were_give_dawat_worker'] += $dawat2->how_many_were_give_dawat_worker;
            $all_dawat2['how_many_have_been_invited'] += $dawat2->how_many_have_been_invited;
            $all_dawat2['how_many_associate_members_created'] += $dawat2->how_many_associate_members_created;

            $all_dawat3['how_many_were_give_dawat'] += $dawat3->how_many_were_give_dawat;
            $all_dawat3['how_many_associate_members_created'] += $dawat3->how_many_associate_members_created;

            $all_dawat4['total_gono_songjog_group'] += $dawat4->total_gono_songjog_group;
            $all_dawat4['total_attended'] += $dawat4->total_attended;
            $all_dawat4['how_many_have_been_invited'] += $dawat4->how_many_have_been_invited;
            $all_dawat4['how_many_associate_members_created'] += $dawat4->how_many_associate_members_created;
            $all_dawat4['jela_mohanogor_declared_gonosonjog_group'] += $dawat4->jela_mohanogor_declared_gonosonjog_group;
            $all_dawat4['jela_mohanogor_declared_gonosonjog_attended'] += $dawat4->jela_mohanogor_declared_gonosonjog_attended;
            $all_dawat4['jela_mohanogor_declared_gonosonjog_invited'] += $dawat4->jela_mohanogor_declared_gonosonjog_invited;
            $all_dawat4['jela_mohanogor_declared_gonosonjog_associated_created'] += $dawat4->jela_mohanogor_declared_gonosonjog_associated_created;

            $all_department1['teacher_rokon'] += $department1->teacher_rokon;
            $all_department1['teacher_worker'] += $department1->teacher_worker;
            $all_department1['student_rokon'] += $department1->student_rokon;
            $all_department1['student_worker'] += $department1->student_worker;
            $all_department1['how_much_learned_quran'] += $department1->how_much_learned_quran;
            $all_department1['how_much_invited'] += $department1->how_much_invited;
            $all_department1['how_much_been_associated'] += $department1->how_much_been_associated;

            $all_department4['political_and_special_invited'] += $department4->political_and_special_invited;
            $all_department4['political_and_special_been_associated'] += $department4->political_and_special_been_associated;
            $all_department4['political_and_special_target'] += $department4->political_and_special_target;
            $all_department4['prantik_jonogosti_invited'] += $department4->prantik_jonogosti_invited;
            $all_department4['prantik_jonogosti_been_associated'] += $department4->prantik_jonogosti_been_associated;
            $all_department4['prantik_jonogosti_target'] += $department4->prantik_jonogosti_target;
            $all_department4['vinno_dormalombi_invited'] += $department4->vinno_dormalombi_invited;
            $all_department4['vinno_dormalombi_been_associated'] += $department4->vinno_dormalombi_been_associated;
            $all_department4['vinno_dormalombi_target'] += $department4->vinno_dormalombi_target;

            $all_department5['total_attended_family'] += $department5->total_attended_family;
            $all_department5['how_many_new_family_invited'] += $department5->how_many_new_family_invited;

            $all_dawah_prokashona['books_in_pathagar'] += $dawah_prokashona->books_in_pathagar;
            $all_dawah_prokashona['books_in_pathagar_increase'] += $dawah_prokashona->books_in_pathagar_increase;
            $all_dawah_prokashona['unit_book_distribution_center'] += $dawah_prokashona->unit_book_distribution_center;
            $all_dawah_prokashona['unit_book_distribution_center_increase'] += $dawah_prokashona->unit_book_distribution_center_increase;
            $all_dawah_prokashona['unit_book_distribution'] += $dawah_prokashona->unit_book_distribution;
            $all_dawah_prokashona['unit_book_distribution_increase'] += $dawah_prokashona->unit_book_distribution_increase;
            $all_dawah_prokashona['soft_copy_book_distribution'] += $dawah_prokashona->soft_copy_book_distribution;
            $all_dawah_prokashona['soft_copy_book_distribution_increase'] += $dawah_prokashona->soft_copy_book_distribution_increase;
            $all_dawah_prokashona['dawat_link_distribution'] += $dawah_prokashona->dawat_link_distribution;
            $all_dawah_prokashona['dawat_link_distribution_increase'] += $dawah_prokashona->dawat_link_distribution_increase;
            $all_dawah_prokashona['sonar_bangla'] += $dawah_prokashona->sonar_bangla;
            $all_dawah_prokashona['sonar_bangla_increase'] += $dawah_prokashona->sonar_bangla_increase;
            $all_dawah_prokashona['songram'] += $dawah_prokashona->songram;
            $all_dawah_prokashona['songram_increase'] += $dawah_prokashona->songram_increase;
            $all_dawah_prokashona['prithibi'] += $dawah_prokashona->prithibi;
            $all_dawah_prokashona['prithibi_increase'] += $dawah_prokashona->prithibi_increase;

            $all_kormosuci['unit_masik_sadaron_sova_total'] += $kormosuci->unit_masik_sadaron_sova_total;
            $all_kormosuci['unit_masik_sadaron_sova_target'] += $kormosuci->unit_masik_sadaron_sova_target;
            $all_kormosuci['unit_masik_sadaron_sova_uposthiti'] += $kormosuci->unit_masik_sadaron_sova_uposthiti;

            $all_kormosuci['iftar_mahfil_personal_total'] += $kormosuci->iftar_mahfil_personal_total;
            $all_kormosuci['iftar_mahfil_personal_target'] += $kormosuci->iftar_mahfil_personal_target;
            $all_kormosuci['iftar_mahfil_personal_uposthiti'] += $kormosuci->iftar_mahfil_personal_uposthiti;

            $all_kormosuci['iftar_mahfil_samostic_total'] += $kormosuci->iftar_mahfil_samostic_total;
            $all_kormosuci['iftar_mahfil_samostic_target'] += $kormosuci->iftar_mahfil_samostic_target;
            $all_kormosuci['iftar_mahfil_samostic_uposthiti'] += $kormosuci->iftar_mahfil_samostic_uposthiti;

            $all_kormosuci['cha_chakra_total'] += $kormosuci->cha_chakra_total;
            $all_kormosuci['cha_chakra_target'] += $kormosuci->cha_chakra_target;
            $all_kormosuci['cha_chakra_uposthiti'] += $kormosuci->cha_chakra_uposthiti;

            $all_kormosuci['samostic_khawa_total'] += $kormosuci->samostic_khawa_total;
            $all_kormosuci['samostic_khawa_target'] += $kormosuci->samostic_khawa_target;
            $all_kormosuci['samostic_khawa_uposthiti'] += $kormosuci->samostic_khawa_uposthiti;

            $all_kormosuci['sikkha_sofor_total'] += $kormosuci->sikkha_sofor_total;
            $all_kormosuci['sikkha_sofor_target'] += $kormosuci->sikkha_sofor_target;
            $all_kormosuci['sikkha_sofor_uposthiti'] += $kormosuci->sikkha_sofor_uposthiti;

            $all_songothon1['rokon_previous'] += $songothon1->rokon_previous;
            $all_songothon1['rokon_present'] += $songothon1->rokon_present;
            $all_songothon1['rokon_briddhi'] += $songothon1->rokon_briddhi;
            $all_songothon1['rokon_gatti'] += $songothon1->rokon_gatti;
            $all_songothon1['rokon_target'] += $songothon1->rokon_target;
            $all_songothon1['worker_previous'] += $songothon1->worker_previous;
            $all_songothon1['worker_present'] += $songothon1->worker_present;
            $all_songothon1['worker_briddhi'] += $songothon1->worker_briddhi;
            $all_songothon1['worker_gatti'] += $songothon1->worker_gatti;
            $all_songothon1['worker_target'] += $songothon1->worker_target;

            $all_songothon2['associate_member_previous'] += $songothon2->associate_member_previous;
            $all_songothon2['associate_member_present'] += $songothon2->associate_member_present;
            $all_songothon2['associate_member_briddhi'] += $songothon2->associate_member_briddhi;
            $all_songothon2['associate_member_target'] += $songothon2->associate_member_target;
            $all_songothon2['vinno_dormalombi_worker_previous'] += $songothon2->vinno_dormalombi_worker_previous;
            $all_songothon2['vinno_dormalombi_worker_present'] += $songothon2->vinno_dormalombi_worker_present;
            $all_songothon2['vinno_dormalombi_worker_briddhi'] += $songothon2->vinno_dormalombi_worker_briddhi;
            $all_songothon2['vinno_dormalombi_worker_target'] += $songothon2->vinno_dormalombi_worker_target;
            $all_songothon2['vinno_dormalombi_associate_member_previous'] += $songothon2->vinno_dormalombi_associate_member_previous;
            $all_songothon2['vinno_dormalombi_associate_member_present'] += $songothon2->vinno_dormalombi_associate_member_present;
            $all_songothon2['vinno_dormalombi_associate_member_briddhi'] += $songothon2->vinno_dormalombi_associate_member_briddhi;
            $all_songothon2['vinno_dormalombi_associate_member_target'] += $songothon2->vinno_dormalombi_associate_member_target;

            $all_songothon9['unit_kormi_boithok_total'] += $songothon9->unit_kormi_boithok_total;
            $all_songothon9['unit_kormi_boithok_uposthiti'] += $songothon9->unit_kormi_boithok_uposthiti;

            $all_songothon5['paribarik_unit_total'] += $songothon5->paribarik_unit_total;
            $all_songothon5['paribarik_unit_increase'] += $songothon5->paribarik_unit_increase;
            $all_songothon5['paribarik_unit_target'] += $songothon5->paribarik_unit_target;

            $all_songothon7['upper_leader_sofor'] += $songothon7->upper_leader_sofor;

            $all_songothon8['associate_member_total'] += $songothon8->associate_member_total;
            $all_songothon8['associate_member_total_iyanot_amounts'] += $songothon8->associate_member_total_iyanot_amounts;
            $all_songothon8['sudhi_total'] += $songothon8->sudhi_total;
            $all_songothon8['sudi_total_iyanot_amounts'] += $songothon8->sudi_total_iyanot_amounts;

            $all_proshikkhon['sohi_quran_onushilon'] += $proshikkhon->sohi_quran_onushilon;
            $all_proshikkhon['sohi_quran_onushilon_target'] += $proshikkhon->sohi_quran_onushilon_target;
            $all_proshikkhon['sohi_quran_onushilon_uposthiti'] += $proshikkhon->sohi_quran_onushilon_uposthiti;

            $all_proshikkhon['masala_masayel'] += $proshikkhon->masala_masayel;
            $all_proshikkhon['masala_masayel_target'] += $proshikkhon->masala_masayel_target;
            $all_proshikkhon['masala_masayel_uposthiti'] += $proshikkhon->masala_masayel_uposthiti;

            $all_proshikkhon['darsul_quran'] += $proshikkhon->darsul_quran;
            $all_proshikkhon['darsul_quran_target'] += $proshikkhon->darsul_quran_target;
            $all_proshikkhon['darsul_quran_uposthiti'] += $proshikkhon->darsul_quran_uposthiti;

            $all_proshikkhon['darsul_hadis'] += $proshikkhon->darsul_hadis;
            $all_proshikkhon['darsul_hadis_target'] += $proshikkhon->darsul_hadis_target;
            $all_proshikkhon['darsul_hadis_uposthiti'] += $proshikkhon->darsul_hadis_uposthiti;

            $all_proshikkhon['samostik_path'] += $proshikkhon->samostik_path;
            $all_proshikkhon['samostik_path_target'] += $proshikkhon->samostik_path_target;
            $all_proshikkhon['samostik_path_uposthiti'] += $proshikkhon->samostik_path_uposthiti;

            $all_proshikkhon['bishoy_vittik_onushilon'] += $proshikkhon->bishoy_vittik_onushilon;
            $all_proshikkhon['bishoy_vittik_onushilon_target'] += $proshikkhon->bishoy_vittik_onushilon_target;
            $all_proshikkhon['bishoy_vittik_onushilon_uposthiti'] += $proshikkhon->bishoy_vittik_onushilon_uposthiti;

            $all_shomajsheba1['how_many_people_did'] += $shomajsheba1->how_many_people_did;
            $all_shomajsheba1['service_received_total'] += $shomajsheba1->service_received_total;

            $all_shomajsheba2['shamajik_onusthane_ongshogrohon'] += $shomajsheba2->shamajik_onusthane_ongshogrohon;
            $all_shomajsheba2['shamajik_onusthane_shohayota_prodan'] += $shomajsheba2->shamajik_onusthane_shohayota_prodan;
            $all_shomajsheba2['shamajik_birodh_mimangsha'] += $shomajsheba2->shamajik_birodh_mimangsha;
            $all_shomajsheba2['manobik_shohayota_prodan'] += $shomajsheba2->manobik_shohayota_prodan;
            $all_shomajsheba2['korje_hasana_prodan'] += $shomajsheba2->korje_hasana_prodan;
            $all_shomajsheba2['rogir_poricorja'] += $shomajsheba2->rogir_poricorja;
            $all_shomajsheba2['medical_shohayota_prodan'] += $shomajsheba2->medical_shohayota_prodan;
            $all_shomajsheba2['nobojatokke_gift_prodan'] += $shomajsheba2->nobojatokke_gift_prodan;
            $all_shomajsheba2['voluntarily_blood_donation_kotojon'] += $shomajsheba2->voluntarily_blood_donation_kotojon;
            $all_shomajsheba2['voluntarily_blood_donation_kotojonke'] += $shomajsheba2->voluntarily_blood_donation_kotojonke;
            $all_shomajsheba2['matrikalin_sheba_prodan_kotojon'] += $shomajsheba2->matrikalin_sheba_prodan_kotojon;
            $all_shomajsheba2['matrikalin_sheba_prodan_kotojonke'] += $shomajsheba2->matrikalin_sheba_prodan_kotojonke;
            $all_shomajsheba2['mayeter_gosol'] += $shomajsheba2->mayeter_gosol;
            $all_shomajsheba2['others'] += $shomajsheba2->others;

            $all_rastrio['bishishto_bekti_jogajog'] += $rastrio->bishishto_bekti_jogajog;
            // dd(isset($all_montobbo['montobbo']));
            $all_montobbo['montobbo'] = isset($all_montobbo['montobbo'])? $all_montobbo['montobbo'] . PHP_EOL . $montobbo->montobbo : $montobbo->montobbo;
            // dd($all_montobbo['montobbo']);

        }

        // -------------------------- bm income report ------------------------------------
        $query = BmPaid::query();
        $filter = $query->whereYear('month', $month->clone()->year)
                        ->whereMonth('month', $month->clone()->month)
                        ->where('ward_id', $ward_id)
                        ->whereIn('unit_id', $approved_unit_ids)
                        ->where('status', 1);
        // dd($approved_unit_ids,$filter->get()->all(),$filter->sum('amount'));

        $category = $filter->with('bm_category')->pluck('bm_category_id')->all();
        $category_all_id = array_values(array_unique($category));
        $total_income = $filter->sum('amount');

        // $all_income_category_wise = [];
        foreach ($category_all_id as $index => $item) {
            $testQuery = BmPaid::query();
            $totalAmount = $testQuery->whereYear('month', $month->clone()->year)
                ->whereMonth('month', $month->clone()->month)
                ->where('bm_category_id', $item)
                ->where('ward_id', $ward_id)
                ->whereIn('unit_id', $approved_unit_ids)
                ->sum('amount');
            $bmCategory = BmCategory::find($item);
            $all_income_category_wise[$index]['amount'] = $totalAmount;
            $all_income_category_wise[$index]['category'] = $bmCategory->title;
        }
        // -------------------------- bm income report ------------------------------------

        // -------------------------- bm expense report ------------------------------------
        $query = BmExpense::query();
        $filter = $query->whereYear('date', $month->clone()->year)
                        ->whereMonth('date', $month->clone()->month)
                        ->where('ward_id', $ward_id)
                        ->whereIn('unit_id', $approved_unit_ids)
                        ->where('status', 1);
        $total_expense = $filter->sum('amount');
        $category_id = $filter->with('bm_expense_category')->pluck('bm_expense_category_id')->all();
        $category_unique_id = array_values(array_unique($category_id));

        $all_expense_category_wise = [];
        foreach ($category_unique_id as $index => $item) {
            $testQuery = BmExpense::query();
            $totalAmount = $testQuery->whereYear('date', $month->clone()->year)
                ->whereMonth('date', $month->clone()->month)
                ->where('bm_expense_category_id', $item)
                ->where('ward_id', $ward_id)
                ->whereIn('unit_id', $approved_unit_ids)
                ->sum('amount');
            $bmCategory = BmExpenseCategory::find($item);
            $all_expense_category_wise[$index]['amount'] = $totalAmount;
            $all_expense_category_wise[$index]['category'] = $bmCategory->title;
        }
        // -------------------------- bm expense report ------------------------------------

        $ward_report_info = ReportInfo::whereYear('month_year', $month->clone()->year)
            ->whereMonth('month_year', $month->clone()->month)
            ->where('org_type', 'ward')
            ->where('org_type_id', $ward_id)
            ->where('report_type', 'monthly')
            ->orderBy('id', 'DESC')
            ->first();
        // dd($ward_report_info->toArray(),$permission->toArray(),$permission->month_year,$permission->report_type);
        if (!$ward_report_info && $permission) {
            $ward_report_info = ReportInfo::create([
                'org_type' => 'ward',
                'org_type_id' => $ward_id,
                'responsibility_id' => 1,
                'responsibility_name' => 'president',
                'month_year' => $permission->month_year,
                'report_type' =>  'monthly',
                'creator' => auth()->user()->id,
                'status' => 1,
            ]);
        }

        $data = WardTotalUnitSubmittedData::where('report_info_id', $ward_report_info->id)->first();
        // dd($data->toArray(),$all_dawat1['how_many_groups_are_out']);
        // dd($all_montobbo['montobbo']);
        if(!$data){
            $data =new WardTotalUnitSubmittedData();
        }

        // Dawat1
        $data->dawat1_how_many_groups_are_out = $all_dawat1['how_many_groups_are_out'];
        $data->dawat1_number_of_participants = $all_dawat1['number_of_participants'];
        $data->dawat1_how_many_have_been_invited = $all_dawat1['how_many_have_been_invited'];
        $data->dawat1_how_many_associate_members_created = $all_dawat1['how_many_associate_members_created'];

        // Dawat2
        $data->dawat2_total_rokon = $all_dawat2['total_rokon'];
        $data->dawat2_total_worker = $all_dawat2['total_worker'];
        $data->dawat2_how_many_were_give_dawat_rokon = $all_dawat2['how_many_were_give_dawat_rokon'];
        $data->dawat2_how_many_were_give_dawat_worker = $all_dawat2['how_many_were_give_dawat_worker'];
        $data->dawat2_how_many_have_been_invited = $all_dawat2['how_many_have_been_invited'];
        $data->dawat2_how_many_associate_members_created = $all_dawat2['how_many_associate_members_created'];

        // Dawat3
        $data->dawat3_how_many_were_give_dawat = $all_dawat3['how_many_were_give_dawat'];
        $data->dawat3_how_many_associate_members_created = $all_dawat3['how_many_associate_members_created'];

        // Dawat4
        $data->dawat4_total_gono_songjog_group = $all_dawat4['total_gono_songjog_group'];
        $data->dawat4_total_attended = $all_dawat4['total_attended'];
        $data->dawat4_how_many_have_been_invited = $all_dawat4['how_many_have_been_invited'];
        $data->dawat4_how_many_associate_members_created = $all_dawat4['how_many_associate_members_created'];

        $data->dawat4_jela_mohanogor_declared_gonosonjog_group = $all_dawat4['jela_mohanogor_declared_gonosonjog_group'];
        $data->dawat4_jela_mohanogor_declared_gonosonjog_attended = $all_dawat4['jela_mohanogor_declared_gonosonjog_attended'];
        $data->dawat4_jela_mohanogor_declared_gonosonjog_invited = $all_dawat4['jela_mohanogor_declared_gonosonjog_invited'];
        $data->dawat4_jela_mohanogor_declared_gonosonjog_associated_created = $all_dawat4['jela_mohanogor_declared_gonosonjog_associated_created'];

        // Department1
        $data->department1_teacher_rokon = $all_department1['teacher_rokon'];
        $data->department1_teacher_worker = $all_department1['teacher_worker'];
        $data->department1_student_rokon = $all_department1['student_rokon'];
        $data->department1_student_worker = $all_department1['student_worker'];

        $data->department1_how_much_learned_quran = $all_department1['how_much_learned_quran'];
        $data->department1_how_much_invited = $all_department1['how_much_invited'];
        $data->department1_how_much_been_associated = $all_department1['how_much_been_associated'];

        // Department4
        $data->department4_political_and_special_invited = $all_department4['political_and_special_invited'];
        $data->department4_political_and_special_been_associated = $all_department4['political_and_special_been_associated'];
        $data->department4_political_and_special_target = $all_department4['political_and_special_target'];

        $data->department4_prantik_jonogosti_invited = $all_department4['prantik_jonogosti_invited'];
        $data->department4_prantik_jonogosti_been_associated = $all_department4['prantik_jonogosti_been_associated'];
        $data->department4_prantik_jonogosti_target = $all_department4['prantik_jonogosti_target'];

        $data->department4_vinno_dormalombi_invited = $all_department4['vinno_dormalombi_invited'];
        $data->department4_vinno_dormalombi_been_associated = $all_department4['vinno_dormalombi_been_associated'];
        $data->department4_vinno_dormalombi_target = $all_department4['vinno_dormalombi_target'];

        // Department5
        $data->department5_total_attended_family = $all_department5['total_attended_family'];
        $data->department5_how_many_new_family_invited = $all_department5['how_many_new_family_invited'];


        // Dawah Prokashona
        $data->prokashona_books_in_pathagar = $all_dawah_prokashona['books_in_pathagar'];
        $data->prokashona_books_in_pathagar_increase = $all_dawah_prokashona['books_in_pathagar_increase'];

        $data->prokashona_unit_book_distribution_center = $all_dawah_prokashona['unit_book_distribution_center'];
        $data->prokashona_unit_book_distribution_center_increase = $all_dawah_prokashona['unit_book_distribution_center_increase'];

        $data->prokashona_unit_book_distribution = $all_dawah_prokashona['unit_book_distribution'];
        $data->prokashona_unit_book_distribution_increase = $all_dawah_prokashona['unit_book_distribution_increase'];

        $data->prokashona_soft_copy_book_distribution = $all_dawah_prokashona['soft_copy_book_distribution'];
        $data->prokashona_soft_copy_book_distribution_increase = $all_dawah_prokashona['soft_copy_book_distribution_increase'];

        $data->prokashona_dawat_link_distribution = $all_dawah_prokashona['dawat_link_distribution'];
        $data->prokashona_dawat_link_distribution_increase = $all_dawah_prokashona['dawat_link_distribution_increase'];

        $data->prokashona_sonar_bangla = $all_dawah_prokashona['sonar_bangla'];
        $data->prokashona_sonar_bangla_increase = $all_dawah_prokashona['sonar_bangla_increase'];

        $data->prokashona_songram = $all_dawah_prokashona['songram'];
        $data->prokashona_songram_increase = $all_dawah_prokashona['songram_increase'];

        $data->prokashona_prithibi = $all_dawah_prokashona['prithibi'];
        $data->prokashona_prithibi_increase = $all_dawah_prokashona['prithibi_increase'];

        // Kormosuci
        $data->kormosuci_unit_masik_sadaron_sova_total = $all_kormosuci['unit_masik_sadaron_sova_total'];
        $data->kormosuci_unit_masik_sadaron_sova_target = $all_kormosuci['unit_masik_sadaron_sova_target'];
        $data->kormosuci_unit_masik_sadaron_sova_uposthiti = $all_kormosuci['unit_masik_sadaron_sova_uposthiti'];

        $data->kormosuci_iftar_mahfil_personal_total = $all_kormosuci['iftar_mahfil_personal_total'];
        $data->kormosuci_iftar_mahfil_personal_target = $all_kormosuci['iftar_mahfil_personal_target'];
        $data->kormosuci_iftar_mahfil_personal_uposthiti = $all_kormosuci['iftar_mahfil_personal_uposthiti'];

        $data->kormosuci_iftar_mahfil_samostic_total = $all_kormosuci['iftar_mahfil_samostic_total'];
        $data->kormosuci_iftar_mahfil_samostic_target = $all_kormosuci['iftar_mahfil_samostic_target'];
        $data->kormosuci_iftar_mahfil_samostic_uposthiti = $all_kormosuci['iftar_mahfil_samostic_uposthiti'];

        $data->kormosuci_cha_chakra_total = $all_kormosuci['cha_chakra_total'];
        $data->kormosuci_cha_chakra_target = $all_kormosuci['cha_chakra_target'];
        $data->kormosuci_cha_chakra_uposthiti = $all_kormosuci['cha_chakra_uposthiti'];

        $data->kormosuci_samostic_khawa_total = $all_kormosuci['samostic_khawa_total'];
        $data->kormosuci_samostic_khawa_target = $all_kormosuci['samostic_khawa_target'];
        $data->kormosuci_samostic_khawa_uposthiti = $all_kormosuci['samostic_khawa_uposthiti'];

        $data->kormosuci_sikkha_sofor_total = $all_kormosuci['sikkha_sofor_total'];
        $data->kormosuci_sikkha_sofor_target = $all_kormosuci['sikkha_sofor_target'];
        $data->kormosuci_sikkha_sofor_uposthiti = $all_kormosuci['sikkha_sofor_uposthiti'];

        // Songothon1
        $data->songothon1_rokon_previous = $all_songothon1['rokon_previous'];
        $data->songothon1_rokon_present = $all_songothon1['rokon_present'];
        $data->songothon1_rokon_briddhi = $all_songothon1['rokon_briddhi'];
        $data->songothon1_rokon_gatti = $all_songothon1['rokon_gatti'];
        $data->songothon1_rokon_target = $all_songothon1['rokon_target'];
        $data->songothon1_worker_previous = $all_songothon1['worker_previous'];
        $data->songothon1_worker_present = $all_songothon1['worker_present'];
        $data->songothon1_worker_briddhi = $all_songothon1['worker_briddhi'];
        $data->songothon1_worker_gatti = $all_songothon1['worker_gatti'];
        $data->songothon1_worker_target = $all_songothon1['worker_target'];

        // Songothon2
        $data->songothon2_associate_member_previous = $all_songothon2['associate_member_previous'];
        $data->songothon2_associate_member_present = $all_songothon2['associate_member_present'];
        $data->songothon2_associate_member_briddhi = $all_songothon2['associate_member_briddhi'];
        $data->songothon2_associate_member_target = $all_songothon2['associate_member_target'];
        $data->songothon2_vinno_dormalombi_worker_previous = $all_songothon2['vinno_dormalombi_worker_previous'];
        $data->songothon2_vinno_dormalombi_worker_present = $all_songothon2['vinno_dormalombi_worker_present'];
        $data->songothon2_vinno_dormalombi_worker_briddhi = $all_songothon2['vinno_dormalombi_worker_briddhi'];
        $data->songothon2_vinno_dormalombi_worker_target = $all_songothon2['vinno_dormalombi_worker_target'];
        $data->songothon2_vinno_dormalombi_associate_member_previous = $all_songothon2['vinno_dormalombi_associate_member_previous'];
        $data->songothon2_vinno_dormalombi_associate_member_present = $all_songothon2['vinno_dormalombi_associate_member_present'];
        $data->songothon2_vinno_dormalombi_associate_member_briddhi = $all_songothon2['vinno_dormalombi_associate_member_briddhi'];
        $data->songothon2_vinno_dormalombi_associate_member_target = $all_songothon2['vinno_dormalombi_associate_member_target'];

        // Songothon9
        $data->songothon9_unit_kormi_boithok_total = $all_songothon9['unit_kormi_boithok_total'];
        $data->songothon9_unit_kormi_boithok_uposthiti = $all_songothon9['unit_kormi_boithok_uposthiti'];

        // Songothon5
        $data->songothon5_paribarik_unit_total = $all_songothon5['paribarik_unit_total'];
        $data->songothon5_paribarik_unit_increase = $all_songothon5['paribarik_unit_increase'];
        $data->songothon5_paribarik_unit_target = $all_songothon5['paribarik_unit_target'];

        // Songothon7
        $data->songothon7_upper_leader_sofor = $all_songothon7['upper_leader_sofor'];

        // Songothon8
        $data->songothon8_associate_member_total = $all_songothon8['associate_member_total'];
        $data->songothon8_associate_member_total_iyanot_amounts = $all_songothon8['associate_member_total_iyanot_amounts'];
        $data->songothon8_sudhi_total = $all_songothon8['sudhi_total'];
        $data->songothon8_sudi_total_iyanot_amounts = $all_songothon8['sudi_total_iyanot_amounts'];

        // Proshikkhon
        $data->proshikkhon_sohi_quran_onushilon = $all_proshikkhon['sohi_quran_onushilon'];
        $data->proshikkhon_sohi_quran_onushilon_target = $all_proshikkhon['sohi_quran_onushilon_target'];
        $data->proshikkhon_sohi_quran_onushilon_uposthiti = $all_proshikkhon['sohi_quran_onushilon_uposthiti'];

        $data->proshikkhon_masala_masayel = $all_proshikkhon['masala_masayel'];
        $data->proshikkhon_masala_masayel_target = $all_proshikkhon['masala_masayel_target'];
        $data->proshikkhon_masala_masayel_uposthiti = $all_proshikkhon['masala_masayel_uposthiti'];

        $data->proshikkhon_darsul_quran = $all_proshikkhon['darsul_quran'];
        $data->proshikkhon_darsul_quran_target = $all_proshikkhon['darsul_quran_target'];
        $data->proshikkhon_darsul_quran_uposthiti = $all_proshikkhon['darsul_quran_uposthiti'];

        $data->proshikkhon_darsul_hadis = $all_proshikkhon['darsul_hadis'];
        $data->proshikkhon_darsul_hadis_target = $all_proshikkhon['darsul_hadis_target'];
        $data->proshikkhon_darsul_hadis_uposthiti = $all_proshikkhon['darsul_hadis_uposthiti'];

        $data->proshikkhon_samostik_path = $all_proshikkhon['samostik_path'];
        $data->proshikkhon_samostik_path_target = $all_proshikkhon['samostik_path_target'];
        $data->proshikkhon_samostik_path_uposthiti = $all_proshikkhon['samostik_path_uposthiti'];

        $data->proshikkhon_bishoy_vittik_onushilon = $all_proshikkhon['bishoy_vittik_onushilon'];
        $data->proshikkhon_bishoy_vittik_onushilon_target = $all_proshikkhon['bishoy_vittik_onushilon_target'];
        $data->proshikkhon_bishoy_vittik_onushilon_uposthiti = $all_proshikkhon['bishoy_vittik_onushilon_uposthiti'];

        // Shomajsheba1
        $data->shomajsheba1_how_many_people_did = $all_shomajsheba1['how_many_people_did'];
        $data->shomajsheba1_service_received_total = $all_shomajsheba1['service_received_total'];

        // Shomajsheba2
        $data->shomajsheba2_shamajik_onusthane_ongshogrohon = $all_shomajsheba2['shamajik_onusthane_ongshogrohon'];
        $data->shomajsheba2_shamajik_onusthane_shohayota_prodan = $all_shomajsheba2['shamajik_onusthane_shohayota_prodan'];
        $data->shomajsheba2_shamajik_birodh_mimangsha = $all_shomajsheba2['shamajik_birodh_mimangsha'];
        $data->shomajsheba2_manobik_shohayota_prodan = $all_shomajsheba2['manobik_shohayota_prodan'];
        $data->shomajsheba2_korje_hasana_prodan = $all_shomajsheba2['korje_hasana_prodan'];
        $data->shomajsheba2_rogir_poricorja = $all_shomajsheba2['rogir_poricorja'];
        $data->shomajsheba2_medical_shohayota_prodan = $all_shomajsheba2['medical_shohayota_prodan'];
        $data->shomajsheba2_nobojatokke_gift_prodan = $all_shomajsheba2['nobojatokke_gift_prodan'];
        $data->shomajsheba2_voluntarily_blood_donation_kotojon = $all_shomajsheba2['voluntarily_blood_donation_kotojon'];
        $data->shomajsheba2_voluntarily_blood_donation_kotojonke = $all_shomajsheba2['voluntarily_blood_donation_kotojonke'];
        $data->shomajsheba2_matrikalin_sheba_prodan_kotojon = $all_shomajsheba2['matrikalin_sheba_prodan_kotojon'];
        $data->shomajsheba2_matrikalin_sheba_prodan_kotojonke = $all_shomajsheba2['matrikalin_sheba_prodan_kotojonke'];
        $data->shomajsheba2_mayeter_gosol = $all_shomajsheba2['mayeter_gosol'];
        $data->shomajsheba2_others = $all_shomajsheba2['others'];

        // Rastrio
        $data->rastrio_bishishto_bekti_jogajog = $all_rastrio['bishishto_bekti_jogajog'];

        // montobbo
        $data->all_montobbo = $all_montobbo['montobbo'];
        $data->save();
        if($data->save()){
            // dd($data->toArray());
            return response()->json([
                'status' => 'success',
                'data' => $data,
            ], 200);
        }




        // dd(
        //     $report_info_ids,
        //     $all_dawat1,
        //     $all_dawat2,
        //     $all_dawat3,
        //     $all_dawat4,
        //     $all_department1,
        //     $all_department4,
        //     $all_department5,
        //     $all_dawah_prokashona,
        //     $all_kormosuci,
        //     $all_songothon1,
        //     $all_songothon2,
        //     $all_songothon9,
        //     $all_songothon5,
        //     $all_songothon7,
        //     $all_songothon8,
        //     $all_proshikkhon,
        //     $all_shomajsheba1,
        //     $all_shomajsheba2,
        //     $all_rastrio,
        //     $all_montobbo,
        //     $all_income_category_wise,
        //     $total_income,
        //     $all_expense_category_wise,
        //     $total_expense,
        // );
        // return view('ward.ward_report_upload')->with([
        //     'month' => $month,
        //     'org_type' => $org_type,
        //     'unit_info' => $unit_info,
        //     'ward_info' => $ward_info,
        //     'thana_info' => $thana_info,
        //     'precedent' => $precedent,

        //     'dawat1' => $dawat1,
        //     'dawat2' => $dawat2,
        //     'dawat3' => $dawat3,
        //     'dawat4' => $dawat4,
        //     'department1' => $department1,
        //     'department4' => $department4,
        //     'department5' => $department5,
        //     'dawah_prokashona' => $dawah_prokashona,
        //     'kormosuci' => $kormosuci,
        //     'songothon1' => $songothon1,
        //     'songothon2' => $songothon2,
        //     'songothon9' => $songothon9,
        //     'songothon5' => $songothon5,
        //     'songothon7' => $songothon7,
        //     'songothon8' => $songothon8,
        //     'proshikkhon' => $proshikkhon,
        //     'shomajsheba1' => $shomajsheba1,
        //     'shomajsheba2' => $shomajsheba2,
        //     'rastrio' => $rastrio,
        //     'montobbo' => $montobbo,

        //     'all_income_category_wise' => $all_income_category_wise,
        //     'total_income' => $total_income,

        //     'all_expense_category_wise' => $all_expense_category_wise,
        //     'total_expense' => $total_expense,

        // ]);
    }
}
