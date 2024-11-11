<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
//Controllers
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
//middlewares
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
Route::group(['prefix' => '/users', "middleware" => Administrator::class], function () {
    Route::get('/', [UserController::class, 'getUsers']);
    Route::get('/{id}', [UserController::class, 'getUser']);
    Route::post('/add', [UserController::class, 'addUser']);
    Route::patch('/edit/{id}', [UserController::class, 'editUser']);
    Route::delete('/delete/{id}', [UserController::class, 'deleteUser']);
});
Route::group(['prefix' => '/products'], function (){
    Route::get('/', [ProductController::class, 'getProducts']);
    Route::get('/{id}', [ProductController::class, 'getProduct']);
    Route::post('/add', [ProductController::class, 'addProduct'])->middleware(Administrator::class);
    Route::patch('/edit/{id}', [ProductController::class, 'editProduct'])->middleware(Administrator::class);
    Route::delete('/delete/{id}', [ProductController::class, 'deleteProduct'])->middleware(Administrator::class);
});
Route::group(['prefix' => '/orders', "middleware" => Authorized::class], function () {
    Route::get('/', [OrderController::class, "getOrders"]);
    Route::get('/all', [OrderController::class, "getAllOrders"])->middleware(Administrator::class);
    ROute::get('/{id}', [OrderController::class, "getOrder"]);
    Route::post('/add', [OrderController::class, 'addOrder']);
    Route::patch('/edit/{id}', [OrderController::class, 'editOrder'])->middleware(Administrator::class);
    Route::delete('/delete/{id}', [OrderController::class, 'deleteOrder']);
});

