<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index'])->name('home');

Route::view('/register', 'register')->name('register');
Route::view('/login', 'login')->name('login');

Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [UserController::class, 'login'])->name('auth.login');
    Route::get('/logout', [UserController::class, 'logout'])->name('auth.logout');
    Route::post('/register', [UserController::class, 'store'])->name('auth.register.create');
});

Route::group(['prefix' => 'blog'], function () {
    Route::view('/add', 'blog.add')->name('blog.add');
    Route::post('/add', [BlogController::class, 'store'])->name('blog.create');

    Route::post('/{id}/comment', [BlogController::class, 'addComment'])->name('blog.comment');

    Route::get('/{id}', [BlogController::class, 'show'])->name('blog.show');

    Route::get('/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/{id}/edit', [BlogController::class, 'update'])->name('blog.update');


    Route::get('/delete/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');
});



Route::get('/dashboard', [BlogController::class, 'dashboard'])->name('dashboard');
