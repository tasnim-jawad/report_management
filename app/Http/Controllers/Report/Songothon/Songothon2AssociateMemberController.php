<?php

namespace App\Http\Controllers\Report\Songothon;

use App\Http\Controllers\Controller;
use App\Models\Report\Songothon\Songothon2AssociateMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Songothon2AssociateMemberController extends Controller
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
        return common_get(Songothon2AssociateMember::class);
    }

    public function store_single()
    {
        return common_store($this, Songothon2AssociateMember::class, $this->report_info);
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

            $query = Songothon2AssociateMember::where('status', $status)->orderBy($orderBy, $orderByType);
            // $query = User::latest()->get();

            if (request()->has('search_key')) {
                $key = request()->search_key;
                $query->where(function ($q) use ($key) {
                    return $q->where('id', '%' . $key . '%')
                    ->orWhere('associate_member_previous', '%' . $key . '%')
                    ->orWhere('associate_member_present', '%' . $key . '%')
                    ->orWhere('associate_member_briddhi', '%' . $key . '%')
                    ->orWhere('associate_member_target', '%' . $key . '%')

                    ->orWhere('vinno_dormalombi_worker_previous', '%' . $key . '%')
                    ->orWhere('vinno_dormalombi_worker_present', '%' . $key . '%')
                    ->orWhere('vinno_dormalombi_worker_briddhi', '%' . $key . '%')
                    ->orWhere('vinno_dormalombi_worker_target', '%' . $key . '%')

                    ->orWhere('vinno_dormalombi_associate_member_previous', '%' . $key . '%')
                    ->orWhere('vinno_dormalombi_associate_member_present', '%' . $key . '%')
                    ->orWhere('vinno_dormalombi_associate_member_briddhi', '%' . $key . '%')
                    ->orWhere('vinno_dormalombi_associate_member_target', '%' . $key . '%');


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
            $data = Songothon2AssociateMember::where('id', $id)
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
                'associate_member_previous' => ['required'],
                'associate_member_present' => ['required'],
                'associate_member_briddhi' => ['required'],
                'associate_member_target' => ['required'],

                'vinno_dormalombi_worker_previous' => ['required'],
                'vinno_dormalombi_worker_present' => ['required'],
                'vinno_dormalombi_worker_briddhi' => ['required'],
                'vinno_dormalombi_worker_target' => ['required'],

                'vinno_dormalombi_associate_member_previous' => ['required'],
                'vinno_dormalombi_associate_member_present' => ['required'],
                'vinno_dormalombi_associate_member_briddhi' => ['required'],
                'vinno_dormalombi_associate_member_target' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = new Songothon2AssociateMember();
            $data->associate_member_previous = request()->associate_member_previous;
            $data->associate_member_present = request()->associate_member_present;
            $data->associate_member_briddhi = request()->associate_member_briddhi;
            $data->associate_member_target = request()->associate_member_target;
            $data->vinno_dormalombi_worker_previous = request()->vinno_dormalombi_worker_previous;
            $data->vinno_dormalombi_worker_present = request()->vinno_dormalombi_worker_present;
            $data->vinno_dormalombi_worker_briddhi = request()->vinno_dormalombi_worker_briddhi;
            $data->vinno_dormalombi_worker_target = request()->vinno_dormalombi_worker_target;
            $data->vinno_dormalombi_associate_member_previous = request()->vinno_dormalombi_associate_member_previous;
            $data->vinno_dormalombi_associate_member_present = request()->vinno_dormalombi_associate_member_present;
            $data->vinno_dormalombi_associate_member_briddhi = request()->vinno_dormalombi_associate_member_briddhi;
            $data->vinno_dormalombi_associate_member_target = request()->vinno_dormalombi_associate_member_target;

            $data->creator = request()->creator;
            $data->status = request()->status;
            $data->save();

            return response()->json($data, 200);
        }

        public function update()
        {
            $data = Songothon2AssociateMember::find(request()->id);
            if (!$data) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
                ], 422);
            }

            $validator = Validator::make(request()->all(), [
                'associate_member_previous' => ['required'],
                'associate_member_present' => ['required'],
                'associate_member_briddhi' => ['required'],
                'associate_member_target' => ['required'],

                'vinno_dormalombi_worker_previous' => ['required'],
                'vinno_dormalombi_worker_present' => ['required'],
                'vinno_dormalombi_worker_briddhi' => ['required'],
                'vinno_dormalombi_worker_target' => ['required'],

                'vinno_dormalombi_associate_member_previous' => ['required'],
                'vinno_dormalombi_associate_member_present' => ['required'],
                'vinno_dormalombi_associate_member_briddhi' => ['required'],
                'vinno_dormalombi_associate_member_target' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }


            $data->associate_member_previous = request()->associate_member_previous;
            $data->associate_member_present = request()->associate_member_present;
            $data->associate_member_briddhi = request()->associate_member_briddhi;
            $data->associate_member_target = request()->associate_member_target;
            $data->vinno_dormalombi_worker_previous = request()->vinno_dormalombi_worker_previous;
            $data->vinno_dormalombi_worker_present = request()->vinno_dormalombi_worker_present;
            $data->vinno_dormalombi_worker_briddhi = request()->vinno_dormalombi_worker_briddhi;
            $data->vinno_dormalombi_worker_target = request()->vinno_dormalombi_worker_target;
            $data->vinno_dormalombi_associate_member_previous = request()->vinno_dormalombi_associate_member_previous;
            $data->vinno_dormalombi_associate_member_present = request()->vinno_dormalombi_associate_member_present;
            $data->vinno_dormalombi_associate_member_briddhi = request()->vinno_dormalombi_associate_member_briddhi;
            $data->vinno_dormalombi_associate_member_target = request()->vinno_dormalombi_associate_member_target;

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
                'id' => ['required', 'exists:songothon2_associate_members,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Songothon2AssociateMember::find(request()->id);
            $data->status = 0;
            $data->save();

            return response()->json([
                'result' => 'deactivated',
            ], 200);
        }

        public function destroy()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:songothon2_associate_members,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Songothon2AssociateMember::find(request()->id);
            $data->delete();

            return response()->json([
                'result' => 'deleted',
            ], 200);
        }

        public function restore()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:songothon2_associate_members,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Songothon2AssociateMember::find(request()->id);
            $data->status = 1;
            $data->save();

            return response()->json([
                'result' => 'activated',
            ], 200);
        }
}
