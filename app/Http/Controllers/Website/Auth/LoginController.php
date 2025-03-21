<?php

namespace App\Http\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('Website.Auth.login');
    }

    public function login(LoginRequest $request)
    {
        $remember = $request->has('rememberme');
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password] , $remember)) {
            return redirect()->intended(route('home'));
        } else {
            return redirect()->back()->withErrors(['login' => 'Invalid credentials.']);
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
