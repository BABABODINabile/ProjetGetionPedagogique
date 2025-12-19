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

Route::get('/', function () {
    return view('welcome');
});

// Route pour créer un formateur (à utiliser avec un formulaire ou une requête POST)
Route::post('/api/formateurs', [\App\Http\Controllers\FormateurController::class, 'store']);

// Route pour afficher le formulaire de création (optionnel)
Route::get('/formateurs/create', [\App\Http\Controllers\FormateurController::class, 'create'])->name('formateurs.create');
