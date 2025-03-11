<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagsController;

Route::resource('/admin/tags', TagsController::class);
Route::resource('/admin/products', ProductController::class);
Route::name('public')->resource('products', ProductController::class);

Route::get('/{vue_capture}', function () {
   return view('welcome');
})->where('vue_capture', "[\/\w\.-]*")->name('vue');

