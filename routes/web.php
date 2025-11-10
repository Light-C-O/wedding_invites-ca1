<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\WeddingController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes - only accessible to authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Venue Routes
    // CRUD operations for Venue resource
        // Index - List all venues: when someone goes to /venues in their browser (like yourapp.com/venues), this will call the index() method in the VenueController
        Route::get('/venues', [VenueController::class, 'index'])->name('venues.index');

        // Create, Read, Update, Delete routes for Venue
        // Create - Show form to create a new venue: when someone goes to /venues/create, it will run the create() method.
            Route::get('/venues/create', [VenueController::class, 'create'])->name('venues.create');
        // Read - Show a specific venue: when someone goes to /venues/{venue}, it will call the show() method. {venue} is a placeholder for the venue ID.
            Route::get('/venues/{venue}', [VenueController::class, 'show'])->name('venues.show');
        // Store - Save a new venue: when the form from the create page is submitted, it will send a POST request to /venues, which will call the store() method. In order words, when a form is submitted to create a venue (usually from the /venues/create form), this route is the one hit
            Route::post('/venues', [VenueController::class, 'store'])->name('venues.store');
        // Update & Delete - Show form to edit a venue, update a venue, and delete a venue
            // Edit - Show form to edit a specific venue: when someone goes to /venues/{venue}/edit, it will call the edit() method. The purpose is to show a form to edit an existing venue.
            Route::get('/venues/{venue}/edit', [VenueController::class, 'edit'])->name('venues.edit');
            // Update - Update a specific venue: when the edit form is submitted, it will send a PUT request to /venues/{venue}. It handles form submission for editing and already existing venue
            Route::put('/venues/{venue}', [VenueController::class, 'update'])->name('venues.update');
            // Delete - Delete a specific venue: when a request is made to delete a venue, it will send a DELETE request to /venues/{venue}, which will call the destroy(). It deals with requests for deleting venues.
            Route::delete('/venues/{venue}', [VenueController::class, 'destroy'])->name('venues.destroy');
        //
    //
//

// Wedding Routes
    // CRUD operations for Wedding resource - in similar fashion to Venue routes but using Route::resource for brevity
    Route::resource('weddings', WeddingController::class);
//

// Guest Routes
    // CRUD operations for Wedding resource - in similar fashion to Venue routes but using Route::resource for brevity
    Route::resource('guests', GuestController::class)->middleware('auth');
//



// Authentication Routes - this provided by Laravel Breeze
require __DIR__.'/auth.php';