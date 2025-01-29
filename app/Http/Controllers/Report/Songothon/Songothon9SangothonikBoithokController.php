<?php

namespace App\Http\Controllers\Report\Songothon;

use App\Http\Controllers\Controller;
use App\Models\Report\Songothon\Songothon9SangothonikBoithok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Songothon9SangothonikBoithokController extends Controller
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
        return common_get(Songothon9SangothonikBoithok::class);
    }

    public function store_single()
    {
        return common_store($this, Songothon9SangothonikBoithok::class, $this->report_info);
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

            $query = Songothon9SangothonikBoithok::where('status', $status)->orderBy($orderBy, $orderByType);
            // $query = User::latest()->get();

            if (request()->has('search_key')) {
                $key = request()->search_key;
                $query->where(function ($q) use ($key) {
                    return $q->where('id', '%' . $key . '%')
                    ->orWhere('unit_kormi_boithok_total', '%' . $key . '%')
                    ->orWhere('unit_kormi_boithok_uposthiti', '%' . $key . '%');

                    // ->orWhere('word_sura_boithok_man_total', '%' . $key . '%')
                    // ->orWhere('word_sura_boithok_man_target', '%' . $key . '%')
                    // ->orWhere('word_sura_boithok_man_uposthiti', '%' . $key . '%')
                    // ->orWhere('word_sura_boithok_women_total', '%' . $key . '%')
                    // ->orWhere('word_sura_boithok_women_target', '%' . $key . '%')
                    // ->orWhere('word_sura_boithok_women_uposthiti', '%' . $key . '%')

                    // ->orWhere('kormoporishod_boithok_man_total', '%' . $key . '%')
                    // ->orWhere('kormoporishod_boithok_man_target', '%' . $key . '%')
                    // ->orWhere('kormoporishod_boithok_man_uposthiti', '%' . $key . '%')
                    // ->orWhere('kormoporishod_boithok_women_total', '%' . $key . '%')
                    // ->orWhere('kormoporishod_boithok_women_target', '%' . $key . '%')
                    // ->orWhere('kormoporishod_boithok_women_uposthiti', '%' . $key . '%')

                    // ->orWhere('upozilla_rokon_boithok_man_total', '%' . $key . '%')
                    // ->orWhere('upozilla_rokon_boithok_man_target', '%' . $key . '%')
                    // ->orWhere('upozilla_rokon_boithok_man_uposthiti', '%' . $key . '%')
                    // ->orWhere('upozilla_rokon_boithok_women_total', '%' . $key . '%')
                    // ->orWhere('upozilla_rokon_boithok_women_target', '%' . $key . '%')
                    // ->orWhere('upozilla_rokon_boithok_women_uposthiti', '%' . $key . '%')

                    // ->orWhere('thana_rokon_boithok_man_total', '%' . $key . '%')
                    // ->orWhere('thana_rokon_boithok_man_target', '%' . $key . '%')
                    // ->orWhere('thana_rokon_boithok_man_uposthiti', '%' . $key . '%')
                    // ->orWhere('thana_rokon_boithok_women_total', '%' . $key . '%')
                    // ->orWhere('thana_rokon_boithok_women_target', '%' . $key . '%')
                    // ->orWhere('thana_rokon_boithok_women_uposthiti', '%' . $key . '%')

                    // ->orWhere('division_committee_boithok_man_total', '%' . $key . '%')
                    // ->orWhere('division_committee_boithok_man_target', '%' . $key . '%')
                    // ->orWhere('division_committee_boithok_man_uposthiti', '%' . $key . '%')
                    // ->orWhere('division_committee_boithok_women_total', '%' . $key . '%')
                    // ->orWhere('division_committee_boithok_women_target', '%' . $key . '%')
                    // ->orWhere('division_committee_boithok_women_uposthiti', '%' . $key . '%')

                    // ->orWhere('pourosova_boithok_man_total', '%' . $key . '%')
                    // ->orWhere('pourosova_boithok_man_target', '%' . $key . '%')
                    // ->orWhere('pourosova_boithok_man_uposthiti', '%' . $key . '%')
                    // ->orWhere('pourosova_boithok_women_total', '%' . $key . '%')
                    // ->orWhere('pourosova_boithok_women_target', '%' . $key . '%')
                    // ->orWhere('pourosova_boithok_women_uposthiti', '%' . $key . '%')

                    // ->orWhere('union_boithok_man_total', '%' . $key . '%')
                    // ->orWhere('union_boithok_man_target', '%' . $key . '%')
                    // ->orWhere('union_boithok_man_uposthiti', '%' . $key . '%')
                    // ->orWhere('union_boithok_women_total', '%' . $key . '%')
                    // ->orWhere('union_boithok_women_target', '%' . $key . '%')
                    // ->orWhere('union_boithok_women_uposthiti', '%' . $key . '%')

                    // ->orWhere('word_boithok_man_total', '%' . $key . '%')
                    // ->orWhere('word_boithok_man_target', '%' . $key . '%')
                    // ->orWhere('word_boithok_man_uposthiti', '%' . $key . '%')
                    // ->orWhere('word_boithok_women_total', '%' . $key . '%')
                    // ->orWhere('word_boithok_women_target', '%' . $key . '%')
                    // ->orWhere('word_boithok_women_uposthiti', '%' . $key . '%')

                    // ->orWhere('team_boithok_man_total', '%' . $key . '%')
                    // ->orWhere('team_boithok_man_target', '%' . $key . '%')
                    // ->orWhere('team_boithok_man_uposthiti', '%' . $key . '%')
                    // ->orWhere('team_boithok_women_total', '%' . $key . '%')
                    // ->orWhere('team_boithok_women_target', '%' . $key . '%')
                    // ->orWhere('team_boithok_women_uposthiti', '%' . $key . '%')

                    // ->orWhere('masik_sodosso_boithok_man_total', '%' . $key . '%')
                    // ->orWhere('masik_sodosso_boithok_man_target', '%' . $key . '%')
                    // ->orWhere('masik_sodosso_boithok_man_uposthiti', '%' . $key . '%')
                    // ->orWhere('masik_sodosso_boithok_women_total', '%' . $key . '%')
                    // ->orWhere('masik_sodosso_boithok_women_target', '%' . $key . '%')
                    // ->orWhere('masik_sodosso_boithok_women_uposthiti', '%' . $key . '%')

                    // ->orWhere('pourosova_masik_sodosso_boithok_man_total', '%' . $key . '%')
                    // ->orWhere('pourosova_masik_sodosso_boithok_man_target', '%' . $key . '%')
                    // ->orWhere('pourosova_masik_sodosso_boithok_man_uposthiti', '%' . $key . '%')
                    // ->orWhere('pourosova_masik_sodosso_boithok_women_total', '%' . $key . '%')
                    // ->orWhere('pourosova_masik_sodosso_boithok_women_target', '%' . $key . '%')
                    // ->orWhere('pourosova_masik_sodosso_boithok_women_uposthiti', '%' . $key . '%')

                    // ->orWhere('union_masik_sodosso_boithok_man_total', '%' . $key . '%')
                    // ->orWhere('union_masik_sodosso_boithok_man_target', '%' . $key . '%')
                    // ->orWhere('union_masik_sodosso_boithok_man_uposthiti', '%' . $key . '%')
                    // ->orWhere('union_masik_sodosso_boithok_women_total', '%' . $key . '%')
                    // ->orWhere('union_masik_sodosso_boithok_women_target', '%' . $key . '%')
                    // ->orWhere('union_masik_sodosso_boithok_women_uposthiti', '%' . $key . '%')

                    // ->orWhere('unit_kormi_boithok_man_total', '%' . $key . '%')
                    // ->orWhere('unit_kormi_boithok_man_target', '%' . $key . '%')
                    // ->orWhere('unit_kormi_boithok_man_uposthiti', '%' . $key . '%')
                    // ->orWhere('unit_kormi_boithok_women_total', '%' . $key . '%')
                    // ->orWhere('unit_kormi_boithok_women_target', '%' . $key . '%')
                    // ->orWhere('unit_kormi_boithok_women_uposthiti', '%' . $key . '%')

                    // ->orWhere('ulama_somabesh_man_total', '%' . $key . '%')
                    // ->orWhere('ulama_somabesh_man_target', '%' . $key . '%')
                    // ->orWhere('ulama_somabesh_man_uposthiti', '%' . $key . '%')
                    // ->orWhere('ulama_somabesh_women_total', '%' . $key . '%')
                    // ->orWhere('ulama_somabesh_women_target', '%' . $key . '%')
                    // ->orWhere('ulama_somabesh_women_uposthiti', '%' . $key . '%')

                    // ->orWhere('jubok_somabesh_man_total', '%' . $key . '%')
                    // ->orWhere('jubok_somabesh_man_target', '%' . $key . '%')
                    // ->orWhere('jubok_somabesh_man_uposthiti', '%' . $key . '%')
                    // ->orWhere('jubok_somabesh_women_total', '%' . $key . '%')
                    // ->orWhere('jubok_somabesh_women_target', '%' . $key . '%')
                    // ->orWhere('jubok_somabesh_women_uposthiti', '%' . $key . '%')

                    // ->orWhere('sromik_somabesh_man_total', '%' . $key . '%')
                    // ->orWhere('sromik_somabesh_man_target', '%' . $key . '%')
                    // ->orWhere('sromik_somabesh_man_uposthiti', '%' . $key . '%')
                    // ->orWhere('sromik_somabesh_women_total', '%' . $key . '%')
                    // ->orWhere('sromik_somabesh_women_target', '%' . $key . '%')
                    // ->orWhere('sromik_somabesh_women_uposthiti', '%' . $key . '%')

                    // ->orWhere('trimasik_rokon_sommelon_man_total', '%' . $key . '%')
                    // ->orWhere('trimasik_rokon_sommelon_man_target', '%' . $key . '%')
                    // ->orWhere('trimasik_rokon_sommelon_man_uposthiti', '%' . $key . '%')
                    // ->orWhere('trimasik_rokon_sommelon_women_total', '%' . $key . '%')
                    // ->orWhere('trimasik_rokon_sommelon_women_target', '%' . $key . '%')
                    // ->orWhere('trimasik_rokon_sommelon_women_uposthiti', '%' . $key . '%')

                    // ->orWhere('sammasik_rokon_sommelon_man_total', '%' . $key . '%')
                    // ->orWhere('sammasik_rokon_sommelon_man_target', '%' . $key . '%')
                    // ->orWhere('sammasik_rokon_sommelon_man_uposthiti', '%' . $key . '%')
                    // ->orWhere('sammasik_rokon_sommelon_women_total', '%' . $key . '%')
                    // ->orWhere('sammasik_rokon_sommelon_women_target', '%' . $key . '%')
                    // ->orWhere('sammasik_rokon_sommelon_women_uposthiti', '%' . $key . '%')

                    // ->orWhere('barsik_rokon_sommelon_man_total', '%' . $key . '%')
                    // ->orWhere('barsik_rokon_sommelon_man_target', '%' . $key . '%')
                    // ->orWhere('barsik_rokon_sommelon_man_uposthiti', '%' . $key . '%')
                    // ->orWhere('barsik_rokon_sommelon_women_total', '%' . $key . '%')
                    // ->orWhere('barsik_rokon_sommelon_women_target', '%' . $key . '%')
                    // ->orWhere('barsik_rokon_sommelon_women_uposthiti', '%' . $key . '%')

                    // ->orWhere('upozila_word_sovapoti_sommelon_man_total', '%' . $key . '%')
                    // ->orWhere('upozila_word_sovapoti_sommelon_man_target', '%' . $key . '%')
                    // ->orWhere('upozila_word_sovapoti_sommelon_man_uposthiti', '%' . $key . '%')
                    // ->orWhere('upozila_word_sovapoti_sommelon_women_total', '%' . $key . '%')
                    // ->orWhere('upozila_word_sovapoti_sommelon_women_target', '%' . $key . '%')
                    // ->orWhere('upozila_word_sovapoti_sommelon_women_uposthiti', '%' . $key . '%');

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
            $data = Songothon9SangothonikBoithok::where('id', $id)
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
                'unit_kormi_boithok_total' => ['required'],
                'unit_kormi_boithok_uposthiti' => ['required'],

                // 'word_sura_boithok_man_total' => ['required'],
                // 'word_sura_boithok_man_target' => ['required'],
                // 'word_sura_boithok_man_uposthiti' => ['required'],
                // 'word_sura_boithok_women_total' => ['required'],
                // 'word_sura_boithok_women_target' => ['required'],
                // 'word_sura_boithok_women_uposthiti' => ['required'],

                // 'kormoporishod_boithok_man_total' => ['required'],
                // 'kormoporishod_boithok_man_target' => ['required'],
                // 'kormoporishod_boithok_man_uposthiti' => ['required'],
                // 'kormoporishod_boithok_women_total' => ['required'],
                // 'kormoporishod_boithok_women_target' => ['required'],
                // 'kormoporishod_boithok_women_uposthiti' => ['required'],

                // 'upozilla_rokon_boithok_man_total' => ['required'],
                // 'upozilla_rokon_boithok_man_target' => ['required'],
                // 'upozilla_rokon_boithok_man_uposthiti' => ['required'],
                // 'upozilla_rokon_boithok_women_total' => ['required'],
                // 'upozilla_rokon_boithok_women_target' => ['required'],
                // 'upozilla_rokon_boithok_women_uposthiti' => ['required'],

                // 'thana_rokon_boithok_man_total' => ['required'],
                // 'thana_rokon_boithok_man_target' => ['required'],
                // 'thana_rokon_boithok_man_uposthiti' => ['required'],
                // 'thana_rokon_boithok_women_total' => ['required'],
                // 'thana_rokon_boithok_women_target' => ['required'],
                // 'thana_rokon_boithok_women_uposthiti' => ['required'],

                // 'division_committee_boithok_man_total' => ['required'],
                // 'division_committee_boithok_man_target' => ['required'],
                // 'division_committee_boithok_man_uposthiti' => ['required'],
                // 'division_committee_boithok_women_total' => ['required'],
                // 'division_committee_boithok_women_target' => ['required'],
                // 'division_committee_boithok_women_uposthiti' => ['required'],

                // 'pourosova_boithok_man_total' => ['required'],
                // 'pourosova_boithok_man_target' => ['required'],
                // 'pourosova_boithok_man_uposthiti' => ['required'],
                // 'pourosova_boithok_women_total' => ['required'],
                // 'pourosova_boithok_women_target' => ['required'],
                // 'pourosova_boithok_women_uposthiti' => ['required'],

                // 'union_boithok_man_total' => ['required'],
                // 'union_boithok_man_target' => ['required'],
                // 'union_boithok_man_uposthiti' => ['required'],
                // 'union_boithok_women_total' => ['required'],
                // 'union_boithok_women_target' => ['required'],
                // 'union_boithok_women_uposthiti' => ['required'],

                // 'word_boithok_man_total' => ['required'],
                // 'word_boithok_man_target' => ['required'],
                // 'word_boithok_man_uposthiti' => ['required'],
                // 'word_boithok_women_total' => ['required'],
                // 'word_boithok_women_target' => ['required'],
                // 'word_boithok_women_uposthiti' => ['required'],

                // 'team_boithok_man_total' => ['required'],
                // 'team_boithok_man_target' => ['required'],
                // 'team_boithok_man_uposthiti' => ['required'],
                // 'team_boithok_women_total' => ['required'],
                // 'team_boithok_women_target' => ['required'],
                // 'team_boithok_women_uposthiti' => ['required'],

                // 'masik_sodosso_boithok_man_total' => ['required'],
                // 'masik_sodosso_boithok_man_target' => ['required'],
                // 'masik_sodosso_boithok_man_uposthiti' => ['required'],
                // 'masik_sodosso_boithok_women_total' => ['required'],
                // 'masik_sodosso_boithok_women_target' => ['required'],
                // 'masik_sodosso_boithok_women_uposthiti' => ['required'],

                // 'pourosova_masik_sodosso_boithok_man_total' => ['required'],
                // 'pourosova_masik_sodosso_boithok_man_target' => ['required'],
                // 'pourosova_masik_sodosso_boithok_man_uposthiti' => ['required'],
                // 'pourosova_masik_sodosso_boithok_women_total' => ['required'],
                // 'pourosova_masik_sodosso_boithok_women_target' => ['required'],
                // 'pourosova_masik_sodosso_boithok_women_uposthiti' => ['required'],

                // 'union_masik_sodosso_boithok_man_total' => ['required'],
                // 'union_masik_sodosso_boithok_man_target' => ['required'],
                // 'union_masik_sodosso_boithok_man_uposthiti' => ['required'],
                // 'union_masik_sodosso_boithok_women_total' => ['required'],
                // 'union_masik_sodosso_boithok_women_target' => ['required'],
                // 'union_masik_sodosso_boithok_women_uposthiti' => ['required'],

                // 'unit_kormi_boithok_man_total' => ['required'],
                // 'unit_kormi_boithok_man_target' => ['required'],
                // 'unit_kormi_boithok_man_uposthiti' => ['required'],
                // 'unit_kormi_boithok_women_total' => ['required'],
                // 'unit_kormi_boithok_women_target' => ['required'],
                // 'unit_kormi_boithok_women_uposthiti' => ['required'],

                // 'ulama_somabesh_man_total' => ['required'],
                // 'ulama_somabesh_man_target' => ['required'],
                // 'ulama_somabesh_man_uposthiti' => ['required'],
                // 'ulama_somabesh_women_total' => ['required'],
                // 'ulama_somabesh_women_target' => ['required'],
                // 'ulama_somabesh_women_uposthiti' => ['required'],

                // 'jubok_somabesh_man_total' => ['required'],
                // 'jubok_somabesh_man_target' => ['required'],
                // 'jubok_somabesh_man_uposthiti' => ['required'],
                // 'jubok_somabesh_women_total' => ['required'],
                // 'jubok_somabesh_women_target' => ['required'],
                // 'jubok_somabesh_women_uposthiti' => ['required'],

                // 'sromik_somabesh_man_total' => ['required'],
                // 'sromik_somabesh_man_target' => ['required'],
                // 'sromik_somabesh_man_uposthiti' => ['required'],
                // 'sromik_somabesh_women_total' => ['required'],
                // 'sromik_somabesh_women_target' => ['required'],
                // 'sromik_somabesh_women_uposthiti' => ['required'],

                // 'trimasik_rokon_sommelon_man_total' => ['required'],
                // 'trimasik_rokon_sommelon_man_target' => ['required'],
                // 'trimasik_rokon_sommelon_man_uposthiti' => ['required'],
                // 'trimasik_rokon_sommelon_women_total' => ['required'],
                // 'trimasik_rokon_sommelon_women_target' => ['required'],
                // 'trimasik_rokon_sommelon_women_uposthiti' => ['required'],

                // 'sammasik_rokon_sommelon_man_total' => ['required'],
                // 'sammasik_rokon_sommelon_man_target' => ['required'],
                // 'sammasik_rokon_sommelon_man_uposthiti' => ['required'],
                // 'sammasik_rokon_sommelon_women_total' => ['required'],
                // 'sammasik_rokon_sommelon_women_target' => ['required'],
                // 'sammasik_rokon_sommelon_women_uposthiti' => ['required'],

                // 'barsik_rokon_sommelon_man_total' => ['required'],
                // 'barsik_rokon_sommelon_man_target' => ['required'],
                // 'barsik_rokon_sommelon_man_uposthiti' => ['required'],
                // 'barsik_rokon_sommelon_women_total' => ['required'],
                // 'barsik_rokon_sommelon_women_target' => ['required'],
                // 'barsik_rokon_sommelon_women_uposthiti' => ['required'],

                // 'upozila_word_sovapoti_sommelon_man_total' => ['required'],
                // 'upozila_word_sovapoti_sommelon_man_target' => ['required'],
                // 'upozila_word_sovapoti_sommelon_man_uposthiti' => ['required'],
                // 'upozila_word_sovapoti_sommelon_women_total' => ['required'],
                // 'upozila_word_sovapoti_sommelon_women_target' => ['required'],
                // 'upozila_word_sovapoti_sommelon_women_uposthiti' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = new Songothon9SangothonikBoithok();
            $data->unit_kormi_boithok_total = request()->unit_kormi_boithok_total;
            $data->unit_kormi_boithok_uposthiti = request()->unit_kormi_boithok_uposthiti;

            // $data->word_sura_boithok_man_total = request()->word_sura_boithok_man_total;
            // $data->word_sura_boithok_man_target = request()->word_sura_boithok_man_target;
            // $data->word_sura_boithok_man_uposthiti = request()->word_sura_boithok_man_uposthiti;
            // $data->word_sura_boithok_women_total = request()->word_sura_boithok_women_total;
            // $data->word_sura_boithok_women_target = request()->word_sura_boithok_women_target;
            // $data->word_sura_boithok_women_uposthiti = request()->word_sura_boithok_women_uposthiti;

            // $data->kormoporishod_boithok_man_total = request()->kormoporishod_boithok_man_total;
            // $data->kormoporishod_boithok_man_target = request()->kormoporishod_boithok_man_target;
            // $data->kormoporishod_boithok_man_uposthiti = request()->kormoporishod_boithok_man_uposthiti;
            // $data->kormoporishod_boithok_women_total = request()->kormoporishod_boithok_women_total;
            // $data->kormoporishod_boithok_women_target = request()->kormoporishod_boithok_women_target;
            // $data->kormoporishod_boithok_women_uposthiti = request()->kormoporishod_boithok_women_uposthiti;

            // $data->upozilla_rokon_boithok_man_total = request()->upozilla_rokon_boithok_man_total;
            // $data->upozilla_rokon_boithok_man_target = request()->upozilla_rokon_boithok_man_target;
            // $data->upozilla_rokon_boithok_man_uposthiti = request()->upozilla_rokon_boithok_man_uposthiti;
            // $data->upozilla_rokon_boithok_women_total = request()->upozilla_rokon_boithok_women_total;
            // $data->upozilla_rokon_boithok_women_target = request()->upozilla_rokon_boithok_women_target;
            // $data->upozilla_rokon_boithok_women_uposthiti = request()->upozilla_rokon_boithok_women_uposthiti;

            // $data->thana_rokon_boithok_man_total = request()->thana_rokon_boithok_man_total;
            // $data->thana_rokon_boithok_man_target = request()->thana_rokon_boithok_man_target;
            // $data->thana_rokon_boithok_man_uposthiti = request()->thana_rokon_boithok_man_uposthiti;
            // $data->thana_rokon_boithok_women_total = request()->thana_rokon_boithok_women_total;
            // $data->thana_rokon_boithok_women_target = request()->thana_rokon_boithok_women_target;
            // $data->thana_rokon_boithok_women_uposthiti = request()->thana_rokon_boithok_women_uposthiti;

            // $data->division_committee_boithok_man_total = request()->division_committee_boithok_man_total;
            // $data->division_committee_boithok_man_target = request()->division_committee_boithok_man_target;
            // $data->division_committee_boithok_man_uposthiti = request()->division_committee_boithok_man_uposthiti;
            // $data->division_committee_boithok_women_total = request()->division_committee_boithok_women_total;
            // $data->division_committee_boithok_women_target = request()->division_committee_boithok_women_target;
            // $data->division_committee_boithok_women_uposthiti = request()->division_committee_boithok_women_uposthiti;

            // $data->pourosova_boithok_man_total = request()->pourosova_boithok_man_total;
            // $data->pourosova_boithok_man_target = request()->pourosova_boithok_man_target;
            // $data->pourosova_boithok_man_uposthiti = request()->pourosova_boithok_man_uposthiti;
            // $data->pourosova_boithok_women_total = request()->pourosova_boithok_women_total;
            // $data->pourosova_boithok_women_target = request()->pourosova_boithok_women_target;
            // $data->pourosova_boithok_women_uposthiti = request()->pourosova_boithok_women_uposthiti;

            // $data->union_boithok_man_total = request()->union_boithok_man_total;
            // $data->union_boithok_man_target = request()->union_boithok_man_target;
            // $data->union_boithok_man_uposthiti = request()->union_boithok_man_uposthiti;
            // $data->union_boithok_women_total = request()->union_boithok_women_total;
            // $data->union_boithok_women_target = request()->union_boithok_women_target;
            // $data->union_boithok_women_uposthiti = request()->union_boithok_women_uposthiti;

            // $data->word_boithok_man_total = request()->word_boithok_man_total;
            // $data->word_boithok_man_target = request()->word_boithok_man_target;
            // $data->word_boithok_man_uposthiti = request()->word_boithok_man_uposthiti;
            // $data->word_boithok_women_total = request()->word_boithok_women_total;
            // $data->word_boithok_women_target = request()->word_boithok_women_target;
            // $data->word_boithok_women_uposthiti = request()->word_boithok_women_uposthiti;

            // $data->team_boithok_man_total = request()->team_boithok_man_total;
            // $data->team_boithok_man_target = request()->team_boithok_man_target;
            // $data->team_boithok_man_uposthiti = request()->team_boithok_man_uposthiti;
            // $data->team_boithok_women_total = request()->team_boithok_women_total;
            // $data->team_boithok_women_target = request()->team_boithok_women_target;
            // $data->team_boithok_women_uposthiti = request()->team_boithok_women_uposthiti;

            // $data->masik_sodosso_boithok_man_total = request()->masik_sodosso_boithok_man_total;
            // $data->masik_sodosso_boithok_man_target = request()->masik_sodosso_boithok_man_target;
            // $data->masik_sodosso_boithok_man_uposthiti = request()->masik_sodosso_boithok_man_uposthiti;
            // $data->masik_sodosso_boithok_women_total = request()->masik_sodosso_boithok_women_total;
            // $data->masik_sodosso_boithok_women_target = request()->masik_sodosso_boithok_women_target;
            // $data->masik_sodosso_boithok_women_uposthiti = request()->masik_sodosso_boithok_women_uposthiti;

            // $data->pourosova_masik_sodosso_boithok_man_total = request()->pourosova_masik_sodosso_boithok_man_total;
            // $data->pourosova_masik_sodosso_boithok_man_target = request()->pourosova_masik_sodosso_boithok_man_target;
            // $data->pourosova_masik_sodosso_boithok_man_uposthiti = request()->pourosova_masik_sodosso_boithok_man_uposthiti;
            // $data->pourosova_masik_sodosso_boithok_women_total = request()->pourosova_masik_sodosso_boithok_women_total;
            // $data->pourosova_masik_sodosso_boithok_women_target = request()->pourosova_masik_sodosso_boithok_women_target;
            // $data->pourosova_masik_sodosso_boithok_women_uposthiti = request()->pourosova_masik_sodosso_boithok_women_uposthiti;

            // $data->union_masik_sodosso_boithok_man_total = request()->union_masik_sodosso_boithok_man_total;
            // $data->union_masik_sodosso_boithok_man_target = request()->union_masik_sodosso_boithok_man_target;
            // $data->union_masik_sodosso_boithok_man_uposthiti = request()->union_masik_sodosso_boithok_man_uposthiti;
            // $data->union_masik_sodosso_boithok_women_total = request()->union_masik_sodosso_boithok_women_total;
            // $data->union_masik_sodosso_boithok_women_target = request()->union_masik_sodosso_boithok_women_target;
            // $data->union_masik_sodosso_boithok_women_uposthiti = request()->union_masik_sodosso_boithok_women_uposthiti;

            // $data->unit_kormi_boithok_man_total = request()->unit_kormi_boithok_man_total;
            // $data->unit_kormi_boithok_man_target = request()->unit_kormi_boithok_man_target;
            // $data->unit_kormi_boithok_man_uposthiti = request()->unit_kormi_boithok_man_uposthiti;
            // $data->unit_kormi_boithok_women_total = request()->unit_kormi_boithok_women_total;
            // $data->unit_kormi_boithok_women_target = request()->unit_kormi_boithok_women_target;
            // $data->unit_kormi_boithok_women_uposthiti = request()->unit_kormi_boithok_women_uposthiti;

            // $data->ulama_somabesh_man_total = request()->ulama_somabesh_man_total;
            // $data->ulama_somabesh_man_target = request()->ulama_somabesh_man_target;
            // $data->ulama_somabesh_man_uposthiti = request()->ulama_somabesh_man_uposthiti;
            // $data->ulama_somabesh_women_total = request()->ulama_somabesh_women_total;
            // $data->ulama_somabesh_women_target = request()->ulama_somabesh_women_target;
            // $data->ulama_somabesh_women_uposthiti = request()->ulama_somabesh_women_uposthiti;

            // $data->jubok_somabesh_man_total = request()->jubok_somabesh_man_total;
            // $data->jubok_somabesh_man_target = request()->jubok_somabesh_man_target;
            // $data->jubok_somabesh_man_uposthiti = request()->jubok_somabesh_man_uposthiti;
            // $data->jubok_somabesh_women_total = request()->jubok_somabesh_women_total;
            // $data->jubok_somabesh_women_target = request()->jubok_somabesh_women_target;
            // $data->jubok_somabesh_women_uposthiti = request()->jubok_somabesh_women_uposthiti;

            // $data->sromik_somabesh_man_total = request()->sromik_somabesh_man_total;
            // $data->sromik_somabesh_man_target = request()->sromik_somabesh_man_target;
            // $data->sromik_somabesh_man_uposthiti = request()->sromik_somabesh_man_uposthiti;
            // $data->sromik_somabesh_women_total = request()->sromik_somabesh_women_total;
            // $data->sromik_somabesh_women_target = request()->sromik_somabesh_women_target;
            // $data->sromik_somabesh_women_uposthiti = request()->sromik_somabesh_women_uposthiti;

            // $data->trimasik_rokon_sommelon_man_total = request()->trimasik_rokon_sommelon_man_total;
            // $data->trimasik_rokon_sommelon_man_target = request()->trimasik_rokon_sommelon_man_target;
            // $data->trimasik_rokon_sommelon_man_uposthiti = request()->trimasik_rokon_sommelon_man_uposthiti;
            // $data->trimasik_rokon_sommelon_women_total = request()->trimasik_rokon_sommelon_women_total;
            // $data->trimasik_rokon_sommelon_women_target = request()->trimasik_rokon_sommelon_women_target;
            // $data->trimasik_rokon_sommelon_women_uposthiti = request()->trimasik_rokon_sommelon_women_uposthiti;

            // $data->sammasik_rokon_sommelon_man_total = request()->sammasik_rokon_sommelon_man_total;
            // $data->sammasik_rokon_sommelon_man_target = request()->sammasik_rokon_sommelon_man_target;
            // $data->sammasik_rokon_sommelon_man_uposthiti = request()->sammasik_rokon_sommelon_man_uposthiti;
            // $data->sammasik_rokon_sommelon_women_total = request()->sammasik_rokon_sommelon_women_total;
            // $data->sammasik_rokon_sommelon_women_target = request()->sammasik_rokon_sommelon_women_target;
            // $data->sammasik_rokon_sommelon_women_uposthiti = request()->sammasik_rokon_sommelon_women_uposthiti;

            // $data->barsik_rokon_sommelon_man_total = request()->barsik_rokon_sommelon_man_total;
            // $data->barsik_rokon_sommelon_man_target = request()->barsik_rokon_sommelon_man_target;
            // $data->barsik_rokon_sommelon_man_uposthiti = request()->barsik_rokon_sommelon_man_uposthiti;
            // $data->barsik_rokon_sommelon_women_total = request()->barsik_rokon_sommelon_women_total;
            // $data->barsik_rokon_sommelon_women_target = request()->barsik_rokon_sommelon_women_target;
            // $data->barsik_rokon_sommelon_women_uposthiti = request()->barsik_rokon_sommelon_women_uposthiti;

            // $data->upozila_word_sovapoti_sommelon_man_total = request()->upozila_word_sovapoti_sommelon_man_total;
            // $data->upozila_word_sovapoti_sommelon_man_target = request()->upozila_word_sovapoti_sommelon_man_target;
            // $data->upozila_word_sovapoti_sommelon_man_uposthiti = request()->upozila_word_sovapoti_sommelon_man_uposthiti;
            // $data->upozila_word_sovapoti_sommelon_women_total = request()->upozila_word_sovapoti_sommelon_women_total;
            // $data->upozila_word_sovapoti_sommelon_women_target = request()->upozila_word_sovapoti_sommelon_women_target;
            // $data->upozila_word_sovapoti_sommelon_women_uposthiti = request()->upozila_word_sovapoti_sommelon_women_uposthiti;

            $data->creator = request()->creator;
            $data->status = request()->status;
            $data->save();

            return response()->json($data, 200);
        }

        public function update()
        {
            $data = Songothon9SangothonikBoithok::find(request()->id);
            if (!$data) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
                ], 422);
            }

            $validator = Validator::make(request()->all(), [
                'unit_kormi_boithok_total' => ['required'],
                'unit_kormi_boithok_uposthiti' => ['required'],

                // 'word_sura_boithok_man_total' => ['required'],
                // 'word_sura_boithok_man_target' => ['required'],
                // 'word_sura_boithok_man_uposthiti' => ['required'],
                // 'word_sura_boithok_women_total' => ['required'],
                // 'word_sura_boithok_women_target' => ['required'],
                // 'word_sura_boithok_women_uposthiti' => ['required'],

                // 'kormoporishod_boithok_man_total' => ['required'],
                // 'kormoporishod_boithok_man_target' => ['required'],
                // 'kormoporishod_boithok_man_uposthiti' => ['required'],
                // 'kormoporishod_boithok_women_total' => ['required'],
                // 'kormoporishod_boithok_women_target' => ['required'],
                // 'kormoporishod_boithok_women_uposthiti' => ['required'],

                // 'upozilla_rokon_boithok_man_total' => ['required'],
                // 'upozilla_rokon_boithok_man_target' => ['required'],
                // 'upozilla_rokon_boithok_man_uposthiti' => ['required'],
                // 'upozilla_rokon_boithok_women_total' => ['required'],
                // 'upozilla_rokon_boithok_women_target' => ['required'],
                // 'upozilla_rokon_boithok_women_uposthiti' => ['required'],

                // 'thana_rokon_boithok_man_total' => ['required'],
                // 'thana_rokon_boithok_man_target' => ['required'],
                // 'thana_rokon_boithok_man_uposthiti' => ['required'],
                // 'thana_rokon_boithok_women_total' => ['required'],
                // 'thana_rokon_boithok_women_target' => ['required'],
                // 'thana_rokon_boithok_women_uposthiti' => ['required'],

                // 'division_committee_boithok_man_total' => ['required'],
                // 'division_committee_boithok_man_target' => ['required'],
                // 'division_committee_boithok_man_uposthiti' => ['required'],
                // 'division_committee_boithok_women_total' => ['required'],
                // 'division_committee_boithok_women_target' => ['required'],
                // 'division_committee_boithok_women_uposthiti' => ['required'],

                // 'pourosova_boithok_man_total' => ['required'],
                // 'pourosova_boithok_man_target' => ['required'],
                // 'pourosova_boithok_man_uposthiti' => ['required'],
                // 'pourosova_boithok_women_total' => ['required'],
                // 'pourosova_boithok_women_target' => ['required'],
                // 'pourosova_boithok_women_uposthiti' => ['required'],

                // 'union_boithok_man_total' => ['required'],
                // 'union_boithok_man_target' => ['required'],
                // 'union_boithok_man_uposthiti' => ['required'],
                // 'union_boithok_women_total' => ['required'],
                // 'union_boithok_women_target' => ['required'],
                // 'union_boithok_women_uposthiti' => ['required'],

                // 'word_boithok_man_total' => ['required'],
                // 'word_boithok_man_target' => ['required'],
                // 'word_boithok_man_uposthiti' => ['required'],
                // 'word_boithok_women_total' => ['required'],
                // 'word_boithok_women_target' => ['required'],
                // 'word_boithok_women_uposthiti' => ['required'],

                // 'team_boithok_man_total' => ['required'],
                // 'team_boithok_man_target' => ['required'],
                // 'team_boithok_man_uposthiti' => ['required'],
                // 'team_boithok_women_total' => ['required'],
                // 'team_boithok_women_target' => ['required'],
                // 'team_boithok_women_uposthiti' => ['required'],

                // 'masik_sodosso_boithok_man_total' => ['required'],
                // 'masik_sodosso_boithok_man_target' => ['required'],
                // 'masik_sodosso_boithok_man_uposthiti' => ['required'],
                // 'masik_sodosso_boithok_women_total' => ['required'],
                // 'masik_sodosso_boithok_women_target' => ['required'],
                // 'masik_sodosso_boithok_women_uposthiti' => ['required'],

                // 'pourosova_masik_sodosso_boithok_man_total' => ['required'],
                // 'pourosova_masik_sodosso_boithok_man_target' => ['required'],
                // 'pourosova_masik_sodosso_boithok_man_uposthiti' => ['required'],
                // 'pourosova_masik_sodosso_boithok_women_total' => ['required'],
                // 'pourosova_masik_sodosso_boithok_women_target' => ['required'],
                // 'pourosova_masik_sodosso_boithok_women_uposthiti' => ['required'],

                // 'union_masik_sodosso_boithok_man_total' => ['required'],
                // 'union_masik_sodosso_boithok_man_target' => ['required'],
                // 'union_masik_sodosso_boithok_man_uposthiti' => ['required'],
                // 'union_masik_sodosso_boithok_women_total' => ['required'],
                // 'union_masik_sodosso_boithok_women_target' => ['required'],
                // 'union_masik_sodosso_boithok_women_uposthiti' => ['required'],

                // 'unit_kormi_boithok_man_total' => ['required'],
                // 'unit_kormi_boithok_man_target' => ['required'],
                // 'unit_kormi_boithok_man_uposthiti' => ['required'],
                // 'unit_kormi_boithok_women_total' => ['required'],
                // 'unit_kormi_boithok_women_target' => ['required'],
                // 'unit_kormi_boithok_women_uposthiti' => ['required'],

                // 'ulama_somabesh_man_total' => ['required'],
                // 'ulama_somabesh_man_target' => ['required'],
                // 'ulama_somabesh_man_uposthiti' => ['required'],
                // 'ulama_somabesh_women_total' => ['required'],
                // 'ulama_somabesh_women_target' => ['required'],
                // 'ulama_somabesh_women_uposthiti' => ['required'],

                // 'jubok_somabesh_man_total' => ['required'],
                // 'jubok_somabesh_man_target' => ['required'],
                // 'jubok_somabesh_man_uposthiti' => ['required'],
                // 'jubok_somabesh_women_total' => ['required'],
                // 'jubok_somabesh_women_target' => ['required'],
                // 'jubok_somabesh_women_uposthiti' => ['required'],

                // 'sromik_somabesh_man_total' => ['required'],
                // 'sromik_somabesh_man_target' => ['required'],
                // 'sromik_somabesh_man_uposthiti' => ['required'],
                // 'sromik_somabesh_women_total' => ['required'],
                // 'sromik_somabesh_women_target' => ['required'],
                // 'sromik_somabesh_women_uposthiti' => ['required'],

                // 'trimasik_rokon_sommelon_man_total' => ['required'],
                // 'trimasik_rokon_sommelon_man_target' => ['required'],
                // 'trimasik_rokon_sommelon_man_uposthiti' => ['required'],
                // 'trimasik_rokon_sommelon_women_total' => ['required'],
                // 'trimasik_rokon_sommelon_women_target' => ['required'],
                // 'trimasik_rokon_sommelon_women_uposthiti' => ['required'],

                // 'sammasik_rokon_sommelon_man_total' => ['required'],
                // 'sammasik_rokon_sommelon_man_target' => ['required'],
                // 'sammasik_rokon_sommelon_man_uposthiti' => ['required'],
                // 'sammasik_rokon_sommelon_women_total' => ['required'],
                // 'sammasik_rokon_sommelon_women_target' => ['required'],
                // 'sammasik_rokon_sommelon_women_uposthiti' => ['required'],

                // 'barsik_rokon_sommelon_man_total' => ['required'],
                // 'barsik_rokon_sommelon_man_target' => ['required'],
                // 'barsik_rokon_sommelon_man_uposthiti' => ['required'],
                // 'barsik_rokon_sommelon_women_total' => ['required'],
                // 'barsik_rokon_sommelon_women_target' => ['required'],
                // 'barsik_rokon_sommelon_women_uposthiti' => ['required'],

                // 'upozila_word_sovapoti_sommelon_man_total' => ['required'],
                // 'upozila_word_sovapoti_sommelon_man_target' => ['required'],
                // 'upozila_word_sovapoti_sommelon_man_uposthiti' => ['required'],
                // 'upozila_word_sovapoti_sommelon_women_total' => ['required'],
                // 'upozila_word_sovapoti_sommelon_women_target' => ['required'],
                // 'upozila_word_sovapoti_sommelon_women_uposthiti' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data->unit_kormi_boithok_total = request()->unit_kormi_boithok_total;
            $data->unit_kormi_boithok_uposthiti = request()->unit_kormi_boithok_uposthiti;

            // $data->word_sura_boithok_man_total = request()->word_sura_boithok_man_total;
            // $data->word_sura_boithok_man_target = request()->word_sura_boithok_man_target;
            // $data->word_sura_boithok_man_uposthiti = request()->word_sura_boithok_man_uposthiti;
            // $data->word_sura_boithok_women_total = request()->word_sura_boithok_women_total;
            // $data->word_sura_boithok_women_target = request()->word_sura_boithok_women_target;
            // $data->word_sura_boithok_women_uposthiti = request()->word_sura_boithok_women_uposthiti;

            // $data->kormoporishod_boithok_man_total = request()->kormoporishod_boithok_man_total;
            // $data->kormoporishod_boithok_man_target = request()->kormoporishod_boithok_man_target;
            // $data->kormoporishod_boithok_man_uposthiti = request()->kormoporishod_boithok_man_uposthiti;
            // $data->kormoporishod_boithok_women_total = request()->kormoporishod_boithok_women_total;
            // $data->kormoporishod_boithok_women_target = request()->kormoporishod_boithok_women_target;
            // $data->kormoporishod_boithok_women_uposthiti = request()->kormoporishod_boithok_women_uposthiti;

            // $data->upozilla_rokon_boithok_man_total = request()->upozilla_rokon_boithok_man_total;
            // $data->upozilla_rokon_boithok_man_target = request()->upozilla_rokon_boithok_man_target;
            // $data->upozilla_rokon_boithok_man_uposthiti = request()->upozilla_rokon_boithok_man_uposthiti;
            // $data->upozilla_rokon_boithok_women_total = request()->upozilla_rokon_boithok_women_total;
            // $data->upozilla_rokon_boithok_women_target = request()->upozilla_rokon_boithok_women_target;
            // $data->upozilla_rokon_boithok_women_uposthiti = request()->upozilla_rokon_boithok_women_uposthiti;

            // $data->thana_rokon_boithok_man_total = request()->thana_rokon_boithok_man_total;
            // $data->thana_rokon_boithok_man_target = request()->thana_rokon_boithok_man_target;
            // $data->thana_rokon_boithok_man_uposthiti = request()->thana_rokon_boithok_man_uposthiti;
            // $data->thana_rokon_boithok_women_total = request()->thana_rokon_boithok_women_total;
            // $data->thana_rokon_boithok_women_target = request()->thana_rokon_boithok_women_target;
            // $data->thana_rokon_boithok_women_uposthiti = request()->thana_rokon_boithok_women_uposthiti;

            // $data->division_committee_boithok_man_total = request()->division_committee_boithok_man_total;
            // $data->division_committee_boithok_man_target = request()->division_committee_boithok_man_target;
            // $data->division_committee_boithok_man_uposthiti = request()->division_committee_boithok_man_uposthiti;
            // $data->division_committee_boithok_women_total = request()->division_committee_boithok_women_total;
            // $data->division_committee_boithok_women_target = request()->division_committee_boithok_women_target;
            // $data->division_committee_boithok_women_uposthiti = request()->division_committee_boithok_women_uposthiti;

            // $data->pourosova_boithok_man_total = request()->pourosova_boithok_man_total;
            // $data->pourosova_boithok_man_target = request()->pourosova_boithok_man_target;
            // $data->pourosova_boithok_man_uposthiti = request()->pourosova_boithok_man_uposthiti;
            // $data->pourosova_boithok_women_total = request()->pourosova_boithok_women_total;
            // $data->pourosova_boithok_women_target = request()->pourosova_boithok_women_target;
            // $data->pourosova_boithok_women_uposthiti = request()->pourosova_boithok_women_uposthiti;

            // $data->union_boithok_man_total = request()->union_boithok_man_total;
            // $data->union_boithok_man_target = request()->union_boithok_man_target;
            // $data->union_boithok_man_uposthiti = request()->union_boithok_man_uposthiti;
            // $data->union_boithok_women_total = request()->union_boithok_women_total;
            // $data->union_boithok_women_target = request()->union_boithok_women_target;
            // $data->union_boithok_women_uposthiti = request()->union_boithok_women_uposthiti;

            // $data->word_boithok_man_total = request()->word_boithok_man_total;
            // $data->word_boithok_man_target = request()->word_boithok_man_target;
            // $data->word_boithok_man_uposthiti = request()->word_boithok_man_uposthiti;
            // $data->word_boithok_women_total = request()->word_boithok_women_total;
            // $data->word_boithok_women_target = request()->word_boithok_women_target;
            // $data->word_boithok_women_uposthiti = request()->word_boithok_women_uposthiti;

            // $data->team_boithok_man_total = request()->team_boithok_man_total;
            // $data->team_boithok_man_target = request()->team_boithok_man_target;
            // $data->team_boithok_man_uposthiti = request()->team_boithok_man_uposthiti;
            // $data->team_boithok_women_total = request()->team_boithok_women_total;
            // $data->team_boithok_women_target = request()->team_boithok_women_target;
            // $data->team_boithok_women_uposthiti = request()->team_boithok_women_uposthiti;

            // $data->masik_sodosso_boithok_man_total = request()->masik_sodosso_boithok_man_total;
            // $data->masik_sodosso_boithok_man_target = request()->masik_sodosso_boithok_man_target;
            // $data->masik_sodosso_boithok_man_uposthiti = request()->masik_sodosso_boithok_man_uposthiti;
            // $data->masik_sodosso_boithok_women_total = request()->masik_sodosso_boithok_women_total;
            // $data->masik_sodosso_boithok_women_target = request()->masik_sodosso_boithok_women_target;
            // $data->masik_sodosso_boithok_women_uposthiti = request()->masik_sodosso_boithok_women_uposthiti;

            // $data->pourosova_masik_sodosso_boithok_man_total = request()->pourosova_masik_sodosso_boithok_man_total;
            // $data->pourosova_masik_sodosso_boithok_man_target = request()->pourosova_masik_sodosso_boithok_man_target;
            // $data->pourosova_masik_sodosso_boithok_man_uposthiti = request()->pourosova_masik_sodosso_boithok_man_uposthiti;
            // $data->pourosova_masik_sodosso_boithok_women_total = request()->pourosova_masik_sodosso_boithok_women_total;
            // $data->pourosova_masik_sodosso_boithok_women_target = request()->pourosova_masik_sodosso_boithok_women_target;
            // $data->pourosova_masik_sodosso_boithok_women_uposthiti = request()->pourosova_masik_sodosso_boithok_women_uposthiti;

            // $data->union_masik_sodosso_boithok_man_total = request()->union_masik_sodosso_boithok_man_total;
            // $data->union_masik_sodosso_boithok_man_target = request()->union_masik_sodosso_boithok_man_target;
            // $data->union_masik_sodosso_boithok_man_uposthiti = request()->union_masik_sodosso_boithok_man_uposthiti;
            // $data->union_masik_sodosso_boithok_women_total = request()->union_masik_sodosso_boithok_women_total;
            // $data->union_masik_sodosso_boithok_women_target = request()->union_masik_sodosso_boithok_women_target;
            // $data->union_masik_sodosso_boithok_women_uposthiti = request()->union_masik_sodosso_boithok_women_uposthiti;

            // $data->unit_kormi_boithok_man_total = request()->unit_kormi_boithok_man_total;
            // $data->unit_kormi_boithok_man_target = request()->unit_kormi_boithok_man_target;
            // $data->unit_kormi_boithok_man_uposthiti = request()->unit_kormi_boithok_man_uposthiti;
            // $data->unit_kormi_boithok_women_total = request()->unit_kormi_boithok_women_total;
            // $data->unit_kormi_boithok_women_target = request()->unit_kormi_boithok_women_target;
            // $data->unit_kormi_boithok_women_uposthiti = request()->unit_kormi_boithok_women_uposthiti;

            // $data->ulama_somabesh_man_total = request()->ulama_somabesh_man_total;
            // $data->ulama_somabesh_man_target = request()->ulama_somabesh_man_target;
            // $data->ulama_somabesh_man_uposthiti = request()->ulama_somabesh_man_uposthiti;
            // $data->ulama_somabesh_women_total = request()->ulama_somabesh_women_total;
            // $data->ulama_somabesh_women_target = request()->ulama_somabesh_women_target;
            // $data->ulama_somabesh_women_uposthiti = request()->ulama_somabesh_women_uposthiti;

            // $data->jubok_somabesh_man_total = request()->jubok_somabesh_man_total;
            // $data->jubok_somabesh_man_target = request()->jubok_somabesh_man_target;
            // $data->jubok_somabesh_man_uposthiti = request()->jubok_somabesh_man_uposthiti;
            // $data->jubok_somabesh_women_total = request()->jubok_somabesh_women_total;
            // $data->jubok_somabesh_women_target = request()->jubok_somabesh_women_target;
            // $data->jubok_somabesh_women_uposthiti = request()->jubok_somabesh_women_uposthiti;

            // $data->sromik_somabesh_man_total = request()->sromik_somabesh_man_total;
            // $data->sromik_somabesh_man_target = request()->sromik_somabesh_man_target;
            // $data->sromik_somabesh_man_uposthiti = request()->sromik_somabesh_man_uposthiti;
            // $data->sromik_somabesh_women_total = request()->sromik_somabesh_women_total;
            // $data->sromik_somabesh_women_target = request()->sromik_somabesh_women_target;
            // $data->sromik_somabesh_women_uposthiti = request()->sromik_somabesh_women_uposthiti;

            // $data->trimasik_rokon_sommelon_man_total = request()->trimasik_rokon_sommelon_man_total;
            // $data->trimasik_rokon_sommelon_man_target = request()->trimasik_rokon_sommelon_man_target;
            // $data->trimasik_rokon_sommelon_man_uposthiti = request()->trimasik_rokon_sommelon_man_uposthiti;
            // $data->trimasik_rokon_sommelon_women_total = request()->trimasik_rokon_sommelon_women_total;
            // $data->trimasik_rokon_sommelon_women_target = request()->trimasik_rokon_sommelon_women_target;
            // $data->trimasik_rokon_sommelon_women_uposthiti = request()->trimasik_rokon_sommelon_women_uposthiti;

            // $data->sammasik_rokon_sommelon_man_total = request()->sammasik_rokon_sommelon_man_total;
            // $data->sammasik_rokon_sommelon_man_target = request()->sammasik_rokon_sommelon_man_target;
            // $data->sammasik_rokon_sommelon_man_uposthiti = request()->sammasik_rokon_sommelon_man_uposthiti;
            // $data->sammasik_rokon_sommelon_women_total = request()->sammasik_rokon_sommelon_women_total;
            // $data->sammasik_rokon_sommelon_women_target = request()->sammasik_rokon_sommelon_women_target;
            // $data->sammasik_rokon_sommelon_women_uposthiti = request()->sammasik_rokon_sommelon_women_uposthiti;

            // $data->barsik_rokon_sommelon_man_total = request()->barsik_rokon_sommelon_man_total;
            // $data->barsik_rokon_sommelon_man_target = request()->barsik_rokon_sommelon_man_target;
            // $data->barsik_rokon_sommelon_man_uposthiti = request()->barsik_rokon_sommelon_man_uposthiti;
            // $data->barsik_rokon_sommelon_women_total = request()->barsik_rokon_sommelon_women_total;
            // $data->barsik_rokon_sommelon_women_target = request()->barsik_rokon_sommelon_women_target;
            // $data->barsik_rokon_sommelon_women_uposthiti = request()->barsik_rokon_sommelon_women_uposthiti;

            // $data->upozila_word_sovapoti_sommelon_man_total = request()->upozila_word_sovapoti_sommelon_man_total;
            // $data->upozila_word_sovapoti_sommelon_man_target = request()->upozila_word_sovapoti_sommelon_man_target;
            // $data->upozila_word_sovapoti_sommelon_man_uposthiti = request()->upozila_word_sovapoti_sommelon_man_uposthiti;
            // $data->upozila_word_sovapoti_sommelon_women_total = request()->upozila_word_sovapoti_sommelon_women_total;
            // $data->upozila_word_sovapoti_sommelon_women_target = request()->upozila_word_sovapoti_sommelon_women_target;
            // $data->upozila_word_sovapoti_sommelon_women_uposthiti = request()->upozila_word_sovapoti_sommelon_women_uposthiti;

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
                'id' => ['required', 'exists:songothon9_sangothonik_boithoks,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Songothon9SangothonikBoithok::find(request()->id);
            $data->status = 0;
            $data->save();

            return response()->json([
                'result' => 'deactivated',
            ], 200);
        }

        public function destroy()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:songothon9_sangothonik_boithoks,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Songothon9SangothonikBoithok::find(request()->id);
            $data->delete();

            return response()->json([
                'result' => 'deleted',
            ], 200);
        }

        public function restore()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:songothon9_sangothonik_boithoks,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Songothon9SangothonikBoithok::find(request()->id);
            $data->status = 1;
            $data->save();

            return response()->json([
                'result' => 'activated',
            ], 200);
        }
}
