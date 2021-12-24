<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function indexAdmin(){
        $count_p = 1;
        $count_d = 2;//select *
        return view('admin.dashboard',compact('count_p','count_d'));
    }
    function indexPatient(){
        return view('patient.dashboard');
    }
    function indexDoctor(){
        return view('doctor.dashboard');
    }
}
