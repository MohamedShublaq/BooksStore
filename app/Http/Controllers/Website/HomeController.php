<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('Website.index');
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
            $booksByDescription = Book::where('description->en', 'LIKE', "%{$searchTerm}%")
                ->whereNotIn('id', $booksByName->pluck('id'))
                ->select('id', 'name', 'description', 'slug')
                ->limit(9 - $booksByName->count())
                ->get();
        }

        return response()->json($booksByName->merge($booksByDescription));
    }
}
