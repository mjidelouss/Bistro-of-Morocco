<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

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
    return view('welcome');
});

Route::middleware(['auth', 'admin'])->group(function (){
    Route::get('/dashboard', [ItemController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/create', [ItemController::class, 'create'])->name('create');
    Route::post('/dashboard/store', 'ItemController@store')->name('store');
    Route::get('/dashboard/destroy/{id}', [ItemController::class,'destroy'])->name('destroy');
    Route::get('/dashboard/edit/{id}', [ItemController::class,'edit'])->name('edit');
});

// Route::resource('/home', App\Http\Controllers\HomeController::class);