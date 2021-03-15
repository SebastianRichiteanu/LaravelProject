<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('/products/index');
});

Auth::routes();

// index
Route::get('/products/index', [App\Http\Controllers\ProductsController::class, 'index'])->name('products.index');
// create
Route::get('/products/create', [App\Http\Controllers\ProductsController::class, 'create'])->name('products.create');
Route::post('/products', [App\Http\Controllers\ProductsController::class, 'store'])->name('products.store');
// show
Route::get('/products/{product}', [App\Http\Controllers\ProductsController::class, 'show'])->name('products.show');
// edit
Route::get('/products/{product}/edit', [App\Http\Controllers\ProductsController::class, 'edit'])->name('products.edit');
Route::patch('/products/{product}', [App\Http\Controllers\ProductsController::class, 'update'])->name('products.update');
// delete
Route::delete('/products/{product}', [App\Http\Controllers\ProductsController::class, 'destroy'])->name('products.destroy');
// index for author
Route::get('/products', [App\Http\Controllers\ProductsController::class, 'indexall'])->name('products.indexall');
Route::patch('/{product}', [App\Http\Controllers\ProductsController::class, 'update_status'])->name('products.update');
// routes for admin
Route::resource('/admin/users', App\Http\Controllers\Admin\UsersController::class,['except' => ['show','create','store']]);


Route::get('/categories/index', [App\Http\Controllers\CategoriesController::class, 'index'])->name('categories.index');

Route::get('/categories/create', [App\Http\Controllers\CategoriesController::class, 'create'])->name('categories.create');
Route::post('/categories', [App\Http\Controllers\CategoriesController::class, 'store'])->name('categories.store');

Route::get('/categories/{category}/edit', [App\Http\Controllers\CategoriesController::class, 'edit'])->name('categories.edit');
Route::patch('/categories/{category}', [App\Http\Controllers\CategoriesController::class, 'update'])->name('categories.update');

Route::delete('/categories/{category}', [App\Http\Controllers\CategoriesController::class, 'destroy'])->name('categories.destroy');
