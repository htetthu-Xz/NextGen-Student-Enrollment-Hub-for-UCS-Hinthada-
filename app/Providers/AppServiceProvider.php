<?php

namespace App\Providers;

use Illuminate\Foundation\Http\Middleware\TrimStrings;
use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Paginator::useBootstrapFive();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        TrimStrings::except(['secret']);
        

        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }
    }
}
