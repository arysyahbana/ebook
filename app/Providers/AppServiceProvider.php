<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $settings = Setting::first();
        View::share('settings', $settings);
        // if ((bool) env('HTTPS', true)) {
        //     $this->app['url']->forceScheme('https');
        // } else {
        //     $this->app['url']->forceScheme('http');
        // }

        // $this->app['request']->server->set('HTTPS', env('HTTPS'));
    }
}
