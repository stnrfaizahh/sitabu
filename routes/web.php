<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WalikelasController;
use App\Http\Controllers\TabunganController;
use App\Http\Controllers\SiswaController; 
use App\Http\Controllers\BendaharaController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route dashboard
Route::get('/dashboard', [WalikelasController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

// Group middleware untuk auth
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Group route untuk Wali Kelas
Route::group(['middleware' => ['auth','verified']], function () {
   Route::prefix('wali_kelas')->group(function(){
        Route::get('/index', [WalikelasController::class, 'index'])->name('wali_kelas.index');
        Route::post('/list', [WalikelasController::class, 'list'])->name('wali_kelas.list');
        Route::get('/create', [WalikelasController::class, 'create'])->name('wali_kelas.create');
        Route::post('/', [WalikelasController::class, 'store'])->name('wali_kelas.store');
        Route::get('/{id}', [WalikelasController::class, 'show'])->name('wali_kelas.show');
        Route::get('/{id}/edit', [WalikelasController::class, 'edit'])->name('wali_kelas.edit');
        Route::put('/{id}', [WalikelasController::class, 'update'])->name('wali_kelas.update');
        Route::delete('/{id}', [WalikelasController::class, 'destroy'])->name('wali_kelas.destroy');
   });
});

// Group route untuk Tabungan
Route::get('/tabungan', [TabunganController::class, 'index'])->name('tabungan.index');
Route::post('/tabungan/store', [TabunganController::class, 'store'])->name('tabungan.store');
Route::get('/tabungan/{siswa_id}', [TabunganController::class, 'show'])->name('tabungan.show');
Route::get('/tabungan/edit/{id}', [TabunganController::class, 'edit'])->name('tabungan.edit');
Route::put('/tabungan/update/{id}', [TabunganController::class, 'update'])->name('tabungan.update');

// Group route untuk Siswa (hanya melihat dashboard siswa)
Route::group(['middleware' => ['auth', 'verified', 'role:siswa']], function () {
    Route::get('/siswa/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard'); // Menampilkan dashboard siswa
});
use App\Http\Controllers\BendaharaController;

// Group route untuk Bendahara
Route::group(['middleware' => ['auth', 'verified', 'role:bendahara']], function () {
    Route::get('/bendahara/dashboard', [BendaharaController::class, 'dashboard'])->name('bendahara.dashboard');
});

require __DIR__.'/auth.php';
