<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::guard('web')->user();
        $addresses = $user->addresses;
        return view('Website.profile', compact('user', 'addresses'));
    }

    public function update(ProfileRequest $request)
    {
        try {
            $user = Auth::guard('web')->user();
            $user->update($request->only(['first_name', 'last_name', 'email', 'phone']));

            $requestAddresses = $request->addresses;
            $existingAddresses = $user->addresses->pluck('address')->toArray();
            $user->addresses()->whereNotIn('address', $requestAddresses)->delete();
            $newAddresses = array_diff($requestAddresses, $existingAddresses);

            foreach ($newAddresses as $newAddress) {
                $user->addresses()->create(['address' => $newAddress]);
            }
            return redirect()->route('home')->with('success', 'Profile Updated Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the profile.');
        }
    }
}
