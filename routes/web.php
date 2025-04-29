<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\RuteController; 
use App\Http\Controllers\SpeedboadController; // ✅ Tambahkan controller Speedboad

// Halaman utama
Route::get('/', function () {
    return view('home');
})->name('home');

// Rute login & registrasi
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Semua rute ini hanya untuk user yang sudah login
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [JadwalController::class, 'index'])->name('dashboard');

    // Lihat jadwal (bisa diakses semua user yang login)
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');

    // Aksi-aksi berikut hanya akan diproteksi di dalam controller (hanya admin bisa akses)
    Route::get('/jadwal/buat', [JadwalController::class, 'create'])->name('jadwal.create');
    Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store');

    Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::put('/jadwal/{id}', [JadwalController::class, 'update'])->name('jadwal.update');

    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');

    // ✅ CRUD Rute
    Route::resource('rute', RuteController::class);

    // ✅ CRUD Speedboad
    Route::resource('speedboad', SpeedboadController::class);
});
