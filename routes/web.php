<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

// Category Routes

Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
    Route::get('/category', 'index');
    Route::get('/category/create', 'create');
    Route::post('/category', 'store');
    Route::get('/category/{category}/edit', 'edit');
    Route::put('/category/{category}', 'update');
    });

// Brand Routes

    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class);

// Product Routes

Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
    Route::get('/products', 'index');
    Route::get('/products/create', 'create');
    Route::post('/products', 'store');
    Route::get('/products/{product}/edit', 'edit');
    Route::put('/products/{product}', 'update');
    Route::get('/products/{product_id}/delete', 'destroy');
    Route::get('/product-image/{product_image_id}/delete','destroyImage');
    
    Route::post('/product-colour/{prod_colour_id}', 'updateProdColourQty');
    Route::get('/product-colour/{prod_colour_id}/delete', 'deleteProdColour');
    });

// Colour Routes

Route::controller(App\Http\Controllers\Admin\ColourController::class)->group(function () {
    Route::get('/colours', 'index');
    Route::get('/colours/create', 'create');
    Route::post('/colours/create', 'store');
    Route::get('/colours/{colour}/edit', 'edit');
    Route::put('/colours/{colour_id}', 'update');
    Route::get('/colours/{colour_id}/delete', 'destroy');
    });
    
});