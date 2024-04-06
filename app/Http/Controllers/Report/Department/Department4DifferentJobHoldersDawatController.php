<?php

namespace App\Http\Controllers\Report\Department;

use App\Http\Controllers\Controller;
use App\Models\Report\Department\Department4DifferentJobHoldersDawat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Department4DifferentJobHoldersDawatController extends Controller
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
        return common_get(Department4DifferentJobHoldersDawat::class);
    }

    public function store_single()
    {
        return common_store($this, Department4DifferentJobHoldersDawat::class, $this->report_info);
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

        $query = Department4DifferentJobHoldersDawat::where('status', $status)->orderBy($orderBy, $orderByType);
        // $query = User::latest()->get();

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', '%' . $key . '%')
                ->orWhere('political_and_special_invited', '%' . $key . '%')
                ->orWhere('political_and_special_been_associated', '%' . $key . '%')
                ->orWhere('political_and_special_target', '%' . $key . '%')

                // ->orWhere('pesha_jibi_invited', '%' . $key . '%')
                // ->orWhere('pesha_jibi_been_associated', '%' . $key . '%')
                // ->orWhere('pesha_jibi_target', '%' . $key . '%')

                // ->orWhere('olama_masayekh_invited', '%' . $key . '%')
                // ->orWhere('olama_masayekh_been_associated', '%' . $key . '%')
                // ->orWhere('olama_masayekh_target', '%' . $key . '%')

                // ->orWhere('kormo_jibi_mohila_invited', '%' . $key . '%')
                // ->orWhere('kormo_jibi_mohila_been_associated', '%' . $key . '%')
                // ->orWhere('kormo_jibi_mohila_target', '%' . $key . '%')

                // ->orWhere('sromo_jibi_invited', '%' . $key . '%')
                // ->orWhere('sromo_jibi_been_associated', '%' . $key . '%')
                // ->orWhere('sromo_jibi_target', '%' . $key . '%')

                // ->orWhere('media_kormi_invited', '%' . $key . '%')
                // ->orWhere('media_kormi_been_associated', '%' . $key . '%')
                // ->orWhere('media_kormi_target', '%' . $key . '%')

                ->orWhere('prantik_jonogosti_invited', '%' . $key . '%')
                ->orWhere('prantik_jonogosti_been_associated', '%' . $key . '%')
                ->orWhere('prantik_jonogosti_target', '%' . $key . '%')

                ->orWhere('vinno_dormalombi_invited', '%' . $key . '%')
                ->orWhere('vinno_dormalombi_been_associated', '%' . $key . '%')
                ->orWhere('vinno_dormalombi_target', '%' . $key . '%');

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
        $data = Department4DifferentJobHoldersDawat::where('id', $id)
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
            'political_and_special_invited' => ['required'],
            'political_and_special_been_associated' => ['required'],
            'political_and_special_target' => ['required'],

            // 'pesha_jibi_invited' => ['required'],
            // 'pesha_jibi_been_associated' => ['required'],
            // 'pesha_jibi_target' => ['required'],

            // 'olama_masayekh_invited' => ['required'],
            // 'olama_masayekh_been_associated' => ['required'],
            // 'olama_masayekh_target' => ['required'],

            // 'kormo_jibi_mohila_invited' => ['required'],
            // 'kormo_jibi_mohila_been_associated' => ['required'],
            // 'kormo_jibi_mohila_target' => ['required'],

            // 'sromo_jibi_invited' => ['required'],
            // 'sromo_jibi_been_associated' => ['required'],
            // 'sromo_jibi_target' => ['required'],

            // 'media_kormi_invited' => ['required'],
            // 'media_kormi_been_associated' => ['required'],
            // 'media_kormi_target' => ['required'],

            'prantik_jonogosti_invited' => ['required'],
            'prantik_jonogosti_been_associated' => ['required'],
            'prantik_jonogosti_target' => ['required'],

            'vinno_dormalombi_invited' => ['required'],
            'vinno_dormalombi_been_associated' => ['required'],
            'vinno_dormalombi_target' => ['required'],

            'creator' => ['required'],
            'status' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new Department4DifferentJobHoldersDawat();
        $data->political_and_special_invited = request()->political_and_special_invited;
        $data->political_and_special_been_associated = request()->political_and_special_been_associated;
        $data->political_and_special_target = request()->political_and_special_target;

        // $data->pesha_jibi_invited = request()->pesha_jibi_invited;
        // $data->pesha_jibi_been_associated = request()->pesha_jibi_been_associated;
        // $data->pesha_jibi_target = request()->pesha_jibi_target;

        // $data->olama_masayekh_invited = request()->olama_masayekh_invited;
        // $data->olama_masayekh_been_associated = request()->olama_masayekh_been_associated;
        // $data->olama_masayekh_target = request()->olama_masayekh_target;

        // $data->kormo_jibi_mohila_invited = request()->kormo_jibi_mohila_invited;
        // $data->kormo_jibi_mohila_been_associated = request()->kormo_jibi_mohila_been_associated;
        // $data->kormo_jibi_mohila_target = request()->kormo_jibi_mohila_target;

        // $data->sromo_jibi_invited = request()->sromo_jibi_invited;
        // $data->sromo_jibi_been_associated = request()->sromo_jibi_been_associated;
        // $data->sromo_jibi_target = request()->sromo_jibi_target;

        // $data->media_kormi_invited = request()->media_kormi_invited;
        // $data->media_kormi_been_associated = request()->media_kormi_been_associated;
        // $data->media_kormi_target = request()->media_kormi_target;

        $data->prantik_jonogosti_invited = request()->prantik_jonogosti_invited;
        $data->prantik_jonogosti_been_associated = request()->prantik_jonogosti_been_associated;
        $data->prantik_jonogosti_target = request()->prantik_jonogosti_target;

        $data->vinno_dormalombi_invited = request()->vinno_dormalombi_invited;
        $data->vinno_dormalombi_been_associated = request()->vinno_dormalombi_been_associated;
        $data->vinno_dormalombi_target = request()->vinno_dormalombi_target;

        $data->creator = request()->creator;
        $data->status = request()->status;
        $data->save();

        return response()->json($data, 200);
    }

    public function update()
    {
        $data = Department4DifferentJobHoldersDawat::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'political_and_special_invited' => ['required'],
            'political_and_special_been_associated' => ['required'],
            'political_and_special_target' => ['required'],

            // 'pesha_jibi_invited' => ['required'],
            // 'pesha_jibi_been_associated' => ['required'],
            // 'pesha_jibi_target' => ['required'],

            // 'olama_masayekh_invited' => ['required'],
            // 'olama_masayekh_been_associated' => ['required'],
            // 'olama_masayekh_target' => ['required'],

            // 'kormo_jibi_mohila_invited' => ['required'],
            // 'kormo_jibi_mohila_been_associated' => ['required'],
            // 'kormo_jibi_mohila_target' => ['required'],

            // 'sromo_jibi_invited' => ['required'],
            // 'sromo_jibi_been_associated' => ['required'],
            // 'sromo_jibi_target' => ['required'],

            // 'media_kormi_invited' => ['required'],
            // 'media_kormi_been_associated' => ['required'],
            // 'media_kormi_target' => ['required'],

            'prantik_jonogosti_invited' => ['required'],
            'prantik_jonogosti_been_associated' => ['required'],
            'prantik_jonogosti_target' => ['required'],

            'vinno_dormalombi_invited' => ['required'],
            'vinno_dormalombi_been_associated' => ['required'],
            'vinno_dormalombi_target' => ['required'],

            'creator' => ['required'],
            'status' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }


        $data->political_and_special_invited = request()->political_and_special_invited;
        $data->political_and_special_been_associated = request()->political_and_special_been_associated;
        $data->political_and_special_target = request()->political_and_special_target;

        // $data->pesha_jibi_invited = request()->pesha_jibi_invited;
        // $data->pesha_jibi_been_associated = request()->pesha_jibi_been_associated;
        // $data->pesha_jibi_target = request()->pesha_jibi_target;

        // $data->olama_masayekh_invited = request()->olama_masayekh_invited;
        // $data->olama_masayekh_been_associated = request()->olama_masayekh_been_associated;
        // $data->olama_masayekh_target = request()->olama_masayekh_target;

        // $data->kormo_jibi_mohila_invited = request()->kormo_jibi_mohila_invited;
        // $data->kormo_jibi_mohila_been_associated = request()->kormo_jibi_mohila_been_associated;
        // $data->kormo_jibi_mohila_target = request()->kormo_jibi_mohila_target;

        // $data->sromo_jibi_invited = request()->sromo_jibi_invited;
        // $data->sromo_jibi_been_associated = request()->sromo_jibi_been_associated;
        // $data->sromo_jibi_target = request()->sromo_jibi_target;

        // $data->media_kormi_invited = request()->media_kormi_invited;
        // $data->media_kormi_been_associated = request()->media_kormi_been_associated;
        // $data->media_kormi_target = request()->media_kormi_target;

        $data->prantik_jonogosti_invited = request()->prantik_jonogosti_invited;
        $data->prantik_jonogosti_been_associated = request()->prantik_jonogosti_been_associated;
        $data->prantik_jonogosti_target = request()->prantik_jonogosti_target;

        $data->vinno_dormalombi_invited = request()->vinno_dormalombi_invited;
        $data->vinno_dormalombi_been_associated = request()->vinno_dormalombi_been_associated;
        $data->vinno_dormalombi_target = request()->vinno_dormalombi_target;

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
            'id' => ['required', 'exists:department4_different_job_holders_dawats,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Department4DifferentJobHoldersDawat::find(request()->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:department4_different_job_holders_dawats,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Department4DifferentJobHoldersDawat::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:department4_different_job_holders_dawats,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Department4DifferentJobHoldersDawat::find(request()->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }
}
