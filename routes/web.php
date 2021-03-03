<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;

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
    return view('welcome');
});

/* Category */
Route::get('product-category', [CategoryController::class, 'index'])->name('product-category.index');

Route::get('product-category/create', [CategoryController::class, 'create'])->name('product-category.create');
Route::post('product-category', [CategoryController::class, 'store'])->name('product-category.store');

Route::get('product-category/{id}/edit', [CategoryController::class, 'edit'])->name('product-category.edit');
Route::patch('product-category/{id}', [CategoryController::class, 'update'])->name('product-category.update');

Route::delete('product-category/{id}', [CategoryController::class, 'destroy'])->name('product-category.destroy');


/* Brand */
Route::get('product-brand', [BrandController::class, 'index'])->name('product-brand.index');

Route::get('product-brand/{uuid}', [BrandController::class, 'show']);

Route::get('create-brand', [BrandController::class, 'create'])->name('create-brand.create');
Route::post('product-brand', [BrandController::class, 'store'])->name('store-brand.index');


/* Customer */
Route::get('customer', [CustomerController::class, 'index'])->name('customer.index');

Route::get('customer/{uuid}', [CustomerController::class, 'show']);

Route::get('create-customer', [CustomerController::class, 'create'])->name('create-customer.create');
Route::post('customer', [CustomerController::class, 'store'])->name('store-customer.index');


/* Suppliers */
Route::get('suppliers', [SupplierController::class, 'index'])->name('suppliers.index');

Route::get('suppliers/{uuid}', [SupplierController::class, 'show']);

Route::get('create-suppliers', [SupplierController::class, 'create'])->name('create-suppliers.create');
Route::post('suppliers', [SupplierController::class, 'store'])->name('store-suppliers.index');