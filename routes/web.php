<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Seller\BookController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", [HomeController::class, "index"])->name("home.index");
Route::get("/book-detail/{book}", [HomeController::class, "bookDetail"])->name("home.book-detail");

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

//Customer Dashboard
Route::get('/customer/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('customer.dashboard');

// Seller Dashboard
Route::get('/seller/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified', 'role:1'])->name('seller.dashboard');

// Admin Dashboard
// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified', 'role:2'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// --- PUBLIC ROUTES (Everyone can see books) ---
// Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book:slug}', [BookController::class, 'show'])->name('books.show');


// --- SELLER ROUTES (Only Sellers can Manage Books) ---
Route::middleware(['auth', 'verified', 'role:1'])->prefix('seller')->name('seller.')->group(function () {
    Route::resource('books', BookController::class);
    
    Route::patch('/books/{book}/toggle-status', [BookController::class, 'toggleStatus'])->name('books.toggle');
});

require __DIR__.'/auth.php';
