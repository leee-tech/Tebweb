<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function indexAdmin(){
        $count_p = 1;
        $count_d = 2;//select *
        return view('admin.dashboard',compact('count_p','count_d'));
    }
//
    function indexDoctor(){
        return view('doctor.dashboard');
    }
}
