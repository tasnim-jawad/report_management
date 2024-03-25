<?php

namespace App\Http\Controllers\Report\Songothon;

use App\Http\Controllers\Controller;
use App\Models\Report\Songothon\Songothon3DepartmentalInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Songothon3DepartmentalInformationController extends Controller
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

            $query = Songothon3DepartmentalInformation::where('status', $status)->orderBy($orderBy, $orderByType);
            // $query = User::latest()->get();

            if (request()->has('search_key')) {
                $key = request()->search_key;
                $query->where(function ($q) use ($key) {
                    return $q->where('id', '%' . $key . '%')
                    ->orWhere('women_rokon_previous', '%' . $key . '%')
                    ->orWhere('women_rokon_present', '%' . $key . '%')
                    ->orWhere('women_rokon_increase', '%' . $key . '%')
                    ->orWhere('women_rokon_gatti', '%' . $key . '%')
                    ->orWhere('women_rokon_target', '%' . $key . '%')

                    ->orWhere('women_kormi_previous', '%' . $key . '%')
                    ->orWhere('women_kormi_present', '%' . $key . '%')
                    ->orWhere('women_kormi_increase', '%' . $key . '%')
                    ->orWhere('women_kormi_gatti', '%' . $key . '%')
                    ->orWhere('women_kormi_target', '%' . $key . '%')

                    ->orWhere('women_associate_member_previous', '%' . $key . '%')
                    ->orWhere('women_associate_member_present', '%' . $key . '%')
                    ->orWhere('women_associate_member_increase', '%' . $key . '%')
                    ->orWhere('women_associate_member_gatti', '%' . $key . '%')
                    ->orWhere('women_associate_member_target', '%' . $key . '%')

                    ->orWhere('sromojibi_rokon_previous', '%' . $key . '%')
                    ->orWhere('sromojibi_rokon_present', '%' . $key . '%')
                    ->orWhere('sromojibi_rokon_increase', '%' . $key . '%')
                    ->orWhere('sromojibi_rokon_gatti', '%' . $key . '%')
                    ->orWhere('sromojibi_rokon_target', '%' . $key . '%')

                    ->orWhere('sromojibi_kormi_previous', '%' . $key . '%')
                    ->orWhere('sromojibi_kormi_present', '%' . $key . '%')
                    ->orWhere('sromojibi_kormi_increase', '%' . $key . '%')
                    ->orWhere('sromojibi_kormi_gatti', '%' . $key . '%')
                    ->orWhere('sromojibi_kormi_target', '%' . $key . '%')

                    ->orWhere('sromojibi_associate_member_previous', '%' . $key . '%')
                    ->orWhere('sromojibi_associate_member_present', '%' . $key . '%')
                    ->orWhere('sromojibi_associate_member_increase', '%' . $key . '%')
                    ->orWhere('sromojibi_associate_member_gatti', '%' . $key . '%')
                    ->orWhere('sromojibi_associate_member_target', '%' . $key . '%')

                    ->orWhere('ulama_rokon_previous', '%' . $key . '%')
                    ->orWhere('ulama_rokon_present', '%' . $key . '%')
                    ->orWhere('ulama_rokon_increase', '%' . $key . '%')
                    ->orWhere('ulama_rokon_gatti', '%' . $key . '%')
                    ->orWhere('ulama_rokon_target', '%' . $key . '%')

                    ->orWhere('ulama_kormi_previous', '%' . $key . '%')
                    ->orWhere('ulama_kormi_present', '%' . $key . '%')
                    ->orWhere('ulama_kormi_increase', '%' . $key . '%')
                    ->orWhere('ulama_kormi_gatti', '%' . $key . '%')
                    ->orWhere('ulama_kormi_target', '%' . $key . '%')

                    ->orWhere('ulama_associate_member_previous', '%' . $key . '%')
                    ->orWhere('ulama_associate_member_present', '%' . $key . '%')
                    ->orWhere('ulama_associate_member_increase', '%' . $key . '%')
                    ->orWhere('ulama_associate_member_gatti', '%' . $key . '%')
                    ->orWhere('ulama_associate_member_target', '%' . $key . '%')

                    ->orWhere('pesha_jibi_rokon_previous', '%' . $key . '%')
                    ->orWhere('pesha_jibi_rokon_present', '%' . $key . '%')
                    ->orWhere('pesha_jibi_rokon_increase', '%' . $key . '%')
                    ->orWhere('pesha_jibi_rokon_gatti', '%' . $key . '%')
                    ->orWhere('pesha_jibi_rokon_target', '%' . $key . '%')

                    ->orWhere('pesha_jibi_kormi_previous', '%' . $key . '%')
                    ->orWhere('pesha_jibi_kormi_present', '%' . $key . '%')
                    ->orWhere('pesha_jibi_kormi_increase', '%' . $key . '%')
                    ->orWhere('pesha_jibi_kormi_gatti', '%' . $key . '%')
                    ->orWhere('pesha_jibi_kormi_target', '%' . $key . '%')

                    ->orWhere('pesha_jibi_associate_member_previous', '%' . $key . '%')
                    ->orWhere('pesha_jibi_associate_member_present', '%' . $key . '%')
                    ->orWhere('pesha_jibi_associate_member_increase', '%' . $key . '%')
                    ->orWhere('pesha_jibi_associate_member_gatti', '%' . $key . '%')
                    ->orWhere('pesha_jibi_associate_member_target', '%' . $key . '%')

                    ->orWhere('jubo_rokon_previous', '%' . $key . '%')
                    ->orWhere('jubo_rokon_present', '%' . $key . '%')
                    ->orWhere('jubo_rokon_increase', '%' . $key . '%')
                    ->orWhere('jubo_rokon_gatti', '%' . $key . '%')
                    ->orWhere('jubo_rokon_target', '%' . $key . '%')

                    ->orWhere('jubo_kormi_previous', '%' . $key . '%')
                    ->orWhere('jubo_kormi_present', '%' . $key . '%')
                    ->orWhere('jubo_kormi_increase', '%' . $key . '%')
                    ->orWhere('jubo_kormi_gatti', '%' . $key . '%')
                    ->orWhere('jubo_kormi_target', '%' . $key . '%')

                    ->orWhere('jubo_associate_member_previous', '%' . $key . '%')
                    ->orWhere('jubo_associate_member_present', '%' . $key . '%')
                    ->orWhere('jubo_associate_member_increase', '%' . $key . '%')
                    ->orWhere('jubo_associate_member_gatti', '%' . $key . '%')
                    ->orWhere('jubo_associate_member_target', '%' . $key . '%')

                    ->orWhere('vinno_dormalombi_kormi_previous', '%' . $key . '%')
                    ->orWhere('vinno_dormalombi_kormi_present', '%' . $key . '%')
                    ->orWhere('vinno_dormalombi_kormi_increase', '%' . $key . '%')
                    ->orWhere('vinno_dormalombi_kormi_gatti', '%' . $key . '%')
                    ->orWhere('vinno_dormalombi_kormi_target', '%' . $key . '%')

                    ->orWhere('vinno_dormalombi_associate_member_previous', '%' . $key . '%')
                    ->orWhere('vinno_dormalombi_associate_member_present', '%' . $key . '%')
                    ->orWhere('vinno_dormalombi_associate_member_increase', '%' . $key . '%')
                    ->orWhere('vinno_dormalombi_associate_member_gatti', '%' . $key . '%')
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
            $data = Songothon3DepartmentalInformation::where('id', $id)
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
                'women_rokon_previous' => ['required'],
                'women_rokon_present' => ['required'],
                'women_rokon_increase' => ['required'],
                'women_rokon_gatti' => ['required'],
                'women_rokon_target' => ['required'],

                'women_kormi_previous' => ['required'],
                'women_kormi_present' => ['required'],
                'women_kormi_increase' => ['required'],
                'women_kormi_gatti' => ['required'],
                'women_kormi_target' => ['required'],

                'women_associate_member_previous' => ['required'],
                'women_associate_member_present' => ['required'],
                'women_associate_member_increase' => ['required'],
                'women_associate_member_gatti' => ['required'],
                'women_associate_member_target' => ['required'],

                'sromojibi_rokon_previous' => ['required'],
                'sromojibi_rokon_present' => ['required'],
                'sromojibi_rokon_increase' => ['required'],
                'sromojibi_rokon_gatti' => ['required'],
                'sromojibi_rokon_target' => ['required'],

                'sromojibi_kormi_previous' => ['required'],
                'sromojibi_kormi_present' => ['required'],
                'sromojibi_kormi_increase' => ['required'],
                'sromojibi_kormi_gatti' => ['required'],
                'sromojibi_kormi_target' => ['required'],

                'sromojibi_associate_member_previous' => ['required'],
                'sromojibi_associate_member_present' => ['required'],
                'sromojibi_associate_member_increase' => ['required'],
                'sromojibi_associate_member_gatti' => ['required'],
                'sromojibi_associate_member_target' => ['required'],

                'ulama_rokon_previous' => ['required'],
                'ulama_rokon_present' => ['required'],
                'ulama_rokon_increase' => ['required'],
                'ulama_rokon_gatti' => ['required'],
                'ulama_rokon_target' => ['required'],

                'ulama_kormi_previous' => ['required'],
                'ulama_kormi_present' => ['required'],
                'ulama_kormi_increase' => ['required'],
                'ulama_kormi_gatti' => ['required'],
                'ulama_kormi_target' => ['required'],

                'ulama_associate_member_previous' => ['required'],
                'ulama_associate_member_present' => ['required'],
                'ulama_associate_member_increase' => ['required'],
                'ulama_associate_member_gatti' => ['required'],
                'ulama_associate_member_target' => ['required'],

                'pesha_jibi_rokon_previous' => ['required'],
                'pesha_jibi_rokon_present' => ['required'],
                'pesha_jibi_rokon_increase' => ['required'],
                'pesha_jibi_rokon_gatti' => ['required'],
                'pesha_jibi_rokon_target' => ['required'],

                'pesha_jibi_kormi_previous' => ['required'],
                'pesha_jibi_kormi_present' => ['required'],
                'pesha_jibi_kormi_increase' => ['required'],
                'pesha_jibi_kormi_gatti' => ['required'],
                'pesha_jibi_kormi_target' => ['required'],

                'pesha_jibi_associate_member_previous' => ['required'],
                'pesha_jibi_associate_member_present' => ['required'],
                'pesha_jibi_associate_member_increase' => ['required'],
                'pesha_jibi_associate_member_gatti' => ['required'],
                'pesha_jibi_associate_member_target' => ['required'],

                'jubo_rokon_previous' => ['required'],
                'jubo_rokon_present' => ['required'],
                'jubo_rokon_increase' => ['required'],
                'jubo_rokon_gatti' => ['required'],
                'jubo_rokon_target' => ['required'],

                'jubo_kormi_previous' => ['required'],
                'jubo_kormi_present' => ['required'],
                'jubo_kormi_increase' => ['required'],
                'jubo_kormi_gatti' => ['required'],
                'jubo_kormi_target' => ['required'],

                'jubo_associate_member_previous' => ['required'],
                'jubo_associate_member_present' => ['required'],
                'jubo_associate_member_increase' => ['required'],
                'jubo_associate_member_gatti' => ['required'],
                'jubo_associate_member_target' => ['required'],

                'vinno_dormalombi_kormi_previous' => ['required'],
                'vinno_dormalombi_kormi_present' => ['required'],
                'vinno_dormalombi_kormi_increase' => ['required'],
                'vinno_dormalombi_kormi_gatti' => ['required'],
                'vinno_dormalombi_kormi_target' => ['required'],

                'vinno_dormalombi_associate_member_previous' => ['required'],
                'vinno_dormalombi_associate_member_present' => ['required'],
                'vinno_dormalombi_associate_member_increase' => ['required'],
                'vinno_dormalombi_associate_member_gatti' => ['required'],
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

            $data = new Songothon3DepartmentalInformation();
            $data->women_rokon_previous = request()->women_rokon_previous;
            $data->women_rokon_present = request()->women_rokon_present;
            $data->women_rokon_increase = request()->women_rokon_increase;
            $data->women_rokon_gatti = request()->women_rokon_gatti;
            $data->women_rokon_target = request()->women_rokon_target;

            $data->women_kormi_previous = request()->women_kormi_previous;
            $data->women_kormi_present = request()->women_kormi_present;
            $data->women_kormi_increase = request()->women_kormi_increase;
            $data->women_kormi_gatti = request()->women_kormi_gatti;
            $data->women_kormi_target = request()->women_kormi_target;

            $data->women_associate_member_previous = request()->women_associate_member_previous;
            $data->women_associate_member_present = request()->women_associate_member_present;
            $data->women_associate_member_increase = request()->women_associate_member_increase;
            $data->women_associate_member_gatti = request()->women_associate_member_gatti;
            $data->women_associate_member_target = request()->women_associate_member_target;

            $data->sromojibi_rokon_previous = request()->sromojibi_rokon_previous;
            $data->sromojibi_rokon_present = request()->sromojibi_rokon_present;
            $data->sromojibi_rokon_increase = request()->sromojibi_rokon_increase;
            $data->sromojibi_rokon_gatti = request()->sromojibi_rokon_gatti;
            $data->sromojibi_rokon_target = request()->sromojibi_rokon_target;

            $data->sromojibi_kormi_previous = request()->sromojibi_kormi_previous;
            $data->sromojibi_kormi_present = request()->sromojibi_kormi_present;
            $data->sromojibi_kormi_increase = request()->sromojibi_kormi_increase;
            $data->sromojibi_kormi_gatti = request()->sromojibi_kormi_gatti;
            $data->sromojibi_kormi_target = request()->sromojibi_kormi_target;

            $data->sromojibi_associate_member_previous = request()->sromojibi_associate_member_previous;
            $data->sromojibi_associate_member_present = request()->sromojibi_associate_member_present;
            $data->sromojibi_associate_member_increase = request()->sromojibi_associate_member_increase;
            $data->sromojibi_associate_member_gatti = request()->sromojibi_associate_member_gatti;
            $data->sromojibi_associate_member_target = request()->sromojibi_associate_member_target;

            $data->ulama_rokon_previous = request()->ulama_rokon_previous;
            $data->ulama_rokon_present = request()->ulama_rokon_present;
            $data->ulama_rokon_increase = request()->ulama_rokon_increase;
            $data->ulama_rokon_gatti = request()->ulama_rokon_gatti;
            $data->ulama_rokon_target = request()->ulama_rokon_target;

            $data->ulama_kormi_previous = request()->ulama_kormi_previous;
            $data->ulama_kormi_present = request()->ulama_kormi_present;
            $data->ulama_kormi_increase = request()->ulama_kormi_increase;
            $data->ulama_kormi_gatti = request()->ulama_kormi_gatti;
            $data->ulama_kormi_target = request()->ulama_kormi_target;

            $data->ulama_associate_member_previous = request()->ulama_associate_member_previous;
            $data->ulama_associate_member_present = request()->ulama_associate_member_present;
            $data->ulama_associate_member_increase = request()->ulama_associate_member_increase;
            $data->ulama_associate_member_gatti = request()->ulama_associate_member_gatti;
            $data->ulama_associate_member_target = request()->ulama_associate_member_target;

            $data->pesha_jibi_rokon_previous = request()->pesha_jibi_rokon_previous;
            $data->pesha_jibi_rokon_present = request()->pesha_jibi_rokon_present;
            $data->pesha_jibi_rokon_increase = request()->pesha_jibi_rokon_increase;
            $data->pesha_jibi_rokon_gatti = request()->pesha_jibi_rokon_gatti;
            $data->pesha_jibi_rokon_target = request()->pesha_jibi_rokon_target;

            $data->pesha_jibi_kormi_previous = request()->pesha_jibi_kormi_previous;
            $data->pesha_jibi_kormi_present = request()->pesha_jibi_kormi_present;
            $data->pesha_jibi_kormi_increase = request()->pesha_jibi_kormi_increase;
            $data->pesha_jibi_kormi_gatti = request()->pesha_jibi_kormi_gatti;
            $data->pesha_jibi_kormi_target = request()->pesha_jibi_kormi_target;

            $data->pesha_jibi_associate_member_previous = request()->pesha_jibi_associate_member_previous;
            $data->pesha_jibi_associate_member_present = request()->pesha_jibi_associate_member_present;
            $data->pesha_jibi_associate_member_increase = request()->pesha_jibi_associate_member_increase;
            $data->pesha_jibi_associate_member_gatti = request()->pesha_jibi_associate_member_gatti;
            $data->pesha_jibi_associate_member_target = request()->pesha_jibi_associate_member_target;

            $data->jubo_rokon_previous = request()->jubo_rokon_previous;
            $data->jubo_rokon_present = request()->jubo_rokon_present;
            $data->jubo_rokon_increase = request()->jubo_rokon_increase;
            $data->jubo_rokon_gatti = request()->jubo_rokon_gatti;
            $data->jubo_rokon_target = request()->jubo_rokon_target;

            $data->jubo_kormi_previous = request()->jubo_kormi_previous;
            $data->jubo_kormi_present = request()->jubo_kormi_present;
            $data->jubo_kormi_increase = request()->jubo_kormi_increase;
            $data->jubo_kormi_gatti = request()->jubo_kormi_gatti;
            $data->jubo_kormi_target = request()->jubo_kormi_target;

            $data->jubo_associate_member_previous = request()->jubo_associate_member_previous;
            $data->jubo_associate_member_present = request()->jubo_associate_member_present;
            $data->jubo_associate_member_increase = request()->jubo_associate_member_increase;
            $data->jubo_associate_member_gatti = request()->jubo_associate_member_gatti;
            $data->jubo_associate_member_target = request()->jubo_associate_member_target;

            $data->vinno_dormalombi_kormi_previous = request()->vinno_dormalombi_kormi_previous;
            $data->vinno_dormalombi_kormi_present = request()->vinno_dormalombi_kormi_present;
            $data->vinno_dormalombi_kormi_increase = request()->vinno_dormalombi_kormi_increase;
            $data->vinno_dormalombi_kormi_gatti = request()->vinno_dormalombi_kormi_gatti;
            $data->vinno_dormalombi_kormi_target = request()->vinno_dormalombi_kormi_target;

            $data->vinno_dormalombi_associate_member_previous = request()->vinno_dormalombi_associate_member_previous;
            $data->vinno_dormalombi_associate_member_present = request()->vinno_dormalombi_associate_member_present;
            $data->vinno_dormalombi_associate_member_increase = request()->vinno_dormalombi_associate_member_increase;
            $data->vinno_dormalombi_associate_member_gatti = request()->vinno_dormalombi_associate_member_gatti;
            $data->vinno_dormalombi_associate_member_target = request()->vinno_dormalombi_associate_member_target;

            $data->creator = request()->creator;
            $data->status = request()->status;
            $data->save();

            return response()->json($data, 200);
        }

        public function update()
        {
            $data = Songothon3DepartmentalInformation::find(request()->id);
            if (!$data) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
                ], 422);
            }

            $validator = Validator::make(request()->all(), [
                'women_rokon_previous' => ['required'],
                'women_rokon_present' => ['required'],
                'women_rokon_increase' => ['required'],
                'women_rokon_gatti' => ['required'],
                'women_rokon_target' => ['required'],

                'women_kormi_previous' => ['required'],
                'women_kormi_present' => ['required'],
                'women_kormi_increase' => ['required'],
                'women_kormi_gatti' => ['required'],
                'women_kormi_target' => ['required'],

                'women_associate_member_previous' => ['required'],
                'women_associate_member_present' => ['required'],
                'women_associate_member_increase' => ['required'],
                'women_associate_member_gatti' => ['required'],
                'women_associate_member_target' => ['required'],

                'sromojibi_rokon_previous' => ['required'],
                'sromojibi_rokon_present' => ['required'],
                'sromojibi_rokon_increase' => ['required'],
                'sromojibi_rokon_gatti' => ['required'],
                'sromojibi_rokon_target' => ['required'],

                'sromojibi_kormi_previous' => ['required'],
                'sromojibi_kormi_present' => ['required'],
                'sromojibi_kormi_increase' => ['required'],
                'sromojibi_kormi_gatti' => ['required'],
                'sromojibi_kormi_target' => ['required'],

                'sromojibi_associate_member_previous' => ['required'],
                'sromojibi_associate_member_present' => ['required'],
                'sromojibi_associate_member_increase' => ['required'],
                'sromojibi_associate_member_gatti' => ['required'],
                'sromojibi_associate_member_target' => ['required'],

                'ulama_rokon_previous' => ['required'],
                'ulama_rokon_present' => ['required'],
                'ulama_rokon_increase' => ['required'],
                'ulama_rokon_gatti' => ['required'],
                'ulama_rokon_target' => ['required'],

                'ulama_kormi_previous' => ['required'],
                'ulama_kormi_present' => ['required'],
                'ulama_kormi_increase' => ['required'],
                'ulama_kormi_gatti' => ['required'],
                'ulama_kormi_target' => ['required'],

                'ulama_associate_member_previous' => ['required'],
                'ulama_associate_member_present' => ['required'],
                'ulama_associate_member_increase' => ['required'],
                'ulama_associate_member_gatti' => ['required'],
                'ulama_associate_member_target' => ['required'],

                'pesha_jibi_rokon_previous' => ['required'],
                'pesha_jibi_rokon_present' => ['required'],
                'pesha_jibi_rokon_increase' => ['required'],
                'pesha_jibi_rokon_gatti' => ['required'],
                'pesha_jibi_rokon_target' => ['required'],

                'pesha_jibi_kormi_previous' => ['required'],
                'pesha_jibi_kormi_present' => ['required'],
                'pesha_jibi_kormi_increase' => ['required'],
                'pesha_jibi_kormi_gatti' => ['required'],
                'pesha_jibi_kormi_target' => ['required'],

                'pesha_jibi_associate_member_previous' => ['required'],
                'pesha_jibi_associate_member_present' => ['required'],
                'pesha_jibi_associate_member_increase' => ['required'],
                'pesha_jibi_associate_member_gatti' => ['required'],
                'pesha_jibi_associate_member_target' => ['required'],

                'jubo_rokon_previous' => ['required'],
                'jubo_rokon_present' => ['required'],
                'jubo_rokon_increase' => ['required'],
                'jubo_rokon_gatti' => ['required'],
                'jubo_rokon_target' => ['required'],

                'jubo_kormi_previous' => ['required'],
                'jubo_kormi_present' => ['required'],
                'jubo_kormi_increase' => ['required'],
                'jubo_kormi_gatti' => ['required'],
                'jubo_kormi_target' => ['required'],

                'jubo_associate_member_previous' => ['required'],
                'jubo_associate_member_present' => ['required'],
                'jubo_associate_member_increase' => ['required'],
                'jubo_associate_member_gatti' => ['required'],
                'jubo_associate_member_target' => ['required'],

                'vinno_dormalombi_kormi_previous' => ['required'],
                'vinno_dormalombi_kormi_present' => ['required'],
                'vinno_dormalombi_kormi_increase' => ['required'],
                'vinno_dormalombi_kormi_gatti' => ['required'],
                'vinno_dormalombi_kormi_target' => ['required'],

                'vinno_dormalombi_associate_member_previous' => ['required'],
                'vinno_dormalombi_associate_member_present' => ['required'],
                'vinno_dormalombi_associate_member_increase' => ['required'],
                'vinno_dormalombi_associate_member_gatti' => ['required'],
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


            $data->women_rokon_previous = request()->women_rokon_previous;
            $data->women_rokon_present = request()->women_rokon_present;
            $data->women_rokon_increase = request()->women_rokon_increase;
            $data->women_rokon_gatti = request()->women_rokon_gatti;
            $data->women_rokon_target = request()->women_rokon_target;

            $data->women_kormi_previous = request()->women_kormi_previous;
            $data->women_kormi_present = request()->women_kormi_present;
            $data->women_kormi_increase = request()->women_kormi_increase;
            $data->women_kormi_gatti = request()->women_kormi_gatti;
            $data->women_kormi_target = request()->women_kormi_target;

            $data->women_associate_member_previous = request()->women_associate_member_previous;
            $data->women_associate_member_present = request()->women_associate_member_present;
            $data->women_associate_member_increase = request()->women_associate_member_increase;
            $data->women_associate_member_gatti = request()->women_associate_member_gatti;
            $data->women_associate_member_target = request()->women_associate_member_target;

            $data->sromojibi_rokon_previous = request()->sromojibi_rokon_previous;
            $data->sromojibi_rokon_present = request()->sromojibi_rokon_present;
            $data->sromojibi_rokon_increase = request()->sromojibi_rokon_increase;
            $data->sromojibi_rokon_gatti = request()->sromojibi_rokon_gatti;
            $data->sromojibi_rokon_target = request()->sromojibi_rokon_target;

            $data->sromojibi_kormi_previous = request()->sromojibi_kormi_previous;
            $data->sromojibi_kormi_present = request()->sromojibi_kormi_present;
            $data->sromojibi_kormi_increase = request()->sromojibi_kormi_increase;
            $data->sromojibi_kormi_gatti = request()->sromojibi_kormi_gatti;
            $data->sromojibi_kormi_target = request()->sromojibi_kormi_target;

            $data->sromojibi_associate_member_previous = request()->sromojibi_associate_member_previous;
            $data->sromojibi_associate_member_present = request()->sromojibi_associate_member_present;
            $data->sromojibi_associate_member_increase = request()->sromojibi_associate_member_increase;
            $data->sromojibi_associate_member_gatti = request()->sromojibi_associate_member_gatti;
            $data->sromojibi_associate_member_target = request()->sromojibi_associate_member_target;

            $data->ulama_rokon_previous = request()->ulama_rokon_previous;
            $data->ulama_rokon_present = request()->ulama_rokon_present;
            $data->ulama_rokon_increase = request()->ulama_rokon_increase;
            $data->ulama_rokon_gatti = request()->ulama_rokon_gatti;
            $data->ulama_rokon_target = request()->ulama_rokon_target;

            $data->ulama_kormi_previous = request()->ulama_kormi_previous;
            $data->ulama_kormi_present = request()->ulama_kormi_present;
            $data->ulama_kormi_increase = request()->ulama_kormi_increase;
            $data->ulama_kormi_gatti = request()->ulama_kormi_gatti;
            $data->ulama_kormi_target = request()->ulama_kormi_target;

            $data->ulama_associate_member_previous = request()->ulama_associate_member_previous;
            $data->ulama_associate_member_present = request()->ulama_associate_member_present;
            $data->ulama_associate_member_increase = request()->ulama_associate_member_increase;
            $data->ulama_associate_member_gatti = request()->ulama_associate_member_gatti;
            $data->ulama_associate_member_target = request()->ulama_associate_member_target;

            $data->pesha_jibi_rokon_previous = request()->pesha_jibi_rokon_previous;
            $data->pesha_jibi_rokon_present = request()->pesha_jibi_rokon_present;
            $data->pesha_jibi_rokon_increase = request()->pesha_jibi_rokon_increase;
            $data->pesha_jibi_rokon_gatti = request()->pesha_jibi_rokon_gatti;
            $data->pesha_jibi_rokon_target = request()->pesha_jibi_rokon_target;

            $data->pesha_jibi_kormi_previous = request()->pesha_jibi_kormi_previous;
            $data->pesha_jibi_kormi_present = request()->pesha_jibi_kormi_present;
            $data->pesha_jibi_kormi_increase = request()->pesha_jibi_kormi_increase;
            $data->pesha_jibi_kormi_gatti = request()->pesha_jibi_kormi_gatti;
            $data->pesha_jibi_kormi_target = request()->pesha_jibi_kormi_target;

            $data->pesha_jibi_associate_member_previous = request()->pesha_jibi_associate_member_previous;
            $data->pesha_jibi_associate_member_present = request()->pesha_jibi_associate_member_present;
            $data->pesha_jibi_associate_member_increase = request()->pesha_jibi_associate_member_increase;
            $data->pesha_jibi_associate_member_gatti = request()->pesha_jibi_associate_member_gatti;
            $data->pesha_jibi_associate_member_target = request()->pesha_jibi_associate_member_target;

            $data->jubo_rokon_previous = request()->jubo_rokon_previous;
            $data->jubo_rokon_present = request()->jubo_rokon_present;
            $data->jubo_rokon_increase = request()->jubo_rokon_increase;
            $data->jubo_rokon_gatti = request()->jubo_rokon_gatti;
            $data->jubo_rokon_target = request()->jubo_rokon_target;

            $data->jubo_kormi_previous = request()->jubo_kormi_previous;
            $data->jubo_kormi_present = request()->jubo_kormi_present;
            $data->jubo_kormi_increase = request()->jubo_kormi_increase;
            $data->jubo_kormi_gatti = request()->jubo_kormi_gatti;
            $data->jubo_kormi_target = request()->jubo_kormi_target;

            $data->jubo_associate_member_previous = request()->jubo_associate_member_previous;
            $data->jubo_associate_member_present = request()->jubo_associate_member_present;
            $data->jubo_associate_member_increase = request()->jubo_associate_member_increase;
            $data->jubo_associate_member_gatti = request()->jubo_associate_member_gatti;
            $data->jubo_associate_member_target = request()->jubo_associate_member_target;

            $data->vinno_dormalombi_kormi_previous = request()->vinno_dormalombi_kormi_previous;
            $data->vinno_dormalombi_kormi_present = request()->vinno_dormalombi_kormi_present;
            $data->vinno_dormalombi_kormi_increase = request()->vinno_dormalombi_kormi_increase;
            $data->vinno_dormalombi_kormi_gatti = request()->vinno_dormalombi_kormi_gatti;
            $data->vinno_dormalombi_kormi_target = request()->vinno_dormalombi_kormi_target;

            $data->vinno_dormalombi_associate_member_previous = request()->vinno_dormalombi_associate_member_previous;
            $data->vinno_dormalombi_associate_member_present = request()->vinno_dormalombi_associate_member_present;
            $data->vinno_dormalombi_associate_member_increase = request()->vinno_dormalombi_associate_member_increase;
            $data->vinno_dormalombi_associate_member_gatti = request()->vinno_dormalombi_associate_member_gatti;
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
                'id' => ['required', 'exists:songothon3_departmental_information,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Songothon3DepartmentalInformation::find(request()->id);
            $data->status = 0;
            $data->save();

            return response()->json([
                'result' => 'deactivated',
            ], 200);
        }

        public function destroy()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:songothon3_departmental_information,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Songothon3DepartmentalInformation::find(request()->id);
            $data->delete();

            return response()->json([
                'result' => 'deleted',
            ], 200);
        }

        public function restore()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:songothon3_departmental_information,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Songothon3DepartmentalInformation::find(request()->id);
            $data->status = 1;
            $data->save();

            return response()->json([
                'result' => 'activated',
            ], 200);
        }
}
