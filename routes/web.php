<?php

use Barryvdh\Debugbar\Facades\Debugbar;
use Barryvdh\Debugbar\Twig\Extension\Debug;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;

// return a view directly
// Route::view('/posts', 'posts.index', ['name' => 'Fun Fun Function']);

// route for __invoke method
Route::get('/', HomeController::class)->name('home.index');

// GET
// Route::get('/posts/create', [PostsController::class, 'index'])->name('posts.index');
// Route::get('/posts/{id}', [PostsController::class, 'show'])->name('posts.show');

// // POST
// Route::get('/posts', [PostsController::class, 'create'])->name('posts.create');
// Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');

// // PUT or PATCH
// Route::get('/posts/edit/{id}', [PostsController::class, 'edit'])->name('posts.edit');
// Route::post('/posts/{id}', [PostsController::class, 'update'])->name('posts.update');;

// // DELETE
// Route::delete('/posts/{id}', [PostsController::class, 'destroy'])->name('posts.destroy');

Route::resource('posts', PostsController::class);
