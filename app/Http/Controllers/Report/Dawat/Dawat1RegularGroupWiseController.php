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
    protected $report_info = false;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->init();
            return $next($request);
        });
    }

    public function init()
    {
        $this->report_info = check_and_get_unit_info(auth()->user()->id);
    }

    public function get_data()
    {
        return common_get(Dawat1RegularGroupWise::class);
    }

    public function store_single()
    {
        return common_store($this, Dawat1RegularGroupWise::class, $this->report_info);
    }

    // public function get_data()
    // {
    //     $responsibilities = auth_user_unit_responsibilities_info(auth()->user()->id);
    //     $report_info = unit_report_header_info($responsibilities, null, request()->month);
    //     if($report_info ){
    //         $data = Dawat1RegularGroupWise::where('report_info_id', $report_info->id)->first();
    //         if ($data) {
    //             return $data;
    //         }
    //     }
    //     return [];
    // }

    // public function store_single()
    // {
    //     $this->validate(request(), [
    //         'month' => ['required']
    //     ], [
    //         "month.required" => ["মাস সিলেক্ট করুন"]
    //     ]);
    //     if ($this->report_info) {
    //         $col_name = request()->name;
    //         $col_value = request()->value;

    //         $data = Dawat1RegularGroupWise::where('report_info_id', $this->report_info->id)
    //             // ->where('creator', auth()->user()->id)
    //             ->first();

    //         if ($data) {
    //             $data->report_info_id = $this->report_info->id;
    //             $data->$col_name = $col_value;
    //             $data->creator = auth()->user()->id;
    //             $data->save();
    //         } else {
    //             $data = new Dawat1RegularGroupWise();
    //             $data->report_info_id = $this->report_info->id;
    //             $data->$col_name = $col_value;
    //             $data->creator = auth()->user()->id;
    //             $data->save();
    //         }

    //         return response()->json([
    //             "data" => $data,
    //             "message" => "data uploaded",
    //         ], 201);
    //     }

    //     return response()->json([
    //         "message" => "permission denied.",
    //         "errors" => [
    //             "message" => ["report edit permission is closed."]
    //         ]

    //     ], 403);
    // }

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
                return $q->where('id', "LIKE", '%' . $key . '%')
                    ->orWhere('how_many_groups_are_out', "LIKE", '%' . $key . '%')
                    ->orWhere('number_of_participants', "LIKE", '%' . $key . '%')
                    ->orWhere('how_many_have_been_invited', "LIKE", '%' . $key . '%')
                    ->orWhere('how_many_associate_members_created', "LIKE", '%' . $key . '%');
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
