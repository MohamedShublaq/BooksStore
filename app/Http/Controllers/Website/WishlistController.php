<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $books = Book::whereHas('favorites', function ($q) {
                $q->where('user_id', Auth::id());
            })->get();
        } else {
            $booksIds = session()->get('wishlist', []);
            $books = Book::whereIn('id', $booksIds)->get();
        }
        return view('Website.wishlist', compact('books'));
    }
}
