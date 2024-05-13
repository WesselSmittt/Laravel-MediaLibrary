<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/upload-image', [PhotoController::class, 'index'])->name('upload.index');
    Route::post('/upload-image', [PhotoController::class, 'store'])->name('upload.store');
    Route::delete('/photo/{photo}', [PhotoController::class, 'destroy'])->name('photo.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/media', [PhotoController::class, 'mediaIndex'])->name('media.index');
});

require __DIR__.'/auth.php';
