<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AuthorizationRequest;
use App\Models\Authorization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class AuthorizationController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
               new Middleware(middleware: 'can:authorizations'),
        ];
    }

    public function index()
    {
        $authorizations = Authorization::withCount('admins')->paginate(10);
        return view('Dashboard.Authorizations.index', compact('authorizations'));
    }

    public function create()
    {
        return view('Dashboard.Authorizations.create');
    }

    public function store(AuthorizationRequest $request)
    {
        try {
            $authz = new Authorization();
            $authz->role = $request->role;
            $authz->permissions = json_encode($request->permissions);
            $authz->save();
            return redirect()->route('admin.authorizations.index')->with('success', __('roles.store_success'));
        } catch (\Exception $e) {
            Log::error("Error creating role: " . $e->getMessage());
            return redirect()->back()->with('error', __('roles.store_failed'));
        }
    }

    public function edit($id)
    {
        $authorization = Authorization::findOrFail($id);
        return view('Dashboard.Authorizations.edit', compact('authorization'));
    }

    public function update(AuthorizationRequest $request, string $id)
    {
        try {
            $authz = Authorization::findOrFail($id);
            $authz->role = $request->role;
            $authz->permissions = json_encode($request->permissions);
            $authz->save();
            return redirect()->route('admin.authorizations.index')->with('success', __('roles.update_success'));
        } catch (\Exception $e) {
            Log::error("Error updating role: " . $e->getMessage());
            return redirect()->back()->with('error', __('roles.update_failed'));
        }
    }

    public function destroy(string $id)
    {
        $authz = Authorization::findOrFail($id);
        $adminsCount = $authz->admins->count();
        if ($adminsCount > 0) {
            return redirect()->back()->with('error', __('roles.associated_admins'));
        }
        $authz->delete();
        return redirect()->back()->with('success', __('roles.delete_success'));
    }
}
