<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PriceController;

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

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/client/list', [App\Http\Controllers\ClientController::class, 'list'])->name('client.list');
Route::get('/client/ajax', [App\Http\Controllers\ClientController::class, 'searchClient'])->name('client.ajax');
Route::resource('client', ClientController::class);

Route::get('/price/list', [App\Http\Controllers\PriceController::class, 'list'])->name('price.list');
Route::resource('price', PriceController::class);