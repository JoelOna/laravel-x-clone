<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/likes', [DashboardController::class, 'getLikes'])->name('likes');
    Route::get('/posts', [DashboardController::class, 'getPosts'])->name('posts');
    Route::get('/followers', [DashboardController::class, 'getFollowers'])->name('followers');
    Route::get('/following', [DashboardController::class, 'getFollowing'])->name('following');

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/posts/create', [PostController::class, 'store'])->name('post.store');
});
//follow
Route::post('/follow', [FollowController::class, 'store'])->name('follow.store');
Route::post('/unfollow', [FollowController::class, 'destroy'])->name('follow.destroy');
Route::get('/follow/{user_id}/{follower_id}', [FollowController::class, 'search'])->name('follow.search');

//like
Route::post('/like', [LikeController::class, 'store'])->name('like.store');
Route::post('/unlike', [LikeController::class, 'destroy'])->name('like.destroy');
Route::get('/like/{user_id}/{post_id}', [LikeController::class, 'search'])->name('like.search');
Route::get('/likes/{post_id}', [LikeController::class, 'post_likes'])->name('like.post_likes');



require __DIR__.'/auth.php';
