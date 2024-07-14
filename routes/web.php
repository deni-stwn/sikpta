<?php

use App\Http\Controllers\DaftarMahasiswaController;
use App\Http\Controllers\DaftarPetugasController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('daftar-mahasiswa', DaftarMahasiswaController::class);
        Route::resource('daftar-petugas', DaftarPetugasController::class);
    });
    Route::middleware(['role:petugas'])->group(function () {
        Route::get('/surat-pengajuan', [PengajuanSuratController::class, 'index'])->name('surat-pengajuan.index');
        Route::get('/surat-pengajuan/create', [PengajuanSuratController::class, 'create'])->name('surat-pengajuan.create');
        // Route::post('/surat-pengajuan', [PengajuanSuratController::class, 'store'])->name('surat-pengajuan.store');
        Route::delete('/surat-pengajuan/{id}', [PengajuanSuratController::class, 'destroy'])->name('surat-pengajuan.destroy');
    });
    Route::middleware(['role:mahasiswa'])->group(function () {
        Route::get('/surat-pengajuan/create', [PengajuanSuratController::class, 'create'])->name('surat-pengajuan.create');
        Route::post('/surat-pengajuan', [PengajuanSuratController::class, 'store'])->name('surat-pengajuan.store');
    });
});

require __DIR__.'/auth.php';
