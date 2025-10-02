<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VenueController;


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

Route::get('/venues', [VenueController::class, 'index'])->name('venues.index');
Route::get('/venues/create', [VenueController::class, 'create'])->name('venues.create');
Route::get('/venues/{venue}', [VenueController::class, 'show'])->name('venues.show');
Route::post('/venues', [VenueController::class, 'store'])->name('venues.store');

Route::get('/venues/{venue}/edit', [VenueController::class, 'edit'])->name('venues.edit');
Route::put('/venues/{venue}', [VenueController::class, 'update'])->name('venues.update');
Route::delete('/venues/{venue}', [VenueController::class, 'destroy'])->name('venues.destroy');

require __DIR__.'/auth.php';
