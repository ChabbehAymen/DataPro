<?php

use App\Http\Controllers\BasketController;
use App\Http\Middleware\AdminAccess;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Auth::routes();

// Admin Routes (Protected by Middleware)
Route::middleware(AdminAccess::class)->group(function () {
   Route::resource('/admin/tags', TagsController::class);
   Route::resource('/admin/products', ProductController::class);
   Route::resource('/admin/categories', CategoryController::class);
   Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//    Route::get('/admin/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
});
Route::middleware('auth')->group(function () {
   Route::resource('/basket', BasketController::class);
});

Route::get("/products/tag/{tag}", [ProductController::class, 'getProductsByTag'])->name('tag.products');
Route::get("/products/category/{category}", [ProductController::class, 'getProductsByCategory'])->name('category.products');
Route::name('public')->resource('/tags', TagsController::class);
Route::name('public')->resource('products', ProductController::class);
Route::name('public')->resource('/categories', CategoryController::class);
// Vue Router
Route::get('/{vue_capture}', function () {
   return view('welcome');
})->where('vue_capture', "[\/\w\.-]*")->name('vue');
