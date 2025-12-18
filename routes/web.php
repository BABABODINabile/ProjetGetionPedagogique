<?php

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

// Route::get('/', function () {
//     return 'hhhhhhhh';
// });


// use App\Http\Controllers\UserController;

// Route::resource('users', UserController::class);

// Route::middleware(['auth'])->group(function () {
//     Route::resource('users', UserController::class);
// });

use App\Http\Controllers\UserController;

Route::resource('users', UserController::class);

use App\Http\Controllers\PromotionController;

Route::resource('promotions', PromotionController::class);

