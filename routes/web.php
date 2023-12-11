<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('post');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');
Route::get('/posts', [PostsController::class, 'index'])->name('posts');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::post('/comment', [CommentController::class, 'store'])->name('comment');
Route::get('/comment/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');

Route::post('/newpost', [PostController::class, 'store'])->name('newpost');
Route::get('/newpost', [PostController::class, 'newpost'])->name('newpost.page');
Route::get('/postDelete/{id}', [PostController::class, 'destroy'])->name('post.destroy');
