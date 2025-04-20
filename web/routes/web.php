<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UpwordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/upwords/create', [UpwordController::class, 'create'])->name('upwords.create');
    Route::post('/upwords', [UpwordController::class, 'store'])->name('upwords.store');
});

Route::get('/upwords', [UpwordController::class, 'index'])->name('upwords.index');

Route::delete('/upwords/{upword}', [UpwordController::class, 'destroy'])->name('upwords.destroy');

Route::get('/upwords/{upword}/edit', [UpwordController::class, 'edit'])->name('upwords.edit');

Route::get('/upwords/{upword}', [UpwordController::class, 'show'])->name('upwords.show');

Route::put('/upwords/{upword}', [UpwordController::class, 'update'])->name('upwords.update');


require __DIR__.'/auth.php';
