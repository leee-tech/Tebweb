<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function signup(){
        return view('auth.signup');
    }

    public function signupStore(Request $request){
        $register_data = $request->all();
        $id = DB::table('users')->insertGetId([
            "email" => $register_data["email"],
            'first_name' => $register_data['first_name'],
            'last_name' => $register_data['last_name'],
            "password" => Hash::make($register_data['password']),
            'gender'=>$register_data['gender'],
            'age' => $register_data['age'],
            'phone' => $register_data['phone'],
            'address' => $register_data['address'] ?? null,

        ]);
        $user = User::find($id);
        $user->assignRole('patient');
        return redirect()->route('login.index')->with('success','Added successful');

    }
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = User::where('email', $credentials['email'])->first();
            if($user->hasRole('admin')){
                return redirect(route('admin.dashboard'));
            }else if($user->hasRole('patient')){
                return redirect(route('patient.dashboard'));
            }else{
                return redirect(route('doctor.dashboard'));

            }
        }
        return redirect(route('login.index'))->withSuccess('Login details are not valid');
    }
    public function logout(){
        Auth::logout();
        return redirect(route('login.index'));
    }

}
