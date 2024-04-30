<?php

use App\Http\Controllers\MainControl;
use App\Http\Controllers\ProductControl;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/home1',[MainControl::class,'home'])->name('home');
Route::get('/dashbord',[MainControl::class,'dashbord'])->name('dashbord')->middleware('auth:sanctum');

Route::get('/index',[ProductControl::class,'index'])->name('product.index');
Route::get('/create',[ProductControl::class,'create'])->name('product.create');
Route::post('/insert',[ProductControl::class,'insert'])->name('product.insert');
Route::get('/edit/{id}',[ProductControl::class,'edit'])->name('product.edit');
Route::put('/update/{id}',[ProductControl::class,'update'])->name('product.update');
Route::delete('/delete/{id}',[ProductControl::class,'remove'])->name('product.remove');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/search',[ProductControl::class,'search'])->name('search');