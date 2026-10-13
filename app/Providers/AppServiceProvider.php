<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
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
        // limit contact form submissions per IP to curb spam
        RateLimiter::for('contact', function (Request $request) {
            $tooMany = fn () => back()->withInput()->withErrors([
                'message' => 'Has enviado demasiados mensajes. Intenta de nuevo más tarde.',
            ]);

            return [
                Limit::perMinutes(10, 3)->by($request->ip())->response($tooMany),
                Limit::perDay(10)->by($request->ip())->response($tooMany),
            ];
        });
    }
}
