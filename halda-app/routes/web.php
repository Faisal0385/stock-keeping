<?php

use App\Http\Controllers\Backend\ProductMasterController;
use App\Http\Controllers\Backend\PurchaseItemController;
use App\Http\Controllers\Backend\PurchaseOrderController;
use App\Http\Controllers\Backend\SalesOrderController;
use App\Http\Controllers\Backend\SalesOrderItemController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.home.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';








// product
Route::get('/product-master', [ProductMasterController::class, 'index'])->middleware(['auth', 'verified'])->name('product.master');
Route::post('/product-store', [ProductMasterController::class, 'store'])->middleware(['auth', 'verified'])->name('products.store');

// purchase-orders
Route::get('/purchase-orders', [PurchaseOrderController::class, 'index'])->middleware(['auth', 'verified'])->name('purchase.orders');
Route::post('/purchase-orders-store', [PurchaseOrderController::class, 'store'])->middleware(['auth', 'verified'])->name('purchase.store');


// purchase-items
Route::get('/purchase-items/{id}', [PurchaseItemController::class, 'index'])->middleware(['auth', 'verified'])->name('purchase.items');
Route::post('/purchase-items-store', [PurchaseItemController::class, 'store'])->middleware(['auth', 'verified'])->name('purchase.items.store');
Route::delete('/purchase-items/{id}', [PurchaseItemController::class, 'destroy'])->name('purchase-items.destroy');


// sales-orders
Route::get('/sales-orders', [SalesOrderController::class, 'index'])->middleware(['auth', 'verified'])->name('sales.orders');
Route::post('/sales-orders-store', [SalesOrderController::class, 'store'])->middleware(['auth', 'verified'])->name('sales.store');

// sales-items
Route::get('/sales-items/{id}', [SalesOrderItemController::class, 'index'])->middleware(['auth', 'verified'])->name('sales.items');
Route::post('/sales-items-store', [SalesOrderItemController::class, 'store'])->middleware(['auth', 'verified'])->name('sales.items.store');
Route::delete('/sales-items/{id}', [SalesOrderItemController::class, 'destroy'])->name('sales-items.destroy');
