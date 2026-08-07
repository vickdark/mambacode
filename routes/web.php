<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

