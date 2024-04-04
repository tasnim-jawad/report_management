<?php

namespace App\Http\Controllers\Report\Kormosuci;

use App\Http\Controllers\Controller;
use App\Models\Report\Kormosuci\KormosuciBastobayon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KormosuciBastobayonController extends Controller
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

            $query = KormosuciBastobayon::where('status', $status)->orderBy($orderBy, $orderByType);
            // $query = User::latest()->get();

            if (request()->has('search_key')) {
                $key = request()->search_key;
                $query->where(function ($q) use ($key) {
                    return $q->where('id', '%' . $key . '%')
                    ->orWhere('unit_masik_sadaron_sova_total', '%' . $key . '%')
                    ->orWhere('unit_masik_sadaron_sova_target', '%' . $key . '%')
                    ->orWhere('unit_masik_sadaron_sova_uposthiti', '%' . $key . '%')

                    // ->orWhere('dawati_sova_total', '%' . $key . '%')
                    // ->orWhere('dawati_sova_target', '%' . $key . '%')

                    // ->orWhere('alochona_sova_total', '%' . $key . '%')
                    // ->orWhere('alochona_sova_target', '%' . $key . '%')

                    // ->orWhere('sudhi_somabesh_total', '%' . $key . '%')
                    // ->orWhere('sudhi_somabesh_target', '%' . $key . '%')

                    // ->orWhere('siratunnabi_mahfil_total', '%' . $key . '%')
                    // ->orWhere('siratunnabi_mahfil_target', '%' . $key . '%')

                    // ->orWhere('eid_reunion_total', '%' . $key . '%')
                    // ->orWhere('eid_reunion_target', '%' . $key . '%')

                    // ->orWhere('dars_total', '%' . $key . '%')
                    // ->orWhere('dars_target', '%' . $key . '%')

                    // ->orWhere('tafsir_total', '%' . $key . '%')
                    // ->orWhere('tafsir_target', '%' . $key . '%')

                    // ->orWhere('dawati_jonosova_total', '%' . $key . '%')
                    // ->orWhere('dawati_jonosova_target', '%' . $key . '%')

                    ->orWhere('iftar_mahfil_personal_total', '%' . $key . '%')
                    ->orWhere('iftar_mahfil_personal_target', '%' . $key . '%')
                    ->orWhere('iftar_mahfil_personal_uposthiti', '%' . $key . '%')

                    ->orWhere('iftar_mahfil_samostic_total', '%' . $key . '%')
                    ->orWhere('iftar_mahfil_samostic_target', '%' . $key . '%')
                    ->orWhere('iftar_mahfil_samostic_uposthiti', '%' . $key . '%')

                    ->orWhere('cha_chakra_total', '%' . $key . '%')
                    ->orWhere('cha_chakra_target', '%' . $key . '%')
                    ->orWhere('cha_chakra_uposthiti', '%' . $key . '%')

                    ->orWhere('samostic_khawa_total', '%' . $key . '%')
                    ->orWhere('samostic_khawa_target', '%' . $key . '%')
                    ->orWhere('samostic_khawa_uposthiti', '%' . $key . '%')

                    ->orWhere('sikkha_sofor_total', '%' . $key . '%')
                    ->orWhere('sikkha_sofor_target', '%' . $key . '%')
                    ->orWhere('sikkha_sofo_uposthiti', '%' . $key . '%');

                    // ->orWhere('kirat_protijogita_total', '%' . $key . '%')
                    // ->orWhere('kirat_protijogita_target', '%' . $key . '%')

                    // ->orWhere('hamd_nat_protijogita_total', '%' . $key . '%')
                    // ->orWhere('hamd_nat_protijogita_target', '%' . $key . '%')

                    // ->orWhere('others_total', '%' . $key . '%')
                    // ->orWhere('others_target', '%' . $key . '%');

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
            $data = KormosuciBastobayon::where('id', $id)
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
                'unit_masik_sadaron_sova_total' => ['required'],
                'unit_masik_sadaron_sova_target' => ['required'],
                'unit_masik_sadaron_sova_uposthiti' => ['required'],

                // 'dawati_sova_total' => ['required'],
                // 'dawati_sova_target' => ['required'],
                // 'alochona_sova_total' => ['required'],
                // 'alochona_sova_target' => ['required'],
                // 'sudhi_somabesh_total' => ['required'],
                // 'sudhi_somabesh_target' => ['required'],
                // 'siratunnabi_mahfil_total' => ['required'],
                // 'siratunnabi_mahfil_target' => ['required'],
                // 'eid_reunion_total' => ['required'],
                // 'eid_reunion_target' => ['required'],
                // 'dars_total' => ['required'],
                // 'dars_target' => ['required'],
                // 'tafsir_total' => ['required'],
                // 'tafsir_target' => ['required'],
                // 'dawati_jonosova_total' => ['required'],
                // 'dawati_jonosova_target' => ['required'],
                'iftar_mahfil_personal_total' => ['required'],
                'iftar_mahfil_personal_target' => ['required'],
                'iftar_mahfil_personal_uposthiti' => ['required'],

                'iftar_mahfil_samostic_total' => ['required'],
                'iftar_mahfil_samostic_target' => ['required'],
                'iftar_mahfil_samostic_uposthiti' => ['required'],

                'cha_chakra_total' => ['required'],
                'cha_chakra_target' => ['required'],
                'cha_chakra_uposthiti' => ['required'],

                'samostic_khawa_total' => ['required'],
                'samostic_khawa_target' => ['required'],
                'samostic_khawa_uposthiti' => ['required'],

                'sikkha_sofor_total' => ['required'],
                'sikkha_sofor_target' => ['required'],
                'sikkha_sofor_uposthiti' => ['required'],

                // 'kirat_protijogita_total' => ['required'],
                // 'kirat_protijogita_target' => ['required'],

                // 'hamd_nat_protijogita_total' => ['required'],
                // 'hamd_nat_protijogita_target' => ['required'],

                // 'others_total' => ['required'],
                // 'others_target' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = new KormosuciBastobayon();
            $data->unit_masik_sadaron_sova_total = request()->unit_masik_sadaron_sova_total;
            $data->unit_masik_sadaron_sova_target = request()->unit_masik_sadaron_sova_target;
            $data->unit_masik_sadaron_sova_uposthiti = request()->unit_masik_sadaron_sova_uposthiti;
            // $data->dawati_sova_total = request()->dawati_sova_total;
            // $data->dawati_sova_target = request()->dawati_sova_target;
            // $data->alochona_sova_total = request()->alochona_sova_total;
            // $data->alochona_sova_target = request()->alochona_sova_target;
            // $data->sudhi_somabesh_total = request()->sudhi_somabesh_total;
            // $data->sudhi_somabesh_target = request()->sudhi_somabesh_target;
            // $data->siratunnabi_mahfil_total = request()->siratunnabi_mahfil_total;
            // $data->siratunnabi_mahfil_target = request()->siratunnabi_mahfil_target;
            // $data->eid_reunion_total = request()->eid_reunion_total;
            // $data->eid_reunion_target = request()->eid_reunion_target;
            // $data->dars_total = request()->dars_total;
            // $data->dars_target = request()->dars_target;
            // $data->tafsir_total = request()->tafsir_total;
            // $data->tafsir_target = request()->tafsir_target;
            // $data->dawati_jonosova_total = request()->dawati_jonosova_total;
            // $data->dawati_jonosova_target = request()->dawati_jonosova_target;
            $data->iftar_mahfil_personal_total = request()->iftar_mahfil_personal_total;
            $data->iftar_mahfil_personal_target = request()->iftar_mahfil_personal_target;
            $data->iftar_mahfil_personal_uposthiti = request()->iftar_mahfil_personal_uposthiti;

            $data->iftar_mahfil_samostic_total = request()->iftar_mahfil_samostic_total;
            $data->iftar_mahfil_samostic_target = request()->iftar_mahfil_samostic_target;
            $data->iftar_mahfil_samostic_uposthiti = request()->iftar_mahfil_samostic_uposthiti;

            $data->cha_chakra_total = request()->cha_chakra_total;
            $data->cha_chakra_target = request()->cha_chakra_target;
            $data->cha_chakra_uposthiti = request()->cha_chakra_uposthiti;

            $data->samostic_khawa_total = request()->samostic_khawa_total;
            $data->samostic_khawa_target = request()->samostic_khawa_target;
            $data->samostic_khawa_uposthiti = request()->samostic_khawa_uposthiti;

            $data->sikkha_sofor_total = request()->sikkha_sofor_total;
            $data->sikkha_sofor_target = request()->sikkha_sofor_target;
            $data->sikkha_sofor_uposthiti = request()->sikkha_sofor_uposthiti;

            // $data->kirat_protijogita_total = request()->kirat_protijogita_total;
            // $data->kirat_protijogita_target = request()->kirat_protijogita_target;

            // $data->hamd_nat_protijogita_total = request()->hamd_nat_protijogita_total;
            // $data->hamd_nat_protijogita_target = request()->hamd_nat_protijogita_target;

            // $data->others_total = request()->others_total;
            // $data->others_target = request()->others_target;

            $data->creator = request()->creator;
            $data->status = request()->status;
            $data->save();

            return response()->json($data, 200);
        }

        public function update()
        {
            $data = KormosuciBastobayon::find(request()->id);
            if (!$data) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
                ], 422);
            }

            $validator = Validator::make(request()->all(), [
                'unit_masik_sadaron_sova_total' => ['required'],
                'unit_masik_sadaron_sova_target' => ['required'],
                'unit_masik_sadaron_sova_uposthiti' => ['required'],

                // 'dawati_sova_total' => ['required'],
                // 'dawati_sova_target' => ['required'],
                // 'alochona_sova_total' => ['required'],
                // 'alochona_sova_target' => ['required'],
                // 'sudhi_somabesh_total' => ['required'],
                // 'sudhi_somabesh_target' => ['required'],
                // 'siratunnabi_mahfil_total' => ['required'],
                // 'siratunnabi_mahfil_target' => ['required'],
                // 'eid_reunion_total' => ['required'],
                // 'eid_reunion_target' => ['required'],
                // 'dars_total' => ['required'],
                // 'dars_target' => ['required'],
                // 'tafsir_total' => ['required'],
                // 'tafsir_target' => ['required'],
                // 'dawati_jonosova_total' => ['required'],
                // 'dawati_jonosova_target' => ['required'],
                'iftar_mahfil_personal_total' => ['required'],
                'iftar_mahfil_personal_target' => ['required'],
                'iftar_mahfil_personal_uposthiti' => ['required'],

                'iftar_mahfil_samostic_total' => ['required'],
                'iftar_mahfil_samostic_target' => ['required'],
                'iftar_mahfil_samostic_uposthiti' => ['required'],

                'cha_chakra_total' => ['required'],
                'cha_chakra_target' => ['required'],
                'cha_chakra_uposthiti' => ['required'],

                'samostic_khawa_total' => ['required'],
                'samostic_khawa_target' => ['required'],
                'samostic_khawa_uposthiti' => ['required'],

                'sikkha_sofor_total' => ['required'],
                'sikkha_sofor_target' => ['required'],
                'sikkha_sofor_uposthiti' => ['required'],

                // 'kirat_protijogita_total' => ['required'],
                // 'kirat_protijogita_target' => ['required'],

                // 'hamd_nat_protijogita_total' => ['required'],
                // 'hamd_nat_protijogita_target' => ['required'],

                // 'others_total' => ['required'],
                // 'others_target' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }


            $data->unit_masik_sadaron_sova_total = request()->unit_masik_sadaron_sova_total;
            $data->unit_masik_sadaron_sova_target = request()->unit_masik_sadaron_sova_target;
            $data->unit_masik_sadaron_sova_uposthiti = request()->unit_masik_sadaron_sova_uposthiti;
            // $data->dawati_sova_total = request()->dawati_sova_total;
            // $data->dawati_sova_target = request()->dawati_sova_target;
            // $data->alochona_sova_total = request()->alochona_sova_total;
            // $data->alochona_sova_target = request()->alochona_sova_target;
            // $data->sudhi_somabesh_total = request()->sudhi_somabesh_total;
            // $data->sudhi_somabesh_target = request()->sudhi_somabesh_target;
            // $data->siratunnabi_mahfil_total = request()->siratunnabi_mahfil_total;
            // $data->siratunnabi_mahfil_target = request()->siratunnabi_mahfil_target;
            // $data->eid_reunion_total = request()->eid_reunion_total;
            // $data->eid_reunion_target = request()->eid_reunion_target;
            // $data->dars_total = request()->dars_total;
            // $data->dars_target = request()->dars_target;
            // $data->tafsir_total = request()->tafsir_total;
            // $data->tafsir_target = request()->tafsir_target;
            // $data->dawati_jonosova_total = request()->dawati_jonosova_total;
            // $data->dawati_jonosova_target = request()->dawati_jonosova_target;
            $data->iftar_mahfil_personal_total = request()->iftar_mahfil_personal_total;
            $data->iftar_mahfil_personal_target = request()->iftar_mahfil_personal_target;
            $data->iftar_mahfil_personal_uposthiti = request()->iftar_mahfil_personal_uposthiti;

            $data->iftar_mahfil_samostic_total = request()->iftar_mahfil_samostic_total;
            $data->iftar_mahfil_samostic_target = request()->iftar_mahfil_samostic_target;
            $data->iftar_mahfil_samostic_uposthiti = request()->iftar_mahfil_samostic_uposthiti;

            $data->cha_chakra_total = request()->cha_chakra_total;
            $data->cha_chakra_target = request()->cha_chakra_target;
            $data->cha_chakra_uposthiti = request()->cha_chakra_uposthiti;

            $data->samostic_khawa_total = request()->samostic_khawa_total;
            $data->samostic_khawa_target = request()->samostic_khawa_target;
            $data->samostic_khawa_uposthiti = request()->samostic_khawa_uposthiti;

            $data->sikkha_sofor_total = request()->sikkha_sofor_total;
            $data->sikkha_sofor_target = request()->sikkha_sofor_target;
            $data->sikkha_sofor_uposthiti = request()->sikkha_sofor_uposthiti;

            // $data->kirat_protijogita_total = request()->kirat_protijogita_total;
            // $data->kirat_protijogita_target = request()->kirat_protijogita_target;

            // $data->hamd_nat_protijogita_total = request()->hamd_nat_protijogita_total;
            // $data->hamd_nat_protijogita_target = request()->hamd_nat_protijogita_target;

            // $data->others_total = request()->others_total;
            // $data->others_target = request()->others_target;

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
                'id' => ['required', 'exists:kormosuci_bastobayons,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = KormosuciBastobayon::find(request()->id);
            $data->status = 0;
            $data->save();

            return response()->json([
                'result' => 'deactivated',
            ], 200);
        }

        public function destroy()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:kormosuci_bastobayons,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = KormosuciBastobayon::find(request()->id);
            $data->delete();

            return response()->json([
                'result' => 'deleted',
            ], 200);
        }

        public function restore()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:kormosuci_bastobayons,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = KormosuciBastobayon::find(request()->id);
            $data->status = 1;
            $data->save();

            return response()->json([
                'result' => 'activated',
            ], 200);
        }
}
