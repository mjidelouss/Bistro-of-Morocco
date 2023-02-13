<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;

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
})->middleware(['auth','verified']);

Route::middleware(['auth', 'admin', 'verified'])->group(function (){
    Route::get('/dashboard', [ItemController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/create', [ItemController::class, 'create'])->name('create');
    Route::post('/dashboard/store', [ItemController::class, 'store'])->name('store');
    Route::get('/dashboard/destroy/{id}', [ItemController::class,'destroy'])->name('destroy');
    Route::get('/dashboard/edit/{id}', [ItemController::class,'edit'])->name('edit');
    Route::put('/dashboard/update/{id}',[ItemController::class, 'update'])->name('update');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile', [ProfileController::class, 'store'])->name('profile.store');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/home' ,[ItemController::class, 'index2'])->name('home');
    Route::get('/show/{id}' ,[ItemController::class, 'show'])->name('show');
    Route::get('/Userprofile', [ProfileController::class, 'user'])->name('profile.user');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
