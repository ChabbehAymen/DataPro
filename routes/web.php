<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;


Route::resource('tags', TagController::class);

Route::get('/', [ProductController::class, 'index'])->name('index');

Route::get('/dashboard', function(){
   return view('dashboard');
});




Route::get('/{vue_capture}', function () {
   return view('welcome');
})->where('vue_capture', "[\/\w\.-]*")->name('vue');







