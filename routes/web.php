<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


// rutas para enlacen de los productos especificos 
Route::view('/transports', 'products.transports.index')->name('products.transports');
Route::view('/sales', 'products.sales.index')->name('products.sales');
Route::view('/itam', 'products.itam.index')->name('products.itam');
Route::view('/gym', 'products.gym.index')->name('products.gym');

