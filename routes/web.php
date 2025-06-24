<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\IncomeController;

Route::get('/', [WelcomeController::class, 'index']);

Route::view('/about', 'about')->name('about');

Route::get('/market', [MarketController::class, 'index'])->name('market');
Route::get('/income', [IncomeController::class, 'index'])->name('income');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
