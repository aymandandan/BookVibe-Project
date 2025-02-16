<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/book/create', [BookController::class, 'create'])->name('book.create');
//     Route::post('/book', [BookController::class, 'store'])->name('book.store');
//     Route::get('/book/{book}/edit', [BookController::class, 'edit'])->name('book.edit');
//     Route::put('/book/{book}', [BookController::class, 'update'])->name('book.update');
//     Route::delete('/book/{book}', [BookController::class, 'destroy'])->name('book.destroy');
// });

Route::get('/book/{book}', [BookController::class, 'show'])->name('book.show');
