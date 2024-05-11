<?php

namespace App\Http\Controllers\Ward;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WardController extends Controller
{
    public function report(){
        return view('ward.ward_report');
    }
}
