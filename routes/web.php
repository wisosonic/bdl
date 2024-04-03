<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/attendance', [HomeController::class, 'attendance']);
Route::post('/attendance', [HomeController::class, 'postAttendance']);
Route::post('/newsletter', [NewsletterController::class, 'store']);
Route::post('/registration', [RegistrationController::class, 'store']);
Route::post('/contact-us', [ContactUsController::class, 'sendMessage']);

Route::get('/admin-panel/registrations', [AdminController::class, 'index']);
Route::delete('/admin-panel/registrations/delete', [AdminController::class, 'deleteRegistration']);
Route::get('/admin-panel/registrations/{id}', [AdminController::class, 'editRegistration']);
Route::put('/admin-panel/registrations/{id}', [AdminController::class, 'updateRegistration']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';