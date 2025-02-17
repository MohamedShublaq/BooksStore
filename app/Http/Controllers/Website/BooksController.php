<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;

class BooksController extends Controller
{
    public function index()
    {
        $categories = Category::has('books')->withCount('books')->get();
        return view('Website.books' , compact('categories'));
    }
}
