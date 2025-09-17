<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('settings')) {
            $settings = Setting::first();
            View::share('appName', $settings ? $settings->app_name : config('app.name'));
            View::share('appLogo', $settings && $settings->logo_path ? asset('storage/' . $settings->logo_path) : null);
        }
    }
}
