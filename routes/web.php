<?php

use App\Http\Controllers\PreferencesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if(Auth::check()){
        return view('weather/index', ['data' => null]);
    }
    return view('auth/login');
});

Route::get('/weather', function () {
    return view('weather/index', ['data' => null]);
})->middleware(['auth', 'verified'])->name('weather');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/preferences', [PreferencesController::class, 'edit'])->name('preferences.edit');
    Route::post('/preferences', [PreferencesController::class, 'update'])->name('preferences.update');
});

require __DIR__.'/auth.php';
