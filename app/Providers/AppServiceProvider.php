<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;
use Illuminate\Support\Facades\View;

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

        $settings = Setting::first();

        View::share('socialLinks', [
            'facebook' => $settings?->facebook ?? 'https://www.facebook.com/',
            'instagram' => $settings?->instagram ?? 'https://www.instagram.com/',
            'youtube' => $settings?->youtube ?? 'https://www.youtube.com/',
            'x' => $settings?->x ?? 'https://twitter.com/',
        ]);
    }
}
