<?php

namespace App\Http\Controllers\Report\Rastrio;

use App\Http\Controllers\Controller;
use App\Models\Report\Rastrio\Rastrio1BishishtoBekti;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Rastrio1BishishtoBektiController extends Controller
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
        return common_get(Rastrio1BishishtoBekti::class);
    }

    public function store_single()
    {
        return common_store($this,Rastrio1BishishtoBekti::class, $this->report_info);
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

            $query = Rastrio1BishishtoBekti::where('status', $status)->orderBy($orderBy, $orderByType);
            // $query = User::latest()->get();

            if (request()->has('search_key')) {
                $key = request()->search_key;
                $query->where(function ($q) use ($key) {
                    return $q->where('id', '%' . $key . '%')
                    ->orWhere('bishishto_bekti_jogajog', '%' . $key . '%');

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
            $data = Rastrio1BishishtoBekti::where('id', $id)
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
                'bishishto_bekti_jogajog' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = new Rastrio1BishishtoBekti();
            $data->bishishto_bekti_jogajog = request()->bishishto_bekti_jogajog;

            $data->creator = request()->creator;
            $data->status = request()->status;
            $data->save();

            return response()->json($data, 200);
        }

        public function update()
        {
            $data = Rastrio1BishishtoBekti::find(request()->id);
            if (!$data) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
                ], 422);
            }

            $validator = Validator::make(request()->all(), [
                'bishishto_bekti_jogajog' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }


            $data->bishishto_bekti_jogajog = request()->bishishto_bekti_jogajog;

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
                'id' => ['required', 'exists:rastrio1_bishishto_bektis,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Rastrio1BishishtoBekti::find(request()->id);
            $data->status = 0;
            $data->save();

            return response()->json([
                'result' => 'deactivated',
            ], 200);
        }

        public function destroy()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:rastrio1_bishishto_bektis,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Rastrio1BishishtoBekti::find(request()->id);
            $data->delete();

            return response()->json([
                'result' => 'deleted',
            ], 200);
        }

        public function restore()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:rastrio1_bishishto_bektis,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Rastrio1BishishtoBekti::find(request()->id);
            $data->status = 1;
            $data->save();

            return response()->json([
                'result' => 'activated',
            ], 200);
        }
}
