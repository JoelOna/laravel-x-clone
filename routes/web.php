<?php

use App\Http\Controllers\FollowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/posts/create', [PostController::class, 'store'])->name('post.store');
});
//follow
Route::post('/follow', [FollowController::class, 'follow'])->name('follow');
Route::post('/unfollow', [FollowController::class, 'unfollow'])->name('unfollow');

//like
Route::post('/like', [LikeController::class, 'store'])->name('like');
Route::post('/unlike', [LikeController::class, 'destroy'])->name('unlike');



require __DIR__.'/auth.php';
