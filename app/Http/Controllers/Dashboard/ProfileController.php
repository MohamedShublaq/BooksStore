<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ChangePasswordRequest;
use App\Http\Requests\Dashboard\ProfileRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $admin = Auth::guard('admin')->user();
        return view('Dashboard.Profile.profile', compact('admin'));
    }

    public function updateProfile(ProfileRequest $request)
    {
        try {
            $admin = Admin::findOrFail(auth('admin')->user()->id);
            $admin->update($request->only(['name','email']));
            return redirect()->route('admin.home')->with('success', __('account.update_success'));
        } catch (\Exception $e) {
            Log::error("Error updating profile: " . $e->getMessage());
            return redirect()->back()->with('error', __('account.update_failed'));
        }
    }

    public function showChangePassword()
    {
        return view('Dashboard.Profile.changePassword');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $admin = Admin::findOrFail(auth('admin')->user()->id);

        if (!Hash::check($request->old_password, $admin->password)) {
            return redirect()->back()->with('error', __('account.wrong_old'));
        }

        $admin->update([
            'password' => $request->password
        ]);
        return redirect()->route('admin.home')->with('success', __('account.password_updated'));
    }
}
