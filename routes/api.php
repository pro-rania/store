<?php

use App\Http\Controllers\CategoryControl;
use App\Http\Controllers\MainControl;
use App\Http\Controllers\ProductControl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/index',[CategoryControl::class,'index'])->name('category.index');
Route::post('/insert',[CategoryControl::class,'insert'])->name('category.insert');
Route::put('/update/{id}',[CategoryControl::class,'update'])->name('category.update');
Route::delete('/delete/{id}',[CategoryControl::class,'remove'])->name('category.remove');
