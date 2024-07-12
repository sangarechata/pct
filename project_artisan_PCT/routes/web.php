<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\workscontroller;



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

Route::get('/', [WorksController::class, 'acceuil'])->name('accueil');

Route::get('/accueil2/{id}', [WorksController::class, 'getAll'])->name('accueil2');

// Route::get('/accueil', [WorksController::class, 'showAccueil'])->name('accueil');

// Routes pour les annonces
Route::get('/show', [WorksController::class, 'index'])->name('index'); // Affichage des annonces
Route::delete('/works/{id}', [WorksController::class, 'destroy'])->name('delete'); // Suppression de l'annonce
Route::get('/works/{id}', [WorksController::class, 'edit'])->name('edit'); // Edition de l'annonce
Route::put('/works/{id}', [WorksController::class, 'update'])->name('update'); // Mise à jour de l'annonce

// Route pour le tableau de bord
Route::get('/dashboard', [WorksController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Routes protégées par l'authentification
Route::middleware('auth')->group(function () {
    Route::get('/create', [WorksController::class, 'create'])->name('create'); // Création d'une annonce
    Route::post('/store', [WorksController::class, 'store'])->name('store'); // Enregistrement d'une annonce
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
