<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SitemapController;
use App\Http\Controllers\ProductAccessController;

Route::get('/', function () {
    return view('welcome');
})->name('home');


// rutas para enlacen de los productos especificos 
Route::view('/transports', 'products.transports.index')->name('products.transports');
Route::view('/sales', 'products.sales.index')->name('products.sales');
Route::view('/pos-cafeterias-bares', 'products.hospitality.index')->name('products.hospitality');
Route::view('/itam', 'products.itam.index')->name('products.itam');
Route::view('/gym', 'products.gym.index')->name('products.gym');
Route::view('/aloja360', 'products.aloja360.index')->name('products.aloja360');
Route::view('/medicos-integrados', 'products.medicos.index')->name('products.medicos');
// ruta para producto personalizado / contacto comercial
Route::view('/custom', 'products.custom.index')->name('products.custom');

Route::get('/accesos', [ProductAccessController::class, 'index'])->name('access.index');

// contact form routes
Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:contact')->name('contact.send');

// SEO routes
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::get('/robots.txt', function () {
    $content = "User-agent: *\nDisallow:\n\nSitemap: " . url('/sitemap.xml') . "\n";

    return response($content, 200)
        ->header('Content-Type', 'text/plain');
})->name('robots');

// Política de tratamiento de datos
Route::view('/politica-tratamiento-datos', 'privacy')->name('privacy.policy');
