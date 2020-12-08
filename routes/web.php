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

Route::get('/', function () {
    return view('welcome2');
});
Route::get('/home', function () {
    return view('home');
})->middleware('auth');
Route::get('/products', function () {
    return view('home');
})->middleware('auth');
Route::get('/sales', function () {
    return view('home');
})->middleware('auth');
Route::get('/venta', function () {
    return view('home');
})->middleware('auth');
Route::get('/reporte', function () {
    return view('home');
})->middleware('auth');
Route::get('/reserva', function () {
    return view('home');
})->middleware('auth');

Auth::routes();
Route::resource('/product',App\Http\Controllers\ProductController::class)->middleware('auth');
Route::post('/product/{id}',[\App\Http\Controllers\ProductController::class,'modificar'])->middleware('auth');
Route::resource('/sale',App\Http\Controllers\SaleController::class)->middleware('auth');
Route::post('/sales',[App\Http\Controllers\SaleController::class,'sales'])->middleware('auth');
Route::delete('/sales/{id}',[App\Http\Controllers\SaleController::class,'destroy'])->middleware('auth');
Route::get('/consulta/{d1}/{d2}',[\App\Http\Controllers\SaleController::class,'consulta'])->middleware('auth');
Route::get('/productSale',[\App\Http\Controllers\ProductController::class,'productSale'])->middleware('auth');
Route::post('/updateFoto/{id}',[\App\Http\Controllers\ProductController::class,'updateFoto'])->middleware('auth');
Route::get('/reservas',[\App\Http\Controllers\ProductController::class,'reservas'])->middleware('auth');
Route::post('/cancelar',[\App\Http\Controllers\SaleController::class,'cancelar'])->middleware('auth');
Route::post('/entregar',[\App\Http\Controllers\SaleController::class,'entregar'])->middleware('auth');
Route::get('/historial',[\App\Http\Controllers\SaleController::class,'historial'])->middleware('auth');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
