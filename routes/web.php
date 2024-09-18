<?php

use Illuminate\Support\Facades\Route;
use App\Models\Comment;

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => '/comments'], function () {
    Route::get('/', [Comment::class, 'getComments']);
    Route::post('/add', [Comment::class, 'addComment'])->middleware('Authorized');
    Route::patch('/edit', [Comment::class, 'editComment'])->middleware('Authorized');
    Route::delete('/delete', [Comment::class, 'deleteComment'])->middleware('Authorized');
});
