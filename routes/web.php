<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authorized;
use App\Http\Middleware\Administrator;

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);
Route::get('/self', [LoginController::class, 'self'])->middleware(Authorized::class);
Route::get('/token', function() {
    return csrf_token();
});
Route::group(['prefix' => '/comments'], function () {
    Route::get('/', [CommentController::class, 'getComments']);
    Route::post('/add', [CommentController::class, 'addComment'])->middleware(Authorized::class);
    Route::patch('/edit/{id}', [CommentController::class, 'editComment'])->middleware(Authorized::class);
    Route::delete('/delete/{id}', [CommentController::class, 'deleteComment'])->middleware(Authorized::class);
});
Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UserController::class, 'getUsers']);
    Route::get('/{id}', [UserController::class, 'getUser']);
    Route::post('/add', [UserController::class, 'addUser']);
    Route::patch('/edit/{id}', [UserController::class, 'editUser']);
    Route::delete('/delete/{id}', [UserController::class, 'deleteUser']);
})->middleware(Administrator::class);
Route::group(['prefix' => 'products'], function (){
    Route::get('/', [ProductController::class, 'getProducts']);
    Route::get('/{id}', [ProductController::class, 'getProduct']);
    Route::post('/add', [ProductController::class, 'addProduct'])->middleware(Administrator::class);
    Route::patch('/edit/{id}', [ProductController::class, 'editProduct'])->middleware(Administrator::class);
    Route::delete('/delete/{id}', [ProductController::class, 'deleteProduct'])->middleware(Administrator::class);
});
