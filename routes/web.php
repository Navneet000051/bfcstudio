<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/book-studio', [PageController::class, 'bookStudio'])->name('book-studio');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/cancellation-refund-policy', [PageController::class, 'cancellationrefundpolicy'])->name('cancellation-refund-policy');
Route::get('/terms-and-conditions', [PageController::class, 'termsandconditions'])->name('terms-and-conditions');
