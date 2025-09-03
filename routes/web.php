<?php

use App\Http\Controllers\CategoryConferenceController;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\CountryConferenceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\NewsletterSubscriberController;
use App\Http\Controllers\UserVerificationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/join', [JoinController::class, 'show'])->name('join');
Route::post('/join', [JoinController::class, 'store'])->name('join');
Route::get('/verifications/{hash}', [UserVerificationController::class, 'show'])->name('verifications.show');

Route::get('/events/{uuid}', [ConferenceController::class, 'show'])->name('conferences.show');

Route::get('/country/{alpha}', [CountryConferenceController::class, 'index'])->name('country.conferences.index');

Route::get('/categories/{categoryTitle}', [CategoryConferenceController::class, 'index'])->name('category.conferences.index');

Route::post('/newsletter-subscriber', [NewsletterSubscriberController::class, 'store'])->name('newsletter.store');
Route::get('/newsletter-subscriber/{hash}', [NewsletterSubscriberController::class, 'show'])->name('newsletter.verify');
