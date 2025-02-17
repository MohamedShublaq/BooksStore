<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AuthorRequest;
use App\Models\Author;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class AuthorController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
               new Middleware(middleware: 'can:authors'),
        ];
    }

    public function index()
    {
        $authors = Author::filter(request()->all())->withCount('books')->orderByDesc('id')->paginate(10);
        return view('Dashboard.Authors.index' , compact('authors'));
    }

    public function store(AuthorRequest $request)
    {
        try {
            Author::create($request->only(['name']));
            return redirect()->back()->with('success', __('authors.store_success'));
        } catch (\Exception $e) {
            Log::error("Error creating author: " . $e->getMessage());
            return redirect()->back()->with('error', __('authors.store_failed'));
        }
    }

    public function update(AuthorRequest $request, string $id)
    {
        try {
            $author = Author::findOrFail($id);
            $author->update($request->only(['name']));
            return redirect()->back()->with('success', __('authors.update_success'));
        } catch (\Exception $e) {
            Log::error("Error updating author: " . $e->getMessage());
            return redirect()->back()->with('error', __('authors.update_failed'));
        }
    }

    public function destroy(string $id)
    {
        Author::destroy($id);
        return redirect()->back()->with('success', __('authors.delete_success'));
    }
}
