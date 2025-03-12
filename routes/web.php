<?php

use App\Http\Controllers\BloodPressureController;
use App\Http\Controllers\UserController;
use App\Models\BloodPressure;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


//routes for all users for admin
Route::get('/users', [UserController::class, 'index'])->middleware('auth', 'verified')->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->middleware('auth', 'verified')->name('users.create');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('auth', 'verified')->name('users.edit');


//blood presures routes
Route::get('/blood-presures', [BloodPressureController::class, 'index'])->middleware('auth', 'verified')->name('blood-presures.index');
Route::get('/blood-presures/create', [BloodPressureController::class, 'create'])->middleware('auth', 'verified')->name('blood-presures.create');
Route::get('/blood-presures/{blood_pressure}/edit', [BloodPressureController::class, 'edit'])->middleware('auth', 'verified')->name('blood-presures.edit');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
