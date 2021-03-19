<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SalesDetailController;

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

Route::get('product-brand/create', [BrandController::class, 'create'])->name('product-brand.create');
Route::post('product-brand', [BrandController::class, 'store'])->name('product-brand.store');

Route::get('product-brand/{id}/edit', [BrandController::class, 'edit'])->name('product-brand.edit');
Route::patch('product-brand/{id}', [BrandController::class, 'update'])->name('product-brand.update');

Route::delete('product-brand/{id}', [BrandController::class, 'destroy'])->name('product-brand.destroy');



/* Customer */
Route::get('customer', [CustomerController::class, 'index'])->name('customer.index');

Route::get('customers/{id}', [CustomerController::class, 'show'])->name('customer.show');

Route::get('customer/create', [CustomerController::class, 'create'])->name('customer.create');
Route::post('customer', [CustomerController::class, 'store'])->name('customer.store');

Route::get('customer/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
Route::patch('customer/{id}', [CustomerController::class, 'update'])->name('customer.update');

Route::delete('customer/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');


/* Suppliers */
Route::get('supplier', [SupplierController::class, 'index'])->name('supplier.index');

Route::get('suppliers/{id}', [SupplierController::class, 'show'])->name('supplier.show');

Route::get('supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
Route::post('supplier', [SupplierController::class, 'store'])->name('supplier.store');

Route::get('supplier/{id}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
Route::patch('supplier/{id}', [SupplierController::class, 'update'])->name('supplier.update');

Route::delete('supplier/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');


/* Items */
Route::get('item', [ItemController::class, 'index'])->name('item.index');

Route::get('items/{id}', [ItemController::class, 'show'])->name('item.show');

Route::get('item/create', [ItemController::class, 'create'])->name('item.create');
Route::post('item', [ItemController::class, 'store'])->name('item.store');

Route::get('item/{id}/edit', [ItemController::class, 'edit'])->name('item.edit');
Route::patch('item/{id}', [ItemController::class, 'update'])->name('item.update');

Route::delete('item/{id}', [ItemController::class, 'destroy'])->name('item.destroy');


/* Stocks */
Route::get('stock', [StockController::class, 'index'])->name('stock.index');

Route::get('stocks/{id}', [StockController::class, 'show'])->name('stock.show');

Route::get('stock/create', [StockController::class, 'create'])->name('stock.create');
Route::post('stock', [StockController::class, 'store'])->name('stock.store');

Route::get('stock/{id}/edit', [StockController::class, 'edit'])->name('stock.edit');
Route::patch('stock/{id}', [StockController::class, 'update'])->name('stock.update');

Route::delete('stock/{id}', [StockController::class, 'destroy'])->name('stock.destroy');


/* Purchases */
Route::get('purchase', [PurchaseController::class, 'index'])->name('purchase.index');

Route::get('purchase-show/{id}', [PurchaseController::class, 'show'])->name('purchase.show');

Route::get('purchase/create', [PurchaseController::class, 'create'])->name('purchase.create');
Route::post('purchase', [PurchaseController::class, 'store'])->name('purchase.store');

Route::get('purchase/{id}/edit', [PurchaseController::class, 'edit'])->name('purchase.edit');
Route::patch('purchase/{id}', [PurchaseController::class, 'update'])->name('purchase.update');

Route::delete('purchase/{id}', [PurchaseController::class, 'destroy'])->name('purchase.destroy');


/* Sales */
Route::get('sales', [SalesController::class, 'index'])->name('sales.index');

Route::get('sales-show/{id}', [SalesController::class, 'show'])->name('sales.show');

Route::get('sales/create', [SalesController::class, 'create'])->name('sales.create');
Route::post('sales', [SalesController::class, 'store'])->name('sales.store');

Route::get('sales/{id}/edit', [SalesController::class, 'edit'])->name('sales.edit');
Route::patch('sales/{id}', [SalesController::class, 'update'])->name('sales.update');

Route::delete('sales/{id}', [SalesController::class, 'destroy'])->name('sales.destroy');


/* Sales Details*/
Route::get('sales-detail/{id}', [SalesDetailController::class, 'show'])->name('salesdetail.show');