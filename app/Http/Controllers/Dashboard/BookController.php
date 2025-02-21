<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Discount;
use App\Models\FlashSale;
use App\Models\Language;
use App\Models\Publisher;
use Carbon\Carbon;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BookController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware(middleware: 'can:books'),
        ];
    }

    public function index()
    {
        $books = Book::filter(request()->all())->with(['language', 'publisher', 'category', 'author'])->orderByDesc('id')->paginate(10);
        $categories = Category::select('id', 'name')->get();
        $authors = Author::select('id', 'name')->get();
        $publishers = Publisher::select('id', 'name')->get();
        $languages = Language::select('id', 'name')->get();
        return view('Dashboard.Books.index', compact('books','categories','authors','publishers','languages'));
    }

    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        $authors = Author::select('id', 'name')->get();
        $publishers = Publisher::select('id', 'name')->get();
        $languages = Language::select('id', 'name')->get();
        $discounts = Discount::where('quantity','>',0)->where('expiry_date','>',Carbon::now())->select('id', 'code', 'percentage')->get();
        $flashSales = FlashSale::where('is_active', 1)->select('id', 'name', 'percentage')->get();
        return view('Dashboard.Books.create', compact('categories', 'authors', 'publishers', 'languages', 'discounts', 'flashSales'));
    }

    public function store(BookRequest $request)
    {
        try {
            DB::beginTransaction();

            // Create the book with validated request data
            $book = Book::create($this->getBookData($request));

            // Handle image upload
            if ($request->hasFile('image')) {
                $this->uploadImage($request->file('image'), $book);
            }

            if ($book->discountable_type == Discount::class) {
                // Decrement the quantity of discount
                $book->discountable->decrement('quantity');
            }

            DB::commit();

            return redirect()->route('admin.books.index')->with('success', __('books.store_success'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Error creating book: " . $e->getMessage());
            return redirect()->back()->with('error', __('books.store_failed'));
        }
    }

    public function show(string $slug)
    {
        $book = Book::where('slug', $slug)->firstOrFail();
        return view('Dashboard.Books.show', compact('book'));
    }

    public function edit(string $slug)
    {
        $book = Book::where('slug', $slug)->firstOrFail();
        $categories = Category::select('id', 'name')->get();
        $authors = Author::select('id', 'name')->get();
        $publishers = Publisher::select('id', 'name')->get();
        $languages = Language::select('id', 'name')->get();
        $discounts = Discount::where('quantity','>',0)->where('expiry_date','>',Carbon::now())->select('id', 'code', 'percentage')->get();
        $flashSales = FlashSale::where('is_active', 1)->select('id', 'name', 'percentage')->get();
        return view('Dashboard.Books.edit', compact('book', 'categories', 'authors', 'publishers', 'languages', 'discounts', 'flashSales'));
    }

    public function update(BookRequest $request, string $id)
    {
        try {
            DB::beginTransaction();

            $book = Book::findOrFail($id);

            // Store the old discountable information
            $oldDiscountableType = $book->discountable_type;
            $oldDiscountableId = $book->discountable_id;

            // Update book attributes
            $book->update($this->getBookData($request));

            // Handle image update
            if ($request->hasFile('image')) {
                $this->deleteOldImage($book);
                $this->uploadImage($request->file('image'), $book);
            }

            //Logic to update the quantity of discount when discountable type is changed
            if ($request->has(['discountable_type', 'discountable_id'])) {
                if ($book->discountable_type == Discount::class) {
                    if ($oldDiscountableType == Discount::class && $oldDiscountableId != $book->discountable_id) {
                        $oldDiscount = Discount::find($oldDiscountableId);
                        if ($oldDiscount) {
                            $oldDiscount->increment('quantity');
                        }
                        $book->discountable->decrement('quantity');
                    }
                    if ($oldDiscountableType == FlashSale::class) {
                        $book->discountable->decrement('quantity');
                    }
                }

                if ($book->discountable_type == FlashSale::class) {
                    if ($oldDiscountableType == Discount::class) {
                        $oldDiscount = Discount::find($oldDiscountableId);
                        if ($oldDiscount) {
                            $oldDiscount->increment('quantity');
                        }
                    }
                }
            }

            DB::commit();

            return redirect()->route('admin.books.index')->with('success', __('books.update_success'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Error updating book: " . $e->getMessage());
            return redirect()->back()->with('error', __('books.update_failed'));
        }
    }

    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $this->deleteOldImage($book);
        $book->delete();
        return redirect()->back()->with('success', __('books.delete_success'));
    }

    /**
     * Extracts book data from request.
     */
    private function getBookData(BookRequest $request): array
    {
        return $request->only([
            'name',
            'description',
            'quantity',
            'pages',
            'rate',
            'publish_year',
            'price',
            'is_available',
            'language_id',
            'category_id',
            'publisher_id',
            'author_id',
            'discountable_type',
            'discountable_id',
        ]);
    }

    /**
     * Store image in database and local.
     */
    private function uploadImage($image, $book)
    {
        $imageName = $book->slug . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('books'), $imageName);
        $book->update(['image' => 'books/' . $imageName]);
    }

    /**
     * Delete image from database and local.
     */
    private function deleteOldImage($book)
    {
        if ($book->image && file_exists(public_path($book->image))) {
            unlink(public_path($book->image));
        }
    }
}
