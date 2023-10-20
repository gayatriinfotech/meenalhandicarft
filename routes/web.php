<?php

use App\Http\Controllers\backendController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\inwardController;
use App\Http\Controllers\productController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\sub_categoryController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/demo', function () {
//     return view('frontend/order');
// });

// backend routes 
Route::get('dashboard', [backendController::class, 'index']);
Route::resource('subcategory', sub_categoryController::class)->middleware('adminLoginCheck');
Route::resource('category', categoryController::class)->middleware('adminLoginCheck');
Route::resource('product', productController::class)->middleware('adminLoginCheck');
Route::get('adminlogin', [backendController::class, 'adminlogin']);
Route::post('/adminlogin', [backendController::class, 'adminloginPost']);
Route::get('/adminlogout', [backendController::class, 'adminlogout']);
Route::resource('inward', inwardController::class);
Route::get('stock', [backendController::class, 'stock'])->middleware('adminLoginCheck');
Route::get('contactus', [backendController::class, 'contact'])->middleware('adminLoginCheck');
Route::get('orders', [backendController::class, 'orders'])->middleware('adminLoginCheck');
Route::get('subscribers', [backendController::class, 'subscribers'])->middleware('adminLoginCheck');

// frontend routes 
Route::get('/', [frontendController::class, 'index']);
Route::resource('register', registerController::class);
Route::get('/cart', [frontendController::class, 'cart']);
Route::get('addtocart/{id}', [frontendController::class, 'addtocart'])->name('addtocart');
Route::get('removecart/{id}', [frontendController::class, 'removecart'])->name('removecart');
Route::get('login', [frontendController::class, 'login']);
Route::post('login', [frontendController::class, 'loginPost']);
Route::get('logout', [frontendController::class, 'logout']);
Route::get('products/{id}', [frontendController::class, 'products'])->name('products');
Route::get('subcate/{id}', [frontendController::class, 'subcate'])->name('subcate');
Route::get('sub/{id}', [frontendController::class, 'sub'])->name('sub');
Route::get('categories', [frontendController::class, 'category']);
Route::get('about', [frontendController::class, 'about']);
Route::get('singleproduct/{id}', [frontendController::class, 'singleproduct'])->name('singleproduct');
Route::get('checkout', [frontendController::class, 'checkout'])->middleware('userlogincheck');
Route::get('profile', [frontendController::class, 'profile'])->middleware('userlogincheck');
Route::post('profileupdate/{id}', [frontendController::class, 'profileupdate'])->name('profileupdate')->middleware('userlogincheck');
Route::get('searchproduct', [frontendController::class, 'searchproduct']);
Route::post('/searching', [frontendController::class, 'result']);
Route::get('/wishlist', [frontendController::class, 'wishlist'])->middleware('userlogincheck');
Route::get('addtowishlist/{id}', [frontendController::class, 'addtowishlist'])->middleware('userlogincheck');
Route::get('removewishlist/{id}', [frontendController::class, 'removewishlist'])->middleware('userlogincheck');
Route::get('/contact', [frontendController::class, 'contact']);
Route::post('/contact', [frontendController::class, 'contactPost']);
Route::post('/subscribe', [frontendController::class, 'subscribe']);
Route::post('/placeorder', [frontendController::class, 'placeorder'])->middleware('userlogincheck');
Route::get('/myorders', [frontendController::class, 'myorders'])->middleware('userlogincheck');



Route::get('/demo', [frontendController::class, 'demo'])->middleware('userlogincheck');