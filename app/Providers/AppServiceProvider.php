<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $ideHelperProvider = \Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class;

        if ($this->app->environment('local') && class_exists($ideHelperProvider)) {
            $this->app->register($ideHelperProvider);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
