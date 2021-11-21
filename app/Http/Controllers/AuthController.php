<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
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
                return 10;
            }
        }
        return redirect(route('login.index'))->withSuccess('Login details are not valid');

    }

}
