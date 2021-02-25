<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/products/index');
});

Auth::routes();


Route::get('/products/index', [App\Http\Controllers\ProductsController::class, 'index'])->name('products.index');

Route::get('/products/create', [App\Http\Controllers\ProductsController::class, 'create'])->name('products.create');
Route::post('/products', [App\Http\Controllers\ProductsController::class, 'store'])->name('products.store');

Route::get('/products/{product}', [App\Http\Controllers\ProductsController::class, 'show'])->name('products.show');

Route::get('/products/{product}/edit', [App\Http\Controllers\ProductsController::class, 'edit'])->name('products.edit');
Route::patch('/products/{product}', [App\Http\Controllers\ProductsController::class, 'update'])->name('products.update');

Route::delete('/products/{product}', [App\Http\Controllers\ProductsController::class, 'destroy'])->name('products.destroy');

Route::get('/products', [App\Http\Controllers\ProductsController::class, 'indexall'])->name('products.indexall');
Route::patch('/{product}', [App\Http\Controllers\ProductsController::class, 'update_status'])->name('products.update');

Route::resource('/admin/users', App\Http\Controllers\Admin\UsersController::class,['except' => ['show','create','store']]);
