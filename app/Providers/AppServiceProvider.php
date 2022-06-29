<?php

namespace App\Providers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('path.public', function() {
            return base_path() . '/api';
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('MIGRATE_ON_STARTUP', TRUE)) {
            if (file_exists(base_path() . '/database/database.db')) {
                copy(base_path() . '/database.db', '/tmp/database.db');
            }
        }
    }
}
