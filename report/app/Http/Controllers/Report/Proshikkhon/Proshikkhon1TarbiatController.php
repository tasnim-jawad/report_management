<?php

namespace App\Http\Controllers\Report\Proshikkhon;

use App\Http\Controllers\Controller;
use App\Models\Report\Proshikkhon\Proshikkhon1Tarbiat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Proshikkhon1TarbiatController extends Controller
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
        return common_get(Proshikkhon1Tarbiat::class);
    }

    public function store_single()
    {
        return common_store($this, Proshikkhon1Tarbiat::class, $this->report_info);
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

            $query = Proshikkhon1Tarbiat::where('status', $status)->orderBy($orderBy, $orderByType);
            // $query = User::latest()->get();

            if (request()->has('search_key')) {
                $key = request()->search_key;
                $query->where(function ($q) use ($key) {
                    return $q->where('id', '%' . $key . '%')
                    ->orWhere('sohi_quran_onushilon', '%' . $key . '%')
                    ->orWhere('sohi_quran_onushilon_target', '%' . $key . '%')
                    ->orWhere('sohi_quran_onushilon_uposthiti', '%' . $key . '%')

                    ->orWhere('masala_masayel', '%' . $key . '%')
                    ->orWhere('masala_masayel_target', '%' . $key . '%')
                    ->orWhere('masala_masayel_uposthiti', '%' . $key . '%')

                    ->orWhere('darsul_quran', '%' . $key . '%')
                    ->orWhere('darsul_quran_target', '%' . $key . '%')
                    ->orWhere('darsul_quran_uposthiti', '%' . $key . '%')

                    ->orWhere('darsul_hadis', '%' . $key . '%')
                    ->orWhere('darsul_hadis_target', '%' . $key . '%')
                    ->orWhere('darsul_hadis_uposthiti', '%' . $key . '%')

                    ->orWhere('samostik_path', '%' . $key . '%')
                    ->orWhere('samostik_path_target', '%' . $key . '%')
                    ->orWhere('samostik_path_uposthiti', '%' . $key . '%')

                    ->orWhere('bishoy_vittik_onushilon', '%' . $key . '%')
                    ->orWhere('bishoy_vittik_onushilon_target', '%' . $key . '%')
                    ->orWhere('bishoy_vittik_onushilon_uposthiti', '%' . $key . '%');

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
            $data = Proshikkhon1Tarbiat::where('id', $id)
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
                'sohi_quran_onushilon' => ['required'],
                'sohi_quran_onushilon_target' => ['required'],
                'sohi_quran_onushilon_uposthiti' => ['required'],
                'masala_masayel' => ['required'],
                'masala_masayel_target' => ['required'],
                'masala_masayel_uposthiti' => ['required'],
                'darsul_quran' => ['required'],
                'darsul_quran_target' => ['required'],
                'darsul_quran_uposthiti' => ['required'],
                'darsul_hadis' => ['required'],
                'darsul_hadis_target' => ['required'],
                'darsul_hadis_uposthiti' => ['required'],
                'samostik_path' => ['required'],
                'samostik_path_target' => ['required'],
                'samostik_path_uposthiti' => ['required'],
                'bishoy_vittik_onushilon' => ['required'],
                'bishoy_vittik_onushilon_target' => ['required'],
                'bishoy_vittik_onushilon_uposthiti' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = new Proshikkhon1Tarbiat();
            $data->tarbiati_boithok_total = request()->tarbiati_boithok_total;
            $data->tarbiati_boithok_target = request()->tarbiati_boithok_target;
            $data->tarbiati_boithok_uposthiti = request()->tarbiati_boithok_uposthiti;

            $data->creator = request()->creator;
            $data->status = request()->status;
            $data->save();

            return response()->json($data, 200);
        }

        public function update()
        {
            $data = Proshikkhon1Tarbiat::find(request()->id);
            if (!$data) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
                ], 422);
            }

            $validator = Validator::make(request()->all(), [
                'sohi_quran_onushilon' => ['required'],
                'sohi_quran_onushilon_target' => ['required'],
                'sohi_quran_onushilon_uposthiti' => ['required'],
                'masala_masayel' => ['required'],
                'masala_masayel_target' => ['required'],
                'masala_masayel_uposthiti' => ['required'],
                'darsul_quran' => ['required'],
                'darsul_quran_target' => ['required'],
                'darsul_quran_uposthiti' => ['required'],
                'darsul_hadis' => ['required'],
                'darsul_hadis_target' => ['required'],
                'darsul_hadis_uposthiti' => ['required'],
                'samostik_path' => ['required'],
                'samostik_path_target' => ['required'],
                'samostik_path_uposthiti' => ['required'],
                'bishoy_vittik_onushilon' => ['required'],
                'bishoy_vittik_onushilon_target' => ['required'],
                'bishoy_vittik_onushilon_uposthiti' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }


            $data->tarbiati_boithok_total = request()->tarbiati_boithok_total;
            $data->tarbiati_boithok_target = request()->tarbiati_boithok_target;
            $data->tarbiati_boithok_uposthiti = request()->tarbiati_boithok_uposthiti;

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
                'id' => ['required', 'exists:proshikkhon1_tarbiats,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Proshikkhon1Tarbiat::find(request()->id);
            $data->status = 0;
            $data->save();

            return response()->json([
                'result' => 'deactivated',
            ], 200);
        }

        public function destroy()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:proshikkhon1_tarbiats,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Proshikkhon1Tarbiat::find(request()->id);
            $data->delete();

            return response()->json([
                'result' => 'deleted',
            ], 200);
        }

        public function restore()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:proshikkhon1_tarbiats,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Proshikkhon1Tarbiat::find(request()->id);
            $data->status = 1;
            $data->save();

            return response()->json([
                'result' => 'activated',
            ], 200);
        }
}
