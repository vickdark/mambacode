<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SitemapController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


// rutas para enlacen de los productos especificos 
Route::view('/transports', 'products.transports.index')->name('products.transports');
Route::view('/sales', 'products.sales.index')->name('products.sales');
Route::view('/itam', 'products.itam.index')->name('products.itam');
Route::view('/gym', 'products.gym.index')->name('products.gym');
// ruta para producto personalizado / contacto comercial
Route::view('/custom', 'products.custom.index')->name('products.custom');

// contact form routes
Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.send');

// SEO routes
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::get('/robots.txt', function () {
    $content = "User-agent: *\nDisallow:\n\nSitemap: " . url('/sitemap.xml') . "\n";

    return response($content, 200)
        ->header('Content-Type', 'text/plain');
})->name('robots');

// Política de tratamiento de datos
Route::view('/politica-tratamiento-datos', 'privacy')->name('privacy.policy');

