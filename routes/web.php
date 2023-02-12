<?php

use App\Http\Controllers\ProfileController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth', 'admin'])->group(function (){
    Route::get('/dashboard', [ItemController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/create', [ItemController::class, 'create'])->name('create');
    Route::post('/dashboard/store', [ItemController::class, 'store'])->name('store');
    Route::get('/dashboard/destroy/{id}', [ItemController::class,'destroy'])->name('destroy');
    Route::get('/dashboard/edit/{id}', [ItemController::class,'edit'])->name('edit');
    Route::put('/dashboard/update/{id}',[ItemController::class, 'update'])->name('update');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/home' ,[ItemController::class, 'index2'])->name('home');
    Route::get('/show/{id}' ,[ItemController::class, 'show'])->name('show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
