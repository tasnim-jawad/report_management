<?php

namespace App\Http\Controllers\Report\Thana\Dawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report\Thana\Dawat\ThanaDawat3GeneralProgramAndOthers;

class ThanaDawat3GeneralProgramAndOthersController extends Controller
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
        return thana_common_get(ThanaDawat3GeneralProgramAndOthers::class);
    }

    public function store_single()
    {
        // dd("controller",$this->report_info);
        return thana_common_store($this, ThanaDawat3GeneralProgramAndOthers::class, $this->report_info);
    }
}
