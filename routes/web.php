<?php


use App\Http\Controllers\checkoutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/checkout', [checkoutController::class, 'index'])->name('checkout.index');
    //Route::post('/checkout', [checkoutController::class, 'processCheckout'])->name('checkout_validation');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/search.php';
require __DIR__ . '/wishlist.php';
require __DIR__ . '/home.php';
require __DIR__ . '/cart.php';
require __DIR__ . '/author.php';
require __DIR__ . '/checkout.php';
require __DIR__ . '/confirm.php';
require __DIR__ . '/cart.php';
require __DIR__ . '/book.php';
require __DIR__ . '/admin.php';
