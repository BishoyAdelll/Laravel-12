<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

//Route::get('/', function () {
//    return view('welcome');
//})->name('home');

//Route::view('dashboard', 'dashboard')
//    ->middleware(['auth', 'verified'])
//    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});
Route::get('localization/{locale}',\App\Http\Controllers\Localization::class)->name('localization');
Route::middleware(\App\Http\Middleware\Localization::class)
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
        Route::get('/', function () {
            return view('welcome');
        })->name('home');
    });
require __DIR__.'/auth.php';
