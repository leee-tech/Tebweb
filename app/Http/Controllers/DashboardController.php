<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Hospital;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    function indexAdmin(){
        $count_p = User::role('patient')->count();
        $count_d = User::role('doctor')->count();
        $count_hospital = Hospital::count();
        return view('admin.dashboard',compact('count_p','count_d','count_hospital'));
    }
//
    function indexDoctor(){
        return view('doctor.dashboard');
    }
}
