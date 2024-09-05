<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\DaftarMahasiswaController;
use App\Http\Controllers\DaftarPetugasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PengajuanSuratController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratKeluarController;
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
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //pengajuan surat
    Route::get('/download-pdf/{id}', [PdfController::class, 'generatePdf'])->name('download.pdf');
    Route::get('/download-pdf-sk/{id}', [PdfController::class, 'generatePdfsk'])->name('download.pdf.sk');
    Route::post('/surat-pengajuan/approve/{id}', [PengajuanSuratController::class, 'approve'])->name('surat-pengajuan.approve');
Route::post('/surat-pengajuan/reject/{id}', [PengajuanSuratController::class, 'reject'])->name('surat-pengajuan.reject');
    //pengajuan surat
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('daftar-mahasiswa', DaftarMahasiswaController::class);
        Route::resource('daftar-petugas', DaftarPetugasController::class);
    });
    Route::middleware(['role:petugas'])->group(function () {
        Route::get('/surat-pengajuan', [PengajuanSuratController::class, 'index'])->name('pengajuan-surat.index');
        Route::get('/surat-upload/{id}', [PengajuanSuratController::class, 'upload'])->name('surat-upload');
        Route::post('/surat-upload', [PengajuanSuratController::class, 'uploadStore'])->name('surat-upload.store');
        Route::get('/surat-keluar', [SuratKeluarController::class, 'index'])->name('surat-keluar.index');
        Route::get('/surat-pengajuan/create', [PengajuanSuratController::class, 'create'])->name('pengajuan-surat.create');
        Route::get('/surat-pengajuan/{id}', [PengajuanSuratController::class, 'show'])->name('pengajuan-surat.show');
        Route::post('/surat-pengajuan', [PengajuanSuratController::class, 'store'])->name('pengajuan-surat.store');
        Route::get('/surat-pengajuan/{id}/edit', [PengajuanSuratController::class, 'edit'])->name('pengajuan-surat.edit');
        Route::put('/surat-pengajuan/{id}', [PengajuanSuratController::class, 'update'])->name('pengajuan-surat.update');
        Route::delete('/surat-pengajuan/{id}', [PengajuanSuratController::class, 'destroy'])->name('pengajuan-surat.destroy');
        Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip.index');
    });
    Route::middleware(['role:mahasiswa'])->group(function () {
        Route::get('/surat-pengajuan/create', [PengajuanSuratController::class, 'create'])->name('surat-pengajuan.create');
        Route::post('/surat-pengajuan', [PengajuanSuratController::class, 'store'])->name('surat-pengajuan.store');
    });
});

require __DIR__.'/auth.php';
