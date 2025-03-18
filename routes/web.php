<?php

use App\Http\Controllers\AllergieController;
use App\Http\Controllers\BloodPressureController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SpecialityController;
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


//ROUTES ADMIN
//CONTROL USERS
Route::get('/users', [UserController::class, 'index'])->middleware('auth', 'verified')->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->middleware('auth', 'verified')->name('users.create');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->middleware('auth', 'verified')->name('users.edit');

//CONTROL SPECIALITIES
Route::get('/specialities', [SpecialityController::class, 'index'])->middleware('auth', 'verified')->name('specialities.index');
Route::get('/specialities/create', [SpecialityController::class, 'create'])->middleware('auth', 'verified')->name('specialities.create');
Route::get('/specialities/{speciality}/edit', [SpecialityController::class, 'edit'])-> middleware('auth', 'verified')->name('specialities.edit');

//CONTROL ALLERGIES
Route::get('/allergies', [AllergieController::class, 'index'])->middleware('auth', 'verified')->name('allergies.index');

//CONTROL DOCTORS
Route::get('/doctors', [DoctorController::class, 'index'])->middleware('auth', 'verified')->name('doctors.index'); //necesario??

//CONTROL PATIENTS
Route::get('/patients', [UserController::class, 'index'])->middleware('auth', 'verified')->name('patients.index');

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
