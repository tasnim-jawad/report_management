<?php

namespace App\Http\Controllers\Report\Ward\Department;

use App\Http\Controllers\Controller;
use App\Models\Report\Ward\Department\WardDepartment3JuboSomajDawat;
use Illuminate\Http\Request;

class WardDepartment3JuboSomajDawatController extends Controller
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
        $this->report_info = check_and_get_ward_info(auth()->user()->id);
    }

    public function get_data()
    {
        return ward_common_get(WardDepartment3JuboSomajDawat::class);
    }

    public function store_single()
    {
        return ward_common_store($this, WardDepartment3JuboSomajDawat::class, $this->report_info);
    }
}
