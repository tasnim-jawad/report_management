<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function unit(){
        return view('dashboard.unit');
    }

    public function ward(){
        return view('dashboard.ward');
    }
    public function thana(){
        return view('dashboard.thana');
    }
    public function admin(){
        return view('dashboard.admin');
    }
}
