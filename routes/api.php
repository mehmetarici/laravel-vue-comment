<?php

use App\Http\Controllers\PostCommentController;
use Illuminate\Support\Facades\Route;

// TODO not required for now
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

// TODO postId for testing to complete API routing mechanism
Route::prefix('posts/{postId}')->group(function () {
    Route::get('/comments', [PostCommentController::class, "listComments"])->name("list-comments");
    Route::post('/comments', [PostCommentController::class, "createComment"])->name("create-comment");
});
