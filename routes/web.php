<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SuggestController;
use Illuminate\Support\Facades\Route;


Route::resource('suggest', SuggestController::class);
Route::resource('product', ProductController::class);
