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
    return view('/welcome');
});

Auth::routes();

Route::resource('/home', App\Http\Controllers\HomeController::class);
Route::get('/create', [App\Http\Controllers\MenuController::class, 'create'])->name('create');
// Route::post('/dashboard/store', [App\Http\Controllers\MenuController::class, 'store'])->name('store');