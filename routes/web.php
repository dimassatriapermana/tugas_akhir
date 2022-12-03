<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('admin.index');
// });
// Route::view('/','welcome');
Route::get('/', [BarangController::class, 'index'])->middleware('auth');
Route::get('/barang', [BarangController::class, 'index'])->name('barang.index')->middleware('auth');
Route::get('/barang/add', [BarangController::class, 'create'])->name('barang.create');
Route::post('/barang/store', [BarangController::class, 'store'])->name('barang.store');
Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit');
Route::post('/barang/update/{id}', [BarangController::class, 'update'])->name('barang.update');
Route::delete('/barang/delete/{id}', [BarangController::class, 'delete'])->name('barang.delete');

Route::get('/gudang', [GudangController::class, 'index'])->name('gudang.index');
Route::get('/gudang/add', [GudangController::class, 'create'])->name('gudang.create');
Route::post('/gudang/store', [GudangController::class, 'store'])->name('gudang.store');
Route::get('/gudang/edit/{id}', [GudangController::class, 'edit'])->name('gudang.edit');
Route::post('/gudang/update/{id}', [GudangController::class, 'update'])->name('gudang.update');
Route::delete('/gudang/delete/{id}', [GudangController::class, 'delete'])->name('gudang.delete');

Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
Route::get('/supplier/add', [SupplierController::class, 'create'])->name('supplier.create');
Route::post('/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');
Route::get('/supplier/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
Route::post('/supplier/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
Route::delete('/supplier/delete/{id}', [SupplierController::class, 'delete'])->name('supplier.delete');

//Route::view('/login', 'login.index');
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('home', [BarangController::class, 'index'])->name('home')->middleware('auth');
Route::get('/logout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
//Route::view('/gudang', 'gudang.index');
