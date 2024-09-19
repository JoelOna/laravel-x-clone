<?php
use App\Http\Controllers\LikeController;


Route::post('/like', [LikeController::class, 'store'])->name('like.store');
Route::post('/unlike', [LikeController::class, 'destroy'])->name('like.destroy');
Route::get('/like/{user_id}/{post_id}', [LikeController::class, 'search'])->name('like.search');
Route::get('/likes/{post_id}', [LikeController::class, 'post_likes'])->name('like.post_likes');