<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/product', [ProductController::class, 'index'])->name('product-index');
Route::get('/product/create', [ProductController::class, 'create'])->name("product-create");
Route::post('/product', [ProductController::class, 'store'])->name("product-store");
Route::get('/product/{id}', [ProductController::class, 'show'])->name(name: "product-detail");
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name("product-edit");
Route::put('/product/{id}', [ProductController::class, 'update'])->name("product-update");
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name("product-deleted");
Route::get('/product/export/excel', [ProductController::class, 'exportExcel'])->name("product-export-excel");
Route::get('/product/export/pdf', [ProductController::class, 'exportPDF'])->name("product-export-pdf");

Route::get('/supplier/create', [SupplierController::class, 'create'])->name("supplier-create");
Route::post('/supplier', [SupplierController::class, 'store'])->name("supplier-store");

require __DIR__ . '/auth.php';
