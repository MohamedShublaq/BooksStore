<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\DiscountRequest;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class DiscountController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
               new Middleware(middleware: 'can:discounts'),
        ];
    }

    public function index()
    {
        $discounts = Discount::filter(request()->all())->orderByDesc('id')->paginate(10);
        return view('Dashboard.Discounts.index', compact('discounts'));
    }

    public function create()
    {
        return view('Dashboard.Discounts.create');
    }

    public function store(DiscountRequest $request)
    {
        try {
            Discount::create($request->only(['code', 'quantity', 'percentage', 'expiry_date']));
            return redirect()->route('admin.discounts.index')->with('success', __('discounts.store_success'));
        } catch (\Exception $e) {
            Log::error("Error creating discount: " . $e->getMessage());
            return redirect()->back()->with('error', __('discounts.store_failed'));
        }
    }

    public function edit(string $id)
    {
        $discount = Discount::findOrFail($id);
        return view('Dashboard.Discounts.edit', compact('discount'));
    }

    public function update(DiscountRequest $request, string $id)
    {
        try {
            $discount = Discount::findOrFail($id);
            $discount->update($request->only(['code', 'quantity', 'percentage', 'expiry_date']));
            return redirect()->route('admin.discounts.index')->with('success', __('discounts.update_success'));
        } catch (\Exception $e) {
            Log::error("Error updating discount: " . $e->getMessage());
            return redirect()->back()->with('error', __('discounts.update_failed'));
        }
    }

    public function destroy(string $id)
    {
        Discount::destroy($id);
        return redirect()->route('admin.discounts.index')->with('success', __('discounts.delete_success'));
    }

    public function checkUniqueCode(Request $request)
    {
        $code = $request->input('code');
        $exists = Discount::where('code', $code)->exists();
        return response()->json(['unique' => !$exists]);
    }
}
