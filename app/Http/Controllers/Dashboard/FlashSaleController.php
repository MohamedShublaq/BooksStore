<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\FlashSaleRequest;
use App\Models\FlashSale;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class FlashSaleController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
               new Middleware(middleware: 'can:flash_sales'),
        ];
    }

    public function index()
    {
        $flashSales = FlashSale::filter(request()->all())->orderByDesc('id')->paginate(10);
        return view('Dashboard.FlashSales.index' , compact('flashSales'));
    }


    public function create()
    {
        return view('Dashboard.FlashSales.create');
    }


    public function store(FlashSaleRequest $request)
    {
        try {
            FlashSale::create($request->only(['name','description','date','time','percentage']));
            return redirect()->route('admin.flash-sales.index')->with('success', __('flashSales.store_success'));
        } catch (\Exception $e) {
            Log::error("Error creating flash sale: " . $e->getMessage());
            return redirect()->back()->with('error', __('flashSales.store_failed'));
        }
    }


    public function edit(string $id)
    {
        $flash = FlashSale::findOrFail($id);
        return view('Dashboard.FlashSales.edit' , compact('flash'));
    }


    public function update(FlashSaleRequest $request, string $id)
    {
        try {
            $flashSale = FlashSale::findOrFail($id);
            $flashSale->update($request->only(['name','description','date','time','percentage']));
            return redirect()->route('admin.flash-sales.index')->with('success', __('flashSales.update_success'));
        } catch (\Exception $e) {
            Log::error("Error updating flash sale: " . $e->getMessage());
            return redirect()->back()->with('error', __('flashSales.update_failed'));
        }
    }

    public function destroy(string $id)
    {
        FlashSale::destroy($id);
        return redirect()->back()->with('success', __('flashSales.delete_success'));
    }
}
