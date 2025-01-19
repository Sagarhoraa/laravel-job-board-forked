<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ListingController::class, 'index']);
//WHEN /dashboard URL IS HIT , IT RUN THIS FUNCTION , WHICH IS RETURNING TO VIEW , THAT IS DASHBOARD WHICH IS LOCATED IN RESOURCES->VIEWS->DASHBOARD.BLADE.PHP
Route::get('/dashboard', function (\Illuminate\Http\Request $request) {
    return view('dashboard',
        [
            'listings' => $request->user()->listings
        ]);
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::resource('listings', ListingController::class);

Route::get('/{listing}/apply', [ListingController::class, 'apply'])->name('listing.apply');
