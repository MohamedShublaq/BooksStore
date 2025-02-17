<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PublisherRequest;
use App\Models\Publisher;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PublisherController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
               new Middleware(middleware: 'can:publishers'),
        ];
    }

    public function index()
    {
        $publishers = Publisher::filter(request()->all())->withCount('books')->orderByDesc('id')->paginate(10);
        return view('Dashboard.Publishers.index' , compact('publishers'));
    }

    public function store(PublisherRequest $request)
    {
        try {
            Publisher::create($request->only(['name']));
            return redirect()->back()->with('success', __('publishers.store_success'));
        } catch (\Exception $e) {
            Log::error("Error creating publisher: " . $e->getMessage());
            return redirect()->back()->with('error', __('publishers.store_failed'));
        }
    }

    public function update(PublisherRequest $request, string $id)
    {
        try {
            $publisher = Publisher::findOrFail($id);
            $publisher->update($request->only(['name']));
            return redirect()->back()->with('success', __('publishers.update_success'));
        } catch (\Exception $e) {
            Log::error("Error updating publisher: " . $e->getMessage());
            return redirect()->back()->with('error', __('publishers.update_failed'));
        }
    }

    public function destroy(string $id)
    {
        Publisher::destroy($id);
        return redirect()->back()->with('success', __('publishers.delete_success'));
    }
}
