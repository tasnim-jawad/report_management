<?php

namespace App\Http\Controllers\Report\Songothon;

use App\Http\Controllers\Controller;
use App\Models\Report\Songothon\Songothon4UnitSongothon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Songothon4UnitSongothonController extends Controller
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

            $query = Songothon4UnitSongothon::where('status', $status)->orderBy($orderBy, $orderByType);
            // $query = User::latest()->get();

            if (request()->has('search_key')) {
                $key = request()->search_key;
                $query->where(function ($q) use ($key) {
                    return $q->where('id', '%' . $key . '%')
                    ->orWhere('general_unit_men_previous', '%' . $key . '%')
                    ->orWhere('general_unit_men_present', '%' . $key . '%')
                    ->orWhere('general_unit_men_increase', '%' . $key . '%')
                    ->orWhere('general_unit_men_gatti', '%' . $key . '%')
                    ->orWhere('general_unit_men_target', '%' . $key . '%')

                    ->orWhere('general_unit_women_previous', '%' . $key . '%')
                    ->orWhere('general_unit_women_present', '%' . $key . '%')
                    ->orWhere('general_unit_women_increase', '%' . $key . '%')
                    ->orWhere('general_unit_women_gatti', '%' . $key . '%')
                    ->orWhere('general_unit_women_target', '%' . $key . '%')

                    ->orWhere('ulama_unit_previous', '%' . $key . '%')
                    ->orWhere('ulama_unit_present', '%' . $key . '%')
                    ->orWhere('ulama_unit_increase', '%' . $key . '%')
                    ->orWhere('ulama_unit_gatti', '%' . $key . '%')
                    ->orWhere('ulama_unit_target', '%' . $key . '%')

                    ->orWhere('peshajibi_unit_previous', '%' . $key . '%')
                    ->orWhere('peshajibi_unit_present', '%' . $key . '%')
                    ->orWhere('peshajibi_unit_increase', '%' . $key . '%')
                    ->orWhere('peshajibi_unit_gatti', '%' . $key . '%')
                    ->orWhere('peshajibi_unit_target', '%' . $key . '%')

                    ->orWhere('sromik_kollyan_unit_previous', '%' . $key . '%')
                    ->orWhere('sromik_kollyan_unit_present', '%' . $key . '%')
                    ->orWhere('sromik_kollyan_unit_increase', '%' . $key . '%')
                    ->orWhere('sromik_kollyan_unit_gatti', '%' . $key . '%')
                    ->orWhere('sromik_kollyan_unit_target', '%' . $key . '%')

                    ->orWhere('jubo_unit_previous', '%' . $key . '%')
                    ->orWhere('jubo_unit_present', '%' . $key . '%')
                    ->orWhere('jubo_unit_increase', '%' . $key . '%')
                    ->orWhere('jubo_unit_gatti', '%' . $key . '%')
                    ->orWhere('jubo_unit_target', '%' . $key . '%')

                    ->orWhere('media_unit_previous', '%' . $key . '%')
                    ->orWhere('media_unit_present', '%' . $key . '%')
                    ->orWhere('media_unit_increase', '%' . $key . '%')
                    ->orWhere('media_unit_gatti', '%' . $key . '%')
                    ->orWhere('media_unit_target', '%' . $key . '%');

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
            $data = Songothon4UnitSongothon::where('id', $id)
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
                'general_unit_men_previous' => ['required'],
                'general_unit_men_present' => ['required'],
                'general_unit_men_increase' => ['required'],
                'general_unit_men_gatti' => ['required'],
                'general_unit_men_target' => ['required'],

                'general_unit_women_previous' => ['required'],
                'general_unit_women_present' => ['required'],
                'general_unit_women_increase' => ['required'],
                'general_unit_women_gatti' => ['required'],
                'general_unit_women_target' => ['required'],

                'ulama_unit_previous' => ['required'],
                'ulama_unit_present' => ['required'],
                'ulama_unit_increase' => ['required'],
                'ulama_unit_gatti' => ['required'],
                'ulama_unit_target' => ['required'],

                'peshajibi_unit_previous' => ['required'],
                'peshajibi_unit_present' => ['required'],
                'peshajibi_unit_increase' => ['required'],
                'peshajibi_unit_gatti' => ['required'],
                'peshajibi_unit_target' => ['required'],

                'sromik_kollyan_unit_previous' => ['required'],
                'sromik_kollyan_unit_present' => ['required'],
                'sromik_kollyan_unit_increase' => ['required'],
                'sromik_kollyan_unit_gatti' => ['required'],
                'sromik_kollyan_unit_target' => ['required'],

                'jubo_unit_previous' => ['required'],
                'jubo_unit_present' => ['required'],
                'jubo_unit_increase' => ['required'],
                'jubo_unit_gatti' => ['required'],
                'jubo_unit_target' => ['required'],

                'media_unit_previous' => ['required'],
                'media_unit_present' => ['required'],
                'media_unit_increase' => ['required'],
                'media_unit_gatti' => ['required'],
                'media_unit_target' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = new Songothon4UnitSongothon();
            $data->general_unit_men_previous = request()->general_unit_men_previous;
            $data->general_unit_men_present = request()->general_unit_men_present;
            $data->general_unit_men_increase = request()->general_unit_men_increase;
            $data->general_unit_men_gatti = request()->general_unit_men_gatti;
            $data->general_unit_men_target = request()->general_unit_men_target;

            $data->general_unit_women_previous = request()->general_unit_women_previous;
            $data->general_unit_women_present = request()->general_unit_women_present;
            $data->general_unit_women_increase = request()->general_unit_women_increase;
            $data->general_unit_women_gatti = request()->general_unit_women_gatti;
            $data->general_unit_women_target = request()->general_unit_women_target;

            $data->ulama_unit_previous = request()->ulama_unit_previous;
            $data->ulama_unit_present = request()->ulama_unit_present;
            $data->ulama_unit_increase = request()->ulama_unit_increase;
            $data->ulama_unit_gatti = request()->ulama_unit_gatti;
            $data->ulama_unit_target = request()->ulama_unit_target;

            $data->peshajibi_unit_previous = request()->peshajibi_unit_previous;
            $data->peshajibi_unit_present = request()->peshajibi_unit_present;
            $data->peshajibi_unit_increase = request()->peshajibi_unit_increase;
            $data->peshajibi_unit_gatti = request()->peshajibi_unit_gatti;
            $data->peshajibi_unit_target = request()->peshajibi_unit_target;

            $data->sromik_kollyan_unit_previous = request()->sromik_kollyan_unit_previous;
            $data->sromik_kollyan_unit_present = request()->sromik_kollyan_unit_present;
            $data->sromik_kollyan_unit_increase = request()->sromik_kollyan_unit_increase;
            $data->sromik_kollyan_unit_gatti = request()->sromik_kollyan_unit_gatti;
            $data->sromik_kollyan_unit_target = request()->sromik_kollyan_unit_target;

            $data->jubo_unit_previous = request()->jubo_unit_previous;
            $data->jubo_unit_present = request()->jubo_unit_present;
            $data->jubo_unit_increase = request()->jubo_unit_increase;
            $data->jubo_unit_gatti = request()->jubo_unit_gatti;
            $data->jubo_unit_target = request()->jubo_unit_target;

            $data->media_unit_previous = request()->media_unit_previous;
            $data->media_unit_present = request()->media_unit_present;
            $data->media_unit_increase = request()->media_unit_increase;
            $data->media_unit_gatti = request()->media_unit_gatti;
            $data->media_unit_target = request()->media_unit_target;

            $data->creator = request()->creator;
            $data->status = request()->status;
            $data->save();

            return response()->json($data, 200);
        }

        public function update()
        {
            $data = Songothon4UnitSongothon::find(request()->id);
            if (!$data) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
                ], 422);
            }

            $validator = Validator::make(request()->all(), [
                'general_unit_men_previous' => ['required'],
                'general_unit_men_present' => ['required'],
                'general_unit_men_increase' => ['required'],
                'general_unit_men_gatti' => ['required'],
                'general_unit_men_target' => ['required'],

                'general_unit_women_previous' => ['required'],
                'general_unit_women_present' => ['required'],
                'general_unit_women_increase' => ['required'],
                'general_unit_women_gatti' => ['required'],
                'general_unit_women_target' => ['required'],

                'ulama_unit_previous' => ['required'],
                'ulama_unit_present' => ['required'],
                'ulama_unit_increase' => ['required'],
                'ulama_unit_gatti' => ['required'],
                'ulama_unit_target' => ['required'],

                'peshajibi_unit_previous' => ['required'],
                'peshajibi_unit_present' => ['required'],
                'peshajibi_unit_increase' => ['required'],
                'peshajibi_unit_gatti' => ['required'],
                'peshajibi_unit_target' => ['required'],

                'sromik_kollyan_unit_previous' => ['required'],
                'sromik_kollyan_unit_present' => ['required'],
                'sromik_kollyan_unit_increase' => ['required'],
                'sromik_kollyan_unit_gatti' => ['required'],
                'sromik_kollyan_unit_target' => ['required'],

                'jubo_unit_previous' => ['required'],
                'jubo_unit_present' => ['required'],
                'jubo_unit_increase' => ['required'],
                'jubo_unit_gatti' => ['required'],
                'jubo_unit_target' => ['required'],

                'media_unit_previous' => ['required'],
                'media_unit_present' => ['required'],
                'media_unit_increase' => ['required'],
                'media_unit_gatti' => ['required'],
                'media_unit_target' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }


            $data->general_unit_men_previous = request()->general_unit_men_previous;
            $data->general_unit_men_present = request()->general_unit_men_present;
            $data->general_unit_men_increase = request()->general_unit_men_increase;
            $data->general_unit_men_gatti = request()->general_unit_men_gatti;
            $data->general_unit_men_target = request()->general_unit_men_target;

            $data->general_unit_women_previous = request()->general_unit_women_previous;
            $data->general_unit_women_present = request()->general_unit_women_present;
            $data->general_unit_women_increase = request()->general_unit_women_increase;
            $data->general_unit_women_gatti = request()->general_unit_women_gatti;
            $data->general_unit_women_target = request()->general_unit_women_target;

            $data->ulama_unit_previous = request()->ulama_unit_previous;
            $data->ulama_unit_present = request()->ulama_unit_present;
            $data->ulama_unit_increase = request()->ulama_unit_increase;
            $data->ulama_unit_gatti = request()->ulama_unit_gatti;
            $data->ulama_unit_target = request()->ulama_unit_target;

            $data->peshajibi_unit_previous = request()->peshajibi_unit_previous;
            $data->peshajibi_unit_present = request()->peshajibi_unit_present;
            $data->peshajibi_unit_increase = request()->peshajibi_unit_increase;
            $data->peshajibi_unit_gatti = request()->peshajibi_unit_gatti;
            $data->peshajibi_unit_target = request()->peshajibi_unit_target;

            $data->sromik_kollyan_unit_previous = request()->sromik_kollyan_unit_previous;
            $data->sromik_kollyan_unit_present = request()->sromik_kollyan_unit_present;
            $data->sromik_kollyan_unit_increase = request()->sromik_kollyan_unit_increase;
            $data->sromik_kollyan_unit_gatti = request()->sromik_kollyan_unit_gatti;
            $data->sromik_kollyan_unit_target = request()->sromik_kollyan_unit_target;

            $data->jubo_unit_previous = request()->jubo_unit_previous;
            $data->jubo_unit_present = request()->jubo_unit_present;
            $data->jubo_unit_increase = request()->jubo_unit_increase;
            $data->jubo_unit_gatti = request()->jubo_unit_gatti;
            $data->jubo_unit_target = request()->jubo_unit_target;

            $data->media_unit_previous = request()->media_unit_previous;
            $data->media_unit_present = request()->media_unit_present;
            $data->media_unit_increase = request()->media_unit_increase;
            $data->media_unit_gatti = request()->media_unit_gatti;
            $data->media_unit_target = request()->media_unit_target;

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
                'id' => ['required', 'exists:songothon4_unit_songothons,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Songothon4UnitSongothon::find(request()->id);
            $data->status = 0;
            $data->save();

            return response()->json([
                'result' => 'deactivated',
            ], 200);
        }

        public function destroy()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:songothon4_unit_songothons,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Songothon4UnitSongothon::find(request()->id);
            $data->delete();

            return response()->json([
                'result' => 'deleted',
            ], 200);
        }

        public function restore()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:songothon4_unit_songothons,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = Songothon4UnitSongothon::find(request()->id);
            $data->status = 1;
            $data->save();

            return response()->json([
                'result' => 'activated',
            ], 200);
        }
}
