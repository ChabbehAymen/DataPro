<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;

Route::resource('/admin/products', ProductController::class);
Route::name('public')->resource('products', ProductController::class);
Route::resource('/admin/tags', TagController::class);

Route::get('/{vue_capture}', function () {
   return view('welcome');
})->where('vue_capture', "[\/\w\.-]*")->name('vue');







