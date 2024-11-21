<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', [AdminController::class, 'index']);

Route::get('/loginPage', function () {return view('login');});
Route::get('/registerPage', function () {return view('register');});

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/logout', [UserController::class, 'logout']);

//Admin functions
Route::get('/add-product', function () {return view('admin.add-product');});
Route::post('/create-product', [AdminController::class, 'createProduct']);
Route::get('/show-comments-to-approve', [AdminController::class, 'showCommentsToApprove']);
Route::put('/approve-comment/{id}', [AdminController::class, 'approveComment']);
Route::delete('/delete-product/{id}', [AdminController::class, 'deleteProduct']);

//User functions
Route::post('/submit-comment', [UserController::class, 'submitComment']);

