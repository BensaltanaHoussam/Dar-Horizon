<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ownerController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\touristController;

Route::get('/', function () {
    return view('auth/login');
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

Route::get('admin/adminDashboard', [homeController::class, 'adminIndex'])->middleware(['auth', 'admin']);
Route::get('tourist/touristDashboard', [touristController::class, 'touristIndex']);




Route::middleware('auth')->group(function () {
    Route::get('/owner/my-posts', [ownerController::class, 'myPosts'])->name('owner.posts');
    Route::get('owner/ownerDashboard', [ownerController::class, 'ownerIndex']);
    Route::get('owner/addproperty', [ListingController::class, 'create'])->name('listings.create');
    Route::post('owner/addproperty', [ListingController::class, 'store'])->name('listings.store');


});

require __DIR__ . '/auth.php';
