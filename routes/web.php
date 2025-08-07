<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TokoController;
use Illuminate\Support\Facades\Route;

// Halaman Publik
Route::get('/', function () {
    return view('home'); // Nanti kita ubah ke home.blade.php
})->name('home');

Route::get('/lokasi', function () {
    return view('lokasi');
})->name('lokasi');


// Route bawaan Breeze untuk dashboard, dll.
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route untuk profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/berita', [BeritaController::class, 'index'])->name('berita');
Route::get('/berita/{berita}', [BeritaController::class, 'show'])->name('berita.show');

Route::get('/toko', [TokoController::class, 'index'])->name('toko');
Route::get('/toko/{produk}', [TokoController::class, 'show'])->name('toko.show');

require __DIR__ . '/auth.php';
