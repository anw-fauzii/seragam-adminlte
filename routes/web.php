<?php

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

Route::get('/list-seragam/{id}', [App\Http\Controllers\FrontEndController::class, 'list'])->name('listSeragam');
Route::get('/', [App\Http\Controllers\FrontEndController::class, 'welcome'])->name('welcome');
Route::post('/checkout', [App\Http\Controllers\FrontEndController::class, 'checkout'])->name('checkout');
Route::get('/hapus-keranjang/{id}', [App\Http\Controllers\FrontEndController::class, 'hapus'])->name('hapusKeranjang');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/seragam', App\Http\Controllers\SeragamController::class);
Route::resource('/seragam-detail', App\Http\Controllers\SeragamDetailController::class);
Route::resource('/keranjang', App\Http\Controllers\KeranjangController::class);
Route::resource('/pesanan', App\Http\Controllers\PesananController::class);
