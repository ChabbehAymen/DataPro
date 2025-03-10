<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::resource('/admin/products', ProductController::class);
Route::resource('products', ProductController::class);

Route::get('/{vue_capture}', function () {
   return view('welcome');
})->where('vue_capture', "[\/\w\.-]*")->name('vue');

