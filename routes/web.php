<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LdaController;

Route::middleware('auth')->group(function () {

    Route::prefix('/admin-panel')->group(function () {
        Route::delete('/registrations/{event_id}/delete', [AdminController::class, 'deleteRegistration']);
        Route::get('/registrations/{event_id}/{registration_id}', [AdminController::class, 'editRegistration']);
        Route::put('/registrations/{event_id}/{registration_id}', [AdminController::class, 'updateRegistration']);
        Route::get('/registrations/{event_id}', [AdminController::class, 'index']);

        Route::get('/attendance/{event_id}', [AdminController::class, 'attendance']);
        Route::post('/attendance/{event_id}', [AdminController::class, 'postAttendance']);
    });

    Route::prefix('/profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.myprofile');
        Route::get('/settings', [ProfileController::class, 'settings'])->name('profile.settings');
        Route::get('/events', [ProfileController::class, 'events'])->name('profile.events');
        Route::get('/certificates', [ProfileController::class, 'certificates'])->name('profile.certificates');
        Route::post('/update-profile', [ProfileController::class, 'updateProfile'])->name('profile.update_profile');
        Route::post('/update-settings', [ProfileController::class, 'updateSettings'])->name('profile.update_settings');
    });

});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/');
    })->name('dashboard');
});

Route::get('/events/{event_id}', [EventController::class, 'index'])->name('getEvent');
Route::get('/lda/{name}', [LdaController::class, 'index']);
Route::get('/members', [HomeController::class, 'members']);
Route::post('/newsletter', [NewsletterController::class, 'store']);
Route::post('/registration', [RegistrationController::class, 'store']);
Route::post('/contact-us', [ContactUsController::class, 'sendMessage']);
Route::get('/', [HomeController::class, 'index'])->name('home');

require __DIR__.'/auth.php';