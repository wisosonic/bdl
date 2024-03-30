<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index']);

Route::post('/newsletter', [NewsletterController::class, 'store']);
Route::post('/registration', [RegistrationController::class, 'store']);
Route::post('/contact-us', [ContactUsController::class, 'sendMessage']);

Route::get('/admin-panel/registrations', [AdminController::class, 'index']);
Route::delete('/admin-panel/registrations/delete', [AdminController::class, 'deleteRegistration']);
Route::get('/admin-panel/registrations/{id}', [AdminController::class, 'editRegistration']);
Route::put('/admin-panel/registrations/{id}', [AdminController::class, 'updateRegistration']);