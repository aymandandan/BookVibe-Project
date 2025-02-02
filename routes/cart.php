<?php

use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

Route::middleware('auth')->group(function(){
  Route::get('/cart',[CartController::class,'index'])->name('cart.Page');
  Route::delete('/cart/{id}',[CartController::class,'destroy'])->name('cart.destroy');
  Route::post('/cart/{id}',[CartController::class,'insert'])->name('add.Cart');
});

