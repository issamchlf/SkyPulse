<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/page', function () {
    return view('page');
})->middleware( 'auth', 'is_admin:admin');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware([ 'auth', 'verified'])->name('dashboard');

Route::get('/flights', [FlightController::class, 'index'])->name('flights')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

require __DIR__.'/admin-auth.php';
