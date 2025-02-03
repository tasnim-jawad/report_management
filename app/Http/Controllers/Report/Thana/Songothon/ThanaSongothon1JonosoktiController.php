<?php

namespace App\Http\Controllers\Report\Thana\Songothon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThanaSongothon1JonosoktiController extends Controller
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
        return thana_common_get(\App\Models\Report\Thana\Songothon\ThanaSongothon1Jonosokti::class);
    }

    public function store_single()
    {
        // dd("controller",$this->report_info);
        return thana_common_store($this, \App\Models\Report\Thana\Songothon\ThanaSongothon1Jonosokti::class, $this->report_info);
    }
}
