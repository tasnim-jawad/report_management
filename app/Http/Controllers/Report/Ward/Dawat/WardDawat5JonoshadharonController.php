<?php

namespace App\Http\Controllers\Report\Ward\Dawat;

use App\Http\Controllers\Controller;
use App\Models\Report\Ward\Dawat\WardDawat5Jonoshadharon;
use Illuminate\Http\Request;

class WardDawat5JonoshadharonController extends Controller
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
        return ward_common_get(WardDawat5Jonoshadharon::class);
    }

    public function store_single()
    {

        return ward_common_store($this, WardDawat5Jonoshadharon::class, $this->report_info);
    }
}
