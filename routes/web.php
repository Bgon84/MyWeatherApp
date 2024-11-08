<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if(Auth::check()){
        return view('dashboard', ['data' => null]);
    }
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard', ['data' => null]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/get-weather', [WeatherController::class, 'getWeather'])->name('getWeather');

});

require __DIR__.'/auth.php';
