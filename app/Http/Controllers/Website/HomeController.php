<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $flashSaleBooks = Book::where('discountable_type', 'App\Models\FlashSale')
            ->with('author','discountable')
            ->where('is_available',1)
            ->select('id','name','slug','image','price','quantity','total_stock','rate','num_of_viewers','author_id','discountable_id','discountable_type')
            ->get();
        return view('Website.index' , compact('flashSaleBooks'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        if (empty($searchTerm)) {
            return response()->json([]);
        }

        $booksByName = Book::where('name', 'LIKE', "%{$searchTerm}%")
                ->select('id', 'name', 'description', 'slug')
                ->limit(9)
                ->get();

        $booksByDescription = collect();

        if ($booksByName->count() < 9) {
            $booksByDescription = Book::where('description', 'LIKE', "%{$searchTerm}%")
                ->whereNotIn('id', $booksByName->pluck('id'))
                ->select('id', 'name', 'description', 'slug')
                ->limit(9 - $booksByName->count())
                ->get();
        }

        return response()->json($booksByName->merge($booksByDescription));
    }
}
