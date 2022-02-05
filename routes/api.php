<?php

use App\Http\Controllers\PostCommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// TODO postId for testing to complete API routing mechanism
Route::prefix('posts/{postId}')->group(function () {
    Route::get('/comments', [PostCommentController::class, "listComments"])->name("list-comments");
    Route::post('/comments', [PostCommentController::class, "createComment"])->name("create-comment");
});
