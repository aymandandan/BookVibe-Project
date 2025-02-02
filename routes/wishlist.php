<?php 


use App\Http\Controllers\homecontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Welcomecontroller;
use App\Http\Controllers\wishlistcontroller;

use Illuminate\Support\Facades\Route;
// Protect the wishlist routes with the 'auth' middleware
Route::middleware('auth')->group(function () {
    Route::get('/wishlist', [wishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/add-to-wishlist', [wishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist/{id}', [wishlistController::class, 'destroy'])->name('wishlist.destroy');
});