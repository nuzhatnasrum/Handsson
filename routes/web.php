<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EventManagerController;
use App\Http\Controllers\HRController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\VolunteerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Show the login form
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Handle the login submission
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Show the registration form
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

// Handle the registration submission
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/owner/dashboard', [OwnerController::class, 'index'])->name('owner.dashboard');
    Route::get('/hr/dashboard', [HRController::class, 'index'])->name('hr.dashboard');
    Route::get('/event-manager/dashboard', [EventManagerController::class, 'index'])->name('event-manager.dashboard');
    Route::get('/client/dashboard', [ClientController::class, 'index'])->name('client.dashboard');
    Route::get('/volunteer/dashboard', [VolunteerController::class, 'index'])->name('volunteer.dashboard');
    Route::post('/client/projects', [ClientController::class, 'storeProject'])->name('client.projects.store');
    Route::post('/client/feedback', [ClientController::class, 'submitFeedback'])->name('client.feedback');
    Route::post('/accept-application/{id}', [HRController::class, 'acceptApplication'])->name('hr.acceptApplication');
    Route::post('/reject-application/{id}', [HRController::class, 'rejectApplication'])->name('hr.rejectApplication');
    Route::post('/submit-volunteer', [HRController::class, 'submitVolunteer'])->name('hr.submitVolunteer');
    Route::post('/event-manager/assign-volunteers', [EventManagerController::class, 'assignVolunteers'])->name('event-manager.assign-volunteers');
Route::post('/event-manager/update-status', [EventManagerController::class, 'updateStatus'])->name('event-manager.update-status');
});