<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;

Route::get('/', function () {
    if (auth()->check()) {
        $user = auth()->user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('siswa.dashboard');
        }
    }
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    Route::get('/buku', [AdminController::class, 'buku'])->name('buku');
    Route::post('/buku', [AdminController::class, 'bukuStore'])->name('buku.store');
    Route::put('/buku/{id}', [AdminController::class, 'bukuUpdate'])->name('buku.update');
    Route::delete('/buku/{id}', [AdminController::class, 'bukuDestroy'])->name('buku.destroy');
    
    Route::get('/transaksi', [AdminController::class, 'transaksi'])->name('transaksi');
    Route::post('/transaksi', [AdminController::class, 'transaksiStore'])->name('transaksi.store');
    Route::put('/transaksi/{id}', [AdminController::class, 'transaksiUpdate'])->name('transaksi.update');
    Route::delete('/transaksi/{id}', [AdminController::class, 'transaksiDestroy'])->name('transaksi.destroy');
    
    Route::get('/anggota', [AdminController::class, 'anggota'])->name('anggota');
    Route::post('/anggota', [AdminController::class, 'anggotaStore'])->name('anggota.store');
    Route::put('/anggota/{id}', [AdminController::class, 'anggotaUpdate'])->name('anggota.update');
    Route::delete('/anggota/{id}', [AdminController::class, 'anggotaDestroy'])->name('anggota.destroy');
});

Route::middleware(['auth', 'role:anggota'])->prefix('siswa')->name('siswa.')->group(function () {
    Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('dashboard');
    
    Route::get('/peminjaman', [SiswaController::class, 'peminjaman'])->name('peminjaman');
    Route::post('/peminjaman', [SiswaController::class, 'peminjamanStore'])->name('peminjaman.store');
    
    Route::get('/pengembalian', [SiswaController::class, 'pengembalian'])->name('pengembalian');
    Route::post('/pengembalian/{id}', [SiswaController::class, 'pengembalianStore'])->name('pengembalian.store');
});