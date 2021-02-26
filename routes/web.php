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
