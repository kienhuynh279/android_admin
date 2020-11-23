<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CartDetailController;

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
    return view('admin.page.index');
});

Route::resource("product", ProductController::class, [
    "as" => "admin"
]);

Route::resource("category", CategoryController::class, [
    "as" => "admin"
]);

Route::resource("cart", CartController::class, [
    "as" => "admin"
]);

Route::resource("cart-detail", CartDetailController::class, [
    "as" => "admin"
]);