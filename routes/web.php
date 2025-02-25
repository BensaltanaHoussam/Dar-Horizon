<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ownerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\touristController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return view('hello');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('admin/dashboard',[homeController::class,'adminIndex']);
Route::get('owner/dashboard',[ownerController::class,'ownerIndex']);
Route::get('tourist/dashboard',[touristController::class,'touristIndex']);

require __DIR__.'/auth.php';
