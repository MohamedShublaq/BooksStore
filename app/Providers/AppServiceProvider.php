<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
        //Admin authorizations
        foreach(config('authorizations.Permissions') as $config_permission=>$value){
            Gate::define($config_permission , function($auth) use ($config_permission){
                return $auth->hasAccess($config_permission);
            });
        }
    }
}
