<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProductController;

Route::get('/', [ProductController::class, 'index']);

Route::get('/loginPage', function () {return view('login');});
Route::get('/registerPage', function () {return view('register');});

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::get('/logout', [UserController::class, 'logout']);

//Admin functions
Route::get('/add-product', function () {return view('add-product');});
Route::post('/create-product', [ProductController::class, 'createProduct']);
Route::get('/show-comments-to-approve', [CommentController::class, 'showCommentsToApprove']);
Route::put('/approve-comment/{id}', [CommentController::class, 'approveComment']);

//User functions
Route::post('/submit-comment', [CommentController::class, 'submitComment']);

