<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;




Route::get('/{vue_capture}', function () {
   return view('welcome');
})->where('vue_capture', "[\/\w\.-]*")->name('vue');

Route::get('/', [ProductController::class, 'index'])->name('index');



// Public Routes (Vue.js)
Route::get('/{any}', function () {
    return view('welcome'); // Vue app
})->where('any', '.*'); // Catch-all for Vue




// Route::prefix('admin')->group(function () {
//    Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
//    Route::get('/tags/create', [TagController::class, 'create'])->name('tags.create');
//    Route::post('/tags', [TagController::class, 'store'])->name('tags.store');
//    Route::get('/tags/{id}/edit', [TagController::class, 'edit'])->name('tags.edit');
//    Route::put('/tags/{id}', [TagController::class, 'update'])->name('tags.update');
//    Route::delete('/tags/{id}', [TagController::class, 'destroy'])->name('tags.destroy');
// });

Route::get('/admin/tags', function () {
   return view('tags.index', ['tags' => []]);
});
