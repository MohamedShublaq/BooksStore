<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class UserController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
               new Middleware(middleware: 'can:users'),
        ];
    }

    public function index()
    {
        $users = User::filter(request()->all())->orderByDesc('id')->paginate(10);
        return view('Dashboard.Users.index', compact('users'));
    }


    public function show(string $id)
    {
        $user = User::findOrFail($id);
        $addresses = $user->addresses()->orderByDesc('id')->paginate(10);
        return view('Dashboard.Users.addresses', compact('addresses'));
    }


    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->back()->with('success', __('users.delete_success'));
    }
}
