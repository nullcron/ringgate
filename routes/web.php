<?php

use Illuminate\Support\Facades\Route;

// Public homepage
Route::view('/', 'welcome')
    ->name('home');

// Protected dashboard
Route::view('/dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
