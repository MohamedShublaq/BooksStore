<?php

namespace App\Http\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('Website.Auth.register');
    }

    public function register(RegisterRequest $request)
    {
        try {
            User::create($request->only('first_name','last_name','email','phone','password'));
            return redirect()->route('login');
        } catch (\Exception $e) {
            Log::error("Error registration user: " . $e->getMessage());
            return redirect()->back()->withErrors(['register' => 'Try again.']);
        }
    }
}
