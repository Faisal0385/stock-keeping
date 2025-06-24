<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseItemsController;
use App\Http\Controllers\PurchaseOrderController;
use App\Models\Product;
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
    return view('admin.home.home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';



Route::get('/', function () {
    return view('admin.home.home');
});

Route::get('/product/index', [ProductController::class, 'index'])->name('product.index');
Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');


Route::get('/purchase/order', [PurchaseOrderController::class, 'index'])->name('purchase.order');
Route::post('/purchase/order/store', [PurchaseOrderController::class, 'store'])->name('purchase.order.store');

Route::get('/purchase/item/{pid}', [PurchaseItemsController::class, 'index'])->name('purchase.item');
Route::post('/purchase/item/store', [PurchaseItemsController::class, 'store'])->name('purchase.item.store');


