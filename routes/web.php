<?php

use App\Http\Controllers\CoachController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('pokemons', [PokemonController::class, 'index'])
->middleware(['auth', 'verified'])->name('index-pokemon');;
Route::get('pokemons/create', [PokemonController::class, 'create'])
->middleware(['auth', 'verified'])->name('create-pokemon');;
Route::post('pokemons', [PokemonController::class, 'store'])
->middleware(['auth', 'verified'])->name('store-pokemon');;
Route::get('pokemons/{id}/edit', [PokemonController::class, 'edit'])
->middleware(['auth', 'verified'])->name('edit-pokemon');;
Route::put('pokemons/{id}', [PokemonController::class, 'update'])
->middleware(['auth', 'verified'])->name('update-pokemon');;
Route::delete('pokemons/{id}', [PokemonController::class, 'destroy'])
->middleware(['auth', 'verified'])->name('destroy-pokemon');;

Route::get('coaches', [CoachController::class, 'index'])
->middleware(['auth', 'verified'])->name('index-coach');;
Route::get('coaches/create', [CoachController::class, 'create'])
->middleware(['auth', 'verified'])->name('create-coach');;
Route::post('coaches', [CoachController::class, 'store'])
->middleware(['auth', 'verified'])->name('store-coach');;
Route::get('coaches/{id}/edit', [CoachController::class, 'edit'])
->middleware(['auth', 'verified'])->name('edit-coach');;
Route::put('coaches/{id}', [CoachController::class, 'update'])
->middleware(['auth', 'verified'])->name('update-coach');;
Route::delete('coaches/{id}', [CoachController::class, 'destroy'])
->middleware(['auth', 'verified'])->name('destroy-coach');;

require __DIR__.'/auth.php';
