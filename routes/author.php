<?php
  use Illuminate\Support\Facades\Route;
  use App\Http\Controllers\AuthorController;

  Route::get('/author/{id}',[AuthorController::class,'getAuthor'])->name('authorPage');

