<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('admin.index');

Route::resource('/posts', PostController::class)->names('admin.posts');