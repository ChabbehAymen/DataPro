<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;


Route::resource('tags', TagController::class);





Route::get('/{vue_capture}', function () {
   return view('welcome');
})->where('vue_capture', "[\/\w\.-]*")->name('vue');

Route::get('/', [ProductController::class, 'index'])->name('index');






