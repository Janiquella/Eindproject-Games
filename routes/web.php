<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/games/search', [GameController::class, 'search'])->name('games.search');
Route::get('/games', [\App\Http\Controllers\GameController::class, 'index'])->name('games.index');
Route::post('/games', [GameController::class, 'store'])->name('game.store');

Route::get('/games/create', [GameController::class, 'create'])->name('games.create');

Route::delete('games/{game}', [GameController::class, 'destroy'])->name('games.destroy');

Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show');

Route::get('/games/{game}/edit', [GameController::class, 'edit'])->name('games.edit');
Route::put('/games/{game}/update', [GameController::class, 'update'])->name('games.update');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
