<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Seller\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

Route::resource('categories', CategoryController::class);

// Admin Seller Management
Route::resource('sellers', SellerController::class);
Route::patch('/sellers/{user}/toggle-status', [SellerController::class, 'toggleStatus'])->name('sellers.toggle');
// Admin Customer Management
Route::resource('customers', CustomerController::class);
Route::patch('/customers/{user}/toggle-status', [CustomerController::class, 'toggleStatus'])->name('customers.toggle');

// Admin Book Management
Route::resource('books', AdminBookController::class);
Route::patch('/books/{book}/toggle-status', [AdminBookController::class, 'toggleStatus'])->name('books.toggle');

// Admin Banner Management
Route::resource('banners', BannerController::class);
Route::patch('/banners/{banner}/toggle-status', [BannerController::class, 'toggleStatus'])->name('banners.toggle');