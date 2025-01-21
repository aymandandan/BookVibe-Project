<?php

use App\Http\Controllers\homecontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Welcomecontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', [Welcomecontroller::class,'welcome'])->name('welcome');
Route::get('/home', [homecontroller::class,'index'])->name('home.index');

/*Route::get('/home', function () {
    return "hello world";
});*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
