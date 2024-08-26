<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('/post/comment/{id}', [\App\Http\Controllers\Api\CommentController::class, 'addComment'])->middleware('auth:sanctum')->name('post.comment');
