<?php

namespace App\Http\Controllers\Report\Dawat;

use App\Http\Controllers\Controller;
use App\Models\Report\Dawat\Dawat4GonoSongjogAndDawatOvijan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Dawat4GonoSongjogAndDawatOvijanController extends Controller
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

        $query = Dawat4GonoSongjogAndDawatOvijan::where('status', $status)->orderBy($orderBy, $orderByType);
        // $query = User::latest()->get();

        if (request()->has('search_key')) {
            $key = request()->search_key;
            $query->where(function ($q) use ($key) {
                return $q->where('id', '%' . $key . '%')
                ->orWhere('total_gono_songjog_group', '%' . $key . '%')
                ->orWhere('total_attended', '%' . $key . '%')
                ->orWhere('how_many_have_been_invited', '%' . $key . '%')
                ->orWhere('how_many_associate_members_created', '%' . $key . '%')

                ->orWhere('jela_mohanogor_declared_gonosonjog_group', '%' . $key . '%')
                ->orWhere('jela_mohanogor_declared_gonosonjog_attended', '%' . $key . '%')
                ->orWhere('jela_mohanogor_declared_gonosonjog_invited', '%' . $key . '%')
                ->orWhere('jela_mohanogor_declared_gonosonjog_associated_created', '%' . $key . '%');

                // ->orWhere('election_gono_songjog_group', '%' . $key . '%')
                // ->orWhere('election_attended', '%' . $key . '%')
                // ->orWhere('election_how_many_have_been_invited', '%' . $key . '%')
                // ->orWhere('election_how_many_associate_members_created', '%' . $key . '%')

                // ->orWhere('olama_gono_songjog_group', '%' . $key . '%')
                // ->orWhere('olama_attended', '%' . $key . '%')
                // ->orWhere('olama_how_many_have_been_invited', '%' . $key . '%')
                // ->orWhere('olama_how_many_associate_members_created', '%' . $key . '%')

                // ->orWhere('other_gono_songjog_group', '%' . $key . '%')
                // ->orWhere('other_attended', '%' . $key . '%')
                // ->orWhere('other_how_many_have', '%' . $key . '%')
                // ->orWhere('other_how_many_associate_members_created', '%' . $key . '%');

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
        $data = Dawat4GonoSongjogAndDawatOvijan::where('id', $id)
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
            'total_gono_songjog_group' => ['required'],
            'total_attended' => ['required'],
            'how_many_have_been_invited' => ['required'],
            'how_many_associate_members_created' => ['required'],

            'jela_mohanogor_declared_gonosonjog_group' => ['required'],
            'jela_mohanogor_declared_gonosonjog_attended' => ['required'],
            'jela_mohanogor_declared_gonosonjog_invited' => ['required'],
            'jela_mohanogor_declared_gonosonjog_associated_created' => ['required'],

            // 'election_gono_songjog_group' => ['required'],
            // 'election_attended' => ['required'],
            // 'election_how_many_have_been_invited' => ['required'],
            // 'election_how_many_associate_members_created' => ['required'],

            // 'olama_gono_songjog_group' => ['required'],
            // 'olama_attended' => ['required'],
            // 'olama_how_many_have_been_invited' => ['required'],
            // 'olama_how_many_associate_members_created' => ['required'],

            // 'other_gono_songjog_group' => ['required'],
            // 'other_attended' => ['required'],
            // 'other_how_many_have_been_invited' => ['required'],
            // 'other_how_many_associate_members_created' => ['required'],

            'creator' => ['required'],
            'status' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = new Dawat4GonoSongjogAndDawatOvijan();
        $data->total_gono_songjog_group = request()->total_gono_songjog_group;
        $data->total_attended = request()->total_attended;
        $data->how_many_have_been_invited = request()->how_many_have_been_invited;
        $data->how_many_associate_members_created = request()->how_many_associate_members_created;

        $data->jela_mohanogor_declared_gonosonjog_group = request()->jela_mohanogor_declared_gonosonjog_group;
        $data->jela_mohanogor_declared_gonosonjog_attended = request()->jela_mohanogor_declared_gonosonjog_attended;
        $data->jela_mohanogor_declared_gonosonjog_invited = request()->jela_mohanogor_declared_gonosonjog_invited;
        $data->jela_mohanogor_declared_gonosonjog_associated_created = request()->jela_mohanogor_declared_gonosonjog_associated_created;

        // $data->election_gono_songjog_group = request()->election_gono_songjog_group;
        // $data->election_attended = request()->election_attended;
        // $data->election_how_many_have_been_invited = request()->election_how_many_have_been_invited;
        // $data->election_how_many_associate_members_created = request()->election_how_many_associate_members_created;

        // $data->olama_gono_songjog_group = request()->olama_gono_songjog_group;
        // $data->olama_attended = request()->olama_attended;
        // $data->olama_how_many_have_been_invited = request()->olama_how_many_have_been_invited;
        // $data->olama_how_many_associate_members_created = request()->olama_how_many_associate_members_created;

        // $data->other_gono_songjog_group = request()->other_gono_songjog_group;
        // $data->other_attended = request()->other_attended;
        // $data->other_how_many_have_been_invited = request()->other_how_many_have_been_invited;
        // $data->other_how_many_associate_members_created = request()->other_how_many_associate_members_created;

        $data->creator = request()->creator;
        $data->status = request()->status;
        $data->save();

        return response()->json($data, 200);
    }

    public function update()
    {
        $data = Dawat4GonoSongjogAndDawatOvijan::find(request()->id);
        if (!$data) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
            ], 422);
        }

        $validator = Validator::make(request()->all(), [
            'total_gono_songjog_group' => ['required'],
            'total_attended' => ['required'],
            'how_many_have_been_invited' => ['required'],
            'how_many_associate_members_created' => ['required'],

            'jela_mohanogor_declared_gonosonjog_group' => ['required'],
            'jela_mohanogor_declared_gonosonjog_attended' => ['required'],
            'jela_mohanogor_declared_gonosonjog_invited' => ['required'],
            'jela_mohanogor_declared_gonosonjog_associated_created' => ['required'],

            // 'election_gono_songjog_group' => ['required'],
            // 'election_attended' => ['required'],
            // 'election_how_many_have_been_invited' => ['required'],
            // 'election_how_many_associate_members_created' => ['required'],

            // 'olama_gono_songjog_group' => ['required'],
            // 'olama_attended' => ['required'],
            // 'olama_how_many_have_been_invited' => ['required'],
            // 'olama_how_many_associate_members_created' => ['required'],

            // 'other_gono_songjog_group' => ['required'],
            // 'other_attended' => ['required'],
            // 'other_how_many_have_been_invited' => ['required'],
            // 'other_how_many_associate_members_created' => ['required'],

            'creator' => ['required'],
            'status' => ['required'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }


        $data->total_gono_songjog_group = request()->total_gono_songjog_group;
        $data->total_attended = request()->total_attended;
        $data->how_many_have_been_invited = request()->how_many_have_been_invited;
        $data->how_many_associate_members_created = request()->how_many_associate_members_created;

        $data->jela_mohanogor_declared_gonosonjog_group = request()->jela_mohanogor_declared_gonosonjog_group;
        $data->jela_mohanogor_declared_gonosonjog_attended = request()->jela_mohanogor_declared_gonosonjog_attended;
        $data->jela_mohanogor_declared_gonosonjog_invited = request()->jela_mohanogor_declared_gonosonjog_invited;
        $data->jela_mohanogor_declared_gonosonjog_associated_created = request()->jela_mohanogor_declared_gonosonjog_associated_created;

        // $data->election_gono_songjog_group = request()->election_gono_songjog_group;
        // $data->election_attended = request()->election_attended;
        // $data->election_how_many_have_been_invited = request()->election_how_many_have_been_invited;
        // $data->election_how_many_associate_members_created = request()->election_how_many_associate_members_created;

        // $data->olama_gono_songjog_group = request()->olama_gono_songjog_group;
        // $data->olama_attended = request()->olama_attended;
        // $data->olama_how_many_have_been_invited = request()->olama_how_many_have_been_invited;
        // $data->olama_how_many_associate_members_created = request()->olama_how_many_associate_members_created;

        // $data->other_gono_songjog_group = request()->other_gono_songjog_group;
        // $data->other_attended = request()->other_attended;
        // $data->other_how_many_have_been_invited = request()->other_how_many_have_been_invited;
        // $data->other_how_many_associate_members_created = request()->other_how_many_associate_members_created;

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
            'id' => ['required', 'exists:dawat4_gono_songjog_and_dawat_ovijans,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Dawat4GonoSongjogAndDawatOvijan::find(request()->id);
        $data->status = 0;
        $data->save();

        return response()->json([
            'result' => 'deactivated',
        ], 200);
    }

    public function destroy()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:dawat4_gono_songjog_and_dawat_ovijans,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Dawat4GonoSongjogAndDawatOvijan::find(request()->id);
        $data->delete();

        return response()->json([
            'result' => 'deleted',
        ], 200);
    }

    public function restore()
    {
        $validator = Validator::make(request()->all(), [
            'id' => ['required', 'exists:dawat4_gono_songjog_and_dawat_ovijans,id'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'err_message' => 'validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = Dawat4GonoSongjogAndDawatOvijan::find(request()->id);
        $data->status = 1;
        $data->save();

        return response()->json([
            'result' => 'activated',
        ], 200);
    }
}
