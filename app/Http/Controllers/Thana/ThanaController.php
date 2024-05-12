<?php

namespace App\Http\Controllers\Thana;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThanaController extends Controller
{
    public function report(){
        return view('thana.thana_report');
    }
}
