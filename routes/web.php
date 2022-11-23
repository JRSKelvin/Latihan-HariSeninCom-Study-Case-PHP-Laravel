<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductAssetController;
use App\Http\Controllers\ProductController;
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
Route::get('/category', [CategoryController::class, 'index']);
Route::get('/asset', [AssetController::class, 'index']);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product_asset', [ProductAssetController::class, 'index']);
Route::resource('/category', CategoryController::class);
Route::resource('/asset', AssetController::class);
Route::resource('/product', ProductController::class);
Route::resource('/product_asset', ProductAssetController::class);
