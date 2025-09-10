<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('homepage');
});

Route::get('/about', function () {
    return view('about');
});

// Products Table

Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products/create', [ProductController::class, 'store']);   

// Route untuk request yang mengarah ke .index
Route::get('/products', [ProductController::class, 'index']);

// Route untuk request yang memanggil fungsi dari class delete berdasarkan ID
Route::delete('/products/{id}', [ProductController::class, 'delete']);

// Route untuk request yang memanggil fungsi dari class update berdasarkan ID
Route::get('/products/{id}/edit', [ProductController::class, 'edit']);

Route::put('/products/{id}', [ProductController::class, 'update']);

// Customer Table

Route::get('/customer/create', [CustomerController::class, 'create']);
Route::post('/customer/create', [CustomerController::class, 'store']);   

// Route untuk request yang mengarah ke .index
Route::get('/customer/index', [CustomerController::class, 'index']);

// Route untuk request yang memanggil fungsi dari class delete berdasarkan ID
Route::delete('/customer/{id}', [CustomerController::class, 'delete']);

// Route untuk request yang memanggil fungsi dari class update berdasarkan ID
Route::get('/customer/{id}/edit', [CustomerController::class, 'edit']);

Route::put('/customer/{id}', [CustomerController::class, 'update']);