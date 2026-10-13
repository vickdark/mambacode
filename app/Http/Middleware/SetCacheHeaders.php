<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetCacheHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Cache static assets for 1 year (31536000 seconds)
        if ($this->isStaticAsset($request->path())) {
            $response->header('Cache-Control', 'public, max-age=31536000, immutable');
        } elseif ($this->isPersonalized($request, $response)) {
            // pages with CSRF tokens, flash messages or form errors must never be shared
            $response->header('Cache-Control', 'no-store, private');
        } else {
            // Cache HTML pages for 1 hour
            $response->header('Cache-Control', 'public, max-age=3600');
        }

        // Add security headers
        $response->header('X-Content-Type-Options', 'nosniff');
        $response->header('X-Frame-Options', 'SAMEORIGIN');
        $response->header('X-XSS-Protection', '1; mode=block');
        $response->header('Referrer-Policy', 'strict-origin-when-cross-origin');

        // Add performance headers
        $response->header('Vary', 'Accept-Encoding');

        return $response;
    }

    /**
     * Routes whose HTML contains per-session data (e.g. CSRF tokens).
     */
    private const PERSONALIZED_ROUTES = ['contact'];

    /**
     * Determine if the response is specific to the current visitor.
     */
    private function isPersonalized(Request $request, Response $response): bool
    {
        return ! $request->isMethodCacheable()
            || ! $response->isOk()
            || $request->routeIs(...self::PERSONALIZED_ROUTES);
    }

    /**
     * Determine if the request path is for a static asset.
     */
    private function isStaticAsset(string $path): bool
    {
        return preg_match('/\.(js|css|png|jpg|jpeg|gif|ico|svg|woff|woff2|ttf|eot)(\?.*)?$/', $path);
    }
}
