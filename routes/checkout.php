<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\checkoutController;

Route::middleware('auth')->group(function(){
  Route::get('/checkout/{totalCost}/{nbOfItems}',[checkoutController::class,'getCheckout'])->name('checkoutPage');
  Route::post('/processPay',[checkoutController::class,'processPayWithAvail'])->name('checkout_validation');
  Route::get('/download',[checkoutController::class,'downloadFiles'])->name('download');
});