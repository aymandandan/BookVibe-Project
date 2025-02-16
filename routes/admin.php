<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Books Management
    Route::resource('/books', BookController::class)->names('admin.books');

    // Categories Management
    Route::resource('/categories', CategoryController::class)->names('admin.categories');

    // Authors Management
    Route::resource('/authors', AuthorController::class)->names('admin.authors');
});
