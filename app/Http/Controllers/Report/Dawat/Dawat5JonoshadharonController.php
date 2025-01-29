<?php

namespace App\Http\Controllers\Report\Dawat;

use App\Http\Controllers\Controller;
use App\Models\Report\Dawat\Dawat5Jonoshadharon;
use Illuminate\Http\Request;

class Dawat5JonoshadharonController extends Controller
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
        return common_get(Dawat5Jonoshadharon::class);
    }

    public function store_single()
    {
        return common_store($this, Dawat5Jonoshadharon::class, $this->report_info);
    }
}
