<?php

namespace App\Http\Controllers\Report\Ward\Dawat;

use App\Http\Controllers\Controller;
use App\Models\Report\Ward\Dawat\WardDawat2PersonalAndTarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WardDawat2PersonalAndTargetController extends Controller
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
        $this->report_info = check_and_get_ward_info(auth()->user()->id);
    }

    public function get_data()
    {
        return ward_common_get(WardDawat2PersonalAndTarget::class);
    }

    public function store_single()
    {
        return ward_common_store($this, WardDawat2PersonalAndTarget::class, $this->report_info);
    }

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

        $query = WardDawat2PersonalAndTarget::where('status', $status)->orderBy($orderBy, $orderByType);
        // $query = User::latest()->get();

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', '%' . $key . '%')
                ->orWhere('total_rokon', '%' . $key . '%')
                ->orWhere('total_worker', '%' . $key . '%')
                ->orWhere('how_many_were_give_dawat_rokon', '%' . $key . '%')
                ->orWhere('how_many_were_give_dawat_worker', '%' . $key . '%')
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
        $data = WardDawat2PersonalAndTarget::where('id', $id)
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
            'total_rokon' => ['required'],
            'total_worker' => ['required'],
            'how_many_were_give_dawat_rokon' => ['required'],
            'how_many_were_give_dawat_worker' => ['required'],
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

        $data = new WardDawat2PersonalAndTarget();
        $data->total_rokon = request()->total_rokon;
        $data->total_worker = request()->total_worker;
        $data->how_many_were_give_dawat_rokon = request()->how_many_were_give_dawat_rokon;
        $data->how_many_were_give_dawat_worker = request()->how_many_were_give_dawat_worker;
        $data->how_many_have_been_invited = request()->how_many_have_been_invited;
        $data->how_many_associate_members_created = request()->how_many_associate_members_created;
        $data->creator = request()->creator;
        $data->status = request()->status;
        $data->save();

        return response()->json($data, 200);
    }

    public function update()
    {
        $data = WardDawat2PersonalAndTarget::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'total_rokon' => ['required'],
            'total_worker' => ['required'],
            'how_many_were_give_dawat_rokon' => ['required'],
            'how_many_were_give_dawat_worker' => ['required'],
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

        $data->total_rokon = request()->total_rokon;
        $data->total_worker = request()->total_worker;
        $data->how_many_were_give_dawat_rokon = request()->how_many_were_give_dawat_rokon;
        $data->how_many_were_give_dawat_worker = request()->how_many_were_give_dawat_worker;
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
            'id' => ['required', 'exists:ward_dawat2_personal_and_targets,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = WardDawat2PersonalAndTarget::find(request()->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:ward_dawat2_personal_and_targets,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = WardDawat2PersonalAndTarget::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:ward_dawat2_personal_and_targets,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = WardDawat2PersonalAndTarget::find(request()->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }
}
