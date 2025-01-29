<?php

namespace App\Http\Controllers\Report\Dawat;

use App\Http\Controllers\Controller;
use App\Models\Organization\OrgType;
use App\Models\Organization\OrgUnit;
use App\Models\Organization\OrgUnitResponsible;
use App\Models\Organization\Responsibility;
use App\Models\Report\Dawat\Dawat1RegularGroupWise;
use App\Models\Report\ReportInfo;
use App\Models\Report\ReportManagementControl;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class Dawat1RegularGroupWiseController extends Controller
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
        return common_get(Dawat1RegularGroupWise::class);
    }

    public function store_single()
    {
        return common_store($this, Dawat1RegularGroupWise::class, $this->report_info);
    }
}
