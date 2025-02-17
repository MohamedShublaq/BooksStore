<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ContactController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
               new Middleware(middleware: 'can:contacts'),
        ];
    }

    public function index()
    {
        $contacts = ContactUs::filter(request()->all())->orderByDesc('id')->paginate(10);
        return view('Dashboard.Contacts.index' , compact('contacts'));
    }

    public function show(string $id)
    {
        $contact = ContactUs::findOrFail($id);
        return view('Dashboard.Contacts.show' , compact('contact'));
    }

    public function destroy(string $id)
    {
        ContactUs::destroy($id);
        return redirect()->back()->with('success', __('contacts.delete_success'));
    }
}
