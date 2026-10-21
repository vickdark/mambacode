<?php

namespace App\Http\Controllers;

class ProductAccessController extends Controller
{
    public function index()
    {
        $products = collect(config('products'))
            ->filter(function (array $product): bool {
                $url = $product['url'] ?? null;

                return is_string($url)
                    && filter_var($url, FILTER_VALIDATE_URL)
                    && parse_url($url, PHP_URL_SCHEME) === 'https'
                    && parse_url($url, PHP_URL_USER) === null
                    && parse_url($url, PHP_URL_PASS) === null;
            });

        return response()->view('access.index', compact('products'))
            ->header('X-Robots-Tag', 'noindex, nofollow');
    }
}
