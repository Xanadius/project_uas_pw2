<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [DashboardController::class, 'landing']);

Route::get('/landing', [DashboardController::class, 'landingLogin'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Category

Route::get('admin/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'admin']);

Route::get('admin/category', [AdminController::class, 'category'])->middleware(['auth', 'admin']);

Route::post('add_category', [AdminController::class, 'add_category'])->middleware(['auth', 'admin']);

Route::get('edit_category/{id}', [AdminController::class, 'edit_category'])->middleware(['auth', 'admin']);

Route::post('update_category/{id}', [AdminController::class, 'update_category'])->middleware(['auth', 'admin']);

Route::get('delete_category/{id}', [AdminController::class, 'delete_category'])->middleware(['auth', 'admin']);

// Product

Route::get('product/{id}', [DashboardController::class, 'product'])->middleware(['auth', 'verified']);

Route::get('admin/product', [AdminController::class, 'product'])->middleware(['auth', 'admin']);

Route::get('search_product', [AdminController::class, 'search_product'])->middleware(['auth', 'admin']);

Route::get('admin/add_product', [AdminController::class, 'add_product'])->middleware(['auth', 'admin']);

Route::post('upload_product', [AdminController::class, 'upload_product'])->middleware(['auth', 'admin']);

Route::get('edit_product/{id}', [AdminController::class, 'edit_product'])->middleware(['auth', 'admin']);

Route::post('update_product/{id}', [AdminController::class, 'update_product'])->middleware(['auth', 'admin']);

Route::get('delete_product/{id}', [AdminController::class, 'delete_product'])->middleware(['auth', 'admin']);

// Cart

Route::get('add_cart/{id}', [DashboardController::class, 'add_cart'])->middleware(['auth', 'verified']);

Route::get('my_cart', [DashboardController::class, 'my_cart'])->middleware(['auth', 'verified']);

Route::get('delete_item/{id}', [DashboardController::class, 'delete_item'])->middleware(['auth', 'verified']);

// Order

Route::get('popup-form', function () {
    return view('user.modal');
});

Route::post('place_order', [DashboardController::class, 'place_order'])->middleware(['auth', 'verified']);

Route::get('admin/order', [AdminController::class, 'order'])->middleware(['auth', 'admin']);

// Order Status
Route::get('in_progress/{id}', [AdminController::class, 'in_progress'])->middleware(['auth', 'admin']);

Route::get('on_the_way/{id}', [AdminController::class, 'on_the_way'])->middleware(['auth', 'admin']);

Route::get('delivered/{id}', [AdminController::class, 'delivered'])->middleware(['auth', 'admin']);

Route::get('print_pdf/{id}', [AdminController::class, 'print_pdf'])->middleware(['auth', 'admin']);
