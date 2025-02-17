<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ShippingAreaRequest;
use App\Models\ShippingArea;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ShippingAreaController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
               new Middleware(middleware: 'can:shipping_areas'),
        ];
    }

    public function index()
    {
        $shippingAreas = ShippingArea::filter(request()->all())->orderByDesc('id')->paginate(10);
        return view('Dashboard.ShippingAreas.index' , compact('shippingAreas'));
    }


    public function store(ShippingAreaRequest $request)
    {
        try {
            ShippingArea::create($request->only(['name','fee']));
            return redirect()->back()->with('success', __('areas.store_success'));
        } catch (\Exception $e) {
            Log::error("Error creating shipping area: " . $e->getMessage());
            return redirect()->back()->with('error', __('areas.store_failed'));
        }
    }


    public function update(ShippingAreaRequest $request, string $id)
    {
        try {
            $shippingArea = ShippingArea::findOrFail($id);
            $shippingArea->update($request->only(['name','fee']));
            return redirect()->back()->with('success', __('areas.update_success'));
        } catch (\Exception $e) {
            Log::error("Error updating shipping area: " . $e->getMessage());
            return redirect()->back()->with('error', __('areas.update_failed'));
        }
    }


    public function destroy(string $id)
    {
        ShippingArea::destroy($id);
        return redirect()->back()->with('success', __('areas.delete_success'));
    }
}
