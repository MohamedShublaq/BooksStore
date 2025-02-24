<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\SettingsRequest;
use App\Models\Setting;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Log;

class SettingsController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
               new Middleware(middleware: 'can:settings'),
        ];
    }

    public function index()
    {
        $settings = Setting::first();
        return view('Dashboard.Settings.index' , compact('settings'));
    }

    public function update(SettingsRequest $request)
    {
        try {
            $settings = Setting::first();
            $settings->update($request->only(['email','phone','address','tax_percentage','facebook','instagram','youtube','x']));
            return redirect()->back()->with('success', __('settings.update_success'));
        } catch (\Exception $e) {
            Log::error("Error updating settings: " . $e->getMessage());
            return redirect()->back()->with('error', __('settings.update_failed'));
        }
    }
}
