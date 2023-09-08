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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/list-seragam/{id}', [App\Http\Controllers\HomeController::class, 'list'])->name('listSeragam');
Route::resource('/seragam', App\Http\Controllers\SeragamController::class);
Route::resource('/seragam-detail', App\Http\Controllers\SeragamDetailController::class);
