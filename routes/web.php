<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SuggestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::resource('suggests', SuggestController::class);
Route::resource('products', ProductController::class);
Route::resource('users', UserController::class);
