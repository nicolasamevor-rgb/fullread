<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
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
        // Ensure default string length is compatible with older MySQL/MariaDB indexes
        // Prevents "Specified key was too long" errors when using utf8mb4 and unique indexes
        Schema::defaultStringLength(191);
        URL::forceScheme('https');

    }
}
