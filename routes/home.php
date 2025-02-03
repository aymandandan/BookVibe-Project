<?php 

use App\Http\Controllers\homecontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Welcomecontroller;
use Illuminate\Support\Facades\Route;
Route::get('/home', [homecontroller::class,'index'])->name('home.index');
Route::get('/about', [homecontroller::class, 'about']);