<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// All Blog
Route::get('/', [BlogController::class, 'index']);

// Show Create Blog Form 
Route::get('/blogs/create', [BlogController::class, 'create'])->middleware('auth');

// Store Blog Data
Route::post('/blogs', [BlogController::class, 'store'])->middleware('auth');

// Show Edit Page
Route::get('blogs/{blog}/edit', [BlogController::class, 'edit'])->middleware('auth');

// Edit Submit To Update
Route::put('blogs/{blog}', [BlogController::class, 'update'])->middleware('auth');

// Delete Blog
Route::delete('blogs/{blog}', [BlogController::class, 'destroy'])->middleware('auth');

// Show Register Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Logout User
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Page
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Login User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Show Update Page
Route::get('/update', [BlogController::class, 'updatePage']);

//------ Single Blog
/* Route::get('blog/{blog}', [BlogController::class, 'show']); */


//----Common Resource Routes:
// index - show all blogs
// show - show single blog
// create - show form to create new blog
// store - store new blog
// edit - show form to edit blog
// update - update blog
// destroy - delete blog