<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::resource('/admin/products', ProductController::class);
Route::name('public')->resource('products', ProductController::class);


Route::resource('/admin/categories', CategoryController::class);



Route::get('/{vue_capture}', function () {
   return view('welcome');
})->where('vue_capture', "[\/\w\.-]*")->name('vue');




