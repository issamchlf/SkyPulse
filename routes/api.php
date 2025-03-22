<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PlaneController;
use App\Http\Controllers\Api\FlightController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

route::get('/flights', [FlightController::class, 'index'])->name('apiindex.flight');   
route::get('/flights/{id}', [FlightController::class, 'show'])->name('apishow.flight');
Route::post('/flights', [FlightController::class, 'store'])->name('apistore.flight');
route::put('/flights/{id}', [FlightController::class, 'update'])->name('apiupdate.flight');
route::delete('/flights/{id}', [FlightController::class, 'destroy'])->name('apidelete.flight');

Route::get('/planes', [PlaneController::class, 'index'])->name('apiindex.plane');
Route::get('/planes/{id}', [PlaneController::class, 'show'])->name('apishow.plane');
Route::post('/planes', [PlaneController::class, 'store'])->name('apistore.plane');
Route::put('/planes/{id}', [PlaneController::class, 'update'])->name('apiupdate.plane');
Route::delete('/planes/{id}', [PlaneController::class, 'destroy'])->name('apidelete.plane');