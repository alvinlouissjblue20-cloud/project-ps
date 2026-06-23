<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FoodController; 

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/keuangan', [DashboardController::class, 'keuangan'])
    ->name('keuangan');

Route::get('/keuangan/{id}', [DashboardController::class, 'nota'])
    ->name('nota');

Route::get('/jadwal', [BookingController::class, 'jadwal'])
    ->name('jadwal');
    
Route::get('/users', function () {
    $users = User::all();
    return view('users.index', compact('users'));
});

Route::get('/users/{id}', function ($id) {
    $user = User::with('bookings.room')->findOrFail($id);
    return view('users.show', compact('user'));
});

Route::get('/booking-action/{id}/lunas', [BookingController::class, 'lunas']);
Route::get('/booking-action/{id}/selesai', [BookingController::class, 'selesai']);

Route::resource('rooms', RoomController::class);
Route::resource('bookings', BookingController::class);
Route::resource('foods', FoodController::class);

require __DIR__.'/auth.php';