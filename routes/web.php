<?php

use App\Http\Controllers\SuggestController;
use App\Models\Suggest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/suggest', [SuggestController::class, 'index'])->name('suggest.index');
