<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\CategoryController;

Route::resource('/admin/tags', TagsController::class);
Route::name('public')->resource('/tags', TagsController::class);

// products routes
Route::resource('/admin/products', ProductController::class);
Route::name('public')->resource('products', ProductController::class);

// categories routes
Route::resource('/admin/categories', CategoryController::class);
Route::name('public')->resource('/categories', CategoryController::class);

Route::get('/admin/dashboard', function(){return view('dashboard');})->name('dashboard');

// Vue Router
Route::get('/{vue_capture}', function () {
   return view('welcome');
})->where('vue_capture', "[\/\w\.-]*")->name('vue');




