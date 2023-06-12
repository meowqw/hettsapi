<?php

use App\Http\Controllers\Admin\Product\ProductController;
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

Route::prefix('/admin')->group(function () {
    Route::get('products', [ProductController::class, 'index'])->name('index');
    Route::post('product', [ProductController::class, 'store'])->name('store');
    Route::delete('product/{id}', [ProductController::class, 'destroy'])->name('destroy');
});
