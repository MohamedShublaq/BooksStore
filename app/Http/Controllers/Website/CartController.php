<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $books = Book::with('author')->whereHas('carts', function ($q) {
                $q->where('user_id', Auth::id());
            })->get();
        } else {
            $booksIds = session()->get('cart', []);
            $books = Book::with('author')->whereIn('id', $booksIds)->get();
        }
        return view('Website.cart' , compact('books'));
    }
}
