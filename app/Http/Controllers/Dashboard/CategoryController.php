<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CategoryRequest;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class CategoryController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
               new Middleware(middleware: 'can:categories'),
        ];
    }

    public function index()
    {
        $categories = Category::filter(request()->all())->with('discount')->withCount('books')->orderByDesc('id')->paginate(10);
        $discounts = Discount::select('id', 'code', 'percentage')->get();
        return view('Dashboard.Categories.index', compact('categories', 'discounts'));
    }

    public function store(CategoryRequest $request)
    {
        try {
            Category::create($request->only(['name', 'discount_id']));
            // if($request->has('discount_id')){
            //     $numOfBooks = $category->books()->count();
            //     $discount = Discount::finOrFail($request->discount_id);
            //     $discount->decrement('quantity', $numOfBooks);
            // }
            return redirect()->back()->with('success', __('categories.store_success'));
        } catch (\Exception $e) {
            Log::error("Error creating category: " . $e->getMessage());
            return redirect()->back()->with('error', __('categories.store_failed'));
        }
    }

    public function update(CategoryRequest $request, string $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->update($request->only(['name', 'discount_id']));
            return redirect()->back()->with('success', __('categories.update_success'));
        } catch (\Exception $e) {
            Log::error("Error updating category: " . $e->getMessage());
            return redirect()->back()->with('error', __('categories.update_failed'));
        }
    }

    public function destroy(string $id)
    {
        Category::destroy($id);
        return redirect()->back()->with('success', __('categories.delete_success'));
    }
}
