<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.Page');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('/cart/add/{id}', [CartController::class, 'insert'])->name('add.Cart');
    Route::post('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('update.Cart');
});

