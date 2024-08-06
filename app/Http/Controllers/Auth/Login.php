<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    function index()
    {
        return view('Auth/login');
    }
    function login(LoginRequest $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->is_admin) {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('welcomeView');
        }
        return redirect()->route('welcomeView')->withErrors([
            'password' => 'Wrong username or password',
        ]);


    }


}
