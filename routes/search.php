<?php

use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('search', [SearchController::class, 'search'])->name('books.search');
Route::get('category', [SearchController::class, 'searchCategory'])->name('books.searchCategory');
Route::get('book_type', [SearchController::class, 'searchType'])->name('books.searchType');
