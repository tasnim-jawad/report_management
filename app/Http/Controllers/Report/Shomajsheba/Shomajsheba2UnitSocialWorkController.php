<?php

namespace App\Http\Controllers\Report\Shomajsheba;

use App\Http\Controllers\Controller;
use App\Models\Report\Shomajsheba\Shomajsheba2UnitSocialWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Shomajsheba2UnitSocialWorkController extends Controller
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
        return common_get(Shomajsheba2UnitSocialWork::class);
    }

    public function store_single()
    {
        return common_store($this,Shomajsheba2UnitSocialWork::class, $this->report_info);
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

            $query = Shomajsheba2UnitSocialWork::where('status', $status)->orderBy($orderBy, $orderByType);
            // $query = User::latest()->get();

            if (request()->has('search_key')) {
                $key = request()->search_key;
                $query->where(function ($q) use ($key) {
                    return $q->where('id', '%' . $key . '%')
                    ->orWhere('shamajik_onusthane_ongshogrohon', '%' . $key . '%')
                    ->orWhere('shamajik_onusthane_shohayota_prodan', '%' . $key . '%')

                    ->orWhere('shamajik_birodh_mimangsha', '%' . $key . '%')

                    ->orWhere('manobik_shohayota_prodan', '%' . $key . '%')
                    ->orWhere('korje_hasana_prodan', '%' . $key . '%')

                    ->orWhere('rogir_poricorja', '%' . $key . '%')
                    ->orWhere('medical_shohayota_prodan', '%' . $key . '%')
                    ->orWhere('nobojatokke_gift_prodan', '%' . $key . '%')
                    ->orWhere('voluntarily_blood_donation_kotojon', '%' . $key . '%')
                    ->orWhere('voluntarily_blood_donation_kotojonke', '%' . $key . '%')
                    ->orWhere('matrikalin_sheba_prodan_kotojon', '%' . $key . '%')
                    ->orWhere('matrikalin_sheba_prodan_kotojonke', '%' . $key . '%')

                    ->orWhere('mayeter_gosol', '%' . $key . '%')
                    ->orWhere('others', '%' . $key . '%');

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
            $data = Shomajsheba2UnitSocialWork::where('id', $id)
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
                'shamajik_onusthane_ongshogrohon' => ['required'],
                'shamajik_onusthane_shohayota_prodan' => ['required'],
                'shamajik_birodh_mimangsha' => ['required'],
                'manobik_shohayota_prodan' => ['required'],
                'korje_hasana_prodan' => ['required'],
                'rogir_poricorja' => ['required'],
                'medical_shohayota_prodan' => ['required'],
                'nobojatokke_gift_prodan' => ['required'],
                'voluntarily_blood_donation_kotojon' => ['required'],
                'voluntarily_blood_donation_kotojonke' => ['required'],
                'matrikalin_sheba_prodan_kotojon' => ['required'],
                'matrikalin_sheba_prodan_kotojonke' => ['required'],
                'mayeter_gosol' => ['required'],
                'others' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = new Shomajsheba2UnitSocialWork();
            $data->shamajik_onusthane_ongshogrohon = request()->shamajik_onusthane_ongshogrohon;
            $data->shamajik_onusthane_shohayota_prodan = request()->shamajik_onusthane_shohayota_prodan;
            $data->shamajik_birodh_mimangsha = request()->shamajik_birodh_mimangsha;
            $data->manobik_shohayota_prodan = request()->manobik_shohayota_prodan;
            $data->korje_hasana_prodan = request()->korje_hasana_prodan;
            $data->rogir_poricorja = request()->rogir_poricorja;
            $data->medical_shohayota_prodan = request()->medical_shohayota_prodan;
            $data->nobojatokke_gift_prodan = request()->nobojatokke_gift_prodan;
            $data->voluntarily_blood_donation_kotojon = request()->voluntarily_blood_donation_kotojon;
            $data->voluntarily_blood_donation_kotojonke = request()->voluntarily_blood_donation_kotojonke;
            $data->matrikalin_sheba_prodan_kotojon = request()->matrikalin_sheba_prodan_kotojon;
            $data->matrikalin_sheba_prodan_kotojonke = request()->matrikalin_sheba_prodan_kotojonke;
            $data->mayeter_gosol = request()->mayeter_gosol;
            $data->others = request()->others;

            $data->creator = request()->creator;
            $data->status = request()->status;
            $data->save();

            return response()->json($data, 200);
        }

        public function update()
        {
            $data = Shomajsheba2UnitSocialWork::find(request()->id);
            if (!$data) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
                ], 422);
            }

            $validator = Validator::make(request()->all(), [
                'shamajik_onusthane_ongshogrohon' => ['required'],
                'shamajik_onusthane_shohayota_prodan' => ['required'],
                'shamajik_birodh_mimangsha' => ['required'],
                'manobik_shohayota_prodan' => ['required'],
                'korje_hasana_prodan' => ['required'],
                'rogir_poricorja' => ['required'],
                'medical_shohayota_prodan' => ['required'],
                'nobojatokke_gift_prodan' => ['required'],
                'voluntarily_blood_donation_kotojon' => ['required'],
                'voluntarily_blood_donation_kotojonke' => ['required'],
                'matrikalin_sheba_prodan_kotojon' => ['required'],
                'matrikalin_sheba_prodan_kotojonke' => ['required'],
                'mayeter_gosol' => ['required'],
                'others' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }


            $data->shamajik_onusthane_ongshogrohon = request()->shamajik_onusthane_ongshogrohon;
            $data->shamajik_onusthane_shohayota_prodan = request()->shamajik_onusthane_shohayota_prodan;
            $data->shamajik_birodh_mimangsha = request()->shamajik_birodh_mimangsha;
            $data->manobik_shohayota_prodan = request()->manobik_shohayota_prodan;
            $data->korje_hasana_prodan = request()->korje_hasana_prodan;
            $data->rogir_poricorja = request()->rogir_poricorja;
            $data->medical_shohayota_prodan = request()->medical_shohayota_prodan;
            $data->nobojatokke_gift_prodan = request()->nobojatokke_gift_prodan;
            $data->voluntarily_blood_donation_kotojon = request()->voluntarily_blood_donation_kotojon;
            $data->voluntarily_blood_donation_kotojonke = request()->voluntarily_blood_donation_kotojonke;
            $data->matrikalin_sheba_prodan_kotojon = request()->matrikalin_sheba_prodan_kotojon;
            $data->matrikalin_sheba_prodan_kotojonke = request()->matrikalin_sheba_prodan_kotojonke;
            $data->mayeter_gosol = request()->mayeter_gosol;
            $data->others = request()->others;

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
                'id' => ['required', 'exists:shomajsheba2_unit_social_works,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Shomajsheba2UnitSocialWork::find(request()->id);
            $data->status = 0;
            $data->save();

            return response()->json([
                'result' => 'deactivated',
            ], 200);
        }

        public function destroy()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:shomajsheba2_unit_social_works,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Shomajsheba2UnitSocialWork::find(request()->id);
            $data->delete();

            return response()->json([
                'result' => 'deleted',
            ], 200);
        }

        public function restore()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:shomajsheba2_unit_social_works,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Shomajsheba2UnitSocialWork::find(request()->id);
            $data->status = 1;
            $data->save();

            return response()->json([
                'result' => 'activated',
            ], 200);
        }
}
