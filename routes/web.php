<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VenueControlller;

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

Route::get('/venues', [VenueControlller::class, 'index'])->name('books.index');
Route::get('/venues/create', [VenueControlller::class, 'create'])->name('books.create');
Route::get('/venues/{venue}', [VenueControlller::class, 'show'])->name('books.show');
Route::post('/venues', [VenueControlller::class, 'store'])->name('books.store');

Route::get('/venues/{venue}/edit', [VenueControlller::class, 'edit'])->name('books.edit');
Route::put('/venues/{venue}', [VenueControlller::class, 'update'])->name('books.update');
Route::delete('/venues/{venue}', [VenueControlller::class, 'destroy'])->name('books.destroy');

require __DIR__.'/auth.php';
