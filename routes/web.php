<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProfilController;
use Illuminate\Support\Facades\Route;

require 'admin.php';

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
    return view('frontend.pages.home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('site.home');
Route::get('/', [HomeController::class, 'index'])->name('site.home');
Route::get('/devise/{devise}', [HomeController::class, 'setDevise'])->name('site.devise');
Route::get('/product/list', [ProductController::class, 'index'])->name('site.products.list');
Route::get('/page/{famille}', [ProductController::class, 'listByFamille'])->name('site.famille');
Route::get('/categorie/{categorie}', [ProductController::class, 'listByCategory'])->name('site.category');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('site.products.details');
Route::post('/product/add/cart', [ProductController::class, 'addToCart'])->name('product.add.cart');
Route::get('/cart', [CartController::class, 'getCart'])->name('checkout.cart');
Route::patch('/cart/{productId}/update', [CartController::class, 'updateCart'])->name('checkout.cart.update');
Route::get('/cart/item/{id}/remove',  [CartController::class, 'removeItem'])->name('checkout.cart.remove');

Route::view('/preview-mail','emails.order_validated_mail');

Route::group(['middleware' => ['auth']], function() {
    Route::get('checkout',  [CheckoutController::class, 'create'])->name('check-out');
    Route::post('checkout/store', [CheckoutController::class, 'store'])->name('check-out.store');
    Route::view('checkout/success', 'frontend.pages.success')->name('check-out.success');

    Route::get('customer/account/dashbord', [ProfilController::class, 'index'])->name('profil.dashbord');
    Route::get('customer/orders/index', [ProfilController::class, 'index'])->name('profil.orders');
    Route::get('customer/orders/{code}/delete', [ProfilController::class, 'deleteOrder'])->name('profil.orders.delete');
    Route::get('customer/orders/{order}/tracking', [ProfilController::class, 'orderTracking'])->name('profil.orders.tracking');
    Route::get('customer/account/edit', [ProfilController::class, 'index'])->name('profil.account.edit');
    Route::post('customer/account/update', [ProfilController::class, 'update'])->name('profil.account.update');
 });
 