<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrdersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', [HomeController::class, 'index']);

// Route::get('/gioi_thieu', function () {
//     $name = "Cuong";
//     $mang = ['a', ' b', 'c'];
//     return view('about', compact('mang', 'name'));
// });

// Route::get('/category', [CategoryController::class, 'index']);
// Route::get('/category/{id}', [CategoryController::class, 'view']);
// Route::get('/shop', function () {
//     return view('shop');
// });

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/shop', [HomeController::class, 'shop'])->name('home.shop');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::resource('category', CategoryController::class);
    Route::resource('banner', BannerController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('account', AccountController::class);
    Route::resource('product', ProductController::class);
    Route::resource('orders', OrdersController::class);

});