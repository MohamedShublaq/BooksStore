<?php

use App\Http\Middleware\SetLocale;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->group(base_path('routes/dashboard.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        //auth middleware
        $middleware->redirectGuestsTo(function () {
            if (request()->is("admin/*")) {
                return route('admin.login');
            }
            return route('login');
        });
        //guest middleware
        $middleware->redirectUsersTo(function () {
            if (Auth::guard('admin')->check()) {
                return route('admin.home');
            }
            return route('home');
        });
        //dashboard middleware
        $middleware->appendToGroup('dashboard', [
            'auth:admin',
            SetLocale::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
