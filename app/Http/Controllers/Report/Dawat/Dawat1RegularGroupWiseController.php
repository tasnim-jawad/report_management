<?php

namespace App\Http\Controllers\Report\Dawat;

use App\Http\Controllers\Controller;
use App\Models\Organization\OrgType;
use App\Models\Organization\OrgUnit;
use App\Models\Organization\OrgUnitResponsible;
use App\Models\Organization\Responsibility;
use App\Models\Report\Dawat\Dawat1RegularGroupWise;
use App\Models\Report\ReportInfo;
use App\Models\Report\ReportManagementControl;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class Dawat1RegularGroupWiseController extends Controller
{
    public function all()
    {
        $paginate = (int) request()->paginate ?? 10;
        $orderBy = request()->orderBy ?? 'id';
        $orderByType = request()->orderByType ?? 'ASC';

        $status = 1;
        if (request()->has('status')) {
            $status = request()->status;
        }
        // dd($status);

        $query = Dawat1RegularGroupWise::where('status', $status)->orderBy($orderBy, $orderByType);
        // $query = User::latest()->get();

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', '%' . $key . '%')
                ->orWhere('how_many_groups_are_out', '%' . $key . '%')
                ->orWhere('number_of_participants', '%' . $key . '%')
                ->orWhere('how_many_have_been_invited', '%' . $key . '%')
                ->orWhere('how_many_associate_members_created', '%' . $key . '%');
            });
        }

        $datas = $query->paginate($paginate);
        return response()->json($datas);
    }

    public function show($id)
    {

        $select = ["*"];
        if (request()->has('select_all') && request()->select_all) {
            $select = "*";
        }
        $data = Dawat1RegularGroupWise::where('id', $id)
            ->select($select)
            ->first();
        if ($data) {
            return response()->json($data, 200);
        } else {
            return response()->json([
                'err_message' => 'data not found',
                'errors' => [
                    'user' => [],
                ],
            ], 404);
        }
    }
    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'how_many_groups_are_out' => ['required'],
            'number_of_participants' => ['required'],
            'how_many_have_been_invited' => ['required'],
            'how_many_associate_members_created' => ['required'],
            'creator' => ['required'],
            'status' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new Dawat1RegularGroupWise();
        $data->how_many_groups_are_out = request()->how_many_groups_are_out;
        $data->number_of_participants = request()->number_of_participants;
        $data->how_many_have_been_invited = request()->how_many_have_been_invited;
        $data->how_many_associate_members_created = request()->how_many_associate_members_created;
        $data->creator = request()->creator;
        $data->status = request()->status;
        $data->save();

        return response()->json($data, 200);
    }
    public function store_single()
    {
        // $user = User::where('id',auth()->user()->id)->first();
        // $orgUnitResponsible = $user->org_unit_responsible()->first();
        // $orgUnit = $orgUnitResponsible->org_unit;
        // $orgType = $orgUnit->org_type;
        // $responsibility = $orgUnitResponsible->responsibility;

        $permission = ReportManagementControl::whereYear('month_year',Carbon::now()->year)
        ->whereMonth('month_year',Carbon::now()->month)
        ->where('is_active',1)
        ->where('report_type','unit')->first();

        if($permission){
            $org_unit_responsible = OrgUnitResponsible::where('user_id',auth()->user()->id)->first();
            $org_unit = OrgUnit::where('id',$org_unit_responsible->org_unit_id)->first();
            $org_type = OrgType::where('id',$org_unit->org_type_id)->first();
            $resposibilities = Responsibility::where('id',$org_unit_responsible->responsibility_id)->first();

            $check_info = ReportInfo::whereYear('month_year',Carbon::now()->year)
            ->whereMonth('month_year',Carbon::now()->month)
            ->where('responsibility_id', $org_unit_responsible->responsibility_id)
            ->where('org_type_id',$org_unit->org_type_id)
            ->where('creator',auth()->user()->id)->first();

            if($check_info){

            }else{
                // dd('info is not present');
                ReportInfo::create([
                    'org_type' => $org_type->title,
                    'org_type_id' => $org_unit->org_type_id,
                    'responsibility_id' => $org_unit_responsible->responsibility_id,
                    'responsibility_name' => $resposibilities->title,
                    'month_year' => $permission->month_year,
                    'report_type' =>  $permission->report_type,
                    'creator' => auth()->user()->id,
                    'status' => 1,
                ]);
                return response()->json([
                    'message' => 'Report info created successfully'
                ], 200);
            }


        }

        // return response()->json($data, 200);
        return response()->json([
            'message' => 'Report info created successfully'
        ], 200);
    }

    public function update()
    {
        $data = Dawat1RegularGroupWise::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'how_many_groups_are_out' => ['required'],
            'number_of_participants' => ['required'],
            'how_many_have_been_invited' => ['required'],
            'how_many_associate_members_created' => ['required'],
            'creator' => ['required'],
            'status' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data->how_many_groups_are_out = request()->how_many_groups_are_out;
        $data->number_of_participants = request()->number_of_participants;
        $data->how_many_have_been_invited = request()->how_many_have_been_invited;
        $data->how_many_associate_members_created = request()->how_many_associate_members_created;
        $data->creator = request()->creator;
        $data->status = request()->status;
        $data->save();

        if (request()->hasFile('image')) {
            //
        }
        return response()->json($data, 200);
    }

    public function soft_delete()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:dawat1_regular_group_wises,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Dawat1RegularGroupWise::find(request()->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:dawat1_regular_group_wises,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Dawat1RegularGroupWise::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:dawat1_regular_group_wises,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Dawat1RegularGroupWise::find(request()->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }
}
