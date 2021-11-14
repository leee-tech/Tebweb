<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function indexAdmin(){
        return view('admin.dashboard');
    }
    function indexPatient(){
        return "Here";
    }
}
