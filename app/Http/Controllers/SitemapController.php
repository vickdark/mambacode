<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Route;
use Illuminate\Support\Str;
use SimpleXMLElement;

class SitemapController extends Controller
{
    protected const INCLUDE_PATTERNS = ['home', 'products.*', 'contact'];

    protected const EXCLUDE_NAMES = ['contact.send', 'sitemap', 'robots'];

    public function index()
    {
        $urls = collect(app('router')->getRoutes()->getRoutesByName())
            ->filter(fn (Route $route, string $name) => $this->shouldInclude($route, $name))
            ->map(fn (Route $route, string $name) => $this->buildEntry($route, $name))
            ->sortByDesc('priority')
            ->values();

        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');

        foreach ($urls as $entry) {
            $url = $xml->addChild('url');
            $url->addChild('loc', $entry['loc']);
            $url->addChild('lastmod', date('Y-m-d'));
            $url->addChild('changefreq', $entry['frequency']);
            $url->addChild('priority', $entry['priority']);
        }

        return response($xml->asXML(), 200)
            ->header('Content-Type', 'application/xml');
    }

    protected function shouldInclude(Route $route, string $name): bool
    {
        if (in_array($name, self::EXCLUDE_NAMES, true)) {
            return false;
        }

        if (! in_array('GET', $route->methods(), true)) {
            return false;
        }

        if (! Str::is(self::INCLUDE_PATTERNS, $name)) {
            return false;
        }

        foreach ($route->getCompiled()->getPathVariables() as $variable) {
            if (! $route->hasDefaultParameter($variable)) {
                return false;
            }
        }

        return true;
    }

    protected function buildEntry(Route $route, string $name): array
    {
        $uri = Str::of('/' . ltrim($route->uri(), '/'))
            ->replaceMatches('/\/\{[^}]+\}/', '')
            ->toString();

        [$priority, $frequency] = match (true) {
            $name === 'home' => ['1.0', 'weekly'],
            $name === 'products.custom' => ['0.7', 'monthly'],
            Str::startsWith($name, 'products.') => ['0.8', 'monthly'],
            default => ['0.6', 'yearly'],
        };

        return [
            'loc' => url($uri),
            'priority' => $priority,
            'frequency' => $frequency,
        ];
    }
}
