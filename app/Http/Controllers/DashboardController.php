<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function indexAdmin(){
        $count_p = Patient::all()->count();
        $count_d = Doctor::all()->count();//select *
        return view('admin.dashboard',compact('count_p','count_d'));
    }
    function indexPatient(){
        return "Here";
    }
}
