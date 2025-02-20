<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Book;

class SingleBookController extends Controller
{
    public function index($slug)
    {
        $book = Book::where('slug', $slug)->firstOrFail();
        return view('Website.singleBook' , compact('book'));
    }
}
