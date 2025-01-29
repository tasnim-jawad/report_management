<?php

namespace App\Http\Controllers\Report\Ward\Department;

use App\Http\Controllers\Controller;
use App\Models\Report\Ward\Department\WardDepartment4DifferentJobHoldersDawat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WardDepartment4DifferentJobHoldersDawatController extends Controller
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
        return ward_common_get(WardDepartment4DifferentJobHoldersDawat::class);
    }

    public function store_single()
    {
        return ward_common_store($this, WardDepartment4DifferentJobHoldersDawat::class, $this->report_info);
    }

}
