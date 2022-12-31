<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\KartController;
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

Route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'isAdmin'
])->group(function () {
    Route::resource('category', 'App\Http\Controllers\CategoryController');
    Route::resource('product', 'App\Http\Controllers\ProductController');
    Route::post('/logout', [UserController::class, 'logout']);
    Route::get('/dashboard', function () {
        
        return view('admin.dashboard');
    })->name('dashboard');
});



// Route::get('/redirect', [HomeController::class, 'redirect']);
Route::get('/home', [HomeController::class, 'index',]);
Route::get('category/{slug}/{product_name}', [HomeController::class, 'viewProduct']);
Route::get('view-category/{slug}', [HomeController::class, 'category']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth:sanctum'])->group(function() {

Route::get('cart', [CartController::class, 'viewCart']);
Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('delete-cart-item', [CartController::class, 'deleteProduct']);
Route::post('update-cart', [CartController::class, 'updateProduct']);
Route::get('checkout', [CheckoutController::class, 'index']);
Route::post('place-order', [CheckoutController::class, 'placeOrder']);
Route::get('my-orders', [UserController::class, 'index']);
Route::get('order-details/{id}', [UserController::class, 'viewOrderDetails']);


});







