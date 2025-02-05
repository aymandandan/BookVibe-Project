<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/book', [BookController::class, 'store'])->name('book.store');
    Route::get('/book/{id}/edit', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/book/{id}', [BookController::class, 'update'])->name('book.update');
    Route::delete('/book/{id}', [BookController::class, 'destroy'])->name('book.destroy');
});

Route::get('/book/{id}', [BookController::class, 'show'])->name('book.show');
