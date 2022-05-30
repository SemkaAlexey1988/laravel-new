<?php

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

Route::get('/', [App\Http\Controllers\PagesController::class, 'index'])->name('pagesList');
Route::get('/add', [App\Http\Controllers\PagesController::class, 'create'])->name('pageCreate');
Route::post('/addData', [App\Http\Controllers\PagesController::class, 'store'])->name('pageAddData');
Route::get('/{id}', [App\Http\Controllers\PagesController::class, 'show'])->name('page');
Route::get('/edit/{id}', [App\Http\Controllers\PagesController::class, 'edit'])->name('pageEdit');
Route::post('/editData/{id}', [App\Http\Controllers\PagesController::class, 'update'])->name('pageEditData');
Route::post('/delete/{id}', [App\Http\Controllers\PagesController::class, 'destroy'])->name('pageDestroy');