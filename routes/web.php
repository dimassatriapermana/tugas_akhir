<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\JoinController;
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
Route::get('/barang/add', [BarangController::class, 'create'])->name('barang.create')->middleware('auth');
Route::post('/barang/store', [BarangController::class, 'store'])->name('barang.store')->middleware('auth');
Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit')->middleware('auth');
Route::post('/barang/update/{id}', [BarangController::class, 'update'])->name('barang.update')->middleware('auth');
Route::get('/barang/show/{id}', [BarangController::class, 'show'])->name('barang.show')->middleware('auth');
Route::delete('/barang/delete/{id}', [BarangController::class, 'softDelete'])->name('barang.softDelete')->middleware('auth');
Route::delete('/barang/delete/permanen/{id}', [BarangController::class, 'hardDelete'])->name('barang.hardDelete')->middleware('auth');
Route::get('/barang/restore/{id}', [BarangController::class, 'restore'])->name('barang.restore')->middleware('auth');

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

Route::get('/detail', [JoinController::class, 'index'])->name('join.index');
Route::get('/soft', [BarangController::class, 'softIndex'])->name('softDelete');
Route::get('/restore', [BarangController::class, 'softIndex'])->name('restore');


// Route::delete('/rekam-medis/hapus-sementara/{dataRekamMedis:id}', 'softDelete');
// Route::delete('/rekam-medis/hapus-permanen/{dataRekamMedis:id}', 'hardDelete');
// Route::delete('/rekam-medis/restore/{dataRekamMedis:id}', 'restore');