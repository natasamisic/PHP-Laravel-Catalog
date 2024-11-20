<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index']);

Route::get('/loginPage', function () {
    return view('login');
});

Route::get('/registerPage', function () {
    return view('register');
});

Route::get('/add-product', function () {
    return view('add-product');
});

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/logout', [UserController::class, 'logout']);

Route::post('/create-product', [ProductController::class, 'createProduct']);

Route::post('/submitComment', [UserController::class, 'submitComment']);

