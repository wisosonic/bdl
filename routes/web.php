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

Route::get('/admin-panel/all-registrations', [AdminController::class, 'index']);