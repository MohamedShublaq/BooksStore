<?php

namespace App\Http\Controllers\Website\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ResetPasswordRequest;
use App\Models\User;

class ResetPasswordController extends Controller
{
    public function showResetPassword($email, $code)
    {
        return view('Website.Auth.password.reset', compact('email', 'code'));
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        if (!$this->isOtpValid($request->email, $request->code)) {
            return redirect()->back()->withErrors(['error' => 'Try again.']);
        }

        $user = User::where('email', $request->email)->firstOrFail();
        $user->update(['password' => $request->password]);

        session()->forget(['otp_verified_email', 'otp_verified_code']);

        return redirect()->route('login')->with('success', 'Password reset successfully.');
    }

    private function isOtpValid($email, $code): bool
    {
        return session('otp_verified_email') === $email && session('otp_verified_code') === $code;
    }
}
