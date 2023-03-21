<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    // User Login
    // public function guard()
    // {
    //     return Auth::guard('user');
    // }

    public function login(Request $request)
    {
        request()->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ]);

        $credentials = request()->only('email', 'password');
        if(auth()->guard('user')->attempt($credentials)){
            return redirect('/');
        }
        return ('nahh');
    }
    
    public function logout()
    {
        auth()->guard('user')->logout();
        return redirect('/');
    }
}
