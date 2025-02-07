<?php
  use Illuminate\Support\Facades\Route;
  use App\Http\Controllers\ConfirmController;

  Route::middleware('auth')->group(function(){
  Route::get('/confirm',[ConfirmController::class,'index'])->name('confirmPage');
  });