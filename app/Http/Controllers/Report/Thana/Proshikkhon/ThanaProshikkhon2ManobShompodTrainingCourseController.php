<?php

namespace App\Http\Controllers\Report\Thana\Proshikkhon;

use App\Http\Controllers\Controller;
use App\Models\Report\Thana\Proshikkhon\ThanaProshikkhon2ManobShompodTrainingCourse;
use Illuminate\Http\Request;

class ThanaProshikkhon2ManobShompodTrainingCourseController extends Controller
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
        return thana_common_get(ThanaProshikkhon2ManobShompodTrainingCourse::class);
    }

    public function store_single()
    {
        // dd("controller",$this->report_info);
        return thana_common_store($this, ThanaProshikkhon2ManobShompodTrainingCourse::class, $this->report_info);
    }
}
