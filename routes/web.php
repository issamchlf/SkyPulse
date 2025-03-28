<?php

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/page', function () {
    return view('page');
})->middleware('auth', 'is_admin');

Route::get('/dashboard', function () {
    $recentBookings = Reservation::with('flight')->where('user_id', Auth::user()->id)->latest()->take(5)->get();
    $totalFlights = Reservation::where('user_id', Auth::user()->id)->count();
    $milesFlown = Reservation::with('flight')->get()->sum(fn($r) => $r->flight->miles ?? 0);
    $rewardPoints = Reservation::with('flight')->get()->sum(fn($r) => $r->flight->reward_points ?? 0);
    $countriesVisited = Reservation::with('flight')
        ->get()
        ->pluck('flight.arrival_country')
        ->unique()
        ->count();

    return view('dashboard', compact('recentBookings', 'totalFlights', 'milesFlown', 'rewardPoints', 'countriesVisited'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/flights', [FlightController::class, 'index'])->name('flights');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
Route::get('/flights/{id}', [FlightController::class, 'show'])->name('flights.show')->middleware('auth');
Route::post('/flights', [FlightController::class, 'store'])->name('flights.store')->middleware('auth');
Route::post('/flights/{flight}/book', [FlightController::class, 'book'])->name('flights.book')->middleware('auth');

Route::post('/flights', [FlightController::class, 'store'])->name('store.flight');

