<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HamzaController;
use App\Http\Controllers\billController;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/hamza',   [HamzaController::class,'index'])->name('show');
// Route::get('/example', [MyController::class, 'index']);

// Route::get('/admin', function () {
//     return view(view: 'admin');
// });
// Route::get('/admino',   [HamzaController::class,'admin'])->name('addmin');

// Route::get('/aaa',   [HamzaController::class,'aaa'])->name('aaa');
Route::get('/admin',[billController::class, 'index'])->name('admin.index');
Route::post('/admin/store',[billController::class, 'store'])->name('admin.store');
Route::post('/admin/updaterate',[billController::class, 'updaterate'])->name('admin.updaterate');
Route::get('/admin', [billController::class, 'index'])->name('admin.dashboard');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user', [UserController::class, 'index'])->name('user.index');
