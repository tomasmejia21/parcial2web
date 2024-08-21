<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\SalesController;
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

Route::get('/inicio', function () {
    return view('welcome');
});

Route::resource('movies', MoviesController::class);
Route::get('/movies',[MoviesController::class,'index'])->name('movies.index');

Route::resource('sales',SalesController::class);
Route::get('/sales',[SalesController::class,'index'])->name('sales.index');

Route::resource('rooms', RoomsController::class);
Route::get('/rooms',[RoomsController::class,'index'])->name('rooms.index');
