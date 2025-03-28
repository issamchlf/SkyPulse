<?php

use Carbon\Carbon;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\Auth\RegisteredAdminController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\Auth\EmailVerificationNotificationController;

Route::prefix('admin')->middleware('guest:admin')->group(function () {
    Route::get('register', [RegisteredAdminController::class, 'create'])->name('admin.register');
    Route::post('register', [RegisteredAdminController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('admin.login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);


    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('admin.password.reset');
    Route::post('reset-password', [NewPasswordController::class, 'store'])->name('admin.password.store');
});

Route::prefix('admin')->middleware('auth:admin', 'is_admin:admin')->group(function () {
    Route::get('/dashboard', function () {
        $totalOrders = Reservation::count();
        $approvedOrders = Reservation::where('status', 'Approved')->count();
        $activeUsers = User::count();
        $monthlyRevenue = Reservation::sum('total_price'); 
        $weeklyRevenue = Reservation::where('created_at', '>=', Carbon::now()->subWeek())->sum('total_price');
        $aiForecast = 5.4;
        $totalTransactions = Reservation::count();
        $totalRevenue = Reservation::sum('total_price');
        $revenueGrowth = 15.3; 
        $totalOrdersGrowth = 2.2; 
        $approvedGrowth = 1.5;
        $activeUsersNew = 890; 
        $subscriptionsGrowth = 4.7; 
        $recentOrders = Reservation::latest()->take(5)->get();
    
        return view('admin.dashboard', compact(
            'totalOrders',
            'approvedOrders',
            'activeUsers',
            'monthlyRevenue',
            'weeklyRevenue',
            'aiForecast',
            'totalTransactions',
            'totalRevenue',
            'revenueGrowth',
            'totalOrdersGrowth',
            'approvedGrowth',
            'activeUsersNew',
            'subscriptionsGrowth',
            'recentOrders'
        ));
    })->name('admin.dashboard');

    Route::get('verify-email', EmailVerificationPromptController::class)->name('admin.verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('admin.password.confirm');
    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::put('password', [PasswordController::class, 'update'])->name('admin.password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('adminlogout');
    Route::get('/flights/create', [FlightController::class, 'create'])->name('admin.flights.create');
});
