<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HamzaController;
use App\Http\Controllers\billController;
use App\Http\Controllers\UserController;
// use App\Http\Controllers\auth\AuthenticatedSessionController;
use App\Http\Controllers\auth\AuthenticatedSessionController;

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
Route::post('/admin/store',[billController::class, 'store1'])->name('admin.store');
Route::post('/admin/updaterate',[billController::class, 'updaterate'])->name('admin.updaterate');
Route::get('/admin', [billController::class, 'index'])->name('admin.dashboard');//SHOW ADMIN PAGE
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/bill',   [HamzaController::class,'bill']);
// Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::post('/home/pdf','billController@pdf')->name('home.pdf');

Route::post('/home/pdf', [billController::class, 'pdf'])->name('home.pdf');

Route::get('/test-pdf', [AuthenticatedSessionController::class, 'testPdf'])->name('test.pdf');
