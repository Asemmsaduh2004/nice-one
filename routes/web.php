<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// الصفحة الرئيسية
Route::get('/', [ProductController::class, 'index'])->name('home');

// لوحة التحكم وتأمين الأدمن
Route::match(['get', 'post'], '/admin', [ProductController::class, 'admin'])->name('admin');
Route::post('/admin/products', [ProductController::class, 'store'])->name('products.store');
Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

// مسارات سلة التسوق
Route::get('/cart', [ProductController::class, 'cart'])->name('cart.index');
Route::post('/cart/add/{product}', [ProductController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove/{id}', [ProductController::class, 'removeFromCart'])->name('cart.remove');