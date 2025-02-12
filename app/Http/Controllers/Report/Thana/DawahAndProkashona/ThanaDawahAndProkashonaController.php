<?php

namespace App\Http\Controllers\Report\Thana\DawahAndProkashona;

use App\Http\Controllers\Controller;
use App\Models\Report\Thana\DawahAndProkashona\ThanaDawahAndProkashona;
use Illuminate\Http\Request;

class ThanaDawahAndProkashonaController extends Controller
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
        $this->report_info = check_and_get_thana_info(auth()->user()->id);
    }

    public function get_data()
    {
        return common_get(ThanaDawahAndProkashona::class);
    }

    public function store_single()
    {
        return common_store($this, ThanaDawahAndProkashona::class, $this->report_info);
    }
}
