<?php
use App\Http\Controllers\FollowController;

Route::post('/follow', [FollowController::class, 'store'])->name('follow.store');
Route::post('/unfollow', [FollowController::class, 'destroy'])->name('follow.destroy');
Route::get('/follow/{user_id}/{follower_id}', [FollowController::class, 'search'])->name('follow.search');