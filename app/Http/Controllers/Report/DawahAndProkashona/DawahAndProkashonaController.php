<?php

namespace App\Http\Controllers\Report\DawahAndProkashona;

use App\Http\Controllers\Controller;
use App\Models\Report\DawahAndProkashona\DawahAndProkashona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DawahAndProkashonaController extends Controller
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

            $query = DawahAndProkashona::where('status', $status)->orderBy($orderBy, $orderByType);
            // $query = User::latest()->get();

            if (request()->has('search_key')) {
                $key = request()->search_key;
                $query->where(function ($q) use ($key) {
                    return $q->where('id', '%' . $key . '%')
                    // ->orWhere('total_pathagar', '%' . $key . '%')
                    // ->orWhere('total_pathagar_increase', '%' . $key . '%')
                    // ->orWhere('total_pathagar_target', '%' . $key . '%')

                    // ->orWhere('total_online_pathagar', '%' . $key . '%')
                    // ->orWhere('total_online_pathagar_increase', '%' . $key . '%')
                    // ->orWhere('total_online_pathagar_target', '%' . $key . '%')

                    // ->orWhere('books_in_pathagar', '%' . $key . '%')
                    // ->orWhere('books_in_pathagar_increase', '%' . $key . '%')
                    // ->orWhere('books_in_pathagar_target', '%' . $key . '%')

                    // ->orWhere('books_in_pathagar_target', '%' . $key . '%')
                    // ->orWhere('book_distribution_increase', '%' . $key . '%')
                    // ->orWhere('book_distribution_target', '%' . $key . '%')

                    ->orWhere('unit_book_distribution_center', '%' . $key . '%')
                    ->orWhere('unit_book_distribution_center_increase', '%' . $key . '%')
                    // ->orWhere('unit_book_distribution_center_target', '%' . $key . '%')

                    ->orWhere('unit_book_distribution', '%' . $key . '%')
                    ->orWhere('unit_book_distribution_increase', '%' . $key . '%')
                    // ->orWhere('unit_book_distribution_target', '%' . $key . '%')

                    // ->orWhere('ward_book_sales_center', '%' . $key . '%')
                    // ->orWhere('ward_book_sales_center_increase', '%' . $key . '%')

                    // ->orWhere('ward_book_sales', '%' . $key . '%')
                    // ->orWhere('ward_book_sales_increase', '%' . $key . '%')

                    ->orWhere('soft_copy_book_distribution', '%' . $key . '%')
                    ->orWhere('soft_copy_book_distribution_increase', '%' . $key . '%')

                    ->orWhere('dawat_link_distribution', '%' . $key . '%')
                    ->orWhere('dawat_link_distribution_increase', '%' . $key . '%')

                    ->orWhere('sonar_bangla', '%' . $key . '%')
                    ->orWhere('sonar_bangla_increase', '%' . $key . '%')

                    ->orWhere('songram', '%' . $key . '%')
                    ->orWhere('songram_increase', '%' . $key . '%')

                    ->orWhere('prithibi', '%' . $key . '%')
                    ->orWhere('prithibi_increase', '%' . $key . '%');

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
            $data = DawahAndProkashona::where('id', $id)
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
                // 'total_pathagar' => ['required'],
                // 'total_pathagar_increase' => ['required'],
                // 'total_pathagar_target' => ['required'],

                // 'total_online_pathagar' => ['required'],
                // 'total_online_pathagar_increase' => ['required'],
                // 'total_online_pathagar_target' => ['required'],

                'books_in_pathagar' => ['required'],
                'books_in_pathagar_increase' => ['required'],
                // 'books_in_pathagar_target' => ['required'],

                // 'books_in_pathagar_target' => ['required'],
                // 'book_distribution_increase' => ['required'],
                // 'book_distribution_target' => ['required'],

                'unit_book_distribution_center' => ['required'],
                'unit_book_distribution_center_increase' => ['required'],
                // 'unit_book_distribution_center_target' => ['required'],

                'unit_book_distribution' => ['required'],
                'unit_book_distribution_increase' => ['required'],
                // 'unit_book_distribution_target' => ['required'],

                // 'ward_book_sales_center' => ['required'],
                // 'ward_book_sales_center_increase' => ['required'],

                // 'ward_book_sales' => ['required'],
                // 'ward_book_sales_increase' => ['required'],

                'soft_copy_book_distribution' => ['required'],
                'soft_copy_book_distribution_increase' => ['required'],

                'dawat_link_distribution' => ['required'],
                'dawat_link_distribution_increase' => ['required'],

                'sonar_bangla' => ['required'],
                'sonar_bangla_increase' => ['required'],

                'songram' => ['required'],
                'songram_increase' => ['required'],

                'prithibi' => ['required'],
                'prithibi_increase' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = new DawahAndProkashona();
            // $data->total_pathagar = request()->total_pathagar;
            // $data->total_pathagar_increase = request()->total_pathagar_increase;
            // $data->total_pathagar_target = request()->total_pathagar_target;

            // $data->total_online_pathagar = request()->total_online_pathagar;
            // $data->total_online_pathagar_increase = request()->total_online_pathagar_increase;
            // $data->total_online_pathagar_target = request()->total_online_pathagar_target;

            $data->books_in_pathagar = request()->books_in_pathagar;
            $data->books_in_pathagar_increase = request()->books_in_pathagar_increase;
            // $data->books_in_pathagar_target = request()->books_in_pathagar_target;

            // $data->books_in_pathagar_target = request()->books_in_pathagar_target;
            // $data->book_distribution_increase = request()->book_distribution_increase;
            // $data->book_distribution_target = request()->book_distribution_target;

            $data->unit_book_distribution_center = request()->unit_book_distribution_center;
            $data->unit_book_distribution_center_increase = request()->unit_book_distribution_center_increase;
            // $data->unit_book_distribution_center_target = request()->unit_book_distribution_center_target;

            $data->unit_book_distribution = request()->unit_book_distribution;
            $data->unit_book_distribution_increase = request()->unit_book_distribution_increase;
            // $data->unit_book_distribution_target = request()->unit_book_distribution_target;

            // $data->ward_book_sales_center = request()->ward_book_sales_center;
            // $data->ward_book_sales_center_increase = request()->ward_book_sales_center_increase;

            // $data->ward_book_sales = request()->ward_book_sales;
            // $data->ward_book_sales_increase = request()->ward_book_sales_increase;

            $data->soft_copy_book_distribution = request()->soft_copy_book_distribution;
            $data->soft_copy_book_distribution_increase = request()->soft_copy_book_distribution_increase;

            $data->dawat_link_distribution = request()->dawat_link_distribution;
            $data->dawat_link_distribution_increase = request()->dawat_link_distribution_increase;

            $data->sonar_bangla = request()->sonar_bangla;
            $data->sonar_bangla_increase = request()->sonar_bangla_increase;

            $data->songram = request()->songram;
            $data->songram_increase = request()->songram_increase;

            $data->prithibi = request()->prithibi;
            $data->prithibi_increase = request()->prithibi_increase;

            $data->creator = request()->creator;
            $data->status = request()->status;
            $data->save();

            return response()->json($data, 200);
        }

        public function update()
        {
            $data = DawahAndProkashona::find(request()->id);
            if (!$data) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => ['name' => ['data not found by given id ' . (request()->id ? request()->id : 'null')]],
                ], 422);
            }

            $validator = Validator::make(request()->all(), [
                // 'total_pathagar' => ['required'],
                // 'total_pathagar_increase' => ['required'],
                // 'total_pathagar_target' => ['required'],

                // 'total_online_pathagar' => ['required'],
                // 'total_online_pathagar_increase' => ['required'],
                // 'total_online_pathagar_target' => ['required'],

                'books_in_pathagar' => ['required'],
                'books_in_pathagar_increase' => ['required'],
                // 'books_in_pathagar_target' => ['required'],

                // 'books_in_pathagar_target' => ['required'],
                // 'book_distribution_increase' => ['required'],
                // 'book_distribution_target' => ['required'],

                'unit_book_distribution_center' => ['required'],
                'unit_book_distribution_center_increase' => ['required'],
                // 'unit_book_distribution_center_target' => ['required'],

                'unit_book_distribution' => ['required'],
                'unit_book_distribution_increase' => ['required'],
                // 'unit_book_distribution_target' => ['required'],

                // 'ward_book_sales_center' => ['required'],
                // 'ward_book_sales_center_increase' => ['required'],

                // 'ward_book_sales' => ['required'],
                // 'ward_book_sales_increase' => ['required'],

                'soft_copy_book_distribution' => ['required'],
                'soft_copy_book_distribution_increase' => ['required'],

                'dawat_link_distribution' => ['required'],
                'dawat_link_distribution_increase' => ['required'],

                'sonar_bangla' => ['required'],
                'sonar_bangla_increase' => ['required'],

                'songram' => ['required'],
                'songram_increase' => ['required'],

                'prithibi' => ['required'],
                'prithibi_increase' => ['required'],

                'creator' => ['required'],
                'status' => ['required'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }


            // $data->total_pathagar = request()->total_pathagar;
            // $data->total_pathagar_increase = request()->total_pathagar_increase;
            // $data->total_pathagar_target = request()->total_pathagar_target;

            // $data->total_online_pathagar = request()->total_online_pathagar;
            // $data->total_online_pathagar_increase = request()->total_online_pathagar_increase;
            // $data->total_online_pathagar_target = request()->total_online_pathagar_target;

            $data->books_in_pathagar = request()->books_in_pathagar;
            $data->books_in_pathagar_increase = request()->books_in_pathagar_increase;
            // $data->books_in_pathagar_target = request()->books_in_pathagar_target;

            // $data->books_in_pathagar_target = request()->books_in_pathagar_target;
            // $data->book_distribution_increase = request()->book_distribution_increase;
            // $data->book_distribution_target = request()->book_distribution_target;

            $data->unit_book_distribution_center = request()->unit_book_distribution_center;
            $data->unit_book_distribution_center_increase = request()->unit_book_distribution_center_increase;
            // $data->unit_book_distribution_center_target = request()->unit_book_distribution_center_target;

            $data->unit_book_distribution = request()->unit_book_distribution;
            $data->unit_book_distribution_increase = request()->unit_book_distribution_increase;
            // $data->unit_book_distribution_target = request()->unit_book_distribution_target;

            // $data->ward_book_sales_center = request()->ward_book_sales_center;
            // $data->ward_book_sales_center_increase = request()->ward_book_sales_center_increase;

            // $data->ward_book_sales = request()->ward_book_sales;
            // $data->ward_book_sales_increase = request()->ward_book_sales_increase;

            $data->soft_copy_book_distribution = request()->soft_copy_book_distribution;
            $data->soft_copy_book_distribution_increase = request()->soft_copy_book_distribution_increase;

            $data->dawat_link_distribution = request()->dawat_link_distribution;
            $data->dawat_link_distribution_increase = request()->dawat_link_distribution_increase;

            $data->sonar_bangla = request()->sonar_bangla;
            $data->sonar_bangla_increase = request()->sonar_bangla_increase;

            $data->songram = request()->songram;
            $data->songram_increase = request()->songram_increase;

            $data->prithibi = request()->prithibi;
            $data->prithibi_increase = request()->prithibi_increase;

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
                'id' => ['required', 'exists:dawah_and_prokashonas,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = DawahAndProkashona::find(request()->id);
            $data->status = 0;
            $data->save();

            return response()->json([
                'result' => 'deactivated',
            ], 200);
        }

        public function destroy()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:dawah_and_prokashonas,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = DawahAndProkashona::find(request()->id);
            $data->delete();

            return response()->json([
                'result' => 'deleted',
            ], 200);
        }

        public function restore()
        {
            $validator = Validator::make(request()->all(), [
                'id' => ['required', 'exists:dawah_and_prokashonas,id'],
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'err_message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $data = DawahAndProkashona::find(request()->id);
            $data->status = 1;
            $data->save();

            return response()->json([
                'result' => 'activated',
            ], 200);
        }
}
