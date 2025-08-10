<?php

namespace App\Providers;

use App\Models\jawabanMahasiswa;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
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
        // if ((bool) env('HTTPS', true)) {
        //     $this->app['url']->forceScheme('https');
        // } else {
        //     $this->app['url']->forceScheme('http');
        // }

        $this->app['request']->server->set('HTTPS', env('HTTPS'));

        if (Schema::hasTable('settings')) {
            $settings = Setting::first();
            View::share('settings', $settings);
        } else {
            View::share('settings', null);
            View::share('quizAllCheck', (object) ['total_mengerjakan' => 0]);
        }
    }
}
