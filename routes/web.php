<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\SearchController;

Route::get('/', function () {
    return view('adminlte::page');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/categories', [ProductCategoryController::class, 'showCategories'])->name('categories.index');
Route::get('/products/category/{category}', [ProductCategoryController::class, 'showProductsByCategory'])->name('products.by_category');

require __DIR__.'/auth.php';
