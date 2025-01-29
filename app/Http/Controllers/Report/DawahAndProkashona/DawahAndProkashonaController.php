<?php

namespace App\Http\Controllers\Report\DawahAndProkashona;

use App\Http\Controllers\Controller;
use App\Models\Report\DawahAndProkashona\DawahAndProkashona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DawahAndProkashonaController extends Controller
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
        return common_get(DawahAndProkashona::class);
    }

    public function store_single()
    {
        return common_store($this, DawahAndProkashona::class, $this->report_info);
    }
}
