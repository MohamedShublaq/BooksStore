<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AdminRequest;
use App\Models\Admin;
use App\Models\Authorization;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class AdminController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
               new Middleware(middleware: 'can:admins'),
        ];
    }

    public function index()
    {
        $admins = Admin::with('authorization')->where('id', '!=', auth('admin')->user()->id)->paginate(10);
        return view('Dashboard.Admins.index', compact('admins'));
    }

    public function create()
    {
        $roles = Authorization::where('id', '!=', auth('admin')->user()->authorization->id)->select('id', 'role')->get();
        return view('Dashboard.Admins.create', compact('roles'));
    }

    public function store(AdminRequest $request)
    {
        try {
            Admin::create($request->only(['name', 'email', 'password', 'role_id']));
            return redirect()->route('admin.admins.index')->with('success', __('admins.store_success'));
        } catch (\Exception $e) {
            Log::error("Error creating admin: " . $e->getMessage());
            return redirect()->back()->with('error', __('admins.store_failed'));
        }
    }

    public function edit(string $id)
    {
        $admin = Admin::findOrFail($id);
        $roles = Authorization::where('id', '!=', auth('admin')->user()->authorization->id)->select('id', 'role')->get();
        return view('Dashboard.Admins.edit', compact('admin', 'roles'));
    }

    public function update(AdminRequest $request, string $id)
    {
        try {
            $admin = Admin::findOrFail($id);
            $admin->update($request->only(['name', 'email', 'role_id']));
            return redirect()->route('admin.admins.index')->with('success', __('admins.update_success'));
        } catch (\Exception $e) {
            Log::error("Error updating admin: " . $e->getMessage());
            return redirect()->back()->with('error', __('admins.update_failed'));
        }
    }

    public function destroy(string $id)
    {
        Admin::destroy($id);
        return redirect()->back()->with('success', __('admins.delete_success'));
    }
}
