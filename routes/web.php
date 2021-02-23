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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/product/index', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');

Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
Route::post('/product', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');

Route::get('/product/{product}', [App\Http\Controllers\ProductController::class, 'show'])->name('product.show');

Route::get('/product/{product}/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
Route::patch('/product/{product}', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');

Route::delete('/product/{product}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');