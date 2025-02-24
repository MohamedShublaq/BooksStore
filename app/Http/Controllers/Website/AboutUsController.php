<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ContactRequest;
use App\Models\ContactUs;
use App\Models\Setting;

class AboutUsController extends Controller
{
    public function index ()
    {
        $settings = Setting::first();
        return view('Website.about', compact('settings'));
    }

    public function contact(ContactRequest $request)
    {
        try {
            ContactUs::create($request->only(['name','email','message']));
            return redirect()->route('home')->with('success', 'Message Sent Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while sending the message.');
        }
    }
}
