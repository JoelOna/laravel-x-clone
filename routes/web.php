<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
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
require __DIR__.'/follow.php';


//like
require __DIR__.'/like.php';

//Comment
Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
Route::get('/comments/{post_id}', [CommentController::class, 'index'])->name('comment.index');
Route::get('/comments/{post_id}/total', [CommentController::class, 'totalComments'])->name('comment.total');



//search
Route::get('/search', [SearchController::class, 'index'])->name('search.index');
Route::get('/search/{param}', [SearchController::class, 'search'])->name('search.search');

require __DIR__.'/auth.php';
