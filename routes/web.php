<?php

use App\Http\Controllers\BasketController;
use App\Http\Middleware\AdminAccess;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Symfony\Component\HttpKernel\Profiler\Profile;

Auth::routes();

// Admin Routes (Protected by Middleware)
Route::middleware(AdminAccess::class)->group(function () {
   Route::resource('/admin/tags', TagsController::class);
   Route::resource('/admin/products', ProductController::class);
   Route::resource('/admin/categories', CategoryController::class);

   Route::get('/admin/dashboard', function () {
       return view('dashboard');
   })->name('dashboard');
});
Route::middleware('auth')->group(function () {
   Route::resource('/basket', BasketController::class);
   Route::get('/user',[ProfileController::class, 'show']);
   Route::put('/user/update',[ProfileController::class,'update']);
   Route::put('/user/update-password',[ProfileController::class,'updatePassword']);
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

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});
