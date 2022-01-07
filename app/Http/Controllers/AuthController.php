<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Hospital;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function signup(){
        return view('auth.signup');
    }
    public function signupDoctor(){
        $departments = Department::all();
        $hospitals = Hospital::all();

        return view('auth.signup-doctor',compact('departments','hospitals'));
    }
    public function signupStore(Request $request){
        $register_data = $request->all();
        //insert into users
        $user = User::create([
            "email" => $register_data["email"],
            'first_name' => $register_data['first_name'],
            'last_name' => $register_data['last_name'],
            "password" => Hash::make($register_data['password']),
            'gender'=>$register_data['gender'],
            'age' => $register_data['age'],
            'phone' => $register_data['phone'],
            'address' => $register_data['address'] ?? null,
            'ssn'=>$register_data['ssn']??null,
            'active'=>1
        ]);
        //select * from users where id =
        $user = User::find($user->id);
        $user->assignRole('patient');
        return redirect()->route('login.index')->with('success','Added successful');
    }


    public function signupStoreDoctor(Request $request){
        $register_data = $request->all();
        //insert into users
        $user = User::create([
            "email" => $register_data["email"],
            'first_name' => $register_data['first_name'],
            'last_name' => $register_data['last_name'],
            "password" => Hash::make($register_data['password']),
            'gender'=>$register_data['gender'],
            'age' => $register_data['age'],
            'phone' => $register_data['phone'],
            'department_id'=>$register_data['department_id']??null,
            'hospital_id'=>$register_data['hospital_id']??null,
            'address' => $register_data['address'] ?? null,
        ]);
        //select * from users where id =
        $user = User::find($user->id);
        $user->assignRole('doctor');
        return redirect()->route('login.index')->with('success','Added successful');
    }

    //Request $request=>
    public function index(){
        return view('auth.login');
    }
    public function authLogin(Request $request)
    {
        $auth = $request->only('email', 'password');
        if (Auth::attempt($auth)) {
            //where email = $auth['email'] limit 1
            $user = User::where('email', $auth['email'])->first();

            if($user->hasRole('admin')){
                return redirect(route('admin.dashboard'));
            }else if($user->hasRole('patient')){
                return redirect(route('bookings.index'));
            }else if($user->hasRole('doctor')){
                if($user->active == 0){
                    return redirect()->route('login.index')->with('error','Doctor Un Active');
                }
                return redirect(route('doctor.profile.show'));
            }
        }
        return redirect(route('login.index'))->withErrors('Login details are not valid');
    }

    public function logout(){
        Auth::logout();
        return redirect(route('login.index'));
    }

}
