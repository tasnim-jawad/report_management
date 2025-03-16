<?php

namespace App\Http\Controllers\Report\Thana\Shomajsheba;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThanaShomajsheba6EducationAndResearchActivityController extends Controller
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
        return thana_common_get(\App\Models\Report\Thana\Shomajsheba\ThanaShomajsheba6EducationAndResearchActivity::class);
    }

    public function store_single()
    {
        // dd("controller",$this->report_info);
        return thana_common_store($this, \App\Models\Report\Thana\Shomajsheba\ThanaShomajsheba6EducationAndResearchActivity::class, $this->report_info);
    }
}
