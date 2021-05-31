<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DeviseController;
use App\Http\Controllers\Backend\FamilleController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\OrderTracking;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\TransporteurController;

Route::get('admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('admin/login', [AuthController::class, 'login'])->name('admin.login.post');
Route::get('admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::group(['middleware' => ['auth:admin']], function(){
    Route::group(['prefix' => 'admin'], function(){
        
        Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
        Route::get('/last-orders', [HomeController::class, 'getLatestOrders']);

        Route::view('settings', 'backend.pages.settings')->name('admin.settings');
        Route::view('media', 'backend.pages.media')->name('admin.media');
        
        Route::group(['prefix' => 'categories'], function(){
            Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
            Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
            Route::post('store', [CategoryController::class, 'store'])->name('admin.category.store');
            Route::get('/{slug}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
            Route::put('/{slug}/update', [CategoryController::class, 'update'])->name('admin.category.update');
            Route::get('/{slug}/delete', [CategoryController::class, 'delete'])->name('admin.category.delete');
        });

        Route::group(['prefix' => 'customers'], function(){
            Route::get('/', [CustomerController::class, 'index'])->name('admin.customer.index');
            Route::get('/show/{user}', [CustomerController::class, 'show'])->name('admin.customer.show');
            Route::get('/{user}/delete', [CustomerController::class, 'delete'])->name('admin.customer.delete');
        });

        Route::group(['prefix' => 'familles'], function(){
            Route::get('/', [FamilleController::class, 'index'])->name('admin.famille.index');
            Route::get('/create', [FamilleController::class, 'create'])->name('admin.famille.create');
            Route::post('store', [FamilleController::class, 'store'])->name('admin.famille.store');
            Route::get('/{slug}/edit', [FamilleController::class, 'edit'])->name('admin.famille.edit');
            Route::put('/{slug}/update', [FamilleController::class, 'update'])->name('admin.famille.update');
            Route::get('/{slug}/delete', [FamilleController::class, 'delete'])->name('admin.famille.delete');
        });
        
        Route::group(['prefix' => 'products'], function(){
           Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
           Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
           Route::post('/store', [ProductController::class, 'store'])->name('admin.product.store');
           Route::get('/{slug}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
           Route::put('/{slug}/update', [ProductController::class, 'update'])->name('admin.product.update');
           Route::get('/{slug}/delete', [ProductController::class, 'delete'])->name('admin.product.delete');

           Route::get('/{slug}/video', [ProductController::class, 'edit'])->name('admin.product.video');
           Route::post('/{slug}/video/update', [ProductController::class, 'updateVideo'])->name('admin.product.videos.update');

           Route::post('/upload-file', [ProductController::class, 'uploadEditorFile'])->name("upload-files");

           Route::get('/{slug}/galerie', [ProductController::class, 'edit'])->name('admin.product.galerie');
           Route::post('/galerie/update', [ProductController::class, 'updateGalerieFiles'])->name('admin.product.galerie.update');

           Route::post('/upload-galeries', [ProductController::class, 'storeGalerieFiles'])->name("upload-galerie");
           Route::get('/galerie/{image}/delete-image/', [ProductController::class, 'deleteImage'])->name('admin.product.galerie.delete');
        });
        
        Route::group(['prefix' => 'orders'], function(){
            Route::get('/', [OrderController::class, 'index'])->name('admin.orders.index');
            Route::get('/show/{code}', [OrderController::class, 'show'])->name('admin.orders.show');
            Route::get('/delete/{code}', [OrderController::class, 'delete'])->name('order.admin.delete');
            Route::get('/update/{code}', [OrderController::class, 'update'])->name('admin.orders.update');
            Route::get('/{code}/delete', [OrderController::class, 'delete'])->name('admin.orders.delete');
            Route::get('/{code}/confirm-delivery', [OrderController::class, 'confirmDelivery'])->name('admin.orders.confirm_delivery');
            Route::get('/{code}/tracking', [OrderTracking::class, 'index'])->name('admin.orders.tracking');
            Route::get('/{code}/trackings', [OrderTracking::class, 'getTrackings']);
            Route::post('/{code}/saveTracking', [OrderTracking::class, 'saveTracking']);
            Route::post('/{code}/tracking/start', [OrderTracking::class, 'startTracking']);
            Route::post('/{code}/tracking/completed', [OrderTracking::class, 'completedTracking']);
        });

        Route::group(['prefix' => 'transporteurs'], function(){
            Route::get('/', [TransporteurController::class, 'index'])->name('admin.transporteurs.index');
        });

        Route::group(['prefix' => 'devise'], function(){
            Route::get('/', [DeviseController::class, 'index'])->name('admin.devise.index');
        });
    });
});


