<?php

use Barryvdh\Debugbar\Facades\Debugbar;
use Barryvdh\Debugbar\Twig\Extension\Debug;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\HomeController;

// return a view directly
// Route::view('/posts', 'posts.index', ['name' => 'Fun Fun Function']);

// Route::resource('posts', PostsController::class);

// prefixing route
Route::prefix('/posts')->group(function() {
    Route::get('/', [PostsController::class, 'index'])->name('posts.index');
    Route::get('/{id}', [PostsController::class, 'show'])->name('posts.show');
    Route::get('/create', [PostsController::class, 'create'])->name('posts.create');
    Route::post('/', [PostsController::class, 'store'])->name('posts.store');
    Route::get('/edit/{id}', [PostsController::class, 'edit'])->name('posts.edit');
    Route::post('/{id}', [PostsController::class, 'update'])->name('posts.update');;
    Route::delete('/{id}', [PostsController::class, 'destroy'])->name('posts.destroy');
});

// route for __invoke method
Route::get('/', HomeController::class)->name('home.index');
