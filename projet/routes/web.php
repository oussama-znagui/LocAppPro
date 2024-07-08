<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\UserController;
use App\Models\Apartment;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [AdminController::class,'index']);

Route::post('/addAp', [ApartmentController::class,'store']);

Route::get('/register', [UserController::class, 'registerIndex'])->name('register');
Route::post('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'loginIndex'])->name('login');
Route::post('/login', [UserController::class, 'login']);

